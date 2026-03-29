<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticUniverse Kaynaklar</title>
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body class="su-page-journal su-page-sources">
    <div class="su-journal-shell su-source-page-shell">
        <header class="su-journal-header su-source-hero">
            <div class="su-journal-hero-copy">
                <span class="su-kicker">SemanticUniverse Kaynak Arşivi</span>
                <h1>Kurucu Kaynaklar</h1>
                <p>
                    Bu sayfa, evrenin kurucu belgelerini, ilke setlerini, stratejik yöntemlerini ve yol haritası
                    niteliğindeki sunumlarını ayrı bloklar halinde sunar.
                </p>
                <div class="su-journal-hero-stats">
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">{{ count($sources) }}</span>
                        <span class="su-journal-stat-label">Toplam kaynak</span>
                    </div>
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">{{ $availableCount }}</span>
                        <span class="su-journal-stat-label">İndirilebilir</span>
                    </div>
                    <div class="su-journal-stat">
                        <span class="su-journal-stat-value">{{ $pendingCount }}</span>
                        <span class="su-journal-stat-label">Beklemede</span>
                    </div>
                </div>
            </div>
            <div class="su-journal-header-actions">
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.home') }}">Atölyeye Dön</a>
                <a class="su-chip su-chip-link" href="{{ route('semantic-universe.journal') }}">Tarihçeye Dön</a>
            </div>
        </header>

        <main class="su-journal-main">
            <section class="su-journal-rule su-source-intro">
                <span class="su-kicker">Kullanım Notu</span>
                <p>
                    Her kaynak kendi kartı içinde ayrıştırılmıştır. Arama, kategori ve durum filtreleri ile
                    belirli dokümanları hızlıca bulabilir, indirilebilir olanları doğrudan açabilirsin.
                </p>
            </section>

            <section class="su-source-filter-band">
                <div class="su-journal-nav-head">
                    <div>
                        <span class="su-kicker">Kaynak Gezintisi</span>
                        <h3>Arşivi filtrele ve tara</h3>
                    </div>
                    <div class="su-source-filter-pills">
                        @foreach ($categoryLabels as $key => $label)
                            <button
                                type="button"
                                class="su-source-filter-pill{{ $key === 'all' ? ' is-active' : '' }}"
                                data-source-category="{{ $key }}"
                            >
                                {{ $label }}
                                <span>{{ $categoryCounts[$key] ?? 0 }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="su-source-toolbar">
                    <label class="su-journal-toolbar-field">
                        <span>Arama</span>
                        <input
                            type="search"
                            class="su-journal-search-input"
                            placeholder="Kaynak adı, özet veya rol ara..."
                            data-source-search
                        >
                    </label>

                    <label class="su-journal-toolbar-field">
                        <span>Durum</span>
                        <select class="su-journal-year-select" data-source-status>
                            <option value="all">Tüm durumlar</option>
                            <option value="available">İndirilebilir</option>
                            <option value="pending">Beklemede</option>
                        </select>
                    </label>
                </div>
            </section>

            <section class="su-source-grid-page">
                @foreach ($sources as $source)
                    <article
                        class="su-source-card su-source-card-page su-source-card-status-{{ $source['status_key'] }}"
                        data-source-card
                        data-category="{{ $source['category_key'] }}"
                        data-status="{{ $source['status_key'] }}"
                        data-search="{{ $source['search_text'] }}"
                    >
                        <div class="su-source-card-top">
                            <div class="su-source-card-badges">
                                <span class="su-source-category">{{ $source['category'] }}</span>
                                <span class="su-source-file-pill">{{ $source['file_label'] }}</span>
                            </div>
                            @if ($source['available'] && $source['download_url'])
                                <a class="su-source-link" href="{{ $source['download_url'] }}" target="_blank" rel="noopener">İndir</a>
                            @else
                                <span class="su-source-status">Beklemede</span>
                            @endif
                        </div>

                        <div class="su-source-card-body">
                            <h3>{{ $source['title'] }}</h3>
                            <p>{{ $source['summary'] }}</p>

                            @if (! empty($source['roles']))
                                <ul class="su-source-roles">
                                    @foreach ($source['roles'] as $role)
                                        <li>{{ $role }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="su-source-origin">
                            <span>Orijinal kaynak yolu</span>
                            <code>{{ $source['original_path'] }}</code>
                        </div>

                        @if (! empty($source['status_note']))
                            <div class="su-source-note-box">{{ $source['status_note'] }}</div>
                        @endif
                    </article>
                @endforeach
            </section>

            <div class="su-source-empty" data-source-empty hidden>
                Seçilen filtrelere uygun kaynak bulunamadı.
            </div>
        </main>
    </div>

    <script>
        (() => {
            const cards = document.querySelectorAll('[data-source-card]');
            const categoryButtons = document.querySelectorAll('[data-source-category]');
            const searchInput = document.querySelector('[data-source-search]');
            const statusSelect = document.querySelector('[data-source-status]');
            const emptyState = document.querySelector('[data-source-empty]');

            let activeCategory = 'all';
            let activeStatus = 'all';
            let searchTerm = '';

            const applyFilters = () => {
                let visibleCount = 0;

                cards.forEach((card) => {
                    const categoryMatch = activeCategory === 'all' || card.dataset.category === activeCategory;
                    const statusMatch = activeStatus === 'all' || card.dataset.status === activeStatus;
                    const searchMatch = searchTerm === '' || (card.dataset.search || '').includes(searchTerm);
                    const visible = categoryMatch && statusMatch && searchMatch;

                    card.hidden = !visible;
                    if (visible) {
                        visibleCount += 1;
                    }
                });

                if (emptyState) {
                    emptyState.hidden = visibleCount !== 0;
                }
            };

            categoryButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    activeCategory = button.dataset.sourceCategory;
                    categoryButtons.forEach((pill) => pill.classList.remove('is-active'));
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

            if (statusSelect) {
                statusSelect.addEventListener('change', () => {
                    activeStatus = statusSelect.value;
                    applyFilters();
                });
            }
        })();
    </script>
</body>
</html>
