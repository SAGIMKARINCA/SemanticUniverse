<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticUniverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body>
    <div class="su-shell theme-universe">
        <aside class="su-app-rail d-none d-lg-flex">
            <div class="su-rail-brand">SU</div>
            <div class="su-rail-stack">
                <div class="su-rail-item">S</div>
                <div class="su-rail-item">R</div>
                <div class="su-rail-item">P</div>
                <div class="su-rail-item">A</div>
                <div class="su-rail-item">G</div>
            </div>
            <div class="su-rail-label">Ana Modüller</div>
        </aside>

        <div class="su-main">
            <header class="su-topbar">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl-7">
                            <div class="su-topbar-merged">
                                <button class="btn su-mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#suSystemMenu" aria-controls="suSystemMenu">
                                    Menü
                                </button>
                                <div class="su-title-block d-xl-none">
                                    <span class="su-kicker">SemanticUniverse</span>
                                    <h1 class="su-title">Tanrı Modu Geliştirme Platformu</h1>
                                </div>
                                <div class="su-menubar-group d-none d-xl-flex">
                                    <button type="button" class="su-menu-item su-menu-item-active" data-top-menu="system">Sistem</button>
                                    <button type="button" class="su-menu-item" data-top-menu="ayarlar">Ayarlar</button>
                                    <button type="button" class="su-menu-item" data-top-menu="governance">Yönetişim</button>
                                    <button type="button" class="su-menu-item su-menu-item-highlight" data-top-menu="evren">Evren</button>
                                    <button type="button" class="su-menu-item" data-top-menu="resources">Kaynaklar</button>
                                    <button type="button" class="su-menu-item" data-top-menu="projects">Projeler</button>
                                    <button type="button" class="su-menu-item" data-top-menu="applications">Uygulamalar</button>
                                </div>
                                <div class="su-menubar-brand d-none d-xl-flex">
                                    <span class="su-kicker">SemanticUniverse</span>
                                    <span class="su-menubar-title">Tanrı Modu Geliştirme Platformu</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="su-topbar-right">
                                <div class="su-search">{{ $isGodMode ? 'Genel arama' : 'Boş kabuk görünümü' }}</div>
                                <div class="su-topbar-actions" aria-label="Tanrı Modu üst işlemleri">
                                    <a class="su-chip su-chip-link" href="{{ route('semantic-universe.journal') }}">Tarihçe</a>
                                    @if ($isGodMode)
                                        <a class="su-chip su-chip-link" href="{{ route('semantic-universe.logout') }}">Çıkış</a>
                                    @else
                                        <a class="su-chip su-chip-link" href="{{ route('semantic-universe.login') }}">Tanrı Modu Girişi</a>
                                    @endif
                                    <div class="su-chip">Çalışma Alanı</div>
                                    <div class="su-chip su-chip-profile">{{ $isGodMode ? 'Profil: ' . $godModeProfile['name'] : 'Profil' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <nav class="su-ribbon">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl">
                            <div class="su-ribbon-group">
                                @if ($isGodMode)
                                    <div class="su-ribbon-context" data-ribbon-context="system">
                                        <span class="su-ribbon-label su-ribbon-label-active">Kaynaklar</span>
                                        <span class="su-ribbon-label">Roller</span>
                                        <span class="su-ribbon-label">Yetkiler</span>
                                        <span class="su-ribbon-label">Modüller</span>
                                        <span class="su-ribbon-label">Denetim</span>
                                    </div>
                                    <div class="su-ribbon-context is-hidden" data-ribbon-context="ayarlar">
                                        <button type="button" class="su-ribbon-label su-ribbon-label-active su-ribbon-button" data-open-settings-panel>
                                            Tema standartları ve çerçeve davranışları
                                        </button>
                                        <span class="su-ribbon-label">Menü davranışları</span>
                                        <span class="su-ribbon-label">Yerleşim standartları</span>
                                        <span class="su-ribbon-label">Kullanıcı tercihleri</span>
                                    </div>
                                @else
                                    <div class="su-ribbon-context" data-ribbon-context="system">
                                        <span class="su-ribbon-label">Boş şerit alanı</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="su-ribbon-badge">{{ $isGodMode ? 'Üst Yönetici' : 'Genel Kabuk' }}</div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-0 flex-grow-1 d-flex su-workspace-shell">
                <div class="su-workspace flex-grow-1">
                    <aside class="su-leftnav d-none d-lg-block">
                        @if ($isGodMode)
                            <div class="su-panel-title">Sistem</div>
                            <div class="su-panel-copy">Kaynakları var etme menüsü</div>
                            <div class="su-nav-tree">
                                <div class="su-nav-item">Kaynaklar</div>
                                <div class="su-nav-subitem su-nav-subitem-active">Kaynak Tanımla</div>
                                <div class="su-nav-subitem">Kaynak Listesi</div>
                                <div class="su-nav-subitem">Kaynak Sınıfları</div>
                                <div class="su-nav-subitem">Kaynak Katmanları</div>
                                <div class="su-nav-group is-hidden" data-settings-tree>
                                    <div class="su-nav-group-title">Ayarlar</div>
                                    <button type="button" class="su-nav-subitem su-nav-subitem-link" data-open-settings-panel>
                                        Tema standartları ve çerçeve davranışları
                                    </button>
                                    <div class="su-nav-subitem">Menü davranışları</div>
                                    <div class="su-nav-subitem">Yerleşim standartları</div>
                                    <div class="su-nav-subitem">Kullanıcı tercihleri</div>
                                </div>
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">Sol Çerçeve Boş</div>
                                <div class="su-empty-copy">Tanrı Modu girişi yapıldığında burada sistem ve ayarlar menüleri görünecek.</div>
                            </div>
                        @endif
                    </aside>

                    <main class="su-center">
                        <section class="su-center-card {{ $isGodMode ? '' : 'su-center-card-empty' }}">
                            <div class="su-orbit su-orbit-a"></div>
                            <div class="su-orbit su-orbit-b"></div>
                            <div class="su-orbit su-orbit-c"></div>
                            @if ($isGodMode)
                                <div class="su-context-block" data-workspace-context="system">
                                <div class="su-workhead">
                                    <div>
                                        <span class="su-center-kicker">Evren Modülü</span>
                                        <h2 class="su-center-title">Kaynak Tanımla</h2>
                                        <p class="su-center-copy">
                                            Nesneden kaynağa geçiş mantığını kuran ilk semantik tanım ekranı.
                                            İlk sürümde varlık, fonksiyon, aktivite ve hedef katmanları görünür hale getirildi.
                                        </p>
                                    </div>
                                    <div class="su-center-tags">
                                        <span class="su-tag">Sistem</span>
                                        <span class="su-tag">Kaynaklar</span>
                                        <span class="su-tag">Kaynak Tanımla</span>
                                    </div>
                                </div>
                                <form class="su-resource-form">
                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>1. Kimlik ve Sınıflama</h3>
                                        <p>Kaynak adayının temel tanımı ve ilk sınıflandırma katmanı.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field">
                                            <span>Kaynak Kodu</span>
                                            <input type="text" placeholder="ORN: INS-0001">
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak Adı</span>
                                            <input type="text" placeholder="Orn: Genel Cerrah">
                                        </label>
                                        <label class="su-field">
                                            <span>Nesne Türü</span>
                                            <select>
                                                <option>İnsan</option>
                                                <option>Taşınır</option>
                                                <option>Taşınmaz</option>
                                                <option>Zaman</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak Katmanı</span>
                                            <select>
                                                <option>Temel Kaynak</option>
                                                <option>Türe Kaynak</option>
                                                <option>Türetilmiş Kaynak</option>
                                                <option>Fonksiyonel Kaynak</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>2. Varlık Bilgisi</h3>
                                        <p>Bu nesnenin varlık açısından nasıl tanımlandığı.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Varlık Tanımı</span>
                                            <textarea rows="4" placeholder="Kaynağın varlık tanımını yazınız."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Bağlı Üst Sınıf</span>
                                            <input type="text" placeholder="Örn: Klinik İnsan Kaynağı">
                                        </label>
                                        <label class="su-field">
                                            <span>Durum</span>
                                            <select>
                                                <option>Taslak</option>
                                                <option>Aktif</option>
                                                <option>Pasif</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>3. Fonksiyon Bilgisi</h3>
                                        <p>Kaynağın ne işe yaradığı ve hangi işle ilgili olduğu.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Fonksiyon Tanımı</span>
                                            <textarea rows="4" placeholder="Bu kaynağın temel fonksiyonunu yazınız."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Fonksiyon Grubu</span>
                                            <input type="text" placeholder="Örn: Cerrahi Hizmet">
                                        </label>
                                        <label class="su-field">
                                            <span>İşlev Düzeyi</span>
                                            <select>
                                                <option>Ana</option>
                                                <option>Destek</option>
                                                <option>Ölçme-Değerlendirme</option>
                                                <option>Yönetim</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>4. Aktivite Bilgisi</h3>
                                        <p>Kaynağın hangi aktivitelerde yer alacağını tanımlayan alanlar.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Aktivite Tanımı</span>
                                            <textarea rows="4" placeholder="Bu kaynağın katıldığı aktiviteleri tanımlayınız."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Proses Bağlantısı</span>
                                            <select>
                                                <option>Varlık ve Yönetim Prosesi</option>
                                                <option>Ana İş Prosesi</option>
                                                <option>Destek Hizmet Prosesi</option>
                                                <option>Ölçme Değerlendirme ve Gelişme Prosesi</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Aktivite Düzeyi</span>
                                            <input type="text" placeholder="Örn: Operatif, İdari, Destek">
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>5. Hedef Bilgisi</h3>
                                        <p>Nesnenin kaynak olma amacı ve yöneldiği hedefler.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Hedef Tanımı</span>
                                            <textarea rows="4" placeholder="Bu kaynağın hedef bilgisini yazınız."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Birincil Hedef</span>
                                            <input type="text" placeholder="Örn: Hasta bakımı">
                                        </label>
                                        <label class="su-field">
                                            <span>Etki Alanı</span>
                                            <input type="text" placeholder="Örn: Klinik, Eğitim, Araştırma">
                                        </label>
                                    </div>
                                </section>

                                <div class="su-form-actions">
                                    <button type="button" class="su-btn su-btn-primary">Kaynak Taslağı Oluştur</button>
                                    <button type="button" class="su-btn su-btn-secondary">Kuralları Sonra Doldur</button>
                                </div>
                                </form>
                            @else
                                <div class="su-empty-center">
                                    <span class="su-center-kicker">Genel / Boş Kabuk</span>
                                    <h2 class="su-center-title">Orta Çerçeve Boş</h2>
                                    <p class="su-center-copy">
                                        Tanrı Modu girişi yapıldığında sistem ve yönetim ekranları burada aktif hale gelir.
                                        Çıkış yapıldığında merkez alan boş bir kabuk olarak kalır.
                                    </p>
                                </div>
                            @endif
                        </section>
                    </main>

                    <aside class="su-rightpanel d-none d-xl-block">
                        @if ($isGodMode)
                            <div class="su-profile-card">
                                <div class="su-profile-kicker">Tanrı Modu Profili</div>
                                <div class="su-profile-name">{{ $godModeProfile['name'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['role'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['scope'] }}</div>
                            </div>
                            <div class="su-panel-title">Sağ Bağlam Paneli</div>
                            <div class="su-panel-copy">Detay, not, ilişkili kayıt, hızlı işlem</div>
                            <div class="su-right-box">
                                İlk odak:
                                <strong>Kaynakları var etmek</strong>
                            </div>
                            <div class="su-right-note">
                                Kaynak olma koşulu:
                                <strong>Varlık + Fonksiyon + Aktivite + Hedef</strong>
                            </div>
                            <div class="su-right-note">
                                Genel alan daha sonra ayrı olarak tasarlanacak.
                                Bu görünüm Tanrı Modu üst yönetici kabuğu içindir.
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">Sağ Panel Boş</div>
                                <div class="su-empty-copy">Tanrı Modu girişinden sonra bağlamsal detay ve hızlı işlem kutuları burada görünecek.</div>
                            </div>
                        @endif
                    </aside>
                </div>
            </div>

            <footer class="su-bottom">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl-4">
                            <div class="su-bottom-left">Stratejik Bilgiler, Roller, Değişkenler Menüsü</div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="su-bottom-dock">
                                <span class="su-dock-item">Ana Sayfa</span>
                                <span class="su-dock-item">Evren</span>
                                <span class="su-dock-item">Kaynaklar</span>
                                <span class="su-dock-item">Projeler</span>
                                <span class="su-dock-item">YZ</span>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3">
                            <div class="su-bottom-right text-xl-end">{{ request()->getHost() }} / SemanticUniverse</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="offcanvas offcanvas-start su-offcanvas" tabindex="-1" id="suSystemMenu" aria-labelledby="suSystemMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="suSystemMenuLabel">Sistem Menüsü</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <div class="su-panel-copy">Kaynakları var etme menüsü</div>
            <div class="su-nav-tree">
                <div class="su-nav-item">Kaynaklar</div>
                <div class="su-nav-subitem su-nav-subitem-active">Kaynak Tanımla</div>
                <div class="su-nav-subitem">Kaynak Listesi</div>
                <div class="su-nav-subitem">Kaynak Sınıfları</div>
                <div class="su-nav-subitem">Kaynak Katmanları</div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end su-settings-panel" tabindex="-1" id="suSettingsPanel" aria-labelledby="suSettingsPanelLabel">
        <div class="offcanvas-header">
            <div>
                <h5 class="offcanvas-title" id="suSettingsPanelLabel">Ayarlar Paneli</h5>
                <div class="su-settings-subtitle">Tema standartları ve çerçeve davranışları</div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <section class="su-settings-section">
                <div class="su-settings-title">Tema Standardı</div>
                <p class="su-settings-copy">Tum shell icin kullanilacak gorunumu sec. Bu tercih local olarak saklanir.</p>
                <label class="su-pref-label" for="themePreset">Aktif Tema</label>
                <select id="themePreset" class="su-pref-select" data-theme-select>
                    <option value="theme-universe">Universe Classic</option>
                    <option value="theme-atlas">Atlas Light</option>
                    <option value="theme-orbit">Orbit Night</option>
                </select>
            </section>

            <section class="su-settings-section">
                <div class="su-settings-title">Frame Davranislari</div>
                <p class="su-settings-copy">Her çerçeve için görünürlük ve kaydırma davranışını ayrı ayrı seç.</p>

                <div class="su-settings-grid">
                    <label class="su-pref-field">
                        <span>Üst Menü</span>
                        <select class="su-pref-select" data-frame-mode="topbar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Ribbon</span>
                        <select class="su-pref-select" data-frame-mode="ribbon">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Sol Çerçeve</span>
                        <select class="su-pref-select" data-frame-mode="leftnav">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Orta Çerçeve</span>
                        <select class="su-pref-select" data-frame-mode="center">
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="fixed">Sabit</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Sağ Panel</span>
                        <select class="su-pref-select" data-frame-mode="rightpanel">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Alt Bar / Dock</span>
                        <select class="su-pref-select" data-frame-mode="bottombar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Kaydırılabilir</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>
                </div>
            </section>

            <section class="su-settings-section">
                <div class="su-settings-title">Hazır Hazır Ayarlar</div>
                <div class="su-preset-list">
                    <button type="button" class="su-preset-button" data-preset="desktop">Masaüstü Çalışma</button>
                    <button type="button" class="su-preset-button" data-preset="focus">Odaklanmış Orta Alan</button>
                    <button type="button" class="su-preset-button" data-preset="review">İnceleme Modu</button>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            const shell = document.querySelector('.su-shell');
            const themeSelect = document.querySelector('[data-theme-select]');
            const themeClasses = ['theme-universe', 'theme-atlas', 'theme-orbit'];
            const storageKey = 'semantic-universe-shell-settings';
            const settingsTree = document.querySelector('[data-settings-tree]');
            const settingsTreeToggle = document.querySelector('[data-settings-tree-toggle]');
            const openSettingsButtons = document.querySelectorAll('[data-open-settings-panel]');
            const scrollMap = {
                topbar: document.querySelector('.su-topbar'),
                ribbon: document.querySelector('.su-ribbon'),
                leftnav: document.querySelector('.su-leftnav'),
                center: document.querySelector('.su-center'),
                rightpanel: document.querySelector('.su-rightpanel'),
                bottombar: document.querySelector('.su-bottom')
            };

            const defaults = {
                theme: 'theme-universe',
                topMenü: 'system',
                frames: {
                    topbar: 'fixed',
                    ribbon: 'fixed',
                    leftnav: 'fixed',
                    center: 'scroll',
                    rightpanel: 'fixed',
                    bottombar: 'fixed'
                }
            };

            function loadSettings() {
                try {
                    const raw = localStorage.getItem(storageKey);
                    if (!raw) return defaults;
                    const parsed = JSON.parse(raw);
                    return {
                        theme: parsed.theme || defaults.theme,
                        topMenü: parsed.topMenü || defaults.topMenü,
                        frames: Object.assign({}, defaults.frames, parsed.frames || {})
                    };
                } catch (error) {
                    return defaults;
                }
            }

            function saveSettings(settings) {
                localStorage.setItem(storageKey, JSON.stringify(settings));
            }

            function applyTheme(theme) {
                shell.classList.remove(...themeClasses);
                shell.classList.add(theme);
                if (themeSelect) themeSelect.value = theme;
            }

            function applyFrameMode(name, mode) {
                const target = scrollMap[name];
                if (!target) return;

                target.classList.remove('su-scrollable-frame', 'su-frame-hidden', 'su-center-fixed');

                if (mode === 'scroll') {
                    target.classList.add('su-scrollable-frame');
                } else if (mode === 'hidden') {
                    target.classList.add('su-frame-hidden');
                } else if (name === 'center') {
                    target.classList.add('su-center-fixed');
                }

                const select = document.querySelector('[data-frame-mode="' + name + '"]');
                if (select) select.value = mode;
            }

            function applyAll(settings) {
                applyTheme(settings.theme);
                applyTopMenü(settings.topMenü);
                Object.entries(settings.frames).forEach(function ([name, mode]) {
                    applyFrameMode(name, mode);
                });
                saveSettings(settings);
            }

            function applyTopMenü(menuName) {
                document.querySelectorAll('[data-top-menu]').forEach(function (button) {
                    button.classList.toggle('su-menu-item-active', button.dataset.topMenü === menuName);
                    button.classList.toggle('su-menu-item-settings-active', false);
                });

                document.querySelectorAll('[data-ribbon-context]').forEach(function (context) {
                    context.classList.toggle('is-hidden', context.dataset.ribbonContext !== menuName);
                });

                if (menuName === 'ayarlar') {
                    const settingsButton = document.querySelector('[data-top-menu="ayarlar"]');
                    if (settingsButton) {
                        settingsButton.classList.add('su-menu-item-settings-active');
                    }
                }
            }

            let settings = loadSettings();
            applyAll(settings);

            if (settingsTreeToggle && settingsTree) {
                settingsTreeToggle.addEventListener('click', function () {
                    settingsTree.classList.toggle('is-hidden');
                });
            }

            if (openSettingsButtons.length) {
                openSettingsButtons.forEach(function (openSettingsButton) { openSettingsButton.addEventListener('click', function () {
                    const panel = document.getElementById('suSettingsPanel');
                    if (!panel) return;
                    const offcanvas = bootstrap.Offcanvas.getOrCreateInstance(panel);
                    offcanvas.show();
                });
            }

            if (themeSelect && shell) {
                themeSelect.addEventListener('change', function () {
                    settings.theme = this.value;
                    applyAll(settings);
                });
            }

            document.querySelectorAll('[data-top-menu]').forEach(function (button) {
                button.addEventListener('click', function () {
                    settings.topMenü = this.dataset.topMenü;
                    applyAll(settings);
                });
            });

            document.querySelectorAll('[data-frame-mode]').forEach(function (select) {
                select.addEventListener('change', function () {
                    settings.frames[this.dataset.frameMode] = this.value;
                    applyAll(settings);
                });
            });

            document.querySelectorAll('[data-preset]').forEach(function (button) {
                button.addEventListener('click', function () {
                    const preset = this.dataset.preset;

                    if (preset === 'desktop') {
                        settings = {
                            theme: settings.theme,
                            topMenü: settings.topMenü || 'system',
                            frames: {
                                topbar: 'fixed',
                                ribbon: 'fixed',
                                leftnav: 'fixed',
                                center: 'scroll',
                                rightpanel: 'fixed',
                                bottombar: 'fixed'
                            }
                        };
                    }

                    if (preset === 'focus') {
                        settings = {
                            theme: settings.theme,
                            topMenü: settings.topMenü || 'system',
                            frames: {
                                topbar: 'fixed',
                                ribbon: 'fixed',
                                leftnav: 'hidden',
                                center: 'scroll',
                                rightpanel: 'hidden',
                                bottombar: 'fixed'
                            }
                        };
                    }

                    if (preset === 'review') {
                        settings = {
                            theme: settings.theme,
                            topMenü: settings.topMenü || 'system',
                            frames: {
                                topbar: 'fixed',
                                ribbon: 'scroll',
                                leftnav: 'scroll',
                                center: 'scroll',
                                rightpanel: 'scroll',
                                bottombar: 'fixed'
                            }
                        };
                    }

                    applyAll(settings);
                });
            });
        })();
    </script>
</body>
</html>



