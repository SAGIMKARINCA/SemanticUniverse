<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SemanticEvren</title>
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
                        <div class="col-12 col-xl-7">
                            <div class="su-topbar-merged">
                                <button class="btn su-mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#suSistemMenuyu Ac" aria-controls="suSistemMenuyu Ac">
                                    Menuyu Ac
                                </button>
                                <div class="su-title-block d-xl-none">
                                    <span class="su-kicker">SemanticEvren</span>
                                    <h1 class="su-title">TanrÄ± Modu GeliÅŸtirme Platformu</h1>
                                </div>
                                <div class="su-menubar-group d-none d-xl-flex">
                                    <button type="button" class="su-menu-item su-menu-item-active" data-top-menu="system">Sistem</button>
                                    <button type="button" class="su-menu-item" data-top-menu="ayarlar">Ayarlar</button>
                                    <button type="button" class="su-menu-item" data-top-menu="governance">Yonetisim</button>
                                    <button type="button" class="su-menu-item su-menu-item-highlight" data-top-menu="evren">Evren</button>
                                    <button type="button" class="su-menu-item" data-top-menu="resources">Kaynaklar</button>
                                    <button type="button" class="su-menu-item" data-top-menu="projects">Projeler</button>
                                    <button type="button" class="su-menu-item" data-top-menu="applications">Uygulamalar</button>
                                </div>
                                <div class="su-menubar-brand d-none d-xl-flex">
                                    <span class="su-kicker">SemanticEvren</span>
                                    <span class="su-menubar-title">TanrÄ± Modu GeliÅŸtirme Platformu</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="su-topbar-right">
                                <div class="su-search">{{ $isGodMode ? 'Genel arama' : 'Bos kabuk gorunumu' }}</div>
                                <div class="su-topbar-actions" aria-label="Tanri Modu ust islemleri">
                                    <a class="su-chip su-chip-link" href="{{ route('semantic-universe.journal') }}">TarihÃ§e</a>
                                    @if ($isGodMode)
                                        <a class="su-chip su-chip-link" href="{{ route('semantic-universe.logout') }}">Ã‡Ä±kÄ±ÅŸ</a>
                                    @else
                                        <a class="su-chip su-chip-link" href="{{ route('semantic-universe.login') }}">Tanri Modu Girisi</a>
                                    @endif
                                    <div class="su-chip">Ã‡alÄ±ÅŸma alanÄ±</div>
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
                                        <span class="su-ribbon-label">Moduller</span>
                                        <span class="su-ribbon-label">Audit</span>
                                    </div>
                                    <div class="su-ribbon-context is-hidden" data-ribbon-context="ayarlar">
                                        <button type="button" class="su-ribbon-label su-ribbon-label-active su-ribbon-button" data-open-settings-panel>
                                            Tema standartlarÄ± ve Ã§erÃ§eve davranÄ±ÅŸlarÄ±
                                        </button>
                                        <span class="su-ribbon-label">Menuyu Ac davranislari</span>
                                        <span class="su-ribbon-label">YerleÅŸim standartlarÄ±</span>
                                        <span class="su-ribbon-label">KullanÄ±cÄ± tercihleri</span>
                                    </div>
                                @else
                                    <div class="su-ribbon-context" data-ribbon-context="system">
                                        <span class="su-ribbon-label">Bos ribbon alani</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="su-ribbon-badge">{{ $isGodMode ? 'Ãœst yÃ¶netici' : 'Genel kabuk' }}</div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid px-0 flex-grow-1 d-flex su-workspace-shell">
                <div class="su-workspace flex-grow-1">
                    <aside class="su-leftnav d-none d-lg-block">
                        @if ($isGodMode)
                            <div class="su-panel-title">Sistem</div>
                            <div class="su-panel-copy">KaynaklarÄ± var etme menÃ¼sÃ¼</div>
                            <div class="su-nav-tree">
                                <div class="su-nav-item">Kaynaklar</div>
                                <div class="su-nav-subitem su-nav-subitem-active">Kaynak TanÄ±mla</div>
                                <div class="su-nav-subitem">Kaynak Listesi</div>
                                <div class="su-nav-subitem">Kaynak SÄ±nÄ±flarÄ±</div>
                                <div class="su-nav-subitem">Kaynak KatmanlarÄ±</div>
                                <div class="su-nav-group is-hidden" data-settings-tree>
                                    <div class="su-nav-group-title">Ayarlar</div>
                                    <button type="button" class="su-nav-subitem su-nav-subitem-link" data-open-settings-panel>
                                        Tema standartlarÄ± ve Ã§erÃ§eve davranÄ±ÅŸlarÄ±
                                    </button>
                                    <div class="su-nav-subitem">Menuyu Ac davranislari</div>
                                    <div class="su-nav-subitem">YerleÅŸim standartlarÄ±</div>
                                    <div class="su-nav-subitem">KullanÄ±cÄ± tercihleri</div>
                                </div>
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">Sol Ã‡erÃ§eve Bos</div>
                                <div class="su-empty-copy">Tanri Modu girisi yapildiginda burada sistem ve ayarlar menuleri gorunecek.</div>
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
                                        <span class="su-center-kicker">Evren ModÃ¼lÃ¼</span>
                                        <h2 class="su-center-title">Kaynak TanÄ±mla</h2>
                                        <p class="su-center-copy">
                                            Nesneden kaynaÄŸa geÃ§iÅŸ mantÄ±ÄŸÄ±nÄ± kuran ilk semantik tanÄ±m ekranÄ±.
                                            Ä°lk sÃ¼rÃ¼mde varlÄ±k, fonksiyon, aktivite ve hedef katmanlarÄ± gÃ¶rÃ¼nÃ¼r hale getirildi.
                                        </p>
                                    </div>
                                    <div class="su-center-tags">
                                        <span class="su-tag">Sistem</span>
                                        <span class="su-tag">Kaynaklar</span>
                                        <span class="su-tag">Kaynak TanÄ±mla</span>
                                    </div>
                                </div>
                                <form class="su-resource-form">
                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>1. Kimlik ve Siniflama</h3>
                                        <p>Kaynak adayÄ±nÄ±n temel tanÄ±mÄ± ve ilk sÄ±nÄ±flandÄ±rma katmanÄ±.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field">
                                            <span>Kaynak Kodu</span>
                                            <input type="text" placeholder="ORN: INS-0001">
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak AdÄ±</span>
                                            <input type="text" placeholder="Orn: Genel Cerrah">
                                        </label>
                                        <label class="su-field">
                                            <span>Nesne TÃ¼rÃ¼</span>
                                            <select>
                                                <option>Insan</option>
                                                <option>TaÅŸÄ±nÄ±r</option>
                                                <option>TaÅŸÄ±nmaz</option>
                                                <option>Zaman</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Kaynak KatmanÄ±</span>
                                            <select>
                                                <option>Temel Kaynak</option>
                                                <option>TÃ¼re Kaynak</option>
                                                <option>TÃ¼retilmiÅŸ Kaynak</option>
                                                <option>Fonksiyonel Kaynak</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>2. VarlÄ±k Bilgisi</h3>
                                        <p>Bu nesnenin varlÄ±k aÃ§Ä±sÄ±ndan nasÄ±l tanÄ±mlandÄ±ÄŸÄ±.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>VarlÄ±k TanÄ±mÄ±</span>
                                            <textarea rows="4" placeholder="KaynaÄŸÄ±n varlÄ±k tanÄ±mÄ±nÄ± yazÄ±nÄ±z."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>BaÄŸlÄ± Ãœst SÄ±nÄ±f</span>
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
                                        <p>KaynaÄŸÄ±n ne iÅŸe yaradÄ±ÄŸÄ± ve hangi iÅŸle ilgili olduÄŸu.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Fonksiyon TanÄ±mÄ±</span>
                                            <textarea rows="4" placeholder="Bu kaynaÄŸÄ±n temel fonksiyonunu yazÄ±nÄ±z."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Fonksiyon Grubu</span>
                                            <input type="text" placeholder="Ã–rn: Cerrahi Hizmet">
                                        </label>
                                        <label class="su-field">
                                            <span>Ä°ÅŸlev DÃ¼zeyi</span>
                                            <select>
                                                <option>Ana</option>
                                                <option>Destek</option>
                                                <option>Ã–lÃ§me-DeÄŸerlendirme</option>
                                                <option>YÃ¶netim</option>
                                            </select>
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>4. Aktivite Bilgisi</h3>
                                        <p>KaynaÄŸÄ±n hangi aktivitelerde yer alacaÄŸÄ±nÄ± tanÄ±mlayan alanlar.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Aktivite TanÄ±mÄ±</span>
                                            <textarea rows="4" placeholder="Bu kaynaÄŸÄ±n katÄ±ldÄ±ÄŸÄ± aktiviteleri tanÄ±mlayÄ±nÄ±z."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Proses BaÄŸlantÄ±sÄ±</span>
                                            <select>
                                                <option>Varlik ve YÃ¶netim Prosesi</option>
                                                <option>Ana Ä°ÅŸ Prosesi</option>
                                                <option>Destek Hizmet Prosesi</option>
                                                <option>Ã–lÃ§me DeÄŸerlendirme ve GeliÅŸme Prosesi</option>
                                            </select>
                                        </label>
                                        <label class="su-field">
                                            <span>Aktivite DÃ¼zeyi</span>
                                            <input type="text" placeholder="Orn: Operatif, Idari, Destek">
                                        </label>
                                    </div>
                                </section>

                                <section class="su-form-block">
                                    <div class="su-form-block-head">
                                        <h3>5. Hedef Bilgisi</h3>
                                        <p>Nesnenin kaynak olma amacÄ± ve yÃ¶neldiÄŸi hedefler.</p>
                                    </div>

                                    <div class="su-form-grid">
                                        <label class="su-field su-field-wide">
                                            <span>Hedef TanÄ±mÄ±</span>
                                            <textarea rows="4" placeholder="Bu kaynaÄŸÄ±n hedef bilgisini yazÄ±nÄ±z."></textarea>
                                        </label>
                                        <label class="su-field">
                                            <span>Birincil Hedef</span>
                                            <input type="text" placeholder="Orn: Hasta bakÄ±mÄ±">
                                        </label>
                                        <label class="su-field">
                                            <span>Etki AlanÄ±</span>
                                            <input type="text" placeholder="Orn: Klinik, EÄŸitim, AraÅŸtÄ±rma">
                                        </label>
                                    </div>
                                </section>

                                <div class="su-form-actions">
                                    <button type="button" class="su-btn su-btn-primary">Kaynak TaslaÄŸÄ± OluÅŸtur</button>
                                    <button type="button" class="su-btn su-btn-secondary">KurallarÄ± Sonra Doldur</button>
                                </div>
                                </form>
                            @else
                                <div class="su-empty-center">
                                    <span class="su-center-kicker">Genel / BoÅŸ Kabuk</span>
                                    <h2 class="su-center-title">Orta Ã‡erÃ§eve BoÅŸ</h2>
                                    <p class="su-center-copy">
                                        TanrÄ± Modu giriÅŸi yapÄ±ldÄ±ÄŸÄ±nda sistem ve yÃ¶netim ekranlarÄ± burada aktif hale gelir.
                                        Ã‡Ä±kÄ±ÅŸ yapildiginda merkez alan bos bir kabuk olarak kalir.
                                    </p>
                                </div>
                            @endif
                        </section>
                    </main>

                    <aside class="su-rightpanel d-none d-xl-block">
                        @if ($isGodMode)
                            <div class="su-profile-card">
                                <div class="su-profile-kicker">TanrÄ± Modu Profili</div>
                                <div class="su-profile-name">{{ $godModeProfile['name'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['role'] }}</div>
                                <div class="su-profile-meta">{{ $godModeProfile['scope'] }}</div>
                            </div>
                            <div class="su-panel-title">SaÄŸ baÄŸlam paneli</div>
                            <div class="su-panel-copy">Detay, not, iliÅŸkili kayÄ±t, hÄ±zlÄ± iÅŸlem</div>
                            <div class="su-right-box">
                                Ä°lk odak:
                                <strong>KaynaklarÄ± var etmek</strong>
                            </div>
                            <div class="su-right-note">
                                Kaynak olma koÅŸulu:
                                <strong>VarlÄ±k + Fonksiyon + Aktivite + Hedef</strong>
                            </div>
                            <div class="su-right-note">
                                Genel alan daha sonra ayrÄ± olarak tasarlanacak.
                                Bu gÃ¶rÃ¼nÃ¼m TanrÄ± Modu Ã¼st yÃ¶netici kabuÄŸu iÃ§indir.
                            </div>
                        @else
                            <div class="su-empty-frame">
                                <div class="su-empty-title">SaÄŸ Panel BoÅŸ</div>
                                <div class="su-empty-copy">TanrÄ± Modu girisinden sonra baglamsal detay ve hizli islem kutulari burada gorunecek.</div>
                            </div>
                        @endif
                    </aside>
                </div>
            </div>

            <footer class="su-bottom">
                <div class="container-fluid px-0">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-xl-4">
                            <div class="su-bottom-left">Stratejik Bilgiler, Roller, Degiskenler Menuyu Acsu</div>
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
                            <div class="su-bottom-right text-xl-end">{{ request()->getHost() }} / SemanticEvren</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="offcanvas offcanvas-start su-offcanvas" tabindex="-1" id="suSistemMenuyu Ac" aria-labelledby="suSistemMenuyu AcLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="suSistemMenuyu AcLabel">Sistem Menuyu Acsu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <div class="su-panel-copy">KaynaklarÄ± var etme menÃ¼sÃ¼</div>
            <div class="su-nav-tree">
                <div class="su-nav-item">Kaynaklar</div>
                <div class="su-nav-subitem su-nav-subitem-active">Kaynak TanÄ±mla</div>
                <div class="su-nav-subitem">Kaynak Listesi</div>
                <div class="su-nav-subitem">Kaynak SÄ±nÄ±flarÄ±</div>
                <div class="su-nav-subitem">Kaynak KatmanlarÄ±</div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end su-settings-panel" tabindex="-1" id="suSettingsPanel" aria-labelledby="suSettingsPanelLabel">
        <div class="offcanvas-header">
            <div>
                <h5 class="offcanvas-title" id="suSettingsPanelLabel">Ayarlar Paneli</h5>
                <div class="su-settings-subtitle">Tema standartlarÄ± ve Ã§erÃ§eve davranÄ±ÅŸlarÄ±</div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Kapat"></button>
        </div>
        <div class="offcanvas-body">
            <section class="su-settings-section">
                <div class="su-settings-title">Tema StandardÄ±</div>
                <p class="su-settings-copy">TÃ¼m kabuk iÃ§in kullanÄ±lacak gÃ¶rÃ¼nÃ¼mÃ¼ seÃ§. Bu tercih yerel olarak saklanÄ±r.</p>
                <label class="su-pref-label" for="themePreset">Aktif Tema</label>
                <select id="themePreset" class="su-pref-select" data-theme-select>
                    <option value="theme-universe">Evren Classic</option>
                    <option value="theme-atlas">Atlas AÃ§Ä±k</option>
                    <option value="theme-orbit">YÃ¶rÃ¼nge Gece</option>
                </select>
            </section>

            <section class="su-settings-section">
                <div class="su-settings-title">Ã‡erÃ§eve DavranÄ±ÅŸlarÄ±</div>
                <p class="su-settings-copy">Her Ã§erÃ§eve iÃ§in gÃ¶rÃ¼nÃ¼rlÃ¼k ve kaydÄ±rma davranÄ±ÅŸÄ±nÄ± ayrÄ± ayrÄ± seÃ§.</p>

                <div class="su-settings-grid">
                    <label class="su-pref-field">
                        <span>Ãœst MenÃ¼yu Ac</span>
                        <select class="su-pref-select" data-frame-mode="topbar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">KaydÄ±r</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Åerit</span>
                        <select class="su-pref-select" data-frame-mode="ribbon">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">KaydÄ±r</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Sol Ã‡erÃ§eve</span>
                        <select class="su-pref-select" data-frame-mode="leftnav">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">KaydÄ±r</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Orta Ã‡erÃ§eve</span>
                        <select class="su-pref-select" data-frame-mode="center">
                            <option value="scroll">KaydÄ±r</option>
                            <option value="fixed">Sabit</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>SaÄŸ Panel</span>
                        <select class="su-pref-select" data-frame-mode="rightpanel">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">KaydÄ±r</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>

                    <label class="su-pref-field">
                        <span>Alt Bar / RÄ±htÄ±m</span>
                        <select class="su-pref-select" data-frame-mode="bottombar">
                            <option value="fixed">Sabit</option>
                            <option value="scroll">KaydÄ±r</option>
                            <option value="hidden">Gizli</option>
                        </select>
                    </label>
                </div>
            </section>

            <section class="su-settings-section">
                <div class="su-settings-title">HazÄ±r KullanÄ±mlar</div>
                <div class="su-preset-list">
                    <button type="button" class="su-preset-button" data-preset="desktop">MasaÃ¼stÃ¼ Ã‡alÄ±ÅŸmasÄ±</button>
                    <button type="button" class="su-preset-button" data-preset="focus">OdaklanmÄ±ÅŸ Orta Alan</button>
                    <button type="button" class="su-preset-button" data-preset="review">Ä°nceleme GÃ¶rÃ¼nÃ¼mÃ¼</button>
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
                applyTopMenuyu Ac(settings.topMenu);
                Object.entries(settings.frames).forEach(function ([name, mode]) {
                    applyFrameMode(name, mode);
                });
                saveSettings(settings);
            }

            function applyTopMenuyu Ac(menuName) {
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
                            topMenu: settings.topMenu || 'system',
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
                            topMenu: settings.topMenu || 'system',
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
                            topMenu: settings.topMenu || 'system',
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



