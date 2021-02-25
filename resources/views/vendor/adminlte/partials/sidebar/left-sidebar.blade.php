<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                 <?php
                    // dd(Auth::user()->almoxarifado);
                    $params = [];
             
                        $params['inicio']  = $adminlte->menu('sidebar')[0];
                    if(Auth::user()->almoxarifado == 1){
                        $params['almoxarifado']  = $adminlte->menu('sidebar')[1];
                        $params['almoxarifadoest']  = $adminlte->menu('sidebar')[2];
                        $params['almoxarifadoreq']  = $adminlte->menu('sidebar')[3];
                    }
                   
                ;?>
                @each('adminlte::partials.sidebar.menu-item', $params, 'item')
            </ul>
        </nav>
    </div>

</aside>
