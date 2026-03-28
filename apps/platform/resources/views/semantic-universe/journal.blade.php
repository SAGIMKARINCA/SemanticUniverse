<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticUniverse Journal</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body>
    <div class="su-journal-shell">
        <header class="su-journal-header">
            <div>
                <span class="su-kicker">SemanticUniverse Journal</span>
                <h1>History ve Timeline Atolyesi</h1>
                <p>Ortak hafiza katmani, karar izi ve deney gunlugu burada korunur.</p>
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
                    <h2>SemanticUniverse Journal Kilitli</h2>
                    <p>Bu alan history, timeline, decisions, definitions ve experiments kayitlarini gosterir.</p>
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
                        <button type="submit" class="su-btn su-btn-primary">Journali Ac</button>
                    </form>
                </section>
            </main>
        @else
            <main class="su-journal-main">
                <section class="su-journal-rule">
                    <span class="su-kicker">Calisma Kurali</span>
                    <p>{{ $ruleText }}</p>
                </section>

                <section class="su-journal-grid">
                    <section class="su-journal-panel su-journal-timeline">
                        <div class="su-form-block-head">
                            <h3>Timeline</h3>
                            <p>Yapilan ana aktivitelerin tarih sirali akisi.</p>
                        </div>

                        <div class="su-timeline-list">
                            @foreach ($timelineEntries as $entry)
                                <article class="su-timeline-entry">
                                    <div class="su-timeline-date">{{ $entry['date'] }}</div>
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
            </main>
        @endif
    </div>
</body>
</html>