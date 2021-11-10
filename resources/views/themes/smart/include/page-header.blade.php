@if(config('theme.smartadmin.header'))
    <!-- BEGIN Page Header -->
    <header class="page-header" role="banner">
        <!-- we need this logo when user switches to nav-function-top -->
        @include('themes.smart.include.logo')

        @if(config('theme.smartadmin.layoutShortcut'))
            <!-- DOC: nav menu layout change shortcut -->
            <div class="hidden-md-down dropdown-icon-menu position-relative">
                <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                    <i class="ni ni-menu"></i>
                </a>
                <ul>
                    <li>
                        <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                            <i class="ni ni-minify-nav"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                            <i class="ni ni-lock-nav"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
        <!-- DOC: mobile button appears during mobile width -->
        <div class="hidden-lg-up">
            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                <i class="ni ni-menu"></i>
            </a>
        </div>

        <div class="ml-auto d-flex">

            <!-- activate app search icon (mobile) -->
            <div class="hidden-sm-up">
                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                    <i class="{{config('theme.smartadmin.iconPrefix')}} fa-search"></i>
                </a>
            </div>

            @if(config('theme.smartadmin.layoutSettings'))
                <!-- app settings -->
                <div class="hidden-md-down">
                    <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                        <i class="{{config('theme.smartadmin.iconPrefix')}} fa-cog"></i>
                    </a>
                </div>
            @endif

            @if(config('theme.smartadmin.chatInterface'))
                <!-- app message -->
                <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-messenger">
                    <i class="{{config('theme.smartadmin.iconPrefix')}} fa-globe"></i>
                    <span class="badge badge-icon">!</span>
                </a>
            @endif

            <!-- app user menu -->
            <div>
                <a href="#" data-toggle="dropdown" title="email" class="header-icon d-flex align-items-center justify-content-center ml-2">
                    <img src="/assets/theme/smartadmin/img/demo/avatars/avatar-e.png" class="profile-image rounded-circle" alt="usuario">
                    <!-- you can also add username next to the avatar with the codes below:
                    <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                    <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                    @include('themes.smart.include.dropdown-menu')
                </div>
            </div>
        </div>
    </header>
    <!-- END Page Header -->
@endif
