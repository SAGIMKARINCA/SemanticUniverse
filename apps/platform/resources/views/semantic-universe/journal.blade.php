@php
    $common = $ui['common'];
    $journal = $ui['journal'];
@endphp
<!DOCTYPE html>
<html lang="{{ $currentLocale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $journal['html_title'] }}</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body class="su-page-journal">
    <div class="su-journal-shell su-journal-documentary">
        <header class="su-journal-header su-journal-hero">
            <div class="su-journal-hero-copy">
                <span class="su-kicker">{{ $journal['hero_kicker'] }}</span>
                <h1>{{ $journal['hero_title'] }}</h1>
                <p>{{ $journal['hero_copy'] }}</p>
                <div class="su-journal-hero-stats">
                    <div class="su-journal-stat"><span class="su-journal-stat-value">{{ count($timelineEntries) }}</span><span class="su-journal-stat-label">{{ $journal['stats_timeline'] }}</span></div>
                    <div class="su-journal-stat"><span class="su-journal-stat-value">4</span><span class="su-journal-stat-label">{{ $journal['stats_memory'] }}</span></div>
                    <div class="su-journal-stat"><span class="su-journal-stat-value">{{ $journal['status_live'] }}</span><span class="su-journal-stat-label">{{ $journal['stats_status'] }}</span></div>
                </div>
            </div>
            <div class="su-journal-header-actions">
                <div class="su-locale-switch">
                    @foreach ($localeOptions as $localeOption)
                        <a class="su-chip su-chip-link{{ $localeOption['active'] ? ' su-chip-active' : '' }}" href="{{ $localeOption['url'] }}">{{ $localeOption['label'] }}</a>
                    @endforeach
                </div>
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.home') }}">{{ $common['back_to_workshop'] }}</a>
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.sources') }}">{{ $ui['shell']['sources'] }}</a>
                @if ($isUnlocked)
                    <form method="POST" action="{{ route('semantic-universe.journal.lock') }}">
                        @csrf
                        <button type="submit" class="su-chip su-chip-link">{{ $common['close'] }}</button>
                    </form>
                @endif
            </div>
        </header>

        @if (! $isUnlocked)
            <main class="su-journal-lock">
                <section class="su-journal-lock-card">
                    <span class="su-kicker">{{ $journal['locked_kicker'] }}</span>
                    <h2>{{ $journal['locked_title'] }}</h2>
                    <p>{{ $journal['locked_copy'] }}</p>
                    <p class="su-journal-hint">{{ $journalPasswordHint }}</p>
                    @if ($passwordError)
                        <div class="su-journal-error">{{ $passwordError }}</div>
                    @endif
                    <form method="POST" action="{{ route('semantic-universe.journal.unlock') }}" class="su-journal-form">
                        @csrf
                        <label class="su-field">
                            <span>{{ $journal['locked_password'] }}</span>
                            <input type="password" name="password" autocomplete="current-password" required>
                        </label>
                        <button type="submit" class="su-btn su-btn-primary">{{ $journal['locked_button'] }}</button>
                    </form>
                </section>
            </main>
        @else
            <main class="su-journal-main">
                <section class="su-journal-rule su-journal-rule-banner">
                    <span class="su-kicker">{{ $journal['rule_kicker'] }}</span>
                    <p>{{ $ruleText }}</p>
                </section>

                <section class="su-journal-storyboard">
                    @foreach ($journal['storyboard'] as $story)
                        <article class="su-journal-story-card">
                            <span class="su-kicker">{{ $story['kicker'] }}</span>
                            <h3>{{ $story['title'] }}</h3>
                            <p>{{ $story['copy'] }}</p>
                        </article>
                    @endforeach
                </section>

                <section class="su-journal-nav-band">
                    <div class="su-journal-nav-head">
                        <div>
                            <span class="su-kicker">{{ $journal['nav_kicker'] }}</span>
                            <h3>{{ $journal['nav_title'] }}</h3>
                        </div>
                        <div class="su-journal-filter-pills">
                            @foreach ($timelineCategories as $key => $label)
                                <button type="button" class="su-journal-filter-pill{{ $key === 'all' ? ' is-active' : '' }}" data-filter="{{ $key }}">{{ $label }}<span>{{ $timelineCounts[$key] ?? 0 }}</span></button>
                            @endforeach
                        </div>
                    </div>

                    <div class="su-journal-toolbar">
                        <label class="su-journal-toolbar-field">
                            <span>{{ $common['search'] }}</span>
                            <input type="search" class="su-journal-search-input" placeholder="{{ $journal['search_placeholder'] }}" data-journal-search>
                        </label>
                        <label class="su-journal-toolbar-field">
                            <span>{{ $common['year'] }}</span>
                            <select class="su-journal-year-select" data-journal-year>
                                <option value="all">{{ $common['all_years'] }}</option>
                                @foreach ($timelineYears as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </label>
                        <button type="button" class="su-journal-mode-toggle" data-presentation-toggle>{{ $common['presentation_mode'] }}</button>
                    </div>

                    <div class="su-journal-featured-strip">
                        @foreach ($featuredEntries as $entry)
                            <a href="#{{ $entry['record_id'] }}" class="su-journal-featured-card">
                                <div class="su-featured-card-top">
                                    <span class="su-timeline-category">{{ $entry['category_label'] }}</span>
                                    <small>{{ $entry['record_id'] }}</small>
                                </div>
                                <strong>{{ $entry['title'] }}</strong>
                                <small>{{ $entry['summary'] }}</small>
                            </a>
                        @endforeach
                    </div>
                </section>

                <section class="su-journal-grid su-journal-grid-documentary">
                    <div class="su-timeline-list su-timeline-list-documentary">
                        @foreach ($timelineEntries as $entry)
                            <article class="su-timeline-entry su-timeline-entry-documentary" id="{{ $entry['record_id'] }}" data-timeline-entry data-category="{{ $entry['category'] }}" data-year="{{ substr($entry['date'], 0, 4) }}" data-search="{{ \Illuminate\Support\Str::lower($entry['record_id'].' '.$entry['title'].' '.$entry['summary'].' '.implode(' ', $entry['what']).' '.implode(' ', $entry['why']).' '.implode(' ', $entry['result'])) }}">
                                <span class="su-timeline-marker"></span>
                                <div class="su-timeline-entry-head">
                                    <div>
                                        <span class="su-timeline-date">{{ $entry['date'] }}</span>
                                        <div class="su-timeline-meta">
                                            <span class="su-timeline-category">{{ $entry['category_label'] }}</span>
                                        </div>
                                        <h4>{{ $entry['title'] }}</h4>
                                    </div>
                                    <div class="su-timeline-entry-actions">
                                        <span class="su-source-file-pill">{{ $entry['record_id'] }}</span>
                                        <span class="su-source-file-pill">{{ $common['day_sequence'] }} {{ str_pad((string) $entry['sequence'], 2, '0', STR_PAD_LEFT) }}</span>
                                        <button type="button" class="su-journal-panel-link" data-open-detail="{{ $entry['record_id'] }}">{{ $common['details'] }}</button>
                                    </div>
                                </div>
                                @foreach (['what', 'why', 'result'] as $sectionKey)
                                    @if (! empty($entry[$sectionKey]))
                                        <div class="su-timeline-section">
                                            <h5>{{ $journal['timeline_sections'][$sectionKey] }}</h5>
                                            <ul>
                                                @foreach ($entry[$sectionKey] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </article>
                        @endforeach
                    </div>

                    <aside class="su-journal-side-stack">
                        <section class="su-journal-panel su-journal-sources-panel">
                            <div class="su-journal-panel-head">
                                <div>
                                    <span class="su-kicker">{{ $journal['sources_panel_title'] }}</span>
                                    <h3>{{ $journal['sources_panel_title'] }}</h3>
                                    <p>{{ $journal['sources_panel_copy'] }}</p>
                                </div>
                                <a class="su-journal-panel-link" href="{{ route('semantic-universe.sources') }}">{{ $ui['shell']['sources'] }}</a>
                            </div>
                            <div class="su-source-library su-source-library-compact">
                                @foreach (array_slice($sourceCards, 0, 6) as $source)
                                    <article class="su-source-card su-source-card-compact su-source-card-status-{{ $source['status_key'] }}">
                                        <div class="su-source-card-top">
                                            <span class="su-source-category">{{ $source['category'] }}</span>
                                            @if ($source['available'])
                                                <a class="su-source-link" href="{{ $source['download_url'] }}" target="_blank" rel="noopener">{{ $common['download'] }}</a>
                                            @else
                                                <span class="su-source-status">{{ $common['pending'] }}</span>
                                            @endif
                                        </div>
                                        <h4>{{ $source['title'] }}</h4>
                                        <p>{{ $source['summary'] }}</p>
                                    </article>
                                @endforeach
                            </div>
                        </section>

                        <section class="su-journal-panel">
                            <span class="su-kicker">{{ $journal['decisions_title'] }}</span>
                            <h3>{{ $journal['decisions_title'] }}</h3>
                            <div class="su-markdown-content">{!! $decisionsHtml !!}</div>
                        </section>
                        <section class="su-journal-panel">
                            <span class="su-kicker">{{ $journal['definitions_title'] }}</span>
                            <h3>{{ $journal['definitions_title'] }}</h3>
                            <div class="su-markdown-content">{!! $definitionsHtml !!}</div>
                        </section>
                        <section class="su-journal-panel">
                            <span class="su-kicker">{{ $journal['experiments_title'] }}</span>
                            <h3>{{ $journal['experiments_title'] }}</h3>
                            <div class="su-markdown-content">{!! $experimentsHtml !!}</div>
                        </section>
                    </aside>
                </section>
            </main>

            @foreach ($timelineEntries as $entry)
                <div class="su-detail-modal" hidden data-detail-modal="{{ $entry['record_id'] }}">
                    <div class="su-detail-backdrop" data-close-detail></div>
                    <div class="su-detail-dialog">
                        <div class="su-detail-header">
                            <div>
                                <span class="su-kicker">{{ $common['record_detail'] }}</span>
                                <h3>{{ $entry['record_id'] }} | {{ $entry['title'] }}</h3>
                                <p>{{ $entry['date'] }} | {{ $common['day_sequence'] }} {{ str_pad((string) $entry['sequence'], 2, '0', STR_PAD_LEFT) }} | {{ $entry['category_label'] }}</p>
                            </div>
                            <button type="button" class="su-detail-close" data-close-detail>{{ $journal['detail_close'] }}</button>
                        </div>
                        <div class="su-detail-body">
                            <div class="su-detail-file">{{ $common['file'] }}: {{ $entry['detail_file'] }}</div>
                            <div class="su-markdown-content">{!! $entry['detail_html'] !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        (() => {
            const body = document.body;
            const searchInput = document.querySelector('[data-journal-search]');
            const yearSelect = document.querySelector('[data-journal-year]');
            const filterButtons = document.querySelectorAll('[data-filter]');
            const entries = document.querySelectorAll('[data-timeline-entry]');
            const presentationToggle = document.querySelector('[data-presentation-toggle]');
            const detailButtons = document.querySelectorAll('[data-open-detail]');
            const closeButtons = document.querySelectorAll('[data-close-detail]');

            const applyFilters = () => {
                const activeFilter = document.querySelector('.su-journal-filter-pill.is-active')?.dataset.filter || 'all';
                const activeYear = yearSelect?.value || 'all';
                const query = (searchInput?.value || '').toLowerCase().trim();

                entries.forEach((entry) => {
                    const categoryMatch = activeFilter === 'all' || entry.dataset.category === activeFilter;
                    const yearMatch = activeYear === 'all' || entry.dataset.year === activeYear;
                    const searchMatch = query === '' || entry.dataset.search.includes(query);
                    entry.hidden = !(categoryMatch && yearMatch && searchMatch);
                });
            };

            filterButtons.forEach((button) => button.addEventListener('click', () => {
                filterButtons.forEach((item) => item.classList.remove('is-active'));
                button.classList.add('is-active');
                applyFilters();
            }));

            searchInput?.addEventListener('input', applyFilters);
            yearSelect?.addEventListener('change', applyFilters);
            presentationToggle?.addEventListener('click', () => {
                body.classList.toggle('su-journal-presentation');
                presentationToggle.classList.toggle('is-active');
            });

            detailButtons.forEach((button) => button.addEventListener('click', () => {
                const modal = document.querySelector(`[data-detail-modal="${button.dataset.openDetail}"]`);
                if (!modal) {
                    return;
                }
                modal.hidden = false;
                body.classList.add('su-modal-open');
            }));

            closeButtons.forEach((button) => button.addEventListener('click', () => {
                document.querySelectorAll('.su-detail-modal').forEach((modal) => {
                    modal.hidden = true;
                });
                body.classList.remove('su-modal-open');
            }));

            applyFilters();
        })();
    </script>
</body>
</html>
