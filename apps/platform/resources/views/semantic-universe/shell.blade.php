@php
    $common = $ui['common'];
    $shell = $ui['shell'];
    $topMenu = $activeTopMenu ?? 'system';
    $systemSections = [
        [
            'title' => $shell['center']['identity_title'],
            'copy' => $shell['center']['identity_copy'],
            'fields' => [
                ['type' => 'input', 'label' => $shell['center']['resource_code'], 'placeholder' => $shell['center']['placeholder_resource_code']],
                ['type' => 'input', 'label' => $shell['center']['resource_name'], 'placeholder' => $shell['center']['placeholder_resource_name']],
                ['type' => 'select', 'label' => $shell['center']['object_type'], 'options' => $shell['center']['object_type_options']],
                ['type' => 'select', 'label' => $shell['center']['resource_layer'], 'options' => $shell['center']['resource_layer_options']],
            ],
        ],
        [
            'title' => $shell['center']['existence_title'],
            'copy' => $shell['center']['existence_copy'],
            'fields' => [
                ['type' => 'textarea', 'label' => $shell['center']['existence_definition'], 'placeholder' => $shell['center']['placeholder_existence'], 'wide' => true],
                ['type' => 'input', 'label' => $shell['center']['parent_class'], 'placeholder' => $shell['center']['placeholder_parent_class']],
                ['type' => 'select', 'label' => $shell['center']['status'], 'options' => $shell['center']['status_options']],
            ],
        ],
        [
            'title' => $shell['center']['function_title'],
            'copy' => $shell['center']['function_copy'],
            'fields' => [
                ['type' => 'textarea', 'label' => $shell['center']['function_definition'], 'placeholder' => $shell['center']['placeholder_function'], 'wide' => true],
                ['type' => 'input', 'label' => $shell['center']['function_group'], 'placeholder' => $shell['center']['placeholder_function_group']],
                ['type' => 'select', 'label' => $shell['center']['function_level'], 'options' => $shell['center']['function_level_options']],
            ],
        ],
        [
            'title' => $shell['center']['activity_title'],
            'copy' => $shell['center']['activity_copy'],
            'fields' => [
                ['type' => 'textarea', 'label' => $shell['center']['activity_definition'], 'placeholder' => $shell['center']['placeholder_activity'], 'wide' => true],
                ['type' => 'input', 'label' => $shell['center']['activity_cluster'], 'placeholder' => $shell['center']['placeholder_activity_cluster']],
                ['type' => 'select', 'label' => $shell['center']['activity_priority'], 'options' => $shell['center']['activity_priority_options']],
            ],
        ],
        [
            'title' => $shell['center']['target_title'],
            'copy' => $shell['center']['target_copy'],
            'fields' => [
                ['type' => 'textarea', 'label' => $shell['center']['target_definition'], 'placeholder' => $shell['center']['placeholder_target'], 'wide' => true],
                ['type' => 'input', 'label' => $shell['center']['target_group'], 'placeholder' => $shell['center']['placeholder_target_group']],
                ['type' => 'select', 'label' => $shell['center']['target_measurement'], 'options' => $shell['center']['target_measurement_options']],
            ],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ $currentLocale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $shell['html_title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('semantic-universe.css') }}">
</head>
<body>
<div class="su-shell theme-universe">
    <aside class="su-app-rail d-none d-lg-flex"><div class="su-rail-brand">SU</div><div class="su-rail-stack"><div class="su-rail-item">S</div><div class="su-rail-item">R</div><div class="su-rail-item">P</div><div class="su-rail-item">A</div><div class="su-rail-item">G</div></div><div class="su-rail-label">{{ $shell['left']['app_modules'] }}</div></aside>
    <div class="su-main">
        <header class="su-topbar"><div class="container-fluid px-0"><div class="row g-3 align-items-center"><div class="col-12 col-xl-7"><div class="su-topbar-merged"><button class="btn su-mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#suSystemMenu">{{ $shell['mobile_menu'] }}</button><div class="su-title-block d-xl-none"><span class="su-kicker">{{ $shell['kicker'] }}</span><h1 class="su-title">{{ $shell['title'] }}</h1></div><div class="su-menubar-group d-none d-xl-flex">@foreach ($shell['top_menu'] as $menuKey => $menuLabel)@if ($menuKey === 'sources')<a class="su-menu-item su-menu-item-link" href="{{ route('semantic-universe.sources') }}">{{ $menuLabel }}</a>@else<button type="button" class="su-menu-item{{ $topMenu === $menuKey ? ' su-menu-item-active' : '' }}{{ $menuKey === 'universe' ? ' su-menu-item-highlight' : '' }}" data-top-menu="{{ $menuKey }}">{{ $menuLabel }}</button>@endif @endforeach</div><div class="su-menubar-brand d-none d-xl-flex"><span class="su-kicker">{{ $shell['kicker'] }}</span><span class="su-menubar-title">{{ $shell['title'] }}</span></div></div></div><div class="col-12 col-xl-5"><div class="su-topbar-right"><div class="su-search">{{ $isGodMode ? $shell['search_godmode'] : $shell['search_empty'] }}</div><div class="su-topbar-actions"><div class="su-locale-switch">@foreach ($localeOptions as $localeOption)<a class="su-chip su-chip-link{{ $localeOption['active'] ? ' su-chip-active' : '' }}" href="{{ $localeOption['url'] }}">{{ $localeOption['label'] }}</a>@endforeach</div><a class="su-chip su-chip-link" href="{{ route('semantic-universe.journal') }}">{{ $shell['history'] }}</a><a class="su-chip su-chip-link" href="{{ route('semantic-universe.sources') }}">{{ $shell['sources'] }}</a>@if ($isGodMode)<a class="su-chip su-chip-link" href="{{ route('semantic-universe.logout') }}">{{ $shell['logout'] }}</a>@else<a class="su-chip su-chip-link" href="{{ route('semantic-universe.login') }}">{{ $shell['login'] }}</a>@endif<div class="su-chip">{{ $shell['workspace'] }}</div><div class="su-chip su-chip-profile">{{ $isGodMode ? $shell['godmode_profile_prefix'].' '.$shell['right']['profile_name'] : $shell['profile'] }}</div></div></div></div></div></div></header>

        <nav class="su-ribbon"><div class="container-fluid px-0"><div class="row g-3 align-items-center"><div class="col-12 col-xl"><div class="su-ribbon-group">@if ($isGodMode)<div class="su-ribbon-context{{ $topMenu === 'system' ? '' : ' is-hidden' }}" data-ribbon-context="system">@foreach ($shell['ribbon']['system'] as $label)<span class="su-ribbon-label{{ $loop->first ? ' su-ribbon-label-active' : '' }}">{{ $label }}</span>@endforeach</div><div class="su-ribbon-context{{ $topMenu === 'settings' ? '' : ' is-hidden' }}" data-ribbon-context="settings">@foreach ($shell['ribbon']['settings'] as $settingKey => $label)@if ($settingKey === 'themes')<button type="button" class="su-ribbon-label su-ribbon-label-active su-ribbon-button" data-open-settings-panel>{{ $label }}</button>@else<span class="su-ribbon-label">{{ $label }}</span>@endif @endforeach</div>@foreach (['governance', 'universe', 'projects', 'applications'] as $contextKey)<div class="su-ribbon-context{{ $topMenu === $contextKey ? '' : ' is-hidden' }}" data-ribbon-context="{{ $contextKey }}"><span class="su-ribbon-label">{{ $shell['ribbon']['placeholder'] }}</span></div>@endforeach @else<div class="su-ribbon-context"><span class="su-ribbon-label">{{ $shell['empty_ribbon'] }}</span></div>@endif</div></div><div class="col-12 col-xl-auto"><div class="su-ribbon-badge">{{ $isGodMode ? $shell['ribbon_badge_godmode'] : $shell['ribbon_badge_empty'] }}</div></div></div></div></nav>

        <div class="container-fluid px-0 flex-grow-1 d-flex su-workspace-shell">
            <div class="su-workspace flex-grow-1">
                <aside class="su-leftnav d-none d-lg-block">
                    @if ($isGodMode)
                        @if ($topMenu === 'settings')
                            <div class="su-panel-title">{{ $shell['left']['settings_title'] }}</div><div class="su-panel-copy">{{ $shell['ribbon']['settings']['themes'] }}</div><div class="su-nav-tree"><button type="button" class="su-nav-subitem su-nav-subitem-link su-nav-subitem-active" data-open-settings-panel>{{ $shell['left']['settings_theme'] }}</button><div class="su-nav-subitem">{{ $shell['left']['settings_menu'] }}</div><div class="su-nav-subitem">{{ $shell['left']['settings_layout'] }}</div><div class="su-nav-subitem">{{ $shell['left']['settings_preferences'] }}</div></div>
                        @else
                            <div class="su-panel-title">{{ $shell['left']['system_title'] }}</div><div class="su-panel-copy">{{ $shell['left']['system_copy'] }}</div><div class="su-nav-tree"><div class="su-nav-item">{{ $shell['left']['resources'] }}</div><div class="su-nav-subitem su-nav-subitem-active">{{ $shell['left']['resource_define'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_list'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_classes'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_layers'] }}</div></div>
                        @endif
                    @else
                        <div class="su-empty-frame"><div class="su-empty-title">{{ $shell['center']['empty_title'] }}</div><div class="su-empty-copy">{{ $shell['center']['empty_copy'] }}</div></div>
                    @endif
                </aside>

                <main class="su-center">
                    <section class="su-center-card{{ $isGodMode ? '' : ' su-center-card-empty' }}">
                        <div class="su-orbit su-orbit-a"></div><div class="su-orbit su-orbit-b"></div><div class="su-orbit su-orbit-c"></div>
                        @if ($isGodMode)
                            <div class="su-context-block{{ $topMenu === 'system' ? '' : ' is-hidden' }}" data-workspace-context="system">
                                <div class="su-workhead"><div><span class="su-center-kicker">{{ $shell['center']['module_kicker'] }}</span><h2 class="su-center-title">{{ $shell['center']['resource_define_title'] }}</h2><p class="su-center-copy">{{ $shell['center']['resource_define_copy'] }}</p></div><div class="su-center-tags"><span class="su-tag">{{ $shell['center']['tag_system'] }}</span><span class="su-tag">{{ $shell['center']['tag_resources'] }}</span><span class="su-tag">{{ $shell['center']['tag_resource_define'] }}</span></div></div>
                                <form class="su-resource-form">
                                    @foreach ($systemSections as $section)
                                        <section class="su-form-block"><div class="su-form-block-head"><h3>{{ $section['title'] }}</h3><p>{{ $section['copy'] }}</p></div><div class="su-form-grid">@foreach ($section['fields'] as $field)<label class="su-field{{ ! empty($field['wide']) ? ' su-field-wide' : '' }}"><span>{{ $field['label'] }}</span>@if ($field['type'] === 'textarea')<textarea rows="4" placeholder="{{ $field['placeholder'] }}"></textarea>@elseif ($field['type'] === 'select')<select>@foreach ($field['options'] as $option)<option>{{ $option }}</option>@endforeach</select>@else<input type="text" placeholder="{{ $field['placeholder'] }}">@endif</label>@endforeach</div></section>
                                    @endforeach
                                    <section class="su-form-block"><div class="su-form-block-head"><h3>{{ $shell['center']['actions_title'] }}</h3></div><div class="su-action-row"><button type="button" class="su-action-pill">{{ $shell['center']['action_save'] }}</button><button type="button" class="su-action-pill su-action-pill-primary">{{ $shell['center']['action_publish'] }}</button><button type="button" class="su-action-pill">{{ $shell['center']['action_simulate'] }}</button></div></section>
                                </form>
                            </div>
                            <div class="su-context-block{{ $topMenu === 'settings' ? '' : ' is-hidden' }}" data-workspace-context="settings"><div class="su-workhead"><div><span class="su-center-kicker">{{ $shell['top_menu']['settings'] }}</span><h2 class="su-center-title">{{ $shell['center']['settings_title'] }}</h2><p class="su-center-copy">{{ $shell['center']['settings_copy'] }}</p></div></div><div class="su-form-block"><div class="su-form-grid"><label class="su-field"><span>{{ $shell['center']['theme_label'] }}</span><select id="settingsThemeSelect">@foreach ($shell['center']['theme_options'] as $index => $option)<option value="{{ ['universe', 'atlas', 'orbit'][$index] ?? 'universe' }}">{{ $option }}</option>@endforeach</select></label><label class="su-field"><span>{{ $shell['center']['frame_label'] }}</span><select id="settingsFrameSelect">@foreach ($shell['center']['frame_options'] as $index => $option)<option value="{{ ['fixed', 'scroll'][$index] ?? 'fixed' }}">{{ $option }}</option>@endforeach</select></label></div></div><div class="su-dashboard-grid">@foreach ($shell['center']['settings_cards'] as $card)<article class="su-dashboard-card"><span class="su-kicker">{{ $shell['top_menu']['settings'] }}</span><h3>{{ $card['title'] }}</h3><p>{{ $card['copy'] }}</p></article>@endforeach</div></div>
                            @foreach (['governance', 'universe', 'projects', 'applications'] as $contextKey)
                                <div class="su-context-block{{ $topMenu === $contextKey ? '' : ' is-hidden' }}" data-workspace-context="{{ $contextKey }}"><div class="su-workhead"><div><span class="su-center-kicker">{{ $shell['top_menu'][$contextKey] }}</span><h2 class="su-center-title">{{ $shell['top_menu'][$contextKey] }}</h2><p class="su-center-copy">{{ $shell['ribbon']['placeholder'] }}</p></div></div></div>
                            @endforeach
                        @else
                            <div class="su-empty-frame"><div class="su-empty-title">{{ $shell['center']['empty_title'] }}</div><div class="su-empty-copy">{{ $shell['center']['empty_copy'] }}</div></div>
                        @endif
                    </section>
                </main>

                <aside class="su-rightpanel d-none d-lg-block">@if ($isGodMode)<div class="su-context-card"><div class="su-context-kicker">{{ $shell['right']['profile_title'] }}</div><h3>{{ $shell['right']['profile_name'] }}</h3><p>{{ $shell['right']['profile_role'] }}</p><p>{{ $shell['right']['profile_core'] }}</p></div><div class="su-context-panel"><div class="su-panel-title">{{ $shell['right']['panel_title'] }}</div><div class="su-panel-copy">{{ $shell['right']['panel_copy'] }}</div><div class="su-context-callout"><span>{{ $shell['right']['focus_title'] }}:</span><strong>{{ $shell['right']['focus_copy'] }}</strong></div><div class="su-context-note"><p><span>{{ $shell['right']['rule_title'] }}:</span> <strong>{{ $shell['right']['rule_copy'] }}</strong></p></div><div class="su-context-note"><p>{{ $shell['right']['context_copy'] }}</p></div></div>@else<div class="su-empty-frame"><div class="su-empty-title">{{ $shell['right']['empty_title'] }}</div><div class="su-empty-copy">{{ $shell['right']['empty_copy'] }}</div></div>@endif</aside>
            </div>
        </div>

        <footer class="su-bottom-dock"><div class="container-fluid px-0"><div class="row g-3 align-items-center"><div class="col-12 col-xl-5"><div class="su-status-bar">{{ $shell['bottom']['strategy'] }}</div></div><div class="col-12 col-xl-4"><div class="su-dock-actions"><span class="su-dock-chip">{{ $shell['bottom']['home'] }}</span><span class="su-dock-chip">{{ $shell['bottom']['universe'] }}</span><span class="su-dock-chip">{{ $shell['bottom']['resources'] }}</span><span class="su-dock-chip">{{ $shell['bottom']['projects'] }}</span><span class="su-dock-chip">{{ $shell['bottom']['ai'] }}</span></div></div><div class="col-12 col-xl-3"><div class="su-dock-end">{{ request()->getHost() }} / {{ $common['semantic_universe'] }}</div></div></div></div></footer>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="suSystemMenu"><div class="offcanvas-header"><h5 class="offcanvas-title">{{ $shell['offcanvas']['title'] }}</h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ $common['close'] }}"></button></div><div class="offcanvas-body"><div class="su-nav-tree"><div class="su-nav-item">{{ $shell['left']['resources'] }}</div><div class="su-nav-subitem su-nav-subitem-active">{{ $shell['left']['resource_define'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_list'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_classes'] }}</div><div class="su-nav-subitem">{{ $shell['left']['resource_layers'] }}</div></div></div></div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="suSettingsPanel"><div class="offcanvas-header"><h5 class="offcanvas-title">{{ $shell['center']['settings_title'] }}</h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ $common['close'] }}"></button></div><div class="offcanvas-body"><div class="su-form-grid"><label class="su-field"><span>{{ $shell['center']['theme_label'] }}</span><select id="settingsThemeSelectOffcanvas">@foreach ($shell['center']['theme_options'] as $index => $option)<option value="{{ ['universe', 'atlas', 'orbit'][$index] ?? 'universe' }}">{{ $option }}</option>@endforeach</select></label><label class="su-field"><span>{{ $shell['center']['frame_label'] }}</span><select id="settingsFrameSelectOffcanvas">@foreach ($shell['center']['frame_options'] as $index => $option)<option value="{{ ['fixed', 'scroll'][$index] ?? 'fixed' }}">{{ $option }}</option>@endforeach</select></label></div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(() => {
    const shellRoot = document.querySelector('.su-shell');
    const topMenuButtons = document.querySelectorAll('[data-top-menu]');
    const ribbonContexts = document.querySelectorAll('[data-ribbon-context]');
    const workspaceContexts = document.querySelectorAll('[data-workspace-context]');
    const openSettingsButtons = document.querySelectorAll('[data-open-settings-panel]');
    const settingsPanelEl = document.getElementById('suSettingsPanel');
    const settingsPanel = settingsPanelEl ? bootstrap.Offcanvas.getOrCreateInstance(settingsPanelEl) : null;
    const themeSelects = [document.getElementById('settingsThemeSelect'), document.getElementById('settingsThemeSelectOffcanvas')].filter(Boolean);
    const frameSelects = [document.getElementById('settingsFrameSelect'), document.getElementById('settingsFrameSelectOffcanvas')].filter(Boolean);
    const applyTopMenu = (menuKey) => { topMenuButtons.forEach((button) => button.classList.toggle('su-menu-item-active', button.dataset.topMenu === menuKey)); ribbonContexts.forEach((item) => item.classList.toggle('is-hidden', item.dataset.ribbonContext !== menuKey)); workspaceContexts.forEach((item) => item.classList.toggle('is-hidden', item.dataset.workspaceContext !== menuKey)); };
    const applyTheme = (themeName) => { shellRoot.classList.remove('theme-universe', 'theme-atlas', 'theme-orbit'); shellRoot.classList.add(`theme-${themeName}`); localStorage.setItem('semantic-universe-theme', themeName); themeSelects.forEach((select) => select.value = themeName); };
    const normalizeFrameMode = (mode) => ['fixed', 'scroll'].includes(mode) ? mode : 'fixed';
    const applyFrameMode = (mode) => {
        const normalizedMode = normalizeFrameMode(mode);
        document.body.classList.remove('su-frame-fixed', 'su-frame-scroll', 'su-frame-hidden');
        document.body.classList.add(`su-frame-${normalizedMode}`);
        localStorage.setItem('semantic-universe-frame-mode', normalizedMode);
        frameSelects.forEach((select) => select.value = normalizedMode);
    };
    topMenuButtons.forEach((button) => button.addEventListener('click', () => applyTopMenu(button.dataset.topMenu)));
    openSettingsButtons.forEach((button) => button.addEventListener('click', () => { applyTopMenu('settings'); settingsPanel?.show(); }));
    themeSelects.forEach((select) => select.addEventListener('change', (event) => applyTheme(event.target.value)));
    frameSelects.forEach((select) => select.addEventListener('change', (event) => applyFrameMode(event.target.value)));
    applyTheme(localStorage.getItem('semantic-universe-theme') || 'universe');
    applyFrameMode(normalizeFrameMode(localStorage.getItem('semantic-universe-frame-mode') || 'fixed'));
    applyTopMenu(@json($topMenu));
})();
</script>
</body>
</html>
