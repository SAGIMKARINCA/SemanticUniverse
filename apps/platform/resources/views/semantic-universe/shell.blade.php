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
            <div class="su-rail-label">Ana Moduller</div>
        </aside>

        <div class="su-main">
            <header class="su-topbar">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl-8">
                            <div class="su-topbar-merged">
                                <button class="btn su-mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#suSystemMenu" aria-controls="suSystemMenu">
                                    Menu
                                </button>
                                <div class="su-title-block d-xl-none">
                                    <span class="su-kicker">SemanticUniverse</span>
                                    <h1 class="su-title">GodMode Local Platform</h1>
                                </div>
                                <div class="su-menubar-group d-none d-xl-flex">
                                    <button type="button" class="su-menu-item su-menu-item-active" data-top-menu="system">System</button>
                                    <button type="button" class="su-menu-item" data-top-menu="ayarlar">Ayarlar</button>
                                    <button type="button" class="su-menu-item" data-top-menu="governance">Governance</button>
                                    <button type="button" class="su-menu-item su-menu-item-highlight" data-top-menu="evren">Evren</button>
                                    <button type="button" class="su-menu-item" data-top-menu="resources">Resources</button>
                                    <button type="button" class="su-menu-item" data-top-menu="projects">Projects</button>
                                    <button type="button" class="su-menu-item" data-top-menu="applications">Applications</button>
                                </div>
                                <div class="su-menubar-brand d-none d-xl-flex">
                                    <span class="su-kicker">SemanticUniverse</span>
                                    <span class="su-menubar-title">GodMode Local Platform</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="su-topbar-right">
                                <div class="su-search flex-grow-1">{{ $isGodMode ? 'Global arama' : 'Bos shell gorunumu' }}</div>
                                @if ($isGodMode)
                                    <a class="su-chip su-chip-link" href="{{ route('semantic-universe.logout') }}">Cikis</a>
                                @else
                                    <a class="su-chip su-chip-link" href="{{ route('semantic-universe.login') }}">God Mode Giris</a>
                                @endif
                                <div class="su-chip">Workspace</div>
                                <div class="su-chip">{{ $isGodMode ? 'Profil: ' . $godModeProfile['name'] : 'Profil' }}</div>
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
                                        <span class="su-ribbon-label">Moduller</span>
                                        <span class="su-ribbon-label">Audit</span>
                                    </div>
                                    <div class="su-ribbon-context is-hidden" data-ribbon-context="ayarlar">
                                        <button type="button" class="su-ribbon-label su-ribbon-label-active su-ribbon-button" data-open-settings-panel>
                                            Tema standartlari ve frame davranislari
                                        </button>
                                        <span class="su-ribbon-label">Menu davranislari</span>
                                        <span class="su-ribbon-label">Yerlesim standartlari</span>
                                        <span class="su-ribbon-label">Kullanici tercihleri</span>
                                    </div>
                                @else
                                    <div class="su-ribbon-context" data-ribbon-context="system">
                                        <span class="su-ribbon-label">Bos ribbon alani</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="su-ribbon-badge">{{ $isGodMode ? 'Super Admin' : 'Public Shell' }}</div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-0 flex-grow-1 d-flex su-workspace-shell">
                <div class="su-workspace flex-grow-1">
                    <aside class="su-leftnav d-none d-lg-block">
                        @if ($isGodMode)
                            <div class="su-panel-title">System</div>
                            <div class="su-panel-copy">Kaynaklari var etme menusu</div>
                            <div class="su-nav-tree">
                                <div class="su-nav-item">Kaynaklar</div>
                                <div class="su-nav-subitem su-nav-subitem-active">Kaynak Tanimla</div>
                                <div class="su-nav-subitem">Kaynak Listesi</div>
                                <div class="su-nav-subitem">Kaynak Siniflari</div>
                                <div class="su-nav-subitem">Kaynak Katmanlari</div>
                                <div class="su-nav-group is-hidden" data-settings-tree>
                                    <div class="su-nav-group-title">Ayarlar</div>
                                    <button type="button" class="su-nav-subitem su-nav-subitem-link" data-open-settings-panel>
                                        Tema standartlari ve frame davranislari
                                    </button>
                                    <div class="su-nav-subitem">Menu davranislari</div>
                                    <div class="su-nav-subitem">Yerlesim standartlari</div>
                                    <div class="su-nav-subitem">Kullanici tercihleri</div>
                                </div>
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">Sol Frame Bos</div>
                                <div class="su-empty-copy">God Mode girisi yapildiginda burada system ve ayarlar menuleri gorunecek.</div>
                            </div>
                        @endif
                    </aside>

                    <main class="su-center">
                        <section class="su-center-card <?php echo $isGodMode ? '' : 'su-center-card-empty'; ?>">
                            <div class="su-orbit su-orbit-a"></div>
                            <div class="su-orbit su-orbit-b"></div>
                            <div class="su-orbit su-orbit-c"></div>
                            @if ($isGodMode)
                                <div class="su-workhead">
                                    <div>
                                        <span class="su-center-kicker">Evren Modulu</span>
                                        <h2 class="su-center-title">Kaynak Tanimla</h2>
                                        <p class="su-center-copy">
                                            Nesneden kaynaga gecis mantigini kuran ilk semantik tanim ekrani.
                                            Ilk surumde varlik, fonksiyon, aktivite ve hedef katmanlari gorunur hale getirildi.
                                        </p>
                                    </div>
                                    <div class="su-center-tags">
                                        <span class="su-tag">System</span>
                                        <span class="su-tag">Kaynaklar</span>
                                        <span class="su-tag">Kaynak Tanimla</span>
                                    </div>
                                </div>
                                <form class="su-resource-form">
                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>1. Kimlik ve Siniflama</h3>
                                        <p>Kaynak adayinin temel tanimi ve ilk siniflandirma katmani.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field">
                                            <span>Kaynak Kodu</span>
                                            <input type="text" placeholder="ORN: INS-0001">
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak Adi</span>
                                            <input type="text" placeholder="Orn: Genel Cerrah">
                                        </label>
                                        <label class="su-field">
                                            <span>Nesne Turu</span>
                                            <select>
                                                <option>Insan</option>
                                                <option>Tasinir</option>
                                                <option>Tasinmaz</option>
                                                <option>Zaman</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak Katmani</span>
                                            <select>
                                                <option>Temel Kaynak</option>
                                                <option>Ture Kaynak</option>
                                                <option>Turetilmis Kaynak</option>
                                                <option>Fonksiyonel Kaynak</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>2. Varlik Bilgisi</h3>
                                        <p>Bu nesnenin varlik acisindan nasil tanimlandigi.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Varlik Tanimi</span>
                                            <textarea rows="4" placeholder="Kaynagin varlik tanimini yaziniz."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Bagli Ust Sinif</span>
                                            <input type="text" placeholder="Orn: Klinik Insan Kaynagi">
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
                                        <p>Kaynagin ne ise yaradigi ve hangi isle ilgili oldugu.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Fonksiyon Tanimi</span>
                                            <textarea rows="4" placeholder="Bu kaynagin temel fonksiyonunu yaziniz."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Fonksiyon Grubu</span>
                                            <input type="text" placeholder="Orn: Cerrahi Hizmet">
                                        </label>
                                        <label class="su-field">
                                            <span>Islev Duzeyi</span>
                                            <select>
                                                <option>Ana</option>
                                                <option>Destek</option>
                                                <option>Olcme-Degerlendirme</option>
                                                <option>Yonetim</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>4. Aktivite Bilgisi</h3>
                                        <p>Kaynagin hangi aktivitelerde yer alacagini tanimlayan alanlar.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Aktivite Tanimi</span>
                                            <textarea rows="4" placeholder="Bu kaynagin katildigi aktiviteleri tanimlayiniz."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Proses Baglantisi</span>
                                            <select>
                                                <option>Varlik ve Yonetim Prosesi</option>
                                                <option>Ana Is Prosesi</option>
                                                <option>Destek Hizmet Prosesi</option>
                                                <option>Olcme Degerlendirme ve Gelisme Prosesi</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Aktivite Duzeyi</span>
                                            <input type="text" placeholder="Orn: Operatif, Idari, Destek">
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>5. Hedef Bilgisi</h3>
                                        <p>Nesnenin kaynak olma amaci ve yoneldigi hedefler.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Hedef Tanimi</span>
                                            <textarea rows="4" placeholder="Bu kaynagin hedef bilgisini yaziniz."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Birincil Hedef</span>
                                            <input type="text" placeholder="Orn: Hasta bakimi">
                                        </label>
                                        <label class="su-field">
                                            <span>Etki Alani</span>
                                            <input type="text" placeholder="Orn: Klinik, Egitim, Arastirma">
                                        </label>
                                    </div>
                                </section>

                                <div class="su-form-actions">
                                    <button type="button" class="su-btn su-btn-primary">Kaynak Taslagi Olustur</button>
                                    <button type="button" class="su-btn su-btn-secondary">Kurallari Sonra Doldur</button>
                                </div>
                                </form>
                            @else
                                <div class="su-empty-center">
                                    <span class="su-center-kicker">Public / Bos Shell</span>
                                    <h2 class="su-center-title">Orta Frame Bos</h2>
                                    <p class="su-center-copy">
                                        God Mode girisi yapildiginda system ve yonetim ekranlari burada aktif hale gelir.
                                        Cikis yapildiginda merkez alan bos bir kabuk olarak kalir.
                                    </p>
                                </div>
                            @endif
                        </section>
                    </main>

                    <aside class="su-rightpanel d-none d-xl-block">
                        @if ($isGodMode)
                            <div class="su-profile-card">
                                <div class="su-profile-kicker">GodMode Profili</div>
                                <div class="su-profile-name">{{ $godModeProfile['name'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['role'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['scope'] }}</div>
                            </div>
                            <div class="su-panel-title">Right Context Panel</div>
                            <div class="su-panel-copy">Detay, not, iliskili kayit, hizli islem</div>
                            <div class="su-right-box">
                                Ilk odak:
                                <strong>Kaynaklari var etmek</strong>
                            </div>
                            <div class="su-right-note">
                                Kaynak olma kosulu:
                                <strong>Varlik + Fonksiyon + Aktivite + Hedef</strong>
                            </div>
                            <div class="su-right-note">
                                Public alan daha sonra ayri olarak tasarlanacak.
                                Bu gorunum GodMode super admin shell'i icindir.
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">Sag Panel Bos</div>
                                <div class="su-empty-copy">God Mode girisinden sonra baglamsal detay ve hizli islem kutulari burada gorunecek.</div>
                            </div>
                        @endif
                    </aside>
                </div>
            </div>

            <footer class="su-bottom">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl-4">
                            <div class="su-bottom-left">Stratejik Bilgiler, Roller, Degiskenler Menusu</div>
                        </div>
                        <div class="col-12 col-xl-5">
                            <div class="su-bottom-dock">
                                <span class="su-dock-item">Home</span>
                                <span class="su-dock-item">Universe</span>
                                <span class="su-dock-item">Resources</span>
                                <span class="su-dock-item">Projects</span>
                                <span class="su-dock-item">AI</span>
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
            <h5 class="offcanvas-title" id="suSystemMenuLabel">System Menusu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <div class="su-panel-copy">Kaynaklari var etme menusu</div>
            <div class="su-nav-tree">
                <div class="su-nav-item">Kaynaklar</div>
                <div class="su-nav-subitem su-nav-subitem-active">Kaynak Tanimla</div>
                <div class="su-nav-subitem">Kaynak Listesi</div>
                <div class="su-nav-subitem">Kaynak Siniflari</div>
                <div class="su-nav-subitem">Kaynak Katmanlari</div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end su-settings-panel" tabindex="-1" id="suSettingsPanel" aria-labelledby="suSettingsPanelLabel">
        <div class="offcanvas-header">
            <div>
                <h5 class="offcanvas-title" id="suSettingsPanelLabel">Ayarlar Paneli</h5>
                <div class="su-settings-subtitle">Tema standartlari ve frame davranislari</div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <section class="su-settings-section">
                <div class="su-settings-title">Tema Standardi</div>
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
                <p class="su-settings-copy">Her frame icin gorunurluk ve scroll davranisini ayri ayri sec.</p>

                <div class="su-settings-grid">
                    <label class="su-pref-field">
                        <span>Ust Menu</span>
                        <select class="su-pref-select" data-frame-mode="topbar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Scroll</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Ribbon</span>
                        <select class="su-pref-select" data-frame-mode="ribbon">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Scroll</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Sol Frame</span>
                        <select class="su-pref-select" data-frame-mode="leftnav">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Scroll</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Orta Frame</span>
                        <select class="su-pref-select" data-frame-mode="center">
                            <option value="scroll">Scroll</option>
                            <option value="fixed">Sabit</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Sag Panel</span>
                        <select class="su-pref-select" data-frame-mode="rightpanel">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Scroll</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Alt Bar / Dock</span>
                        <select class="su-pref-select" data-frame-mode="bottombar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">Scroll</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>
                </div>
            </section>

            <section class="su-settings-section">
                <div class="su-settings-title">Hazir Presetler</div>
                <div class="su-preset-list">
                    <button type="button" class="su-preset-button" data-preset="desktop">Masaustu Calisma</button>
                    <button type="button" class="su-preset-button" data-preset="focus">Odaklanmis Orta Alan</button>
                    <button type="button" class="su-preset-button" data-preset="review">Inceleme Modu</button>
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
                topMenu: 'system',
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
                        topMenu: parsed.topMenu || defaults.topMenu,
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
                applyTopMenu(settings.topMenu);
                Object.entries(settings.frames).forEach(function ([name, mode]) {
                    applyFrameMode(name, mode);
                });
                saveSettings(settings);
            }

            function applyTopMenu(menuName) {
                document.querySelectorAll('[data-top-menu]').forEach(function (button) {
                    button.classList.toggle('su-menu-item-active', button.dataset.topMenu === menuName);
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
                    settings.topMenu = this.dataset.topMenu;
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

