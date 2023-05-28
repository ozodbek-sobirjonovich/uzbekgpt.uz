<!doctype html>
<html lang="en">
@include('panel.layout.head')
<body class="group/body">
	<script src="/assets/js/tabler-theme.min.js"></script>
	<script src="/assets/js/navbar-shrink.js"></script>

	<div id="app-loading-indicator" class="fixed top-0 left-0 right-0 z-[99] opacity-0 transition-opacity">
		<div class="progress [--tblr-progress-height:3px]">
			<div class="progress-bar progress-bar-indeterminate bg-[--tblr-primary] before:[animation-timing-function:ease-in-out] group-[.theme-dark]/body:bg-white"></div>
		</div>
	</div>

	<div class="page">
		<!-- Navbar -->
		@include('panel.layout.header')

		<div class="page-wrapper overflow-hidden">
			<!-- Page header -->
			@yield('content')
			@include('panel.layout.footer')
		</div>
	</div>

	@include('panel.layout.scripts')

	@if(\Session::has('message'))
	<script>
		toastr.{{\Session::get('type')}}('{{\Session::get('message')}}')
	</script>
	@endif

	@yield('script')
	<script src="/assets/js/frontend.js"></script>

</body>
</html>
