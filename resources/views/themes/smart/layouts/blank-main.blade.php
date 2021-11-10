<!DOCTYPE html>
@include('themes.smart.include.copyright-header')
<html lang="en">
	<head>
        @include('themes.smart.include.head')
		@yield('head')
	</head>
	<body class="mod-bg-1  {{config('theme.smartadmin.possible_classes')}}">
        @include('themes.smart.include.scripts-loading-saving')
		<!-- BEGIN Page Wrapper -->
		<div class="page-wrapper">

			<div class="page-inner">
                @include('themes.smart.include.blank-left-panel')

				<div class="page-content-wrapper">
                    @include('themes.smart.include.page-header')

					<!-- BEGIN Page Content -->
					<!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        @if(config('theme.smartadmin.possible_classes'))
                            <!-- Page heading removed for composed layout -->
                        @else
                            @include('themes.smart.include.page-breadcrumb')
                            <div class="subheader">
                                @include('themes.smart.include.page-heading')
                                @yield('subheader')
                            </div>
                        @endif

                        @yield('content')
                    </main>
                    @include('themes.smart.include.page-content-overlay')
                    @include('themes.smart.include.page-footer')
                    @include('themes.smart.include.shortcut-modal')
                    @include('themes.smart.include.color-profile-reference')
				</div>
			</div>
		</div>

        @include('themes.smart.include.shortcut-menu')
        @include('themes.smart.include.shortcut-messenger')
        @include('themes.smart.include.page-settings')
        @include('themes.smart.include.google_analytics')
        @include('themes.smart.include.scripts-base-plugins')

        @yield('script')
	</body>
</html>
