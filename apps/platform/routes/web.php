<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/semantic-universe'));
Route::get('/SemanticUniverse', fn () => redirect('/semantic-universe'));

Route::get('/semantic-universe', function (Request $request) {
    $isGodMode = $request->session()->get('semantic_universe_mode') === 'godmode';
    $godModeProfile = [
        'name' => 'Tanrı Modu Üst Yöneticisi',
        'role' => 'Sistem Ana Yükleyicisi',
        'scope' => 'SemanticUniverse Çekirdeği',
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
    $detailPath = $journalPath . DIRECTORY_SEPARATOR . 'details';
    $sourcesManifestPath = $journalPath . DIRECTORY_SEPARATOR . 'sources.php';
    $journalSources = File::exists($sourcesManifestPath) ? require $sourcesManifestPath : [];

    $timelineCategories = [
        'all' => 'Tüm Akış',
        'foundation' => 'Kuruluş',
        'semantic' => 'Semantik',
        'interface' => 'Arayüz',
        'infrastructure' => 'Altyapı',
        'history' => 'Tarihçe',
    ];

    $renderInlineMarkdown = function (string $text): string {
        $placeholders = [];
        $prepared = preg_replace_callback('/\[([^\]]+)\]\(([^)]+)\)/u', function (array $matches) use (&$placeholders): string {
            $key = '__LINK_' . count($placeholders) . '__';
            $placeholders[$key] = '<a href="' . e($matches[2]) . '" target="_blank" rel="noopener">' . e($matches[1]) . '</a>';

            return $key;
        }, $text) ?? $text;

        return strtr(e($prepared), $placeholders);
    };

    $markdownToHtml = function (string $markdown) use ($renderInlineMarkdown): string {
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

            if (str_starts_with($trimmed, '### ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h4>' . $renderInlineMarkdown(substr($trimmed, 4)) . '</h4>';
                continue;
            }

            if (str_starts_with($trimmed, '## ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h3>' . $renderInlineMarkdown(substr($trimmed, 3)) . '</h3>';
                continue;
            }

            if (str_starts_with($trimmed, '# ')) {
                if ($inList) {
                    $html .= '</ul>';
                    $inList = false;
                }
                $html .= '<h2>' . $renderInlineMarkdown(substr($trimmed, 2)) . '</h2>';
                continue;
            }

            if (str_starts_with($trimmed, '- ')) {
                if (! $inList) {
                    $html .= '<ul>';
                    $inList = true;
                }
                $html .= '<li>' . $renderInlineMarkdown(substr($trimmed, 2)) . '</li>';
                continue;
            }

            if ($inList) {
                $html .= '</ul>';
                $inList = false;
            }

            $html .= '<p>' . $renderInlineMarkdown($trimmed) . '</p>';
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
            str_contains($haystack, 'gorunum') || str_contains($haystack, 'görünüm') || str_contains($haystack, 'görünüm') || str_contains($haystack, 'görünüm') || str_contains($haystack, 'görünüm') || str_contains($haystack, 'görünüm') || str_contains($haystack, 'görünüm') ||
            str_contains($haystack, 'journal web') ||
            str_contains($haystack, 'timeline katmani') || str_contains($haystack, 'timeline katmanı') || str_contains($haystack, 'timeline katmanı') || str_contains($haystack, 'timeline katmanı') || str_contains($haystack, 'timeline katmanı') || str_contains($haystack, 'timeline katmanı') || str_contains($haystack, 'timeline katmanı')
        ) {
            return 'interface';
        }

        if (
            str_contains($haystack, 'kaynak') ||
            str_contains($haystack, 'semantik') ||
            str_contains($haystack, 'tanim') || str_contains($haystack, 'tanım') || str_contains($haystack, 'tanım') || str_contains($haystack, 'tanım') || str_contains($haystack, 'tanım') || str_contains($haystack, 'tanım') || str_contains($haystack, 'tanım') ||
            str_contains($haystack, 'cekirdek') || str_contains($haystack, 'çekirdek') || str_contains($haystack, 'çekirdek') || str_contains($haystack, 'çekirdek') || str_contains($haystack, 'çekirdek') || str_contains($haystack, 'çekirdek') || str_contains($haystack, 'çekirdek') ||
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

            if ($trimmed === 'Ne yaptik:' || $trimmed === 'Ne yaptık:') {
                $currentListLabel = 'actions';
                continue;
            }

            if ($trimmed === 'Neden yaptik:' || $trimmed === 'Neden yaptık:') {
                $currentListLabel = 'why';
                continue;
            }

            if ($trimmed === 'Sonuc:' || $trimmed === 'Sonuç:') {
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
            $entries[] = $current;
        }

        return $entries;
    };

    $buildGeneratedDetailMarkdown = function (array $entry, array $timelineCategories): string {
        $lines = [
            '# ' . $entry['record_id'] . ' | ' . $entry['title'],
            '',
            'Tarih: ' . $entry['date'],
            'Gün içi sıra: ' . $entry['sequence'],
            'Kategori: ' . ($timelineCategories[$entry['category']] ?? 'Akış'),
            '',
            '## Neler konuşuldu',
        ];

        $discussion = array_merge($entry['actions'], $entry['why']);
        foreach ($discussion ?: ['Bu kayıt için ayrı konuşma notu henüz eklenmedi.'] as $item) {
            $lines[] = '- ' . $item;
        }

        $lines[] = '';
        $lines[] = '## Neler yapıldı';
        foreach ($entry['actions'] ?: ['Yapılan iş adımları daha sonra genişletilecek.'] as $item) {
            $lines[] = '- ' . $item;
        }

        $lines[] = '';
        $lines[] = '## Neden yapıldı';
        foreach ($entry['why'] ?: ['Gerekçe notu daha sonra genişletilecek.'] as $item) {
            $lines[] = '- ' . $item;
        }

        $lines[] = '';
        $lines[] = '## Sonuç';
        foreach ($entry['result'] ?: ['Sonuç notu daha sonra zenginleştirilecek.'] as $item) {
            $lines[] = '- ' . $item;
        }

        $lines[] = '';
        $lines[] = '## İlgili Kaynaklar';
        $lines[] = '- Bu kayıt için ilgili dosya, eğitici metin ve referans kaynaklar henüz işlenmedi.';
        $lines[] = '- Kaynak dosya sunucu arşivine yüklendiyse burada tıklanabilir bağlantı olarak gösterilmelidir.';
        $lines[] = '';
        $lines[] = '## Arşiv notu';
        $lines[] = '- Bu detay dosyası tarihçe katmanı için otomatik oluşturuldu.';
        $lines[] = '- Sonraki turda bu kayda ilişkili konuşma parçacıkları ve karar bağlantıları eklenebilir.';
        $lines[] = '- Kullanıcının verdiği dosya, eğitici açıklama ve tanımlayıcı metinler varsa bu kayda İlgili Kaynaklar başlığı altında zorunlu olarak eklenmelidir.';
        $lines[] = '- Sunucu arşivine alınan kaynaklar detay içinden tıklanabilir bağlantı ile gösterilmelidir.';

        return implode("\n", $lines);
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
    $timelineCounts = ['all' => count($timelineEntries)];
    $timelineYears = [];
    $dailyCounters = [];

    foreach ($timelineEntries as &$entry) {
        $dateKey = preg_match('/^\d{4}-\d{2}-\d{2}$/', $entry['date']) ? $entry['date'] : '0000-00-00';
        $dailyCounters[$dateKey] = ($dailyCounters[$dateKey] ?? 0) + 1;
        $sequence = $dailyCounters[$dateKey];
        $compactDate = str_replace('-', '', $dateKey);
        $recordId = 'SUH-' . $compactDate . '-' . str_pad((string) $sequence, 2, '0', STR_PAD_LEFT);
        $detailFileName = $recordId . '.md';
        $detailFilePath = $detailPath . DIRECTORY_SEPARATOR . $detailFileName;

        $entry['sequence'] = $sequence;
        $entry['record_id'] = $recordId;
        $entry['anchor'] = 'timeline-' . strtolower(str_replace([' ', '.'], '-', $recordId));
        $entry['year'] = preg_match('/^\d{4}/', $entry['date'], $matches) ? $matches[0] : 'Bilinmiyor';
        $entry['detail_file'] = $detailFileName;

        $detailMarkdown = File::exists($detailFilePath)
            ? File::get($detailFilePath)
            : $buildGeneratedDetailMarkdown($entry, $timelineCategories);

        $entry['detail_html'] = $markdownToHtml($detailMarkdown);
        $timelineYears[$entry['year']] = $entry['year'];
    }
    unset($entry);

    foreach ($timelineCategories as $key => $label) {
        if ($key === 'all') {
            continue;
        }

        $timelineCounts[$key] = count(array_filter($timelineEntries, fn (array $entry) => $entry['category'] === $key));
    }

    krsort($timelineYears);

    $featuredEntries = array_slice(array_reverse($timelineEntries), 0, 3);

    $journalSourceCards = [];
    foreach ($journalSources as $sourceId => $sourceMeta) {
        $sourcePath = $sourceMeta['path'] ?? null;
        $available = is_string($sourcePath) && $sourcePath !== '' && File::exists($sourcePath);
        $journalSourceCards[] = [
            'id' => $sourceId,
            'title' => $sourceMeta['title'] ?? $sourceId,
            'category' => $sourceMeta['category'] ?? 'Kaynak Doküman',
            'summary' => $sourceMeta['summary'] ?? '',
            'roles' => $sourceMeta['roles'] ?? [],
            'original_path' => $sourceMeta['original_path'] ?? '',
            'available' => $available,
            'download_url' => $available ? route('semantic-universe.journal.source', ['source' => $sourceId]) : null,
            'status_note' => $sourceMeta['status_note'] ?? null,
        ];
    }
    return view('semantic-universe.journal', [
        'isUnlocked' => $isUnlocked,
        'passwordError' => $passwordError,
        'journalPasswordHint' => env('SEMANTIC_UNIVERSE_JOURNAL_HINT', 'Kurucu şifre gerektirir'),
        'timelineEntries' => $timelineEntries,
        'timelineCategories' => $timelineCategories,
        'timelineCounts' => $timelineCounts,
        'timelineYears' => $timelineYears,
        'featuredEntries' => $featuredEntries,
        'journalSources' => $journalSourceCards,
        'decisionsHtml' => $markdownToHtml($rawDecisions),
        'definitionsHtml' => $markdownToHtml($rawDefinitions),
        'experimentsHtml' => $markdownToHtml($rawExperiments),
        'ruleText' => 'Her yaptığın işi timeline.md, decisions.md, definitions.md ve experiments.md dosyalarına yaz. Kullanıcının verdiği dosya, eğitici metin ve tanımlayıcı kaynakları ilgili detay kayıtlarında İlgili Kaynaklar başlığı altında zorunlu olarak işle. Sunucu arşivine yüklenen kaynakları detail içinde tıklanabilir bağlantı ile göster. Tüm kayıtları Türkçe imla, büyük harf ve noktalama kurallarına uygun tut.',
    ]);
})->name('semantic-universe.journal');

Route::get('/semantic-universe/journal/source/{source}', function (Request $request, string $source) {
    if (! $request->session()->get('semantic_universe_journal_unlocked', false)) {
        abort(403);
    }

    $sourcesManifestPath = resource_path('semantic-universe-journal/sources.php');
    $journalSources = File::exists($sourcesManifestPath) ? require $sourcesManifestPath : [];
    $sourceMeta = $journalSources[$source] ?? null;

    abort_if(! $sourceMeta || empty($sourceMeta['path']) || ! File::exists($sourceMeta['path']), 404);

    $mime = $sourceMeta['mime'] ?? File::mimeType($sourceMeta['path']) ?? 'application/octet-stream';
    $fileName = basename((string) $sourceMeta['path']);

    return response()->file($sourceMeta['path'], [
        'Content-Type' => $mime,
        'Content-Disposition' => 'inline; filename="' . $fileName . '"',
    ]);
})->name('semantic-universe.journal.source');

Route::post('/semantic-universe/journal/unlock', function (Request $request) {
    $input = (string) $request->input('password', '');
    $expected = (string) env('SEMANTIC_UNIVERSE_JOURNAL_PASSWORD', 'semanticuniverse-journal-2026');

    if (hash_equals($expected, $input)) {
        $request->session()->put('semantic_universe_journal_unlocked', true);

        return redirect()->route('semantic-universe.journal');
    }

    $request->session()->forget('semantic_universe_journal_unlocked');
    $request->session()->put('semantic_universe_journal_error', 'Geçersiz şifre.');

    return redirect()->route('semantic-universe.journal');
})->name('semantic-universe.journal.unlock');

Route::post('/semantic-universe/journal/lock', function (Request $request) {
    $request->session()->forget('semantic_universe_journal_unlocked');

    return redirect()->route('semantic-universe.journal');
})->name('semantic-universe.journal.lock');
