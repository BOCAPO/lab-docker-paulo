<!DOCTYPE html>
    @include('themes.smart.include.copyright-header')
<html lang="en">
	<head>
        @include('themes.smart.include.head')
        @yield('head')
	</head>
	<body class="mod-bg-1 mod-nav-link {{config('theme.smartadmin.possible_classes')}}">
        @include('themes.smart.include.scripts-loading-saving')

		<!-- BEGIN Page Wrapper -->
		<div class="page-wrapper">
			<div class="page-inner">
                @include('themes.smart.include.left-panel')
				<div class="page-content-wrapper">
                    @include('themes.smart.include.page-header')
					<!-- BEGIN Page Content -->
					<!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        @if(config('theme.smartadmin.preemptiveclass'))
                            <!-- Page heading removed for composed layout -->
                        @else
                            @include('themes.smart.include.page-breadcrumb')
                            <div class="subheader mb-2">
                                <div class="col-md-8 pl-0 pr-0">
                                    @include('themes.smart.include.page-heading')
                                    @yield('subheader')
                                </div>
                                <div class="col-md-4 pull-right text-right">{{$headerButton ?? ''}}</div>
                            </div>
                        @endif

                        @yield('content')
                        {{ $slot ?? '' }}
                    </main>
                    @include('themes.smart.include.page-content-overlay')
                    @include('themes.smart.include.page-footer')
        		</div>
			</div>
		</div>

        <!-- END Page Wrapper -->
        @include('themes.smart.include.scripts-base-plugins')

        @livewireScripts

        @yield('script')
	</body>
</html>
