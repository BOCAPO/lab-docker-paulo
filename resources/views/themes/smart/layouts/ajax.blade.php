@if(config('theme.smartadmin.possible_classes'))

@else
    @include('../page-breadcrumb')
	<div class="subheader">
        @include('../page-heading')
		@yield('subheader')
	</div>
@endif
@yield('content')
