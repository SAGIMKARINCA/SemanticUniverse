<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticUniverse History</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body>
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
                        <span class="su-journal-stat-value">4</span>
                        <span class="su-journal-stat-label">Ortak hafiza dosyasi</span>
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

                    <div class="su-journal-featured-strip">
                        @foreach ($featuredEntries as $entry)
                            <a class="su-journal-featured-card" href="#{{ $entry['anchor'] }}">
                                <span class="su-kicker">{{ $timelineCategories[$entry['category']] ?? 'Akis' }}</span>
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
                                >
                                    <div class="su-timeline-marker"></div>
                                    <div class="su-timeline-date">{{ $entry['date'] }}</div>
                                    <div class="su-timeline-meta">
                                        <span class="su-timeline-category">{{ $timelineCategories[$entry['category']] ?? 'Akis' }}</span>
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
        @endif
    </div>

    @if ($isUnlocked)
        <script>
            (() => {
                const filterButtons = document.querySelectorAll('.su-journal-filter-pill');
                const entries = document.querySelectorAll('.su-timeline-entry-documentary');

                filterButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const target = button.dataset.filter;

                        filterButtons.forEach((pill) => pill.classList.remove('is-active'));
                        button.classList.add('is-active');

                        entries.forEach((entry) => {
                            const visible = target === 'all' || entry.dataset.category === target;
                            entry.style.display = visible ? '' : 'none';
                        });
                    });
                });
            })();
        </script>
    @endif
</body>
</html>
