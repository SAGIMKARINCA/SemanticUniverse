<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/semantic-universe'));
Route::get('/SemanticUniverse', fn () => redirect('/semantic-universe'));

Route::get('/semantic-universe', function (Request $request) {
    $isGodMode = $request->session()->get('semantic_universe_mode') === 'godmode';
    $godModeProfile = [
        'name' => 'GodMode Super Admin',
        'role' => 'System Ana Yukleyicisi',
        'scope' => 'SemanticUniverse Core',
    ];

    return view('semantic-universe.shell', [
        'isGodMode' => $isGodMode,
        'godModeProfile' => $godModeProfile,
    ]);
})->name('semantic-universe.home');

Route::get('/semantic-universe/godmode-login', function (Request $request) {
    $request->session()->put('semantic_universe_mode', 'godmode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.login');

Route::get('/semantic-universe/logout', function (Request $request) {
    $request->session()->forget('semantic_universe_mode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.logout');

Route::get('/semantic-universe/journal', function (Request $request) {
    $isUnlocked = $request->session()->get('semantic_universe_journal_unlocked', false);
    $passwordError = $request->session()->pull('semantic_universe_journal_error');
    $journalPath = resource_path('semantic-universe-journal');

    $markdownToHtml = function (string $markdown): string {
        $lines = preg_split("/\r\n|\n|\r/", $markdown);
        $html = '';
        $inList = false;

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if ($trimmed === '') {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                continue;
            }

            $escaped = e($trimmed);

            if (str_starts_with($trimmed, '### ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h4>' . e(substr($trimmed, 4)) . '</h4>';
                continue;
            }

            if (str_starts_with($trimmed, '## ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h3>' . e(substr($trimmed, 3)) . '</h3>';
                continue;
            }

            if (str_starts_with($trimmed, '# ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h2>' . e(substr($trimmed, 2)) . '</h2>';
                continue;
            }

            if (str_starts_with($trimmed, '- ')) {
                if (! $inList) {
                    $html .= '<ul>';
                    $inList = true;
                }
                $html .= '<li>' . e(substr($trimmed, 2)) . '</li>';
                continue;
            }

            if ($inList) {
                $html .= '</ul>';
                $inList = false;
            }

            $html .= '<p>' . $escaped . '</p>';
        }

        if ($inList) {
            $html .= '</ul>';
        }

        return $html;
    };

    $classifyTimelineCategory = function (string $title, array $actions, array $why, array $result): string {
        $haystack = mb_strtolower(trim($title . ' ' . implode(' ', $actions) . ' ' . implode(' ', $why) . ' ' . implode(' ', $result)));

        if (str_contains($haystack, 'history') || str_contains($haystack, 'journal') || str_contains($haystack, 'belgesel')) {
            return 'history';
        }

        if (
            str_contains($haystack, 'ubuntu') ||
            str_contains($haystack, 'nginx') ||
            str_contains($haystack, 'postgresql') ||
            str_contains($haystack, 'redis') ||
            str_contains($haystack, 'dns') ||
            str_contains($haystack, 'staging') ||
            str_contains($haystack, 'github') ||
            str_contains($haystack, 'sunucu') ||
            str_contains($haystack, 'host')
        ) {
            return 'infrastructure';
        }

        if (
            str_contains($haystack, 'shell') ||
            str_contains($haystack, 'layout') ||
            str_contains($haystack, 'menu') ||
            str_contains($haystack, 'gorunum') ||
            str_contains($haystack, 'journal web') ||
            str_contains($haystack, 'timeline katmani')
        ) {
            return 'interface';
        }

        if (
            str_contains($haystack, 'kaynak') ||
            str_contains($haystack, 'semantik') ||
            str_contains($haystack, 'tanim') ||
            str_contains($haystack, 'cekirdek') ||
            str_contains($haystack, 'determinant')
        ) {
            return 'semantic';
        }

        return 'foundation';
    };

    $parseTimelineEntries = function (string $markdown) use ($classifyTimelineCategory): array {
        $lines = preg_split("/\r\n|\n|\r/", $markdown);
        $entries = [];
        $current = null;
        $currentListLabel = null;

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if (str_starts_with($trimmed, '## ')) {
                if ($current) {
                    $current['category'] = $classifyTimelineCategory($current['title'], $current['actions'], $current['why'], $current['result']);
                    $current['anchor'] = 'timeline-' . count($entries);
                    $entries[] = $current;
                }

                $title = substr($trimmed, 3);
                $parts = array_map('trim', explode('|', $title, 2));
                $current = [
                    'title' => $parts[1] ?? $parts[0],
                    'date' => $parts[0] ?? '',
                    'why' => [],
                    'actions' => [],
                    'result' => [],
                ];
                $currentListLabel = null;
                continue;
            }

            if (! $current || $trimmed === '') {
                continue;
            }

            if ($trimmed === 'Ne yaptik:') {
                $currentListLabel = 'actions';
                continue;
            }

            if ($trimmed === 'Neden yaptik:') {
                $currentListLabel = 'why';
                continue;
            }

            if ($trimmed === 'Sonuc:') {
                $currentListLabel = 'result';
                continue;
            }

            if (str_starts_with($trimmed, '- ') && $currentListLabel) {
                $current[$currentListLabel][] = substr($trimmed, 2);
                continue;
            }

            if (! $currentListLabel) {
                $current['actions'][] = $trimmed;
            }
        }

        if ($current) {
            $current['category'] = $classifyTimelineCategory($current['title'], $current['actions'], $current['why'], $current['result']);
            $current['anchor'] = 'timeline-' . count($entries);
            $entries[] = $current;
        }

        return $entries;
    };

    $rawTimeline = File::exists($journalPath . DIRECTORY_SEPARATOR . 'timeline.md')
        ? File::get($journalPath . DIRECTORY_SEPARATOR . 'timeline.md')
        : '';
    $rawDecisions = File::exists($journalPath . DIRECTORY_SEPARATOR . 'decisions.md')
        ? File::get($journalPath . DIRECTORY_SEPARATOR . 'decisions.md')
        : '';
    $rawDefinitions = File::exists($journalPath . DIRECTORY_SEPARATOR . 'definitions.md')
        ? File::get($journalPath . DIRECTORY_SEPARATOR . 'definitions.md')
        : '';
    $rawExperiments = File::exists($journalPath . DIRECTORY_SEPARATOR . 'experiments.md')
        ? File::get($journalPath . DIRECTORY_SEPARATOR . 'experiments.md')
        : '';

    $timelineEntries = $parseTimelineEntries($rawTimeline);
    $timelineCategories = [
        'all' => 'Tum Akis',
        'foundation' => 'Kurulus',
        'semantic' => 'Semantik',
        'interface' => 'Arayuz',
        'infrastructure' => 'Altyapi',
        'history' => 'History',
    ];
    $timelineCounts = ['all' => count($timelineEntries)];

    foreach ($timelineCategories as $key => $label) {
        if ($key === 'all') {
            continue;
        }

        $timelineCounts[$key] = count(array_filter($timelineEntries, fn (array $entry) => $entry['category'] === $key));
    }

    $featuredEntries = array_slice(array_reverse($timelineEntries), 0, 3);

    return view('semantic-universe.journal', [
        'isUnlocked' => $isUnlocked,
        'passwordError' => $passwordError,
        'journalPasswordHint' => env('SEMANTIC_UNIVERSE_JOURNAL_HINT', 'Kurucu sifre gerektirir'),
        'timelineEntries' => $timelineEntries,
        'timelineCategories' => $timelineCategories,
        'timelineCounts' => $timelineCounts,
        'featuredEntries' => $featuredEntries,
        'decisionsHtml' => $markdownToHtml($rawDecisions),
        'definitionsHtml' => $markdownToHtml($rawDefinitions),
        'experimentsHtml' => $markdownToHtml($rawExperiments),
        'ruleText' => 'Her yaptigin isi timeline.md, decisions.md, definitions.md ve experiments.md dosyalarina yaz.',
    ]);
})->name('semantic-universe.journal');

Route::post('/semantic-universe/journal/unlock', function (Request $request) {
    $input = (string) $request->input('password', '');
    $expected = (string) env('SEMANTIC_UNIVERSE_JOURNAL_PASSWORD', 'semanticuniverse-journal-2026');

    if (hash_equals($expected, $input)) {
        $request->session()->put('semantic_universe_journal_unlocked', true);

        return redirect()->route('semantic-universe.journal');
    }

    $request->session()->forget('semantic_universe_journal_unlocked');
    $request->session()->put('semantic_universe_journal_error', 'Gecersiz sifre.');

    return redirect()->route('semantic-universe.journal');
})->name('semantic-universe.journal.unlock');

Route::post('/semantic-universe/journal/lock', function (Request $request) {
    $request->session()->forget('semantic_universe_journal_unlocked');

    return redirect()->route('semantic-universe.journal');
})->name('semantic-universe.journal.lock');
