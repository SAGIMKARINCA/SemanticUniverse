@php
    $common = $ui['common'];
    $sourcesUi = $ui['sources'];
@endphp
<!DOCTYPE html>
<html lang="{{ $currentLocale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $sourcesUi['html_title'] }}</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body class="su-page-journal su-page-sources">
    <div class="su-journal-shell su-source-page-shell">
        <header class="su-journal-header su-source-hero">
            <div class="su-journal-hero-copy">
                <span class="su-kicker">{{ $sourcesUi['hero_kicker'] }}</span>
                <h1>{{ $sourcesUi['hero_title'] }}</h1>
                <p>{{ $sourcesUi['hero_copy'] }}</p>
                <div class="su-journal-hero-stats">
                    <div class="su-journal-stat"><span class="su-journal-stat-value">{{ count($sources) }}</span><span class="su-journal-stat-label">{{ $sourcesUi['stats_total'] }}</span></div>
                    <div class="su-journal-stat"><span class="su-journal-stat-value">{{ $availableCount }}</span><span class="su-journal-stat-label">{{ $sourcesUi['stats_available'] }}</span></div>
                    <div class="su-journal-stat"><span class="su-journal-stat-value">{{ $pendingCount }}</span><span class="su-journal-stat-label">{{ $sourcesUi['stats_pending'] }}</span></div>
                </div>
            </div>
            <div class="su-journal-header-actions">
                <div class="su-locale-switch">@foreach ($localeOptions as $localeOption)<a class="su-chip su-chip-link{{ $localeOption['active'] ? ' su-chip-active' : '' }}" href="{{ $localeOption['url'] }}">{{ $localeOption['label'] }}</a>@endforeach</div>
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.home') }}">{{ $common['back_to_workshop'] }}</a>
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.journal') }}">{{ $common['back_to_history'] }}</a>
            </div>
        </header>

        <main class="su-journal-main">
            <section class="su-journal-rule su-source-intro"><span class="su-kicker">{{ $sourcesUi['intro_kicker'] }}</span><p>{{ $sourcesUi['intro_copy'] }}</p></section>

            <section class="su-source-filter-band">
                <div class="su-journal-nav-head">
                    <div>
                        <span class="su-kicker">{{ $sourcesUi['browse_kicker'] }}</span>
                        <h3>{{ $sourcesUi['browse_title'] }}</h3>
                    </div>
                    <div class="su-source-filter-pills">
                        @foreach ($categoryLabels as $key => $label)
                            <button type="button" class="su-source-filter-pill{{ $key === 'all' ? ' is-active' : '' }}" data-source-category="{{ $key }}">{{ $label }}<span>{{ $categoryCounts[$key] ?? 0 }}</span></button>
                        @endforeach
                    </div>
                </div>

                <div class="su-source-toolbar">
                    <label class="su-journal-toolbar-field"><span>{{ $common['search'] }}</span><input type="search" class="su-journal-search-input" placeholder="{{ $sourcesUi['search_placeholder'] }}" data-source-search></label>
                    <label class="su-journal-toolbar-field"><span>{{ $common['status'] }}</span><select class="su-journal-year-select" data-source-status><option value="all">{{ $common['all_statuses'] }}</option><option value="available">{{ $sourcesUi['status']['available'] }}</option><option value="pending">{{ $sourcesUi['status']['pending'] }}</option></select></label>
                </div>
            </section>

            <section class="su-source-grid-page">
                @foreach ($sources as $source)
                    <article class="su-source-card su-source-card-page su-source-card-status-{{ $source['status_key'] }}" data-source-card data-category="{{ $source['category_key'] }}" data-status="{{ $source['status_key'] }}" data-search="{{ $source['search_text'] }}">
                        <div class="su-source-card-top">
                            <div class="su-source-card-badges"><span class="su-source-category">{{ $source['category'] }}</span><span class="su-source-file-pill">{{ $source['file_label'] }}</span></div>
                            @if ($source['available'])
                                <a class="su-source-link" href="{{ $source['download_url'] }}" target="_blank" rel="noopener">{{ $common['download'] }}</a>
                            @else
                                <span class="su-source-status">{{ $common['pending'] }}</span>
                            @endif
                        </div>

                        <div class="su-source-card-body">
                            <h3>{{ $source['title'] }}</h3>
                            <p>{{ $source['summary'] }}</p>

                            @if (! empty($source['roles']))
                                <ul class="su-source-roles">@foreach ($source['roles'] as $role)<li>{{ $role }}</li>@endforeach</ul>
                            @endif

                            <div class="su-source-card-actions">
                                <div class="su-source-origin"><span>{{ $sourcesUi['origin_path'] }}</span><code>{{ $source['original_path'] }}</code></div>
                            </div>

                            @if ($source['status_note'])
                                <div class="su-source-note-box">{{ $source['status_note'] }}</div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </section>

            <div class="su-source-empty" hidden data-source-empty>{{ $sourcesUi['empty'] }}</div>
        </main>
    </div>

    <script>
        (() => {
            const filterButtons = document.querySelectorAll('[data-source-category]');
            const searchInput = document.querySelector('[data-source-search]');
            const statusSelect = document.querySelector('[data-source-status]');
            const cards = document.querySelectorAll('[data-source-card]');
            const emptyState = document.querySelector('[data-source-empty]');

            const applyFilters = () => {
                const activeFilter = document.querySelector('.su-source-filter-pill.is-active')?.dataset.sourceCategory || 'all';
                const activeStatus = statusSelect?.value || 'all';
                const query = (searchInput?.value || '').toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach((card) => {
                    const categoryMatch = activeFilter === 'all' || card.dataset.category === activeFilter;
                    const statusMatch = activeStatus === 'all' || card.dataset.status === activeStatus;
                    const searchMatch = query === '' || card.dataset.search.includes(query);
                    const visible = categoryMatch && statusMatch && searchMatch;
                    card.hidden = !visible;
                    if (visible) visibleCount += 1;
                });

                if (emptyState) {
                    emptyState.hidden = visibleCount !== 0;
                }
            };

            filterButtons.forEach((button) => button.addEventListener('click', () => {
                filterButtons.forEach((item) => item.classList.remove('is-active'));
                button.classList.add('is-active');
                applyFilters();
            }));

            searchInput?.addEventListener('input', applyFilters);
            statusSelect?.addEventListener('change', applyFilters);
            applyFilters();
        })();
    </script>
</body>
</html>
