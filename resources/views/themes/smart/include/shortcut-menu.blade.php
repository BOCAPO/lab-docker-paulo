@if(config('theme.smartadmin.shortcutMenu'))
    <!-- BEGIN Quick Menu -->
    <!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
    <nav class="shortcut-menu d-none d-sm-block">
        <input type="checkbox" class="menu-open" name="menu-open" id="menu_open"/>
        <label for="menu_open" class="menu-open-button ">
            <span class="app-shortcut-icon d-block"></span>
        </label>
        <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
            <i class="{{config('theme.smartadmin.iconPrefix')}} fa-arrow-up"></i>
        </a>
        <a href="page_login.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
            <i class="{{config('theme.smartadmin.iconPrefix')}} fa-sign-out"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
            <i class="{{config('theme.smartadmin.iconPrefix')}} fa-expand"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
            <i class="{{config('theme.smartadmin.iconPrefix')}} fa-print"></i>
        </a>
        <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
            <i class="{{config('theme.smartadmin.iconPrefix')}} fa-microphone"></i>
        </a>
    </nav>
    <!-- END Quick Menu -->
@endif
