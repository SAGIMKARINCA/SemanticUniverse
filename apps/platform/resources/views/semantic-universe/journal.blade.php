<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticUniverse History</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body class="su-page-journal">
    <div class="su-journal-shell su-journal-documentary">
        <header class="su-journal-header su-journal-hero">
            <div class="su-journal-hero-copy">
                <span class="su-kicker">SemanticUniverse History</span>
                <h1>Evrenin Dogus Belgeseli</h1>
                <p>
                    Bu alan sadece kayit tutmaz. Burada SemanticUniverse atolyemizin tarihini, karar izlerini,
                    tanimlarini ve deneylerini zaman boyunca izleriz.
                </p>
                <div class="su-journal-hero-stats">
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">{{ count($timelineEntries) }}</span>
                        <span class="su-journal-stat-label">Timeline kaydi</span>
                    </div>
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">{{ count($timelineEntries) }}</span>
                        <span class="su-journal-stat-label">Kayit kimligi</span>
                    </div>
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">Canli</span>
                        <span class="su-journal-stat-label">Atolye durumu</span>
                    </div>
                </div>
            </div>
            <div class="su-journal-header-actions">
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.home') }}">Atolyeye Don</a>
                @if ($isUnlocked)
                    <form method="POST" action="{{ route('semantic-universe.journal.lock') }}">
                        @csrf
                        <button type="submit" class="su-chip su-chip-link">Kilitle</button>
                    </form>
                @endif
            </div>
        </header>

        @if (! $isUnlocked)
            <main class="su-journal-lock">
                <section class="su-journal-lock-card">
                    <span class="su-kicker">Korumali Alan</span>
                    <h2>History Atolyesi Kilitli</h2>
                    <p>Bu katman timeline, decisions, definitions ve experiments kayitlarini korur.</p>
                    <p class="su-journal-hint">{{ $journalPasswordHint }}</p>

                    @if ($passwordError)
                        <div class="su-journal-error">{{ $passwordError }}</div>
                    @endif

                    <form method="POST" action="{{ route('semantic-universe.journal.unlock') }}" class="su-journal-form">
                        @csrf
                        <label class="su-field">
                            <span>Journal Sifresi</span>
                            <input type="password" name="password" autocomplete="current-password" required>
                        </label>
                        <button type="submit" class="su-btn su-btn-primary">History Katmanini Ac</button>
                    </form>
                </section>
            </main>
        @else
            <main class="su-journal-main">
                <section class="su-journal-rule su-journal-rule-banner">
                    <span class="su-kicker">Calisma Kurali</span>
                    <p>{{ $ruleText }}</p>
                </section>

                <section class="su-journal-storyboard">
                    <article class="su-journal-story-card">
                        <span class="su-kicker">Act I</span>
                        <h3>Toprak ve Atolye</h3>
                        <p>
                            Yerel prototiplerden canli staging ortamina gecis, SemanticUniverse icin ilk gercek
                            yaratici atolye zeminini kurdu.
                        </p>
                    </article>
                    <article class="su-journal-story-card">
                        <span class="su-kicker">Act II</span>
                        <h3>Kavram ve Cekirdek</h3>
                        <p>
                            Kaynak, nesne, olay, proses ve semantik ayrimlar ortak hafiza katmanina aktarildi.
                        </p>
                    </article>
                    <article class="su-journal-story-card">
                        <span class="su-kicker">Act III</span>
                        <h3>Canli Belgesel</h3>
                        <p>
                            Timeline ve karar izi, history hostu uzerinden bagimsiz bir anlatim katmanina donusuyor.
                        </p>
                    </article>
                </section>

                <section class="su-journal-nav-band">
                    <div class="su-journal-nav-head">
                        <div>
                            <span class="su-kicker">Timeline Navigasyonu</span>
                            <h3>Akisi kategoriye gore gez</h3>
                        </div>
                        <div class="su-journal-filter-pills">
                            @foreach ($timelineCategories as $key => $label)
                                <button
                                    type="button"
                                    class="su-journal-filter-pill{{ $key === 'all' ? ' is-active' : '' }}"
                                    data-filter="{{ $key }}"
                                >
                                    {{ $label }}
                                    <span>{{ $timelineCounts[$key] ?? 0 }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="su-journal-toolbar">
                        <label class="su-journal-toolbar-field">
                            <span>Arama</span>
                            <input type="search" class="su-journal-search-input" placeholder="Kayitlarda ara..." data-search>
                        </label>

                        <label class="su-journal-toolbar-field">
                            <span>Yil</span>
                            <select class="su-journal-year-select" data-year>
                                <option value="all">Tum yillar</option>
                                @foreach ($timelineYears as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </label>

                        <button type="button" class="su-journal-mode-toggle" data-presentation-toggle>
                            Sunum Modu
                        </button>
                    </div>

                    <div class="su-journal-featured-strip">
                        @foreach ($featuredEntries as $entry)
                            <a class="su-journal-featured-card" href="#{{ $entry['anchor'] }}" data-category="{{ $entry['category'] }}" data-year="{{ $entry['year'] }}">
                                <div class="su-featured-card-top">
                                    <span class="su-kicker">{{ $timelineCategories[$entry['category']] ?? 'Akis' }}</span>
                                    <span class="su-record-badge">{{ $entry['record_id'] }}</span>
                                </div>
                                <strong>{{ $entry['title'] }}</strong>
                                <small>{{ $entry['date'] }}</small>
                            </a>
                        @endforeach
                    </div>
                </section>

                <section class="su-journal-grid su-journal-grid-documentary">
                    <section class="su-journal-panel su-journal-timeline">
                        <div class="su-form-block-head">
                            <h3>Timeline</h3>
                            <p>Evrenin olusum adimlari tarih sirasiyla burada akar.</p>
                        </div>

                        <div class="su-timeline-list su-timeline-list-documentary">
                            @foreach ($timelineEntries as $entry)
                                <article
                                    id="{{ $entry['anchor'] }}"
                                    class="su-timeline-entry su-timeline-entry-documentary"
                                    data-category="{{ $entry['category'] }}"
                                    data-year="{{ $entry['year'] }}"
                                    data-search="{{ mb_strtolower($entry['record_id'] . ' ' . $entry['title'] . ' ' . implode(' ', $entry['actions']) . ' ' . implode(' ', $entry['why']) . ' ' . implode(' ', $entry['result'])) }}"
                                >
                                    <div class="su-timeline-marker"></div>
                                    <div class="su-timeline-entry-head">
                                        <div>
                                            <div class="su-timeline-date">{{ $entry['date'] }}</div>
                                            <div class="su-timeline-meta">
                                                <span class="su-timeline-category">{{ $timelineCategories[$entry['category']] ?? 'Akis' }}</span>
                                            </div>
                                        </div>
                                        <div class="su-timeline-entry-actions">
                                            <span class="su-record-badge">{{ $entry['record_id'] }}</span>
                                            <span class="su-sequence-badge">Gun ici {{ str_pad((string) $entry['sequence'], 2, '0', STR_PAD_LEFT) }}</span>
                                            <button type="button" class="su-detail-trigger" data-detail-open="{{ $entry['record_id'] }}">Detaylar</button>
                                        </div>
                                    </div>
                                    <h4>{{ $entry['title'] }}</h4>

                                    @if (! empty($entry['actions']))
                                        <div class="su-timeline-section">
                                            <strong>Ne yaptik</strong>
                                            <ul>
                                                @foreach ($entry['actions'] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (! empty($entry['why']))
                                        <div class="su-timeline-section">
                                            <strong>Neden yaptik</strong>
                                            <ul>
                                                @foreach ($entry['why'] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (! empty($entry['result']))
                                        <div class="su-timeline-section">
                                            <strong>Sonuc</strong>
                                            <ul>
                                                @foreach ($entry['result'] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <section class="su-journal-side-stack">
                        <section class="su-journal-panel">
                            <div class="su-form-block-head">
                                <h3>Decisions</h3>
                                <p>Resmi kararlar ve stratejik sabitler.</p>
                            </div>
                            <div class="su-markdown-content">{!! $decisionsHtml !!}</div>
                        </section>

                        <section class="su-journal-panel">
                            <div class="su-form-block-head">
                                <h3>Definitions</h3>
                                <p>Semantik cekirdegin bugune kadar alinmis tanimlari.</p>
                            </div>
                            <div class="su-markdown-content">{!! $definitionsHtml !!}</div>
                        </section>

                        <section class="su-journal-panel">
                            <div class="su-form-block-head">
                                <h3>Experiments</h3>
                                <p>Denenen yollar, takilan yerler ve ogrenmeler.</p>
                            </div>
                            <div class="su-markdown-content">{!! $experimentsHtml !!}</div>
                        </section>
                    </section>
                </section>
            </main>

            @foreach ($timelineEntries as $entry)
                <div class="su-detail-modal" data-detail-panel="{{ $entry['record_id'] }}" hidden>
                    <div class="su-detail-backdrop" data-detail-close></div>
                    <div class="su-detail-dialog" role="dialog" aria-modal="true" aria-labelledby="detail-title-{{ $entry['record_id'] }}">
                        <div class="su-detail-header">
                            <div>
                                <span class="su-kicker">Kayit Detayi</span>
                                <h3 id="detail-title-{{ $entry['record_id'] }}">{{ $entry['record_id'] }} | {{ $entry['title'] }}</h3>
                                <p>{{ $entry['date'] }} Â· Gun ici {{ str_pad((string) $entry['sequence'], 2, '0', STR_PAD_LEFT) }} Â· {{ $timelineCategories[$entry['category']] ?? 'Akis' }}</p>
                            </div>
                            <button type="button" class="su-detail-close" data-detail-close>Kapat</button>
                        </div>
                        <div class="su-detail-body">
                            <div class="su-detail-file">Dosya: {{ $entry['detail_file'] }}</div>
                            <div class="su-markdown-content">{!! $entry['detail_html'] !!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @if ($isUnlocked)
        <script>
            (() => {
                const shell = document.querySelector('.su-journal-shell');
                const filterButtons = document.querySelectorAll('.su-journal-filter-pill');
                const entries = document.querySelectorAll('.su-timeline-entry-documentary');
                const featuredCards = document.querySelectorAll('.su-journal-featured-card');
                const searchInput = document.querySelector('[data-search]');
                const yearSelect = document.querySelector('[data-year]');
                const presentationToggle = document.querySelector('[data-presentation-toggle]');
                const detailButtons = document.querySelectorAll('[data-detail-open]');
                const detailPanels = document.querySelectorAll('[data-detail-panel]');
                const detailClosers = document.querySelectorAll('[data-detail-close]');

                let activeCategory = 'all';
                let activeYear = 'all';
                let searchTerm = '';

                const applyFilters = () => {
                    entries.forEach((entry) => {
                        const categoryMatch = activeCategory === 'all' || entry.dataset.category === activeCategory;
                        const yearMatch = activeYear === 'all' || entry.dataset.year === activeYear;
                        const textMatch = searchTerm === '' || (entry.dataset.search || '').includes(searchTerm);
                        entry.style.display = categoryMatch && yearMatch && textMatch ? '' : 'none';
                    });

                    featuredCards.forEach((card) => {
                        const categoryMatch = activeCategory === 'all' || card.dataset.category === activeCategory;
                        const yearMatch = activeYear === 'all' || card.dataset.year === activeYear;
                        const textMatch = searchTerm === '' || ((card.textContent || '').toLocaleLowerCase('tr').includes(searchTerm));
                        card.style.display = categoryMatch && yearMatch && textMatch ? '' : 'none';
                    });
                };

                const closeDetailPanels = () => {
                    document.body.classList.remove('su-modal-open');
                    detailPanels.forEach((panel) => {
                        panel.hidden = true;
                    });
                };

                filterButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        activeCategory = button.dataset.filter;
                        filterButtons.forEach((pill) => pill.classList.remove('is-active'));
                        button.classList.add('is-active');
                        applyFilters();
                    });
                });

                if (searchInput) {
                    searchInput.addEventListener('input', () => {
                        searchTerm = searchInput.value.trim().toLocaleLowerCase('tr');
                        applyFilters();
                    });
                }

                if (yearSelect) {
                    yearSelect.addEventListener('change', () => {
                        activeYear = yearSelect.value;
                        applyFilters();
                    });
                }

                if (presentationToggle) {
                    presentationToggle.addEventListener('click', () => {
                        shell.classList.toggle('su-journal-presentation');
                        presentationToggle.classList.toggle('is-active');
                    });
                }

                detailButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const target = button.dataset.detailOpen;
                        const panel = document.querySelector(`[data-detail-panel="${target}"]`);
                        if (! panel) {
                            return;
                        }

                        closeDetailPanels();
                        document.body.classList.add('su-modal-open');
                        panel.hidden = false;
                    });
                });

                detailClosers.forEach((button) => {
                    button.addEventListener('click', closeDetailPanels);
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        closeDetailPanels();
                    }
                });
            })();
        </script>
    @endif
</body>
</html>
