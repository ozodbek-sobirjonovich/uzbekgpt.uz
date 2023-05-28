<!DOCTYPE html>
<html lang="en" class="max-sm:overflow-x-hidden">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$setting->site_name}} | {{__('Home')}}</title>

    <link href="/assets/css/frontend/fonts.css" rel="stylesheet">


    <link rel="stylesheet" href="/assets/css/frontend/flickity.min.css">

	@vite('resources/css/frontend.css')

    @if($setting->frontend_custom_css != null)
        <link rel="stylesheet" href="{{$setting->frontend_custom_css}}" />
    @endif
</head>
<body class="font-golos bg-body-bg text-body group/body max-sm:overflow-x-hidden">
	<script src="/assets/js/tabler-theme.min.js"></script>
	<script src="/assets/js/navbar-shrink.js"></script>

	<div id="app-loading-indicator" class="fixed top-0 left-0 right-0 z-[99] opacity-0 transition-opacity">
		<div class="progress [--tblr-progress-height:3px]">
			<div class="progress-bar progress-bar-indeterminate bg-[--tblr-primary] before:[animation-timing-function:ease-in-out] group-[.theme-dark]/body:bg-white"></div>
		</div>
	</div>

	@include('layout.header')

	@yield('content')

	@include('layout.footer')

	@if($setting->frontend_custom_js != null)
		<script src="{{$setting->frontend_custom_js}}"></script>
	@endif

	<script src="/assets/js/frontend/vanillajs-scrollspy.min.js"></script>
	<script src="/assets/js/frontend/flickity.pkgd.min.js"></script>
	<script src="/assets/js/frontend.js"></script>

</body>
</html>
