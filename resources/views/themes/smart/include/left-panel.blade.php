@if('theme.smartadmin.sidebar')
    <!-- BEGIN Left Aside -->
    <aside class="page-sidebar">
        @include('themes.smart.include.logo')
        <!-- BEGIN PRIMARY NAVIGATION -->
        <nav id="js-primary-nav" class="primary-nav" role="navigation">
            @include('themes.smart.include.nav-filter')
            @include('themes.smart.include.nav-info-card')
            @include('themes.smart.include.nav')
            @include('themes.smart.include.nav-filter-msg')

        </nav>
        <!-- END PRIMARY NAVIGATION -->
        <!-- NAV FOOTER -->
            @include('themes.smart.include.nav-footer')
        <!-- END NAV FOOTER -->
    </aside>
    <!-- END Left Aside -->
@endif
