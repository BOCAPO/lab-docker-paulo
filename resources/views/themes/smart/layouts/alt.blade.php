<!DOCTYPE html>
@include('../copyright-header')
<html lang="en">
	<head>
        @include('../head')
		@yield('head')
	</head>
	<body>
		@include('scripts-loading-saving')
		<!-- BEGIN Page Wrapper -->
		<div class="page-wrapper alt">
			<!-- BEGIN Page Content -->
			<!-- the #js-page-content id is needed for some plugins to initialize -->
			<main id="js-page-content" role="main" class="page-content">
                @yield('content')
			</main>
			<!-- END Page Content -->
            @include('page-footer')
		</div>
		<!-- END Page Wrapper -->
        @include('shortcut-menu')
        @include('color-profile-reference')
        @include('google_analytics')
        @include('scripts-base-plugins')

        @yield('script')
	</body>
	<!-- END Body -->
</html>
