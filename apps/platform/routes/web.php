<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

$supportedLocales = ['tr', 'en'];

$cleanText = null;
$cleanText = function ($value) use (&$cleanText) {
    if (is_array($value)) {
        return array_map($cleanText, $value);
    }

    if (! is_string($value)) {
        return $value;
    }

    $normalized = str_replace(["\u{FEFF}", "\r\n", "\r"], ['', "\n", "\n"], $value);

    return trim($normalized);
};

$renderInlineMarkdown = function (?string $text) use ($cleanText) {
    $text = $cleanText($text ?? '');

    if ($text === '') {
        return '';
    }

    $tokens = [];
    $tokenIndex = 0;

    $text = preg_replace_callback('/\[(.*?)\]\((.*?)\)/u', function (array $matches) use (&$tokens, &$tokenIndex) {
        $token = "__SU_LINK_{$tokenIndex}__";
        $href = trim($matches[2]);
        $target = Str::startsWith($href, '/') ? '_self' : '_blank';

        $tokens[$token] = '<a href="'.e($href).'" target="'.$target.'" rel="noopener">'.e($matches[1]).'</a>';
        $tokenIndex++;

        return $token;
    }, $text) ?? $text;

    $text = e($text);

    foreach ($tokens as $token => $html) {
        $text = str_replace($token, $html, $text);
    }

    $text = preg_replace('/\*\*(.+?)\*\*/u', '<strong>$1</strong>', $text) ?? $text;
    $text = preg_replace('/`(.+?)`/u', '<code>$1</code>', $text) ?? $text;

    return $text;
};

$formatArchiveLine = function (?string $line) use ($cleanText) {
    $line = $cleanText($line ?? '');

    if ($line === '') {
        return '';
    }

    $line = preg_replace('/\s+/u', ' ', $line) ?? $line;
    $line = trim($line);

    $first = mb_strtoupper(mb_substr($line, 0, 1, 'UTF-8'), 'UTF-8');
    $rest = mb_substr($line, 1, null, 'UTF-8');
    $line = $first.$rest;

    if (! preg_match('/[.!?:…]$/u', $line)) {
        $line .= '.';
    }

    return $line;
};

$markdownToHtml = function (?string $markdown) use ($cleanText, $renderInlineMarkdown) {
    $markdown = $cleanText($markdown ?? '');

    if ($markdown === '') {
        return '';
    }

    $lines = preg_split('/\R/u', $markdown) ?: [];
    $html = [];
    $inList = false;

    $closeList = static function () use (&$html, &$inList) {
        if ($inList) {
            $html[] = '</ul>';
            $inList = false;
        }
    };

    foreach ($lines as $line) {
        $trimmed = trim($line);

        if ($trimmed === '') {
            $closeList();
            continue;
        }

        if (str_starts_with($trimmed, '### ')) {
            $closeList();
            $html[] = '<h4>'.$renderInlineMarkdown(substr($trimmed, 4)).'</h4>';
            continue;
        }

        if (str_starts_with($trimmed, '## ')) {
            $closeList();
            $html[] = '<h3>'.$renderInlineMarkdown(substr($trimmed, 3)).'</h3>';
            continue;
        }

        if (str_starts_with($trimmed, '# ')) {
            $closeList();
            $html[] = '<h2>'.$renderInlineMarkdown(substr($trimmed, 2)).'</h2>';
            continue;
        }

        if (str_starts_with($trimmed, '- ')) {
            if (! $inList) {
                $html[] = '<ul>';
                $inList = true;
            }

            $html[] = '<li>'.$renderInlineMarkdown(substr($trimmed, 2)).'</li>';
            continue;
        }

        if (preg_match('/^([^:]{1,120}):\s*(.+)$/u', $trimmed, $matches)) {
            $closeList();
            $html[] = '<p><strong>'.$renderInlineMarkdown($matches[1]).':</strong> '.$renderInlineMarkdown($matches[2]).'</p>';
            continue;
        }

        $closeList();
        $html[] = '<p>'.$renderInlineMarkdown($trimmed).'</p>';
    }

    $closeList();

    return implode("\n", $html);
};

$applyLocale = function (?string $requestedLocale) use ($supportedLocales) {
    $locale = $requestedLocale ?: Session::get('semantic_universe_locale', 'tr');

    if (! in_array($locale, $supportedLocales, true)) {
        $locale = 'tr';
    }

    Session::put('semantic_universe_locale', $locale);
    app()->setLocale($locale);
    Carbon::setLocale($locale === 'tr' ? 'tr' : 'en');

    return $locale;
};

$buildLocaleOptions = function (string $currentLocale, string $redirectUrl) use ($supportedLocales) {
    return collect($supportedLocales)
        ->map(fn (string $locale) => [
            'code' => $locale,
            'label' => strtoupper($locale),
            'active' => $locale === $currentLocale,
            'url' => route('semantic-universe.locale', [
                'locale' => $locale,
                'redirect' => $redirectUrl,
            ]),
        ])
        ->all();
};

$resolveJournalPath = function (string $relativePath, string $locale) {
    $basePath = resource_path('semantic-universe-journal');
    $localizedPath = $basePath.'/locales/'.$locale.'/'.$relativePath;
    $defaultPath = $basePath.'/'.$relativePath;

    if ($locale !== 'tr' && file_exists($localizedPath)) {
        return $localizedPath;
    }

    return $defaultPath;
};

$classifyTimelineCategory = function (array $entry) use ($cleanText) {
    $text = Str::lower($cleanText(
        $entry['title'].' '.
        implode(' ', $entry['what']).' '.
        implode(' ', $entry['why']).' '.
        implode(' ', $entry['result'])
    ));

    if (Str::contains($text, ['tarihçe', 'journal', 'history', 'belgesel', 'kaynak doküman', 'kaynak arşivi'])) {
        return 'history';
    }

    if (Str::contains($text, ['shell', 'arayüz', 'interface', 'menü', 'menu', 'görünüm', 'layout', 'timeline'])) {
        return 'interface';
    }

    if (Str::contains($text, ['ubuntu', 'nginx', 'postgresql', 'redis', 'dns', 'staging', 'deploy', 'sunucu', 'server', 'host'])) {
        return 'infrastructure';
    }

    if (Str::contains($text, ['semantik', 'semantic', 'kaynak', 'determinant', 'proses', 'nesne', 'olay', 'çekirdek', 'resource'])) {
        return 'semantic';
    }

    return 'foundation';
};

$buildGeneratedDetailMarkdown = function (array $entry, array $detailLabels) {
    $lines = [
        '# '.$entry['record_id'].' | '.$entry['title'],
        '',
        $detailLabels['date'].': '.$entry['date'],
        '',
        $detailLabels['day_sequence'].': '.$entry['sequence'],
        '',
        $detailLabels['category'].': '.$entry['category_label'],
    ];

    if (! empty($entry['what'])) {
        $lines[] = '';
        $lines[] = '## '.$detailLabels['discussed'];
        foreach ($entry['what'] as $item) {
            $lines[] = '- '.$item;
        }
    }

    if (! empty($entry['what'])) {
        $lines[] = '';
        $lines[] = '## '.$detailLabels['done'];
        foreach ($entry['what'] as $item) {
            $lines[] = '- '.$item;
        }
    }

    if (! empty($entry['why'])) {
        $lines[] = '';
        $lines[] = '## '.$detailLabels['why'];
        foreach ($entry['why'] as $item) {
            $lines[] = '- '.$item;
        }
    }

    if (! empty($entry['result'])) {
        $lines[] = '';
        $lines[] = '## '.$detailLabels['result'];
        foreach ($entry['result'] as $item) {
            $lines[] = '- '.$item;
        }
    }

    $lines[] = '';
    $lines[] = '## '.$detailLabels['archive_note'];
    $lines[] = '- '.$detailLabels['generated_note'];

    return implode("\n", $lines);
};

$parseTimelineEntries = function (string $timelineMarkdown, array $categoryLabels, string $currentLocale, array $detailLabels) use (
    $cleanText,
    $formatArchiveLine,
    $classifyTimelineCategory,
    $buildGeneratedDetailMarkdown,
    $markdownToHtml,
    $resolveJournalPath
) {
    $lines = preg_split('/\R/u', $timelineMarkdown) ?: [];
    $entries = [];
    $current = null;
    $currentSection = null;
    $dailyCounters = [];

    $flush = function () use (
        &$entries,
        &$current,
        &$dailyCounters,
        $categoryLabels,
        $classifyTimelineCategory,
        $buildGeneratedDetailMarkdown,
        $markdownToHtml,
        $cleanText
    ) {
        if (! $current) {
            return;
        }

        $dateKey = str_replace('-', '', $current['date']);
        $dailyCounters[$current['date']] = ($dailyCounters[$current['date']] ?? 0) + 1;
        $sequence = $dailyCounters[$current['date']];

        $current['sequence'] = $sequence;
        $current['record_id'] = sprintf('SUH-%s-%02d', $dateKey, $sequence);
        $current['category'] = $classifyTimelineCategory($current);
        $current['category_label'] = $categoryLabels[$current['category']] ?? ucfirst($current['category']);
        $current['summary'] = $current['result'][0] ?? $current['what'][0] ?? $current['why'][0] ?? $current['title'];

        $detailPath = $resolveJournalPath('details/'.$current['record_id'].'.md', $currentLocale);
        $defaultDetailPath = resource_path('semantic-universe-journal/details/'.$current['record_id'].'.md');

        if ($currentLocale !== 'tr' && ! file_exists($detailPath)) {
            $detailMarkdown = $buildGeneratedDetailMarkdown($current, $detailLabels);
        } elseif (file_exists($detailPath)) {
            $detailMarkdown = $cleanText(file_get_contents($detailPath));
        } elseif (file_exists($defaultDetailPath)) {
            $detailMarkdown = $cleanText(file_get_contents($defaultDetailPath));
        } else {
            $detailMarkdown = $buildGeneratedDetailMarkdown($current, $detailLabels);
        }

        $current['detail_file'] = $current['record_id'].'.md';
        $current['detail_markdown'] = $detailMarkdown;
        $current['detail_html'] = $markdownToHtml($detailMarkdown);

        $entries[] = $current;
        $current = null;
    };

    foreach ($lines as $line) {
        $trimmed = trim($cleanText($line));

        if (preg_match('/^##\s+(\d{4}-\d{2}-\d{2})\s*\|\s*(.+)$/u', $trimmed, $matches)) {
            $flush();
            $current = [
                'date' => $matches[1],
                'title' => trim($matches[2]),
                'what' => [],
                'why' => [],
                'result' => [],
            ];
            $currentSection = null;
            continue;
        }

        if (! $current || $trimmed === '') {
            continue;
        }

        $sectionMap = [
            'ne yaptık:' => 'what',
            'what we did:' => 'what',
            'neden yaptık:' => 'why',
            'why we did it:' => 'why',
            'sonuç:' => 'result',
            'outcome:' => 'result',
        ];

        $normalizedLabel = Str::lower($trimmed);

        if (isset($sectionMap[$normalizedLabel])) {
            $currentSection = $sectionMap[$normalizedLabel];
            continue;
        }

        if ($currentSection === null) {
            continue;
        }

        $content = str_starts_with($trimmed, '- ') ? substr($trimmed, 2) : $trimmed;
        $formatted = $formatArchiveLine($content);

        if ($formatted !== '') {
            $current[$currentSection][] = $formatted;
        }
    }

    $flush();

    return $entries;
};

$loadSources = function (string $currentLocale) use ($cleanText) {
    /** @var array<string, array<string, mixed>> $manifest */
    $manifest = include resource_path('semantic-universe-journal/sources.php');
    $cards = [];

    foreach ($manifest as $id => $source) {
        $localized = $source;

        if ($currentLocale !== 'tr' && isset($source['translations'][$currentLocale])) {
            $localized = array_merge($localized, $source['translations'][$currentLocale]);
        }

        $available = ! empty($source['path']) && file_exists($source['path']);
        $category = $cleanText($localized['category'] ?? trans('semantic_universe.sources.default_category'));
        $roles = $cleanText($localized['roles'] ?? []);
        $summary = $cleanText($localized['summary'] ?? '');
        $statusNote = $cleanText($localized['status_note'] ?? null);
        $title = $cleanText($localized['title'] ?? $source['title']);

        $cards[] = [
            'id' => $id,
            'title' => $title,
            'path' => $source['path'],
            'mime' => $source['mime'] ?? 'application/octet-stream',
            'available' => $available,
            'download_url' => $available ? route('semantic-universe.journal.source', ['source' => $id]) : null,
            'original_path' => $cleanText($source['original_path'] ?? ''),
            'category' => $category,
            'category_key' => Str::slug($category, '-'),
            'summary' => $summary,
            'roles' => array_values(array_filter(array_map($cleanText, $roles))),
            'status_note' => $statusNote,
            'status_key' => $available ? 'available' : 'pending',
            'status_label' => $available ? trans('semantic_universe.sources.status.available') : trans('semantic_universe.sources.status.pending'),
            'file_label' => strtoupper(pathinfo($title, PATHINFO_EXTENSION)),
            'search_text' => Str::lower($cleanText($title.' '.$summary.' '.implode(' ', $roles).' '.$category)),
        ];
    }

    return $cards;
};

$buildSharedViewData = function (Request $request, array $extra = []) use ($applyLocale, $buildLocaleOptions) {
    $currentLocale = $applyLocale($request->query('lang'));
    $redirectUrl = $request->fullUrlWithQuery(['lang' => null]);

    return array_merge([
        'currentLocale' => $currentLocale,
        'localeOptions' => $buildLocaleOptions($currentLocale, $redirectUrl),
        'ui' => trans('semantic_universe'),
        'isGodMode' => Session::get('semantic_universe_mode') === 'godmode',
    ], $extra);
};

Route::get('/', fn () => redirect()->route('semantic-universe.home'));
Route::get('/SemanticUniverse', fn () => redirect()->route('semantic-universe.home'));

Route::get('/semantic-universe/locale/{locale}', function (Request $request, string $locale) use ($supportedLocales) {
    if (! in_array($locale, $supportedLocales, true)) {
        $locale = 'tr';
    }

    Session::put('semantic_universe_locale', $locale);
    $redirect = $request->query('redirect', route('semantic-universe.home'));

    return redirect()->to((string) $redirect);
})->name('semantic-universe.locale');

Route::get('/semantic-universe', function (Request $request) use ($buildSharedViewData) {
    return view('semantic-universe.shell', $buildSharedViewData($request, [
        'activeTopMenu' => 'system',
    ]));
})->name('semantic-universe.home');

Route::get('/semantic-universe/godmode-login', function () {
    Session::put('semantic_universe_mode', 'godmode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.login');

Route::get('/semantic-universe/logout', function () {
    Session::forget('semantic_universe_mode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.logout');

Route::post('/semantic-universe/journal/unlock', function (Request $request) use ($applyLocale) {
    $locale = $applyLocale($request->query('lang'));
    $password = (string) $request->input('password');
    $expected = (string) env('SEMANTIC_UNIVERSE_JOURNAL_PASSWORD', 'semanticuniverse-journal-2026');

    if (hash_equals($expected, $password)) {
        Session::put('semantic_universe_journal_unlocked', true);
        Session::forget('semantic_universe_journal_error');
    } else {
        Session::put('semantic_universe_journal_error', trans('semantic_universe.journal.password_error', [], $locale));
    }

    return redirect()->route('semantic-universe.journal', ['lang' => $locale]);
})->name('semantic-universe.journal.unlock');

Route::post('/semantic-universe/journal/lock', function (Request $request) use ($applyLocale) {
    $locale = $applyLocale($request->query('lang'));
    Session::forget('semantic_universe_journal_unlocked');

    return redirect()->route('semantic-universe.journal', ['lang' => $locale]);
})->name('semantic-universe.journal.lock');

Route::get('/semantic-universe/journal', function (Request $request) use (
    $buildSharedViewData,
    $cleanText,
    $parseTimelineEntries,
    $loadSources,
    $markdownToHtml,
    $resolveJournalPath
) {
    $shared = $buildSharedViewData($request);
    $ui = $shared['ui'];
    $currentLocale = $shared['currentLocale'];

    $timelineMarkdown = $cleanText(file_get_contents($resolveJournalPath('timeline.md', $currentLocale)));
    $timelineEntries = array_reverse($parseTimelineEntries(
        $timelineMarkdown,
        $ui['journal']['timeline_categories'],
        $currentLocale,
        $ui['journal']['detail_labels']
    ));

    $timelineCounts = ['all' => count($timelineEntries)];
    foreach (array_keys($ui['journal']['timeline_categories']) as $categoryKey) {
        if ($categoryKey === 'all') {
            continue;
        }
        $timelineCounts[$categoryKey] = count(array_filter($timelineEntries, fn (array $entry) => $entry['category'] === $categoryKey));
    }

    $featuredEntries = array_slice($timelineEntries, 0, 3);
    $timelineYears = collect($timelineEntries)
        ->pluck('date')
        ->map(fn (string $date) => substr($date, 0, 4))
        ->unique()
        ->values()
        ->all();
    rsort($timelineYears);

    $sourceCards = $loadSources($currentLocale);

    return view('semantic-universe.journal', array_merge($shared, [
        'isUnlocked' => Session::get('semantic_universe_journal_unlocked', false),
        'passwordError' => Session::pull('semantic_universe_journal_error'),
        'journalPasswordHint' => $ui['journal']['password_hint'],
        'ruleText' => $ui['rule_text'],
        'timelineEntries' => $timelineEntries,
        'timelineCategories' => $ui['journal']['timeline_categories'],
        'timelineCounts' => $timelineCounts,
        'featuredEntries' => $featuredEntries,
        'timelineYears' => $timelineYears,
        'sourceCards' => $sourceCards,
        'decisionsHtml' => $markdownToHtml(file_get_contents($resolveJournalPath('decisions.md', $currentLocale))),
        'definitionsHtml' => $markdownToHtml(file_get_contents($resolveJournalPath('definitions.md', $currentLocale))),
        'experimentsHtml' => $markdownToHtml(file_get_contents($resolveJournalPath('experiments.md', $currentLocale))),
    ]));
})->name('semantic-universe.journal');

Route::get('/semantic-universe/history', fn () => redirect()->route('semantic-universe.journal'));

Route::get('/semantic-universe/kaynaklar', function (Request $request) use ($buildSharedViewData, $loadSources) {
    $shared = $buildSharedViewData($request);
    $sourceCards = $loadSources($shared['currentLocale']);

    $categoryLabels = ['all' => trans('semantic_universe.common.all')];
    foreach ($sourceCards as $source) {
        $categoryLabels[$source['category_key']] = $source['category'];
    }

    $categoryCounts = ['all' => count($sourceCards)];
    foreach ($categoryLabels as $key => $label) {
        if ($key === 'all') {
            continue;
        }
        $categoryCounts[$key] = count(array_filter($sourceCards, fn (array $source) => $source['category_key'] === $key));
    }

    $availableCount = count(array_filter($sourceCards, fn (array $source) => $source['status_key'] === 'available'));
    $pendingCount = count(array_filter($sourceCards, fn (array $source) => $source['status_key'] === 'pending'));

    return view('semantic-universe.sources', array_merge($shared, [
        'sources' => $sourceCards,
        'categoryLabels' => $categoryLabels,
        'categoryCounts' => $categoryCounts,
        'availableCount' => $availableCount,
        'pendingCount' => $pendingCount,
    ]));
})->name('semantic-universe.sources');

Route::get('/semantic-universe/sources', fn () => redirect()->route('semantic-universe.sources'));

Route::get('/semantic-universe/journal/source/{source}', function (string $source) use ($loadSources) {
    if (! Session::get('semantic_universe_journal_unlocked', false) && Session::get('semantic_universe_mode') !== 'godmode') {
        abort(403);
    }

    $sourceCards = $loadSources((string) Session::get('semantic_universe_locale', 'tr'));
    $record = collect($sourceCards)->firstWhere('id', $source);

    if (! $record || ! $record['available'] || ! is_string($record['path']) || ! file_exists($record['path'])) {
        abort(404);
    }

    return Response::download($record['path'], basename($record['path']), [
        'Content-Type' => $record['mime'],
    ]);
})->name('semantic-universe.journal.source');
