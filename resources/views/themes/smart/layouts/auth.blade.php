<!DOCTYPE html>
    @include('themes.smart.include.copyright-header')
<html lang="en">
	<head>
        @include('themes.smart.include.head')
		@yield('head')
	</head>
	<body>
        @include('themes.smart.include.scripts-loading-saving')

        @yield('content')
        {{ $slot ?? '' }}

        @include('themes.smart.include.color-profile-reference')
        @include('themes.smart.include.scripts-base-plugins')
        @include('themes.smart.include.scripts-base-plugins')

        @yield('script')
        @livewireScripts

        <script>
            $(":input").inputmask();
        </script>

    </body>
</html>
