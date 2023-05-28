@extends('layout.app')

@section('content')

<section class="flex items-center justify-center min-h-screen text-center bg-[#4782e6] text-white relative max-md:py-16" id="banner">
	<div class="absolute inset-0 banner-bg"></div>
	<div class="container relative">
		<div class="flex flex-col items-center w-1/2 mx-auto max-lg:w-2/3 max-md:w-full">
			<h6 class="px-3 py-1 mb-8 text-white bg-white rounded-2xl bg-opacity-15">
				<span>{{__('Meet')}} {{$setting->site_name}}</span>
				<span class="dot"></span>
				<span class="opacity-60">{{__('Unleash the Power of AI')}}</span>
			</h6>
			<h1 class="font-bold text-white mb-7 font-golos -tracking-wide">
				{{__('Ultimate AI Generator')}}
				<svg class="inline" width="47" height="62" viewBox="0 0 47 62" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M27.95 0L0 38.213H18.633V61.141L46.583 22.928H27.95V0Z"/>
				</svg>
			</h1>
			<p class="w-3/4 text-2xl font-medium opacity-75 mb-7 max-sm:w-full">{{__('All-in-one platform to generate AI content and start making money in minutes.')}}</p>
			<x-button label="{{__('Start Making Money')}}" size="lg">
				<x-slot name="icon">
					<svg class="mr-2" width="11" height="14" viewBox="0 0 47 62" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M27.95 0L0 38.213H18.633V61.141L46.583 22.928H27.95V0Z"/>
					</svg>
				</x-slot>
			</x-button>
			<br>
			<a href="#features" class="transition-opacity opacity-50 hover:opacity-100">{{__('Discover')}} {{$setting->site_name}}</a>
		</div>
	</div>
	<div class="absolute inset-x-0 -bottom-px banner-divider">
		<svg class="w-full h-auto fill-body-bg" width="1440" height="105" viewBox="0 0 1440 105" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
			<path d="M0 0C240 68.7147 480 103.072 720 103.072C960 103.072 1200 68.7147 1440 0V104.113H0V0Z"/>
		</svg>
	</div>
</section>

<section class="sticky top-0 z-50 py-5 border-b bg-body-bg max-md:hidden">
	<nav class="container" id="frontend-local-navbar">
		<ul class="flex items-center justify-center gap-14 text-[14px] text-black text-opacity-50">
			<li>{{__('Jump to:')}}</li>
			<li>
				<a href="#features" class="relative before:absolute before:-inset-x-3 before:-inset-y-3 before:rounded-lg before:bg-[#F2F3F7] before:transition-all before:opacity-0 before:scale-75 hover:before:opacity-100 hover:before:scale-100 [&.active]:text-black [&.active]:before:opacity-100 [&.active]:before:scale-100 active">
					<span class="relative">{{__('Features')}}</span>
				</a>
			</li>
			<li>
				<a href="#templates" class="relative before:absolute before:-inset-x-3 before:-inset-y-3 before:rounded-lg before:bg-[#F2F3F7] before:transition-all before:opacity-0 before:scale-75 hover:before:opacity-100 hover:before:scale-100 [&.active]:text-black [&.active]:before:opacity-100 [&.active]:before:scale-100">
					<span class="relative">{{__('Templates')}}</span>
				</a>
			</li>
			<li>
				<a href="#testimonials" class="relative before:absolute before:-inset-x-3 before:-inset-y-3 before:rounded-lg before:bg-[#F2F3F7] before:transition-all before:opacity-0 before:scale-75 hover:before:opacity-100 hover:before:scale-100 [&.active]:text-black [&.active]:before:opacity-100 [&.active]:before:scale-100">
					<span class="relative">{{__('Testimonials')}}</span>
				</a>
			</li>
			<li>
				<a href="#pricing" class="relative before:absolute before:-inset-x-3 before:-inset-y-3 before:rounded-lg before:bg-[#F2F3F7] before:transition-all before:opacity-0 before:scale-75 hover:before:opacity-100 hover:before:scale-100 [&.active]:text-black [&.active]:before:opacity-100 [&.active]:before:scale-100">
					<span class="relative">{{__('Pricing')}}</span>
				</a>
			</li>
			<li>
				<a href="#faq" class="relative before:absolute before:-inset-x-3 before:-inset-y-3 before:rounded-lg before:bg-[#F2F3F7] before:transition-all before:opacity-0 before:scale-75 hover:before:opacity-100 hover:before:scale-100 [&.active]:text-black [&.active]:before:opacity-100 [&.active]:before:scale-100">
					<span class="relative">{{__('FAQ')}}</span>
				</a>
			</li>
		</ul>
	</nav>
</section>

<section id="features">
	<section class="py-20">
		<div class="container">
			<x-section-header
				title="{{__('The future of AI.')}}"
				subtitle="{{$setting->site_name}} {{__('is designed to help you generate high-quality content instantly, without breaking a sweat.')}}"
			/>
			<div class="grid justify-between grid-cols-3 gap-x-20 gap-y-9 max-lg:grid-cols-2 max-lg:gap-x-10 max-md:grid-cols-1">
				<x-box title="{{__('AI Generator')}}" desc="{!! __('Generate <strong>text, image, code, chat</strong> and even more with') !!} {{$setting->site_name}}.">
					<x-slot name="icon">
						<svg width="20" height="21" viewBox="0 0 20 21" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M2.333 14.204L14.571 1.966C15.0509 1.48609 15.7018 1.21648 16.3805 1.21648C16.7166 1.21648 17.0493 1.28267 17.3598 1.41127C17.6703 1.53988 17.9524 1.72837 18.19 1.966C18.4276 2.20363 18.6161 2.48573 18.7447 2.79621C18.8733 3.10668 18.9395 3.43944 18.9395 3.7755C18.9395 4.11156 18.8733 4.44432 18.7447 4.75479C18.6161 5.06527 18.4276 5.34737 18.19 5.585L5.952 17.823C5.6728 18.1022 5.31719 18.2926 4.93 18.37L1 19.156L1.786 15.226C1.86345 14.8388 2.05378 14.4832 2.333 14.204Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12.5 4.656L15.5 7.656" stroke-width="2"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box title="{{__('Advanced Dashboard')}}" desc="{!! __('Access to valuable user insight, analytics and activity.') !!}">
					<x-slot name="icon">
						<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.46 13.838H5.19V3.46H3.46V13.838ZM6.92 17.298H8.65V0H6.92V17.298ZM0 10.379H1.73V6.919H0V10.379ZM10.379 13.839H12.109V3.46H10.379V13.839ZM13.839 6.92V10.38H15.569V6.92H13.839Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box title="{{__('Payment Gateways')}}" desc="{!! __('Securely process credit card, debit card, or other methods.') !!}">
					<x-slot name="icon">
						<svg width="19" height="19" viewBox="0 0 19 19" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.421 -6.80448e-08L3.267 0.643L0.231 14.636L0 15.636H4.013L3.524 17.925L3.293 18.925H9.029L9.158 18.256L10.007 14.295H12.219C13.7458 14.318 15.2324 13.8059 16.4212 12.8475C17.6099 11.8891 18.4257 10.5449 18.727 9.048C18.9117 8.34466 18.9335 7.60848 18.7909 6.89542C18.6483 6.18237 18.345 5.51122 17.904 4.933C17.2726 4.18389 16.4149 3.66026 15.46 3.441C15.303 2.67914 14.9378 1.97574 14.405 1.409C13.9537 0.955562 13.416 0.597241 12.8237 0.355227C12.2315 0.113213 11.5967 -0.00757721 10.957 -6.80448e-08H3.421ZM4.758 1.646H10.958C11.8009 1.63923 12.613 1.96222 13.221 2.546C13.563 2.92723 13.7979 3.39222 13.9019 3.89369C14.0059 4.39516 13.9752 4.91523 13.813 5.401C13.6186 6.54221 13.0154 7.57362 12.116 8.30255C11.2167 9.03148 10.0827 9.40808 8.926 9.362H5.376L5.25 10.006L4.401 13.993H2.058L4.758 1.646ZM6.841 2.855L6.687 3.498L5.839 7.3L5.608 8.3H8.515C9.23308 8.28426 9.92567 8.0308 10.4843 7.57932C11.0429 7.12783 11.436 6.50381 11.602 5.805H11.628C11.628 5.789 11.628 5.77 11.628 5.754C11.7218 5.41549 11.7405 5.06056 11.6828 4.71406C11.6252 4.36756 11.4924 4.03785 11.294 3.748C11.0809 3.46596 10.8048 3.23768 10.4878 3.0814C10.1707 2.92513 9.82147 2.8452 9.468 2.848L6.841 2.855ZM8.15 4.5H9.462C9.55438 4.48894 9.64804 4.50213 9.73378 4.53824C9.81952 4.57436 9.89438 4.63218 9.951 4.706C10.0148 4.80392 10.055 4.91532 10.0683 5.03143C10.0817 5.14753 10.0679 5.26515 10.028 5.375V5.4C9.92453 5.73467 9.72591 6.032 9.45637 6.25573C9.18682 6.47947 8.858 6.61993 8.51 6.66H7.661L8.15 4.5ZM15.506 5.22C15.9416 5.37924 16.3307 5.64457 16.638 5.992C16.9265 6.37171 17.1192 6.81536 17.1998 7.28537C17.2804 7.75537 17.2465 8.23787 17.101 8.692C16.9066 9.83321 16.3034 10.8646 15.404 11.5935C14.5047 12.3225 13.3707 12.6991 12.214 12.653H8.664L8.535 13.296L7.686 17.283H5.35L5.71 15.637H5.736L5.865 14.968L6.714 11.007H8.926C10.4528 11.03 11.9394 10.5179 13.1282 9.55954C14.3169 8.60115 15.1327 7.25692 15.434 5.76C15.472 5.575 15.488 5.4 15.51 5.221L15.506 5.22Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box title="{{__('Multi-Lingual')}}" desc="{!! __('Ability to understand and generate content in different languages') !!}">
					<x-slot name="icon">
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.85 20.85C16.3728 20.85 20.85 16.3728 20.85 10.85C20.85 5.32715 16.3728 0.85 10.85 0.85C5.32715 0.85 0.85 5.32715 0.85 10.85C0.85 16.3728 5.32715 20.85 10.85 20.85Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M6.85 10.85C6.85 16.3728 8.64086 20.85 10.85 20.85C13.0591 20.85 14.85 16.3728 14.85 10.85C14.85 5.32715 13.0591 0.85 10.85 0.85C8.64086 0.85 6.85 5.32715 6.85 10.85Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M0.85 10.85H20.85" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box title="{{__('Custom Templates')}}" desc="{!! __('Add unlimited number of custom prompts for your customers.') !!}" badge="{{__('PRO')}}">
					<x-slot name="icon">
						<svg width="19" height="16" viewBox="0 0 19 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.84 6.509H7.29C6.571 6.509 6.509 7.091 6.509 7.809C6.509 8.527 6.571 9.109 7.29 9.109H14.84C15.559 9.109 15.621 8.527 15.621 7.809C15.621 7.091 15.558 6.509 14.84 6.509ZM17.44 13.018H7.29C6.571 13.018 6.509 13.6 6.509 14.318C6.509 15.036 6.571 15.618 7.29 15.618H17.443C18.162 15.618 18.224 15.036 18.224 14.318C18.224 13.6 18.162 13.018 17.443 13.018H17.44ZM7.29 2.6H17.443C18.162 2.6 18.224 2.018 18.224 1.3C18.224 0.582 18.162 0 17.443 0H7.29C6.571 0 6.509 0.582 6.509 1.3C6.509 2.018 6.571 2.6 7.29 2.6ZM3.124 6.509H0.781C0.0619999 6.509 0 7.091 0 7.809C0 8.527 0.0619999 9.109 0.781 9.109H3.124C3.843 9.109 3.905 8.527 3.905 7.809C3.905 7.091 3.843 6.509 3.124 6.509ZM3.124 13.018H0.781C0.0619999 13.018 0 13.6 0 14.318C0 15.036 0.0619999 15.618 0.781 15.618H3.124C3.843 15.618 3.905 15.036 3.905 14.318C3.905 13.6 3.843 13.018 3.124 13.018ZM3.124 0H0.781C0.0619999 0 0 0.582 0 1.3C0 2.018 0.0619999 2.6 0.781 2.6H3.124C3.843 2.6 3.905 2.018 3.905 1.3C3.905 0.582 3.843 0 3.124 0Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box title="{{__('Support Platform')}}" desc="{!! __('Access and manage your support tickets from your dashboard.') !!}">
					<x-slot name="icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.217 1.068L9.635 7.968M13.818 7.968L14.236 1.068M9.217 22.191L9.635 15.291M13.818 15.291L14.236 22.191M22.287 9.121L15.387 9.539M15.387 13.722L22.287 14.14M1.164 9.121L8.064 9.539M8.064 13.722L1.164 14.14M22.85 11.85C22.85 17.9251 17.9251 22.85 11.85 22.85C5.77487 22.85 0.849998 17.9251 0.849998 11.85C0.849998 5.77487 5.77487 0.849998 11.85 0.849998C17.9251 0.849998 22.85 5.77487 22.85 11.85ZM15.85 11.85C15.85 14.0591 14.0591 15.85 11.85 15.85C9.64086 15.85 7.85 14.0591 7.85 11.85C7.85 9.64086 9.64086 7.85 11.85 7.85C14.0591 7.85 15.85 9.64086 15.85 11.85Z" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</x-slot>
				</x-box>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="border rounded-[50px] p-20 max-xl:px-10 max-lg:py-12 max-sm:px-5">
				<div class="lqd-tabs" data-lqd-tabs-style="1">
					<div class="grid justify-between grid-cols-5 gap-8 mb-9 lqd-tabs-triggers max-lg:grid-cols-3 max-lg:gap-4 max-md:grid-cols-2 max-sm:grid-cols-1">
						<x-tabs-trigger target="#ai-writer-text" label="{{__('AI Text Generator')}}" active="true" />
						<x-tabs-trigger target="#ai-writer-image" label="{{__('AI Image Generator')}}" />
						<x-tabs-trigger target="#ai-writer-code" label="{{__('AI Code Generator')}}" />
						<x-tabs-trigger target="#ai-writer-chat" label="{{__('AI Chat Bot')}}" />
						<x-tabs-trigger target="#ai-writer-speech-to-text" label="{{__('AI Speech To Text')}}" />
					</div>
					<div class="lqd-tabs-content-wrap">
						<div class="lqd-tabs-content" id="ai-writer-text">
							<div class="flex flex-wrap justify-between max-md:gap-4">
								<div class="w-[47%] p-8 shadow-lg rounded-xl flex flex-col items-start max-md:w-full">
									<h6 class="px-3 py-1 bg-[#F3E5F5] rounded-xl mb-10">
										{{__('Say goodbye to writer’s block')}}
										<span class="dot"></span>
										<span class="opacity-50">{{__('AI')}}</span>
									</h6>
									<h3 class="mt-auto mb-7">{{__('Intelligent Writing Assistant.')}}</h3>
									<p class="text-lg">{{$setting->site_name}} {!! __('Writer is designed to help you <strong>generate high-quality texts instantly</strong>, without breaking a sweat. With our intuitive interface and powerful features, you can easily edit, export or publish your AI-generated result.') !!}</p>
								</div>
								<div class="w-[47%] p-8 bg-[#EADDF9] rounded-xl max-md:w-full">
									<div class="text-center">
										<figure class="w-full mb-6">
											<img class="w-full" width="878" height="748" src="/assets/img/site/text-generator.jpg" alt="{{__('Intelligent Writing Assistant.')}}">
										</figure>
										<p class="text-lg font-semibold text-heading">{{__('Generate, edit, export.')}}</p>
										<p class="text-sm text-heading">{{__('Powered by OpenAI.')}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="hidden lqd-tabs-content" id="ai-writer-image">
							<div class="flex flex-wrap justify-between max-md:gap-4">
								<div class="w-[47%] p-8 shadow-lg rounded-xl flex flex-col items-start max-md:w-full">
									<h6 class="px-3 py-1 bg-[#F3E5F5] rounded-xl mb-10">
										{{__('Say goodbye to writer’s block')}}
										<span class="dot"></span>
										<span class="opacity-50">{{__('AI')}}</span>
									</h6>
									<h3 class="mt-auto mb-7">{{__('Intelligent Writing Assistant.')}}</h3>
									<p class="text-lg">{{$setting->site_name}} {!! __('Writer is designed to help you <strong>generate high-quality texts instantly</strong>, without breaking a sweat. With our intuitive interface and powerful features, you can easily edit, export or publish your AI-generated result.') !!}</p>
								</div>
								<div class="w-[47%] p-8 bg-[#EADDF9] rounded-xl max-md:w-full">
									<div class="text-center">
										<figure class="w-full mb-6">
											<img class="w-full" width="878" height="748" src="/assets/img/site/text-generator.jpg" alt="{{__('Intelligent Writing Assistant.')}}">
										</figure>
										<p class="text-lg font-semibold text-heading">{{__('Generate, edit, export.')}}</p>
										<p class="text-sm text-heading">{{__('Powered by OpenAI.')}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="hidden lqd-tabs-content" id="ai-writer-code">
							<div class="flex flex-wrap justify-between max-md:gap-4">
								<div class="w-[47%] p-8 shadow-lg rounded-xl flex flex-col items-start max-md:w-full">
									<h6 class="px-3 py-1 bg-[#F3E5F5] rounded-xl mb-10">
										{{__('Say goodbye to writer’s block')}}
										<span class="dot"></span>
										<span class="opacity-50">{{__('AI')}}</span>
									</h6>
									<h3 class="mt-auto mb-7">{{__('Intelligent Writing Assistant.')}}</h3>
									<p class="text-lg">{{$setting->site_name}} {!! __('Writer is designed to help you <strong>generate high-quality texts instantly</strong>, without breaking a sweat. With our intuitive interface and powerful features, you can easily edit, export or publish your AI-generated result.') !!}</p>
								</div>
								<div class="w-[47%] p-8 bg-[#EADDF9] rounded-xl max-md:w-full">
									<div class="text-center">
										<figure class="w-full mb-6">
											<img class="w-full" width="878" height="748" src="/assets/img/site/text-generator.jpg" alt="{{__('Intelligent Writing Assistant.')}}">
										</figure>
										<p class="text-lg font-semibold text-heading">{{__('Generate, edit, export.')}}</p>
										<p class="text-sm text-heading">{{__('Powered by OpenAI.')}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="hidden lqd-tabs-content" id="ai-writer-chat">
							<div class="flex flex-wrap justify-between max-md:gap-4">
								<div class="w-[47%] p-8 shadow-lg rounded-xl flex flex-col items-start max-md:w-full">
									<h6 class="px-3 py-1 bg-[#F3E5F5] rounded-xl mb-10">
										{{__('Say goodbye to writer’s block')}}
										<span class="dot"></span>
										<span class="opacity-50">{{__('AI')}}</span>
									</h6>
									<h3 class="mt-auto mb-7">{{__('Intelligent Writing Assistant.')}}</h3>
									<p class="text-lg">{{$setting->site_name}} {!! __('Writer is designed to help you <strong>generate high-quality texts instantly</strong>, without breaking a sweat. With our intuitive interface and powerful features, you can easily edit, export or publish your AI-generated result.') !!}</p>
								</div>
								<div class="w-[47%] p-8 bg-[#EADDF9] rounded-xl max-md:w-full">
									<div class="text-center">
										<figure class="w-full mb-6">
											<img class="w-full" width="878" height="748" src="/assets/img/site/text-generator.jpg" alt="{{__('Intelligent Writing Assistant.')}}">
										</figure>
										<p class="text-lg font-semibold text-heading">{{__('Generate, edit, export.')}}</p>
										<p class="text-sm text-heading">{{__('Powered by OpenAI.')}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="hidden lqd-tabs-content" id="ai-writer-speech-to-text">
							<div class="flex flex-wrap justify-between max-md:gap-4">
								<div class="w-[47%] p-8 shadow-lg rounded-xl flex flex-col items-start max-md:w-full">
									<h6 class="px-3 py-1 bg-[#F3E5F5] rounded-xl mb-10">
										{{__('Say goodbye to writer’s block')}}
										<span class="dot"></span>
										<span class="opacity-50">{{__('AI')}}</span>
									</h6>
									<h3 class="mt-auto mb-7">{{__('Intelligent Writing Assistant.')}}</h3>
									<p class="text-lg">{{$setting->site_name}} {!! __('Writer is designed to help you <strong>generate high-quality texts instantly</strong>, without breaking a sweat. With our intuitive interface and powerful features, you can easily edit, export or publish your AI-generated result.') !!}</p>
								</div>
								<div class="w-[47%] p-8 bg-[#EADDF9] rounded-xl max-md:w-full">
									<div class="text-center">
										<figure class="w-full mb-6">
											<img class="w-full" width="878" height="748" src="/assets/img/site/text-generator.jpg" alt="{{__('Intelligent Writing Assistant.')}}">
										</figure>
										<p class="text-lg font-semibold text-heading">{{__('Generate, edit, export.')}}</p>
										<p class="text-sm text-heading">{{__('Powered by OpenAI.')}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-20">
		<div class="container">
			<div class="grid grid-cols-3 gap-4 max-lg:grid-cols-2 max-md:grid-cols-1">
				<x-color-box title="{{__('Digital Agencies')}}" color="orange" />
				<x-color-box title="{{__('Product Designers')}}" color="purple" />
				<x-color-box title="{{__('Enterpreneurs')}}" color="teal" />
				<x-color-box title="{{__('Copywriters')}}" color="blue" />
				<x-color-box title="{{__('Digital Marketers')}}" color="green" />
				<x-color-box title="{{__('Developers')}}" color="red" />
			</div>
		</div>
	</section>
</section>

<section class="pb-9" id="templates">
	<div class="container">
		<div class="p-10 border rounded-[50px] max-sm:px-5">
			<x-section-header
				mb="7"
				width="w-3/5"
				title="{{__('Custom Templates.')}}"
				subtitle="{{__('Create your own template or use pre-made templates and examples for various content types and industries to help you get started quickly.')}}"
			>
				<h6 class="inline-block py-1 px-3 mb-6 rounded-md text-[13px] font-medium text-[#083D91] bg-[#083D91] bg-opacity-15">
					{{__('Custom')}}
					<span class="dot"></span>
					<span class="opacity-50">{{__('Prompts')}}</span>
				</h6>
			</x-section-header>
			<div class="flex flex-col items-center">
				<div class="inline-flex flex-wrap items-center gap-2 p-[0.35rem] mx-auto mb-10 text-sm font-semibold leading-none border rounded-lg max-md:justify-center">
					<x-tabs-trigger target=".templates-all" style="2" label="{{__('All')}}" active="true" />
					<x-tabs-trigger target=".templates-social-media" style="2" label="{{__('Social Media')}}" />
					<x-tabs-trigger target=".templates-blog" style="2" label="{{__('Blog')}}" />
					<x-tabs-trigger target=".templates-newsletter" style="2" label="{{__('Newsletter')}}" />
					<x-tabs-trigger target=".templates-email" style="2" label="{{__('Email')}}" />
					<x-tabs-trigger target=".templates-development" style="2" label="{{__('Development')}}" />
				</div>
			</div>
			<div class="relative">
				<div class="grid grid-cols-3 gap-4 templates-cards max-h-[28rem] overflow-hidden max-lg:grid-cols-2 max-md:grid-cols-1">
					@for ( $i = 0; $i <= 1; $i++ ){{-- for demo purpose --}}
					<x-box wrapperClass="templates-all templates-development" style="2" title="{{__('Coding')}}" desc="{{$setting->site_name}} {{__(' helps you write code faster, efficiently and error-free.')}}">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-coding.jpg" alt="{{__('Coding')}}" width="43" height="43">
						</x-slot>
					</x-box>
					<x-box wrapperClass="templates-all templates-social-media" style="2" title="{{__('Video Script')}}" desc="{{__('From simple conversations and dialogue to more complex movie scripts.')}}" badge="Pro">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-video-script.jpg" alt="{{__('Video Script')}}" width="43" height="43">
						</x-slot>
					</x-box>
					<x-box wrapperClass="templates-all templates-newsletter" style="2" title="{{__('Newsletter')}}" desc="{{__('Create high-quality newsletters that resonate with your audience.')}}">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-newsletter.jpg" alt="{{__('Newsletter')}}" width="43" height="43">
						</x-slot>
					</x-box>
					<x-box wrapperClass="templates-all templates-development" style="2" title="{{__('SEO Copywriting')}}" desc="{{__('Optimize your content for search engines and reach more customers.')}}">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-seo.jpg" alt="{{__('SEO Copywriting')}}" width="43" height="43">
						</x-slot>
					</x-box>
					<x-box wrapperClass="templates-all templates-social-media" style="2" title="{{__('Social Media')}}" desc="{{__('Engaging and shareable social media posts, including captions and hashtags.')}}">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-social-media.jpg" alt="{{__('Social Media')}}" width="43" height="43">
						</x-slot>
					</x-box>
					<x-box wrapperClass="templates-all templates-blog" style="2" title="{{__('Blog Post')}}" desc="{{__('From industry news and trends to product reviews and how-to guides.')}}">
						<x-slot name="image">
							<img class="mb-4 mix-blend-multiply" src="/assets/img/site/icon-blog.jpg" alt="{{__('Blog Post')}}" width="43" height="43">
						</x-slot>
					</x-box>
					@endfor
				</div>
				<div class="h-[230px] absolute bottom-0 inset-x-0 z-10 bg-gradient-to-t from-body-bg to-transparent templates-cards-overlay"></div>
			</div>
			<div class="relative z-20 mt-2 text-center">
				<button class="text-[#5A4791] font-semibold text-[14px] templates-show-more">
					<span class="inline-grid rounded-lg place-content-center w-7 h-7 bg-[#885EFE] bg-opacity-10 mr-1">
						<svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.671 11.796V0.996H7.125V11.796H5.671ZM0.998 7.125V5.671H11.798V7.125H0.998Z"/>
						</svg>
					</span>
					<span class="inline-grid place-content-center px-2 h-7 bg-[#885EFE] bg-opacity-10 rounded-lg">
						{{__('Show more')}}
					</span>
				</button>
			</div>
		</div>
	</div>
</section>

<section class="py-10">
	<div class="container">
		<div class="p-10 border rounded-[50px] max-sm:px-6 max-sm:py-16">
			<x-section-header
				mb="14"
				title="{{__('Magic Tools.')}}"
				subtitle="{{$setting->site_name}} {{__('has all the tools you need to create and manage your SaaS platform.')}}"
			/>
			<div class="grid grid-cols-3 gap-3 max-lg:grid-cols-2 max-md:grid-cols-1">
				<x-box style="3" title="{{__('Advanced Dashboard')}}" desc="{{__('Track a wide range of data points, including user traffic and sales.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/advanced-dashboard.png" alt="{{__('Advanced Dashboard')}}" width="696" height="426">
					</x-slot>
				</x-box>
				<x-box style="3" title="{{__('Payment Gateways')}}" desc="{{__('Securely process credit card or other electronic payment methods.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/payment-gateways.png" alt="{{__('Payment Gateways')}}" width="696" height="426">
					</x-slot>
				</x-box>
				<x-box style="3" title="{{__('Multilingual')}}" desc="{{__('Ability to understand and generate content in different languages.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/multilingual.png" alt="{{__('Multilingual')}}" width="696" height="426">
					</x-slot>
				</x-box>
				<x-box style="3" title="{{__('Affiliate System')}}" desc="{{__('Ability to invite friends, and earn commission from their first purchase.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/affiliate.png" alt="{{__('Affiliate System')}}" width="696" height="426">
					</x-slot>
				</x-box>
				<x-box style="3" title="{{__('Easy Export')}}" desc="{{__('Export generated content as plain text, PDF, Word or HTML easily.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/easy-export.png" alt="{{__('Easy Export')}}" width="696" height="426">
					</x-slot>
				</x-box>
				<x-box style="3" title="{{__('Support Platform')}}" desc="{{__('Access and mage support tickets from your dashboard.')}}">
					<x-slot name="image">
						<img class="-mx-8 max-w-[calc(100%+4rem)]" src="/assets/img/site/support.png" alt="{{__('Support Platform')}}" width="696" height="426">
					</x-slot>
				</x-box>
			</div>
		</div>
	</div>
</section>

<section class="py-10">
	<div class="container">
		<div class="p-10 border rounded-[50px] max-sm:px-5">
			<x-section-header
				width="w-5/12"
				title="{{__('Easy Integration.')}}"
				subtitle="{{__('AI Hub works great with your favorite platforms. Contact us if you can’t see your platform here. ')}}"
			>
				<h6 class="inline-block py-1 px-3 mb-6 rounded-md text-[13px] font-medium text-[#02697C] bg-[#02697C] bg-opacity-15">
					{{__('Plugins')}}
					<span class="dot"></span>
					<span class="opacity-50">{{__('Extensions')}}</span>
				</h6>
			</x-section-header>
			<div class="grid grid-cols-5 gap-14 max-md:grid-cols-3 max-sm:grid-cols-2">
				<x-box style="4" title="{{__('Swift')}}" desc="">
					<x-slot name="icon">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M29 8.061C29 7.77 28.995 7.481 28.987 7.19C28.9714 6.55382 28.9159 5.91925 28.821 5.29C28.6979 4.66783 28.4984 4.06325 28.227 3.49C27.5968 2.38385 26.6804 1.46778 25.574 0.837999C25.0009 0.56627 24.3963 0.366744 23.774 0.243999C23.1448 0.148476 22.5102 0.0926991 21.874 0.0769997C21.583 0.0689997 21.294 0.0659992 21.003 0.0639992H8.127C7.836 0.0639992 7.547 0.0689997 7.256 0.0769997C7.098 0.0769997 6.94 0.0869999 6.781 0.0939999C6.30466 0.118527 5.82998 0.168598 5.359 0.243999C4.89256 0.3341 4.43508 0.46562 3.992 0.636999C3.84333 0.698999 3.697 0.765667 3.553 0.837C3.13314 1.06253 2.73626 1.32846 2.368 1.631C2.24667 1.735 2.13 1.84233 2.018 1.953C1.57948 2.41403 1.20358 2.93081 0.900001 3.49C0.628482 4.06319 0.428965 4.66779 0.306001 5.29C0.211948 5.91764 0.157176 6.55054 0.142001 7.185C0.134001 7.476 0.13 7.765 0.128 8.056V20.936C0.128 21.227 0.133001 21.516 0.142001 21.807C0.157593 22.4432 0.213035 23.0778 0.308001 23.707C0.430835 24.3292 0.630357 24.9339 0.902 25.507C1.5324 26.6123 2.44792 27.5282 3.553 28.159C4.12619 28.4305 4.73079 28.63 5.353 28.753C5.9822 28.8485 6.61679 28.9043 7.253 28.92C7.543 28.928 7.833 28.931 8.124 28.933H21.002C21.293 28.933 21.582 28.928 21.873 28.92C22.5092 28.904 23.1438 28.8482 23.773 28.753C24.3952 28.6299 24.9998 28.4304 25.573 28.159C26.6785 27.5283 27.5941 26.612 28.224 25.506C28.4956 24.9329 28.6952 24.3282 28.818 23.706C28.9136 23.0768 28.9694 22.4422 28.985 21.806C28.993 21.516 28.996 21.226 28.998 20.935V9.095C28.9993 8.74833 29 8.40367 29 8.061ZM24.496 23.594C23.207 21.085 20.808 21.707 19.578 22.339C19.467 22.403 19.354 22.468 19.24 22.532L19.213 22.548C17.7437 23.2456 16.1368 23.6055 14.5103 23.6014C12.8837 23.5972 11.2788 23.2291 9.813 22.524C7.09054 21.1939 4.75426 19.1885 3.027 16.699C3.82563 17.2693 4.66981 17.773 5.551 18.205C9.184 19.905 12.834 19.783 15.412 18.205C12.0083 15.4212 8.9547 12.2349 6.318 8.716C5.87762 8.18749 5.47337 7.62989 5.108 7.047C7.87066 9.52561 10.8345 11.7703 13.969 13.758C11.6882 11.3101 9.60377 8.68627 7.735 5.911C10.8462 9.07325 14.2856 11.8949 17.995 14.328C18.181 14.428 18.317 14.512 18.429 14.586C18.514 14.368 18.635 14.008 18.697 13.786C19.549 10.671 18.59 7.11 16.421 4.17C21.37 7.14 24.296 12.785 23.097 17.56C23.069 17.672 23.036 17.779 23.004 17.888C25.487 20.943 24.811 24.215 24.495 23.598L24.496 23.594Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Android 12')}}" desc="">
					<x-slot name="icon">
						<svg width="38" height="22" viewBox="0 0 38 22" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M27.106 16.46C27.3092 16.46 27.5103 16.42 27.698 16.3422C27.8857 16.2645 28.0562 16.1505 28.1999 16.0069C28.3435 15.8632 28.4575 15.6927 28.5352 15.505C28.613 15.3173 28.653 15.1162 28.653 14.913C28.653 14.7098 28.613 14.5087 28.5352 14.321C28.4575 14.1333 28.3435 13.9628 28.1999 13.8191C28.0562 13.6755 27.8857 13.5615 27.698 13.4838C27.5103 13.406 27.3092 13.366 27.106 13.366C26.6964 13.3671 26.3039 13.5305 26.0147 13.8205C25.7254 14.1105 25.563 14.5034 25.563 14.913C25.563 15.3226 25.7254 15.7155 26.0147 16.0055C26.3039 16.2955 26.6964 16.4589 27.106 16.46ZM10.02 16.46C10.4296 16.4589 10.8221 16.2955 11.1113 16.0055C11.4006 15.7155 11.563 15.3226 11.563 14.913C11.563 14.7098 11.523 14.5087 11.4452 14.321C11.3675 14.1333 11.2535 13.9628 11.1099 13.8191C10.9662 13.6755 10.7957 13.5615 10.608 13.4838C10.4203 13.406 10.2192 13.366 10.016 13.366C9.81284 13.366 9.61168 13.406 9.42399 13.4838C9.2363 13.5615 9.06576 13.6755 8.92211 13.8191C8.77845 13.9628 8.6645 14.1333 8.58676 14.321C8.50901 14.5087 8.469 14.7098 8.469 14.913C8.469 15.1165 8.50915 15.318 8.58714 15.5059C8.66513 15.6939 8.77944 15.8646 8.92352 16.0083C9.0676 16.152 9.23861 16.2659 9.42676 16.3434C9.61491 16.4209 9.81651 16.4605 10.02 16.46ZM27.663 7.148C30.3317 8.60089 32.5952 10.6973 34.2481 13.247C35.901 15.7966 36.8909 18.7187 37.128 21.748H0.000999451C0.237563 18.719 1.22695 15.797 2.87933 13.2473C4.53171 10.6977 6.79476 8.60112 9.463 7.148L6.373 1.798C6.30708 1.68939 6.26959 1.56592 6.264 1.439C6.264 1.26793 6.33196 1.10388 6.45292 0.982916C6.57388 0.861955 6.73793 0.794001 6.909 0.794001C7.02792 0.799746 7.14341 0.835729 7.24455 0.898548C7.34569 0.961367 7.42914 1.04894 7.487 1.153L10.617 6.575C13.1445 5.54349 15.8347 4.96793 18.563 4.875C21.2913 4.96793 23.9815 5.54349 26.509 6.575L29.638 1.156C29.6959 1.05194 29.7793 0.964367 29.8804 0.901548C29.9816 0.83873 30.0971 0.802746 30.216 0.797001C30.3871 0.797001 30.5511 0.864955 30.6721 0.985916C30.793 1.10688 30.861 1.27093 30.861 1.442C30.8554 1.56892 30.8179 1.69239 30.752 1.801L27.663 7.148Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('MailChimp')}}" desc="">
					<x-slot name="icon">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M21.434 13.696C21.5336 13.6843 21.6337 13.678 21.734 13.677C21.8343 13.678 21.9344 13.6843 22.034 13.696C22.1501 13.3279 22.1601 12.9345 22.063 12.561C21.919 11.873 21.725 11.461 21.323 11.521C20.921 11.581 20.906 12.084 21.05 12.773C21.1101 13.1052 21.2422 13.4203 21.437 13.696H21.434ZM17.982 14.243C18.27 14.372 18.446 14.453 18.516 14.38C18.638 14.255 18.292 13.775 17.735 13.536C17.4865 13.4424 17.2244 13.3904 16.959 13.382C16.5309 13.4017 16.1162 13.5372 15.759 13.774C15.566 13.915 15.385 14.11 15.41 14.229C15.465 14.47 16.055 14.054 16.867 14.005C17.2517 13.9922 17.6336 14.0742 17.979 14.244L17.982 14.243ZM17.402 14.574C16.817 14.666 16.435 14.995 16.534 15.225C16.592 15.247 16.609 15.277 16.87 15.173C17.1413 15.0796 17.4252 15.0276 17.712 15.019C17.8338 15.0206 17.9554 15.03 18.076 15.047C18.264 15.069 18.354 15.081 18.394 15.015C18.488 14.872 18.026 14.499 17.402 14.573V14.574ZM20.893 15.674C21.111 15.231 20.193 14.774 19.971 15.223C19.749 15.672 20.671 16.118 20.894 15.672L20.893 15.674ZM21.903 14.356C21.409 14.348 21.391 15.374 21.886 15.383C22.381 15.392 22.4 14.364 21.904 14.354L21.903 14.356ZM7.803 19.441C7.70755 19.4761 7.60347 19.4803 7.50549 19.4531C7.40751 19.4258 7.32058 19.3684 7.257 19.289C6.922 18.773 7.973 17.975 7.45 16.984C7.35456 16.7793 7.2103 16.6012 7.02992 16.4653C6.84953 16.3294 6.63853 16.2399 6.41545 16.2047C6.19238 16.1694 5.96406 16.1895 5.75056 16.2631C5.53706 16.3368 5.34491 16.4617 5.191 16.627C4.63 17.246 4.629 18.144 4.869 18.179C5.144 18.216 5.132 17.762 5.345 17.429C5.42553 17.3187 5.52957 17.2276 5.64959 17.1624C5.76961 17.0972 5.90262 17.0595 6.039 17.052C6.20036 17.0589 6.35743 17.106 6.496 17.189C7.243 17.678 6.584 18.334 6.643 19.034C6.733 20.109 7.83 20.089 8.034 19.614C8.04437 19.5935 8.05017 19.571 8.051 19.548C8.04958 19.5173 8.03915 19.4878 8.021 19.463C8.021 19.52 8.065 19.379 7.805 19.438L7.803 19.441ZM27.121 18.341C27.0046 17.8909 26.8586 17.4489 26.684 17.018C26.9876 16.6054 27.1343 16.0981 27.0976 15.5872C27.061 15.0762 26.8434 14.595 26.484 14.23C25.704 13.6343 24.7978 13.2255 23.835 13.035C23.735 12.301 24.135 9.252 22.448 7.685C23.6689 6.59049 24.4431 5.08392 24.622 3.454C24.622 0.930001 21.522 0.167 17.698 1.748L16.889 2.092C16.889 2.092 15.426 0.656999 15.404 0.636999C11.05 -3.16 -2.567 11.975 1.787 15.65L2.738 16.456C2.55931 16.9823 2.46021 17.5324 2.444 18.088C2.444 18.234 2.457 18.471 2.474 18.616C2.63002 19.6713 3.15096 20.6386 3.94624 21.3497C4.74152 22.0607 5.76085 22.4706 6.827 22.508C10.548 31.084 24.094 31.098 27.6 22.701C27.9431 21.8284 28.1414 20.9056 28.187 19.969C28.187 18.824 27.537 18.34 27.122 18.34L27.121 18.341ZM6.752 21.445C5.96406 21.3891 5.21797 21.0693 4.63424 20.5371C4.05052 20.0049 3.66325 19.2914 3.535 18.512C3.135 14.56 8.321 13.661 8.949 17.717C9.242 19.627 8.649 21.487 6.749 21.443L6.752 21.445ZM5.563 14.084C4.60838 14.2615 3.76023 14.8034 3.198 15.595C2.83153 15.3088 2.49634 14.9847 2.198 14.628C1.359 13.028 3.116 9.923 4.344 8.169C7.38 3.836 12.135 0.555999 14.337 1.151C14.9103 1.57704 15.4286 2.07248 15.88 2.626C14.3875 3.48075 12.969 4.45847 11.639 5.549C8.86388 7.77787 6.76072 10.7322 5.563 14.084ZM20.963 20.603C19.4543 20.7837 17.9243 20.6279 16.483 20.147C16.883 18.847 18.223 20.54 22.696 19.257C23.8828 18.9191 24.9971 18.3652 25.983 17.623C26.1891 18.1276 26.3429 18.652 26.442 19.188C26.678 19.145 27.36 19.155 27.179 20.355C26.9805 21.5959 26.3958 22.7426 25.508 23.632C24.9173 24.2333 24.2377 24.7402 23.493 25.135C23.0693 25.3494 22.6312 25.5342 22.182 25.688C18.733 26.814 15.202 25.575 14.063 22.916C13.9731 22.7119 13.8966 22.5021 13.834 22.288C13.5827 21.3924 13.5621 20.4479 13.774 19.5422C13.9859 18.6365 14.4235 17.7991 15.046 17.108C15.137 17.0293 15.1943 16.9187 15.206 16.799C15.19 16.6925 15.1473 16.5917 15.082 16.506C14.631 15.853 13.072 14.74 13.382 12.585C13.4692 11.8873 13.8037 11.2441 14.3248 10.7721C14.846 10.3001 15.5191 10.0308 16.222 10.013L16.544 10.032C17.091 10.064 17.568 10.132 18.019 10.153C18.4224 10.1889 18.8289 10.1413 19.2131 10.0131C19.5973 9.88496 19.951 9.67896 20.252 9.408C20.4844 9.16761 20.7813 8.99953 21.107 8.924C21.1957 8.90396 21.2861 8.8929 21.377 8.891C21.5903 8.90019 21.7983 8.96093 21.983 9.068C22.628 9.496 22.718 10.533 22.751 11.291C22.77 11.724 22.822 12.773 22.84 13.072C22.881 13.76 23.061 13.856 23.427 13.972C23.633 14.04 23.827 14.09 24.104 14.172C24.7188 14.2962 25.2941 14.5684 25.78 14.965C25.9357 15.1327 26.0417 15.3405 26.086 15.565C26.186 16.298 25.518 17.202 23.746 18.025C21.7098 18.9099 19.4687 19.2151 17.27 18.907C15.97 18.732 15.231 20.407 16.01 21.559C17.469 23.712 23.899 22.848 25.766 20.183C25.81 20.119 25.774 20.083 25.719 20.119C23.03 21.96 19.463 22.581 17.443 21.794C17.1906 21.7242 16.9619 21.5874 16.7809 21.3981C16.5999 21.2089 16.4735 20.9742 16.415 20.719C17.8886 21.2652 19.5063 21.2821 20.991 20.767C20.991 20.767 21.122 20.587 20.955 20.604L20.963 20.603ZM11.163 8.151C12.1738 6.95956 13.3939 5.96285 14.763 5.21C14.7704 5.20585 14.7786 5.20346 14.787 5.203C14.7995 5.203 14.8114 5.20795 14.8202 5.21677C14.829 5.22558 14.834 5.23754 14.834 5.25C14.8335 5.25843 14.8311 5.26664 14.827 5.274C14.6818 5.53052 14.5696 5.80435 14.493 6.089C14.4927 6.09266 14.4927 6.09634 14.493 6.1C14.493 6.11273 14.4981 6.12494 14.5071 6.13394C14.5161 6.14294 14.5283 6.148 14.541 6.148C14.551 6.1475 14.5606 6.1444 14.569 6.139C15.5162 5.51778 16.5997 5.13521 17.727 5.024C17.7403 5.024 17.753 5.02927 17.7624 5.03865C17.7717 5.04802 17.777 5.06074 17.777 5.074C17.7765 5.08151 17.7744 5.08884 17.771 5.09554C17.7675 5.10224 17.7628 5.10818 17.757 5.113C17.5726 5.26093 17.4049 5.4286 17.257 5.613C17.2516 5.62137 17.2485 5.63103 17.248 5.641C17.2482 5.65348 17.2532 5.6654 17.262 5.67432C17.2707 5.68324 17.2825 5.68849 17.295 5.689C18.2165 5.72057 19.1193 5.95696 19.938 6.381C19.987 6.409 19.952 6.504 19.897 6.492C18.4108 6.16844 16.8738 6.15499 15.3822 6.45249C13.8906 6.74999 12.4764 7.35204 11.228 8.221C11.2198 8.22584 11.2105 8.22859 11.201 8.229C11.188 8.229 11.1755 8.22384 11.1664 8.21465C11.1572 8.20546 11.152 8.193 11.152 8.18C11.1525 8.16881 11.1564 8.15803 11.163 8.149V8.151Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('PayPal')}}" desc="">
					<x-slot name="icon">
						<svg width="25" height="31" viewBox="0 0 25 31" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.368 18.075C7.742 16.064 9.424 16.56 12.221 16.515C16.578 16.463 19.865 14.73 21.251 10.695C22.643 6.776 22.289 3.154 18.415 1.652C15.908 0.675 15.083 0.913999 5.263 0.913999C4.95421 0.914324 4.65548 1.0238 4.41961 1.22308C4.18373 1.42236 4.0259 1.69861 3.974 2.003L0.200999 25.975C0.18408 26.0869 0.191635 26.2012 0.223142 26.3099C0.254649 26.4187 0.309359 26.5193 0.383501 26.6048C0.457643 26.6904 0.549455 26.7588 0.652606 26.8055C0.755758 26.8521 0.867797 26.8758 0.981 26.875H5.789C5.918 26.875 5.963 26.83 5.982 26.714C6.247 25.075 7.143 19.309 7.368 18.075ZM23.204 8.8C23.088 8.716 23.043 8.684 23.011 8.884C22.8759 9.61905 22.6864 10.343 22.444 11.05C19.872 18.385 12.744 17.75 9.263 17.75C9.17706 17.7429 9.09058 17.7531 9.00861 17.7798C8.92664 17.8066 8.85084 17.8495 8.78565 17.9059C8.72045 17.9623 8.66718 18.0312 8.62895 18.1085C8.59072 18.1858 8.5683 18.2699 8.563 18.356C7.104 27.398 6.814 29.287 6.814 29.287C6.79211 29.3881 6.79338 29.4929 6.81772 29.5934C6.84205 29.694 6.88881 29.7878 6.95451 29.8677C7.0202 29.9476 7.10313 30.0117 7.19707 30.055C7.29102 30.0984 7.39355 30.1199 7.497 30.118H11.59C11.8595 30.1137 12.119 30.0155 12.3236 29.8402C12.5283 29.6649 12.6653 29.4236 12.711 29.158C12.756 28.81 12.64 29.551 13.639 23.275C13.939 21.857 14.561 22.005 15.527 22.005C20.103 22.005 23.674 20.149 24.737 14.767C25.157 12.522 25.035 10.163 23.204 8.797V8.8Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Xbox Play')}}" desc="">
					<x-slot name="icon">
						<svg width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M23.904 20.509C22.099 18.292 17.272 13.587 16.663 13.451C16.347 13.38 13.479 15.945 11.417 18.13C7.788 21.984 5.668 25.362 5.668 27.289C5.668 28.249 6.074 28.733 7.868 29.906C10.0014 31.296 12.4353 32.1578 14.968 32.42C17.1471 32.6062 19.3418 32.3834 21.439 31.763C23.753 31.035 26.898 29.133 27.407 28.163C28.074 26.875 26.763 24.009 23.904 20.509ZM12.219 9.268C10.305 7.534 8.474 5.794 6.65 5.182C5.67 4.853 5.599 4.873 4.8 5.704C2.7918 7.91823 1.4451 10.6515 0.913001 13.593C0.617902 14.8706 0.526442 16.1868 0.642001 17.493C0.841254 20.269 1.73944 22.9494 3.253 25.285C3.865 26.226 4.033 26.4 3.853 25.923C3.6682 24.518 3.87947 23.0894 4.463 21.798C6.40524 17.256 9.01984 13.032 12.219 9.268ZM32.303 13.361C31.214 8.205 27.952 4.961 27.495 4.961C26.6674 5.096 25.8771 5.40256 25.175 5.861C23.6878 6.85875 22.3 7.99733 21.031 9.261C23.764 12.696 27.618 18.246 28.952 22.3C29.3601 23.3755 29.5227 24.5286 29.428 25.675C29.318 26.223 29.318 26.223 29.518 25.975C30.1403 25.0886 30.6879 24.1521 31.155 23.175C31.6865 21.9596 32.0887 20.6916 32.355 19.392C32.6285 17.3896 32.6116 15.3582 32.303 13.361ZM9.17 2.775C12.244 2.614 16.241 4.999 16.537 5.057C17.013 4.87646 17.4778 4.66776 17.929 4.432C22.048 2.432 23.988 2.769 24.851 2.808C22.5954 1.44802 20.0383 0.667444 17.4078 0.535881C14.7772 0.404319 12.155 0.925865 9.775 2.054C8.263 2.765 8.229 2.817 9.17 2.775Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Magento')}}" desc="">
					<x-slot name="icon">
						<svg width="29" height="34" viewBox="0 0 29 34" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M28.852 8.244L14.576 0L0.276001 8.256V24.75L4.356 27.109L4.33 10.616L14.552 4.716L24.763 10.615V27.103L28.849 24.75L28.852 8.244ZM16.6 27.103L14.563 28.289L12.513 27.115V10.615L8.434 12.975L8.44 29.468L14.557 33.006L20.686 29.468V12.968L16.6 10.609V27.103Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Amazon Pay')}}" desc="">
					<x-slot name="icon">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M16.703 8.487C13.564 8.603 5.778 9.487 5.778 16.06C5.778 23.118 14.692 23.408 17.605 18.844C18.506 19.9169 19.4818 20.9247 20.525 21.86L24.186 18.251C24.186 18.251 22.104 16.62 22.104 14.851V5.37C22.104 3.739 20.525 0.0699997 14.866 0.0699997C9.207 0.0699997 6.184 3.615 6.184 6.792L10.921 7.23C11.972 4.04 14.414 4.04 14.414 4.04C17.038 4.026 16.703 5.954 16.703 8.487ZM16.703 14.082C16.703 19.238 11.276 18.465 11.276 15.191C11.276 12.149 14.531 11.537 16.703 11.466V14.082ZM25.468 24.619C25.968 23.974 25.597 23.607 25.114 23.846C13.214 29.486 5.83 24.761 1.105 21.893C0.815001 21.7 0.312001 21.932 0.751001 22.428C2.33 24.328 7.486 28.938 14.222 28.938C16.2889 28.9965 18.3469 28.6449 20.2771 27.9036C22.2074 27.1623 23.9716 26.046 25.468 24.619ZM28.033 24.761C28.452 23.73 28.69 22.312 28.452 21.983C28.13 21.564 26.499 21.5 25.487 21.616C24.475 21.732 22.923 22.375 23.071 22.744C23.135 22.892 23.277 22.828 23.971 22.763C24.665 22.698 26.646 22.434 27.065 22.969C27.484 23.504 26.442 26.095 26.248 26.514C26.054 26.933 26.312 27.049 26.667 26.759C27.2688 26.2057 27.7353 25.5223 28.033 24.761Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('iOS Development')}}" desc="">
					<x-slot name="icon">
						<svg width="25" height="29" viewBox="0 0 25 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M20.729 15.319C20.7036 14.1981 20.9919 13.0924 21.5614 12.1266C22.1309 11.1608 22.9589 10.3733 23.952 9.853C23.3265 8.98389 22.508 8.27166 21.5608 7.77229C20.6136 7.27292 19.5635 7.00001 18.493 6.975C16.205 6.795 13.704 8.309 12.793 8.309C11.826 8.309 9.609 7.039 7.869 7.039C4.269 7.097 0.450001 9.907 0.450001 15.624C0.466527 17.4081 0.780152 19.177 1.378 20.858C2.203 23.223 5.178 29.024 8.287 28.928C9.907 28.892 11.055 27.775 13.169 27.775C15.218 27.775 16.282 28.931 18.093 28.931C21.225 28.886 23.92 23.614 24.706 21.242C23.5292 20.7622 22.5222 19.9424 21.8138 18.8873C21.1053 17.8322 20.7277 16.5899 20.729 15.319ZM17.081 4.735C17.6509 4.10732 18.083 3.36721 18.3494 2.56235C18.6159 1.7575 18.7108 0.905758 18.628 0.0620003C16.9407 0.242378 15.3809 1.04404 14.252 2.311C13.6737 2.92884 13.2288 3.6591 12.9449 4.45634C12.661 5.25357 12.5443 6.10071 12.602 6.945C13.4712 6.96338 14.332 6.77215 15.1116 6.38747C15.8913 6.00279 16.5668 5.43598 17.081 4.735Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Angular JS')}}" desc="">
					<x-slot name="icon">
						<svg width="27" height="29" viewBox="0 0 27 29" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.094 15.275H16.006L13.55 9.375L11.094 15.275ZM13.55 0.0629997L0.157 4.863L2.207 22.633L13.55 28.937L24.894 22.627L26.944 4.857L13.55 0.0629997ZM21.942 22.093H18.809L17.121 17.875H9.992L8.304 22.093H5.163L13.548 3.253L21.942 22.093Z"/>
						</svg>
					</x-slot>
				</x-box>
				<x-box style="4" title="{{__('Firefox')}}" desc="">
					<x-slot name="icon">
						<svg width="33" height="33" viewBox="0 0 33 33" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M32.516 15.564C32.508 15.464 32.501 15.364 32.501 15.264V15.256L32.478 14.956V14.948C32.3833 14.054 32.2256 13.1678 32.006 12.296C32.006 12.288 32.006 12.288 31.998 12.281L31.928 12.023C31.92 12.008 31.92 11.992 31.913 11.984C31.89 11.907 31.867 11.822 31.843 11.744C31.835 11.729 31.835 11.705 31.828 11.69C31.805 11.613 31.782 11.535 31.758 11.466C31.75 11.443 31.743 11.427 31.735 11.402C31.712 11.325 31.689 11.255 31.658 11.178L31.635 11.108C31.612 11.038 31.581 10.961 31.558 10.891C31.5515 10.8693 31.5438 10.8479 31.535 10.827C31.504 10.757 31.481 10.68 31.45 10.61C31.442 10.595 31.435 10.571 31.427 10.556C31.396 10.479 31.363 10.409 31.334 10.332C31.334 10.324 31.326 10.317 31.326 10.309C31.226 10.062 31.117 9.814 31.004 9.574L30.981 9.528C30.95 9.464 30.927 9.412 30.896 9.358C30.881 9.327 30.865 9.288 30.85 9.258C30.827 9.204 30.796 9.158 30.773 9.103C30.75 9.064 30.734 9.026 30.709 8.987C30.6792 8.9403 30.6534 8.89112 30.632 8.84C30.609 8.801 30.586 8.755 30.562 8.716C30.538 8.677 30.508 8.623 30.485 8.577C30.4616 8.53267 30.4359 8.48961 30.408 8.448C30.385 8.402 30.354 8.363 30.331 8.319C30.308 8.275 30.277 8.234 30.254 8.19C30.231 8.146 30.2 8.105 30.177 8.066C30.154 8.027 30.123 7.973 30.092 7.927C30.0686 7.88689 30.0429 7.84816 30.015 7.811L29.922 7.674C29.8986 7.6339 29.8729 7.59517 29.845 7.558C29.814 7.512 29.775 7.458 29.745 7.411C29.722 7.38 29.699 7.341 29.675 7.311L29.559 7.149C29.536 7.118 29.52 7.095 29.495 7.064C29.431 6.979 29.379 6.902 29.317 6.824C28.8464 6.22221 28.3405 5.64887 27.802 5.107C27.429 4.72699 27.0354 4.36778 26.623 4.031C26.365 3.807 26.097 3.598 25.823 3.397C25.3191 3.03336 24.789 2.70747 24.237 2.422C24.082 2.337 23.928 2.26 23.773 2.182C22.6253 1.64775 21.4288 1.22546 20.2 0.921C20.076 0.898 19.953 0.867 19.837 0.844H19.82C19.756 0.836 19.704 0.821 19.642 0.813C18.8325 0.670574 18.0143 0.582709 17.193 0.549999H16.508C15.5235 0.578862 14.5429 0.687552 13.576 0.875C11.6092 1.24279 9.76936 2.1083 8.232 3.389C8.162 3.453 8.108 3.497 8.077 3.528L8.046 3.559H8.054C8.05612 3.559 8.05816 3.55816 8.05966 3.55666C8.06116 3.55516 8.062 3.55312 8.062 3.551L8.054 3.559C8.05819 3.55503 8.06337 3.55227 8.069 3.551C9.0696 2.98885 10.1417 2.56467 11.256 2.29L11.635 2.197C11.658 2.189 11.689 2.189 11.712 2.182C11.82 2.159 11.929 2.136 12.045 2.112C12.06 2.112 12.084 2.104 12.099 2.104C14.1676 1.72636 16.2959 1.83845 18.3134 2.4313C20.3309 3.02415 22.1815 4.08128 23.717 5.518C24.3653 6.16028 24.9457 6.86769 25.449 7.629C26.3392 9.04691 26.8318 10.6781 26.8752 12.3517C26.9187 14.0253 26.5114 15.6798 25.696 17.142C23.476 20.558 18.519 21.736 15.448 18.742C14.482 17.7 13.9009 16.3593 13.801 14.942C13.801 14.92 13.801 14.885 13.801 14.863C13.8222 14.205 13.9575 13.5557 14.201 12.944C14.309 12.697 15.044 11.289 15.377 11.359C14.6771 11.2905 13.9724 11.4254 13.3473 11.7475C12.7222 12.0697 12.2034 12.5653 11.853 13.175C11.406 13.9904 11.1453 14.8947 11.0896 15.8229C11.0339 16.7511 11.1847 17.68 11.531 18.543C11.1626 17.7372 10.9001 16.8872 10.75 16.014C9.963 10.692 13.541 6.151 16.829 5.023C15.058 3.476 10.611 3.585 7.309 6.013C5.3672 7.46338 3.95242 9.50847 3.28 11.837C3.49583 9.94778 4.05967 8.11488 4.943 6.431C3.50032 7.4397 2.38444 8.84863 1.733 10.484C0.721351 13.0364 0.365178 15.8016 0.697001 18.527C0.720001 18.736 0.743001 18.937 0.767001 19.146C1.40681 22.8668 3.34056 26.242 6.2269 28.6756C9.11325 31.1093 12.7666 32.445 16.542 32.447C20.7865 32.4441 24.8561 30.7559 27.8564 27.7536C30.8566 24.7513 32.542 20.6805 32.542 16.436C32.54 16.144 32.532 15.85 32.516 15.564Z"/>
						</svg>
					</x-slot>
				</x-box>
			</div>
			<div class="flex justify-center mt-10">
				<p class="px-4 py-2 text-xs text-black text-opacity-50 border border-solid rounded-lg">{{__('Browse all features or visit the product page.')}}</p>
			</div>
		</div>
	</div>
</section>

<section class="py-10" id="how-it-works">
	<div class="container">
		<div class="p-10 py-24 bg-[#010101] rounded-[50px] shadow-xl text-white text-opacity-60 max-sm:px-5 bg-cover" style="background-image: url(/assets/img/site/steps-bg.png);">
			<div class="w-2/5 mx-auto text-center mb-14 max-xl:w-1/2 max-lg:w-8/12 max-md:w-full">
				<h2 class="text-[#E5E6E6] text-[64px] leading-none">{{__('So, how does it work?')}}</h2>
			</div>
			<div class="grid grid-cols-3 mb-20 gap-7 max-md:grid-cols-1">
				<div class="flex flex-col items-center font-medium text-center max-w-[270px] mx-auto text-xl group">
					<span class="w-16 h-16 grid place-content-center text-[26px] font-medium border-opacity-15 border-[2px] border-[#A2B2C9] rounded-full mb-10 transition-all group-hover:bg-white group-hover:border-white group-hover:text-black group-hover:-translate-y-2 group-hover:scale-110">1</span>
					<p>{!! __('<span class="text-white">Simply explain</span> what your content is about and adjust settings according to your needs.') !!}</p>
				</div>
				<div class="flex flex-col items-center font-medium text-center max-w-[270px] mx-auto text-xl group">
					<span class="w-16 h-16 grid place-content-center text-[26px] font-medium border-opacity-15 border-[2px] border-[#A2B2C9] rounded-full mb-10 transition-all group-hover:bg-white group-hover:border-white group-hover:text-black group-hover:-translate-y-2 group-hover:scale-110">2</span>
					<p>{!! __('<span class="text-white">Simply input some basic information</span> or keywords about your brand or product, and let our AI algorithms do the rest.') !!}</p>
				</div>
				<div class="flex flex-col items-center font-medium text-center max-w-[270px] mx-auto text-xl group">
					<span class="w-16 h-16 grid place-content-center text-[26px] font-medium border-opacity-15 border-[2px] border-[#A2B2C9] rounded-full mb-10 transition-all group-hover:bg-white group-hover:border-white group-hover:text-black group-hover:-translate-y-2 group-hover:scale-110">3</span>
					<p>{!! __('<span class="text-white">View, edit or export</span> your result with a few clicks. And you’re done!') !!}</p>
				</div>
			</div>
			<div class="flex justify-center text-[#A2B2C9]">
				<p class="px-4 py-2 text-[14px] rounded-lg bg-[#A2B2C9] bg-opacity-10">{{__('Need help?')}} <a class="text-[#FCA7FF]" href="#">{{__('Check our documentation.')}}</a></p>
			</div>
		</div>
	</div>
</section>

<section class="relative py-10" id="testimonials">
	<div class="absolute inset-x-0 top-0 -z-1 h-[150vh]" style="background: linear-gradient(to bottom, transparent, #F0EFFA, transparent)"></div>
	<div class="container relative">
		<div class="p-11 pb-24 border rounded-[50px] bg-contain bg-center bg-no-repeat max-sm:px-5" style="background-image: url(/assets/img/site/world-map.png)">
			<x-section-header
				width="w-1/2"
				title="{{__('Trusted by millions.')}}"
				subtitle=""
			>
				<h6 class="inline-block py-1 px-3 mb-6 rounded-md text-[13px] font-medium text-[#28027C] bg-[#28027C] bg-opacity-15">
					{{__('Testimonials')}}
					<span class="dot"></span>
					<span class="opacity-50">{{__('Trustpilot')}}</span>
				</h6>
			</x-section-header>
			<div class="w-8/12 mx-auto max-lg:11/12 max-md:w-full">
				<div class="mb-20">
					<div
						class="gap-5 mb-7 w-[235px] mx-auto"
						data-flickity='{ "asNavFor": ".testimonials-main-carousel", "contain": false, "pageDots": false, "cellAlign": "center", "prevNextButtons": false, "wrapAround": true, "draggable": false }'
						 style="mask-image: linear-gradient(to right, transparent 0%, #000 15%, #000 85%, transparent 100% ); -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 15%, #000 85%, transparent 100% );">
						@for ( $i = 0; $i <= 6; $i++ ) {{-- for demo --}}
						<div class="w1/3 text-center text-[15px] font-medium group py-[16px] cursor-pointer">
							<figure class="mx-auto mb-4 overflow-hidden rounded-full w-11 h-11 transition-all group-[&.is-nav-selected]:w-[77px] group-[&.is-nav-selected]:h-[77px] group-[&.is-nav-selected]:-translate-y-[16px] group-[&.is-nav-selected]:border-white group-[&.is-nav-selected]:border-[5px] group-[&.is-nav-selected]:shadow-sm">
								<img class="object-cover object-center w-full h-full" src="/assets/img/site/avatar-1.jpg" alt="{{__('martin-kopecky')}}">
							</figure>
							<div class="opacity-0 whitespace-nowrap transition-all group-[&.is-nav-selected]:opacity-100 group-[&.is-nav-selected]:-translate-y-[16px]">
								<p class="text-heading">{{__('martin-kopecky')}}</p>
								<p class="text-heading opacity-15">{{__('Designer')}}</p>
							</div>
						</div>
						@endfor
					</div>
					<div
					class="
						text-[26px] leading-[1.27em] text-heading text-center testimonials-main-carousel
						[&_.flickity-prev-next-button]:opacity-40 [&_.flickity-prev-next-button]:transition-all
						[&_.flickity-prev-next-button]:hover:bg-transparent [&_.flickity-prev-next-button]:hover:opacity-100
						[&_.flickity-prev-next-button.previous]:-left-16
						[&_.flickity-prev-next-button.next]:-right-16
						max-md:[&_.flickity-prev-next-button.previous]:-left-10
						max-md:[&_.flickity-prev-next-button.next]:-right-10"
					data-flickity='{ "contain": true, "wrapAround": true, "pageDots": false }'>
						@for ( $i = 0; $i <= 6; $i++ ) {{-- for demo --}}
						<div class="w-full shrink-0 grow-0 basis-full">
							<blockquote>
								<p>{{__('“Not only did it save me time, but it also helped me produce content that was more engaging and effective than what I had been creating on my own.”')}}</p>
							</blockquote>
						</div>
						@endfor
					</div>
				</div>
				<div class="flex justify-center gap-20 opacity-80 max-lg:gap-12 max-sm:gap-4 ">
					<svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg"> <mask id="mask0_13_15" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="37" height="35"> <path d="M36.482 0.0510025H0.643005V34.95H36.482V0.0510025Z" fill="white"/> </mask> <g mask="url(#mask0_13_15)"> <path d="M33.732 16.656V2.393C33.7236 1.76432 33.4662 1.16464 33.0163 0.725428C32.5664 0.286218 31.9607 0.0433249 31.332 0.0499997H4.72002C4.09132 0.0433249 3.48562 0.286218 3.03572 0.725428C2.58583 1.16464 2.32846 1.76432 2.32002 2.393V28.3C2.32898 28.9285 2.58652 29.5279 3.0363 29.967C3.48608 30.4061 4.09147 30.6491 4.72002 30.643H8.96901C9.40401 31.02 9.86101 31.379 10.335 31.715C13.3137 33.8262 16.876 34.9572 20.527 34.951C21.4527 34.9509 22.3771 34.88 23.292 34.739C26.2998 34.2876 29.0708 32.8446 31.165 30.639H31.327C31.9556 30.6451 32.5609 30.4021 33.0107 29.963C33.4605 29.5239 33.718 28.9245 33.727 28.296V26.776C34.7243 24.4948 35.0391 21.9734 34.633 19.517C34.4722 18.5249 34.1687 17.5612 33.732 16.656ZM5.87502 24.547L6.96703 24.604L6.36 25.504C6.18667 25.1913 6.02502 24.8723 5.87502 24.547ZM11.096 30.741C11.0884 30.7352 11.08 30.7304 11.071 30.727C10.689 30.453 10.324 30.168 9.97102 29.869L11.356 29.394L11.096 30.741ZM16.457 33.211L17.371 32.179L17.845 33.506C17.377 33.429 16.914 33.329 16.457 33.212V33.211ZM23.699 33.425L24.235 31.962L25.166 33.032C24.6849 33.1913 24.1951 33.3218 23.699 33.425ZM30.899 29.06L29.915 30.067L29.452 28.531L31.024 28.9C30.986 28.955 30.947 29.01 30.903 29.061L30.899 29.06ZM31.345 28.477L28.727 27.858L29.527 30.51C28.3942 31.5219 27.0842 32.3159 25.663 32.852L24.05 31L23.13 33.522C23.119 33.522 23.108 33.522 23.097 33.528C21.5428 33.7736 19.9612 33.7908 18.402 33.579L17.555 31.217L15.924 33.06C14.3726 32.606 12.8982 31.9217 11.55 31.03L12.007 28.649L9.53902 29.5C8.40711 28.4751 7.43023 27.291 6.63902 25.985L7.85701 24.166L5.644 24.047C5.15688 22.8993 4.80875 21.6974 4.60701 20.467C4.05055 16.9894 4.41634 13.4266 5.66786 10.1346C6.91938 6.84262 9.0128 3.93665 11.739 1.707L13.071 0.73H24.465L21.011 1.707C17.18 2.7472 13.8656 5.16044 11.6993 8.48692C9.53297 11.8134 8.66618 15.8206 9.26402 19.745C9.50281 21.2002 10.0309 22.5928 10.817 23.8404C11.6031 25.0881 12.6314 26.1655 13.841 27.009C15.7987 28.3978 18.1407 29.1417 20.541 29.137C21.1486 29.1384 21.7555 29.0926 22.356 29C24.0911 28.6992 25.6759 27.8274 26.8588 26.5229C28.0417 25.2184 28.7549 23.5561 28.885 21.8C28.9005 21.0741 28.7655 20.3528 28.4886 19.6817C28.2117 19.0105 27.7988 18.4038 27.276 17.9C25.6723 16.455 23.5772 15.6773 21.419 15.726C20.4302 15.7213 19.4473 15.878 18.509 16.19C18.3134 16.2581 18.1082 16.2949 17.901 16.299C17.8192 16.3122 17.7355 16.3089 17.6549 16.2893C17.5744 16.2697 17.4985 16.2343 17.4318 16.185C17.3652 16.1357 17.309 16.0736 17.2666 16.0024C17.2242 15.9311 17.1965 15.8521 17.185 15.77C17.026 15.07 17.934 14.185 18.236 13.894C18.319 13.813 18.397 13.734 18.464 13.661C19.5613 12.721 20.8998 12.1069 22.328 11.888C24.8555 11.4937 27.4372 12.0972 29.528 13.571C30.5519 14.284 31.422 15.1954 32.0868 16.2512C32.7516 17.307 33.1975 18.4856 33.398 19.717C33.6489 21.2403 33.5971 22.7982 33.2455 24.3014C32.8939 25.8047 32.2495 27.2239 31.349 28.478L31.345 28.477Z" fill="#343434"/> <path d="M21.839 12.359C21.5664 12.3661 21.302 12.4534 21.0788 12.61C20.8556 12.7667 20.6836 12.9856 20.5843 13.2395C20.4849 13.4935 20.4627 13.771 20.5203 14.0375C20.578 14.304 20.7129 14.5476 20.9083 14.7378C21.1037 14.9279 21.3508 15.0562 21.6188 15.1066C21.8868 15.157 22.1636 15.1273 22.4148 15.0211C22.6659 14.9149 22.8801 14.737 23.0306 14.5097C23.1812 14.2823 23.2613 14.0157 23.261 13.743C23.2589 13.5586 23.2204 13.3765 23.1478 13.207C23.0751 13.0376 22.9697 12.8842 22.8375 12.7556C22.7054 12.627 22.5492 12.5257 22.3778 12.4577C22.2064 12.3896 22.0233 12.3561 21.839 12.359ZM21.839 14.642C21.6619 14.6381 21.4899 14.582 21.3445 14.4807C21.1992 14.3794 21.087 14.2375 21.0219 14.0728C20.9569 13.908 20.9418 13.7277 20.9788 13.5545C21.0157 13.3812 21.103 13.2227 21.2296 13.0989C21.3563 12.975 21.5166 12.8912 21.6906 12.8581C21.8647 12.825 22.0446 12.8439 22.2079 12.9126C22.3712 12.9813 22.5105 13.0966 22.6086 13.2441C22.7066 13.3917 22.759 13.5649 22.759 13.742C22.7577 13.8615 22.7329 13.9796 22.6859 14.0895C22.639 14.1994 22.5708 14.299 22.4854 14.3826C22.4 14.4661 22.2989 14.5321 22.188 14.5766C22.0771 14.6211 21.9585 14.6433 21.839 14.642Z" fill="#343434"/> </g> </svg>
					<svg width="43" height="35" viewBox="0 0 43 35" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M39.464 15.891C38.3885 14.8149 37.1829 13.8773 35.875 13.1C35.8233 13.0698 35.7793 13.0282 35.7463 12.9782C35.7134 12.9283 35.6924 12.8714 35.685 12.812C35.5465 11.9261 35.5056 11.0278 35.563 10.133C35.552 8.294 35.569 6.455 35.552 4.622C35.5454 3.97641 35.2881 3.35866 34.8345 2.89925C34.3809 2.43984 33.7665 2.17476 33.121 2.16C33.038 2.154 32.955 2.154 32.872 2.154C28.254 2.154 23.6383 2.156 19.025 2.16C18.551 2.13048 18.0816 2.04967 17.625 1.919C15.9817 1.53206 14.3593 1.06145 12.764 0.508999C12.346 0.373999 11.916 0.279999 11.495 0.167999H11.172C11.1916 0.231514 11.2185 0.292576 11.252 0.349999C11.691 0.895999 12.136 1.443 12.58 1.989L12.705 2.153H5.184C4.57429 2.13251 3.97789 2.33415 3.50571 2.72043C3.03354 3.1067 2.71772 3.65132 2.617 4.253C2.59043 4.41829 2.57872 4.58562 2.582 4.753C2.582 6.839 2.582 8.924 2.582 11.016C2.59065 11.0788 2.57776 11.1426 2.54543 11.1971C2.51309 11.2516 2.46324 11.2935 2.404 11.316C2.20769 11.412 2.01853 11.5219 1.838 11.645C2.075 11.634 2.31499 11.616 2.57899 11.598V11.78C2.57899 12.567 2.57899 13.355 2.57899 14.136C2.58382 14.1872 2.57386 14.2387 2.55029 14.2845C2.52671 14.3302 2.49052 14.3682 2.446 14.394C2.105 14.629 1.77 14.858 1.446 15.099C1.191 15.287 0.951002 15.481 0.705002 15.675V15.745C1.265 15.857 1.825 15.974 2.385 16.08C2.542 16.109 2.585 16.18 2.585 16.338C2.585 19.2933 2.585 22.2467 2.585 25.198C2.585 27.554 2.585 29.914 2.585 32.278C2.57323 32.8734 2.77561 33.4533 3.15533 33.9122C3.53504 34.371 4.06685 34.6782 4.654 34.778C4.82395 34.8112 4.99685 34.827 5.17 34.825H32.97C33.3044 34.8376 33.6379 34.7827 33.9506 34.6636C34.2633 34.5444 34.5488 34.3635 34.79 34.1315C35.0312 33.8996 35.2231 33.6214 35.3544 33.3136C35.4857 33.0057 35.5536 32.6746 35.554 32.34C35.578 30.901 35.56 29.467 35.56 28.034V22.688C36.1298 22.7794 36.6492 23.0687 37.027 23.505C37.647 24.227 38.257 24.956 38.871 25.691C39.182 26.067 39.487 26.449 39.802 26.831C39.893 26.937 40.002 27.025 40.11 27.131C40.142 27.09 40.163 27.078 40.172 27.055C40.672 25.98 41.201 24.928 41.678 23.835C41.8864 23.3374 42.0432 22.8196 42.146 22.29C42.2409 21.6229 42.1894 20.9432 41.995 20.298C41.572 18.6245 40.6963 17.0997 39.464 15.891ZM40.887 23.091C40.7529 23.9763 40.5066 24.8409 40.154 25.664C40.095 25.535 40.039 25.406 39.974 25.282C39.5058 24.4164 38.9581 23.5962 38.338 22.832C37.7727 22.1501 37.0745 21.5904 36.286 21.187C34.7299 20.3533 33.1094 19.646 31.44 19.072C31.4083 19.0588 31.373 19.0566 31.34 19.066C32.386 19.63 33.433 20.194 34.481 20.758C34.472 20.775 34.464 20.799 34.455 20.817C33.865 20.659 33.266 20.517 32.682 20.335C31.766 20.065 32.045 20.194 29.943 19.565C26.135 18.537 25.527 19.218 25.527 19.218C27.7678 19.3592 29.9329 20.083 31.808 21.318C31.708 21.564 31.624 21.806 31.535 22.046C31.399 22.41 31.265 22.774 31.12 23.138C31.0354 23.3539 31.0386 23.5944 31.129 23.808C31.885 25.764 32.673 27.721 33.423 29.678C33.4639 29.7875 33.4889 29.9024 33.497 30.019V33.385C33.4966 33.4551 33.4847 33.5247 33.462 33.591C33.462 33.597 33.453 33.603 33.45 33.609C33.2916 33.7811 33.0952 33.9137 32.8764 33.9964C32.6577 34.079 32.4226 34.1094 32.19 34.085C26.043 34.067 19.896 34.079 13.752 34.079C10.8147 34.079 7.87833 34.077 4.943 34.073C4.7941 34.0749 4.64529 34.0649 4.498 34.043C4.17269 33.9982 3.87577 33.8337 3.66531 33.5817C3.45485 33.3296 3.34598 33.0081 3.36 32.68C3.345 32.351 3.36 32.022 3.36 31.687C3.36298 31.6417 3.37595 31.5977 3.39799 31.558C4.12552 30.0922 4.76793 28.5857 5.322 27.046C5.366 26.929 5.411 26.817 5.447 26.694C4.90323 27.6253 4.21036 28.461 3.396 29.168L3.331 29.15C3.364 28.668 3.37 28.181 3.438 27.699C3.705 25.799 3.989 23.899 4.268 22.006C4.26362 21.9823 4.2576 21.9589 4.25 21.936C3.96 22.888 3.675 23.81 3.393 24.727H3.36V24.456C3.36 22.688 3.36 20.925 3.36 19.156C3.35954 19.046 3.38381 18.9373 3.431 18.838C3.831 17.957 4.249 17.081 4.658 16.206C4.68868 16.1592 4.70723 16.1055 4.71198 16.0498C4.71673 15.994 4.70753 15.938 4.6852 15.8867C4.66288 15.8354 4.62814 15.7905 4.58411 15.756C4.54008 15.7214 4.48814 15.6984 4.433 15.689C4.018 15.601 3.603 15.53 3.188 15.466C2.921 15.419 2.654 15.395 2.34 15.36C2.44 15.295 2.506 15.255 2.571 15.207C4.64082 13.8485 6.51546 12.2137 8.143 10.348C8.226 10.254 8.383 10.16 8.297 10.001C8.211 9.842 8.042 9.878 7.909 9.907C7.381 10.019 6.85533 10.1423 6.332 10.277C6.08 10.336 5.832 10.424 5.576 10.477L11.066 5.859L6.346 2.625C6.352 2.607 6.358 2.596 6.364 2.578C9.408 3.113 12.452 3.641 15.54 4.178C14.591 3.162 13.676 2.178 12.73 1.17C12.807 1.188 12.849 1.194 12.884 1.205C16.011 2.239 19.132 3.279 22.262 4.295C25.2531 5.2264 28.0911 6.59233 30.685 8.349C31.7416 9.04843 32.6668 9.92855 33.418 10.949C33.7941 11.4552 34.0608 12.0341 34.201 12.649C34.2042 12.6789 34.2009 12.7092 34.1912 12.7377C34.1815 12.7662 34.1658 12.7922 34.145 12.814C33.9022 12.9553 33.7054 13.1637 33.578 13.414C33.3345 13.8556 33.2156 14.3551 33.234 14.859C33.246 15.141 33.14 15.288 32.849 15.288C32.6114 15.2901 32.3746 15.2622 32.144 15.205C31.844 15.129 31.544 15.017 31.244 14.917C31.1945 14.9041 31.1458 14.8884 31.098 14.87C31.7228 15.3304 32.4518 15.6293 33.22 15.74C33.3904 15.7705 33.5654 15.7642 33.7332 15.7216C33.901 15.679 34.0577 15.6011 34.193 15.493C34.2387 15.4612 34.2716 15.4141 34.2857 15.3602C34.2998 15.3063 34.2943 15.2491 34.27 15.199C34.2018 15.0298 34.1885 14.8434 34.2321 14.6663C34.2758 14.4891 34.374 14.3302 34.513 14.212C34.5312 14.1882 34.554 14.1682 34.58 14.1532C34.606 14.1382 34.6347 14.1286 34.6644 14.1248C34.6942 14.1209 34.7244 14.1231 34.7533 14.131C34.7823 14.1389 34.8094 14.1525 34.833 14.171C36.1718 14.9527 37.4065 15.9001 38.508 16.991C39.1498 17.6251 39.714 18.333 40.189 19.1C40.9316 20.2879 41.1823 21.7183 40.888 23.088L40.887 23.091Z" fill="#343434"/> <path d="M25.128 13.452C24.642 13.376 24.156 13.288 23.673 13.188C23.6279 13.172 23.5787 13.1728 23.5341 13.19C23.4895 13.2072 23.4526 13.2399 23.43 13.282C23.3521 13.3928 23.2425 13.4774 23.1155 13.5245C22.9886 13.5716 22.8503 13.5791 22.719 13.546C22.595 13.5378 22.4773 13.4882 22.3848 13.4051C22.2924 13.3221 22.2304 13.2104 22.209 13.088C22.188 12.83 22.037 12.8 21.853 12.753C21.7941 12.7436 21.7365 12.7278 21.681 12.706C21.6445 12.6875 21.6025 12.6833 21.5631 12.6942C21.5237 12.7051 21.4898 12.7304 21.468 12.765C21.2611 12.9867 21.1123 13.2561 21.0347 13.5492C20.957 13.8422 20.953 14.15 21.023 14.445C21.1489 14.9157 21.4311 15.3296 21.8232 15.6189C22.2153 15.9082 22.6941 16.0556 23.181 16.037C23.1872 16.052 23.1912 16.0679 23.193 16.084C23.5006 16.0275 23.8037 15.949 24.1 15.849C24.5298 15.6933 24.8912 15.3914 25.121 14.9962C25.3508 14.601 25.4343 14.1376 25.357 13.687C25.356 13.626 25.3318 13.5677 25.2892 13.524C25.2466 13.4803 25.189 13.4545 25.128 13.452Z" fill="#343434"/> </svg>
					<svg width="42" height="37" viewBox="0 0 42 37" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M38.981 19.446C38.9724 19.4394 38.9646 19.4316 38.958 19.423C38.166 18.585 36.939 18.213 34.979 18.213C34.1127 18.2191 33.2473 18.2688 32.386 18.362L32.4 2.745C32.3968 2.15523 32.1598 1.5908 31.741 1.17555C31.3222 0.760298 30.7558 0.528136 30.166 0.529998H2.612C2.02233 0.527872 1.45595 0.760012 1.0374 1.17538C0.618846 1.59074 0.382387 2.15533 0.380005 2.745V30.052C0.380922 30.344 0.439391 30.6331 0.552094 30.9025C0.664796 31.1719 0.829519 31.4165 1.03682 31.6222C1.24412 31.8279 1.48994 31.9908 1.76022 32.1014C2.03051 32.212 2.31995 32.2683 2.612 32.267H10.012C10.1576 32.4941 10.3158 32.7127 10.486 32.922C12.437 35.275 15.85 36.471 20.632 36.471C23.9579 36.3853 27.2701 36.013 30.532 35.358L31.445 35.198C34.474 34.677 36.125 34.016 37.156 32.929C37.6638 32.7793 38.103 32.4562 38.397 32.016C38.4548 31.8995 38.4882 31.7725 38.4952 31.6427C38.5023 31.5129 38.4828 31.383 38.438 31.261C38.3605 31.0684 38.2315 30.901 38.065 30.777C38.1771 30.6207 38.2774 30.4562 38.365 30.285C38.7397 30.1284 39.0549 29.8566 39.265 29.509C39.3242 29.3928 39.3583 29.2655 39.3652 29.1352C39.3721 29.005 39.3516 28.8748 39.305 28.753C39.1995 28.5031 39.0137 28.2954 38.777 28.163C38.768 28.008 38.757 27.857 38.737 27.708C38.791 27.625 38.837 27.542 38.89 27.459C39.5627 27.2804 40.1486 26.8658 40.541 26.291C40.6126 26.1501 40.6538 25.9958 40.6619 25.838C40.67 25.6802 40.6448 25.5224 40.588 25.375C40.4613 25.1194 40.2786 24.8956 40.0536 24.7202C39.8285 24.5448 39.5668 24.4224 39.288 24.362C39.3014 24.2895 39.3363 24.2226 39.388 24.17C39.513 23.941 39.688 23.703 39.836 23.446C40.609 23.2215 41.2784 22.7323 41.727 22.064C41.8138 21.8906 41.8637 21.7012 41.8737 21.5076C41.8837 21.314 41.8535 21.1204 41.785 20.939C41.394 19.9 39.943 19.56 38.981 19.446ZM38.394 23.418L34.973 23.918L38.256 24.279C38.4793 24.8832 38.5147 25.5408 38.3575 26.1654C38.2002 26.7901 37.8577 27.3525 37.375 27.779C37.375 27.779 37.39 27.814 37.413 27.871L34.713 28.226L37.572 28.501C37.6682 29.0453 37.5675 29.6061 37.288 30.083L35.039 30.733L36.861 30.684C36.861 31.036 36.512 32.533 31.277 33.434C25.312 34.461 8.583 38.062 11.177 25.078C13.771 12.094 27.777 6.439 30.631 6.439V18.939C29.084 19.182 27.713 19.448 26.505 19.715C25.169 19.534 21.984 19.18 20.321 19.681L24.112 20.308C22.4225 20.7145 20.7817 21.3019 19.218 22.06C22.667 21.1256 26.1749 20.4241 29.718 19.96C33.238 19.574 37.118 19.823 37.898 20.644C39.22 22.047 38.796 22.969 38.394 23.418Z" fill="#343434"/> </svg>
					<svg width="42" height="43" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M41.729 11.655C40.553 12.197 38.516 14.722 38.516 14.722C38.2363 14.6493 37.9489 14.6097 37.66 14.604V6.961C37.6581 6.68247 37.6015 6.40702 37.4932 6.15039C37.3849 5.89376 37.2271 5.66097 37.0289 5.46532C36.8306 5.26966 36.5958 5.11497 36.3377 5.01008C36.0797 4.90519 35.8035 4.85216 35.525 4.854H25.625C25.5685 4.46087 25.4585 4.07731 25.298 3.714C25.298 3.714 27.476 1.305 27.818 0.068002C27.818 0.068002 27.744 -0.814998 24.403 3.787V4.854H9.19299C8.91446 4.85216 8.63829 4.90519 8.38025 5.01008C8.12221 5.11497 7.88734 5.26966 7.68909 5.46532C7.49083 5.66097 7.33308 5.89376 7.22479 6.15039C7.11651 6.40702 7.05982 6.68247 7.05798 6.961V12.476L5.43298 13.108C5.43298 13.108 5.25198 13.747 7.05798 13.428V21C5.26298 23.057 2.65797 26.085 2.38397 26.651C1.95897 27.519 1.49198 30.86 0.944977 31.599C0.944977 31.599 1.88799 32.084 3.14499 26.811L7.05399 22.895V32.954C7.05582 33.2325 7.11251 33.508 7.22079 33.7646C7.32908 34.0212 7.48683 34.254 7.68509 34.4497C7.88334 34.6453 8.11821 34.8 8.37625 34.9049C8.63429 35.0098 8.91046 35.0628 9.189 35.061H24.023L19.479 40.389C14.279 42.119 14.853 43 14.853 43C15.546 42.395 18.874 41.621 19.713 41.123C20.353 40.746 24.156 36.859 25.9 35.061H33.211C33.2425 35.1215 33.2945 35.1688 33.3578 35.1942C33.421 35.2197 33.4914 35.2218 33.556 35.2L33.586 35.061H35.521C35.7995 35.0628 36.0757 35.0098 36.3337 34.9049C36.5918 34.8 36.8266 34.6453 37.0249 34.4497C37.2231 34.254 37.3809 34.0212 37.4892 33.7646C37.5975 33.508 37.6541 33.2325 37.656 32.954V15.765L38.586 15.605C42.626 11.579 41.729 11.655 41.729 11.655ZM28.802 5.514C30.028 5.454 30.602 5.414 30.679 6.353C29.6027 6.20563 28.5067 6.37122 27.522 6.83C27.5319 6.49026 27.6689 6.1666 27.9059 5.92295C28.1429 5.6793 28.4626 5.53338 28.802 5.514ZM11.779 28.034C11.5962 27.8845 11.4216 27.7253 11.256 27.557C11.156 27.337 11.068 27.122 10.977 26.907C10.7333 26.5052 10.5662 26.0617 10.484 25.599C6.73598 14.599 15.704 11.841 21.1 10.754C21.4182 12.7493 22.333 14.6015 23.724 16.067L23.597 15.967L14.097 30.257C13.2585 29.5878 12.4827 28.8438 11.779 28.034ZM16.979 32.322C16.0135 31.7143 15.0842 31.0509 14.196 30.335L25.543 17.484C27.455 18.5469 29.6286 19.0475 31.813 18.928C31.813 18.928 31.824 19.111 31.839 19.007C31.834 24.372 31.231 35.923 16.979 32.322ZM32.53 18.108C22.571 18.308 21.794 9.752 21.794 9.752C23.1785 9.27527 24.6647 9.17422 26.101 9.45916C27.5373 9.7441 28.8723 10.4048 29.97 11.374C33.316 13.8 32.53 18.108 32.53 18.108ZM33.778 13.036C33.348 14.509 34.946 12.572 27.293 8.166L27.378 7.959C28.2137 7.7101 29.0944 7.65033 29.9561 7.78404C30.8178 7.91774 31.639 8.24156 32.36 8.732C33.0674 9.1656 33.5981 9.83605 33.8578 10.6241C34.1174 11.4122 34.0891 12.2668 33.778 13.036ZM35.1 12.182C35.3564 11.1397 35.3011 10.0451 34.941 9.034C35.895 8.919 35.961 9.482 36.152 10.68C36.1951 11.0164 36.1112 11.3568 35.9166 11.6346C35.7221 11.9124 35.4309 12.1076 35.1 12.182Z" fill="#343434"/> </svg>
					<svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg"> <mask id="mask0_13_15" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="37" height="35"> <path d="M36.482 0.0510025H0.643005V34.95H36.482V0.0510025Z" fill="white"/> </mask> <g mask="url(#mask0_13_15)"> <path d="M33.732 16.656V2.393C33.7236 1.76432 33.4662 1.16464 33.0163 0.725428C32.5664 0.286218 31.9607 0.0433249 31.332 0.0499997H4.72002C4.09132 0.0433249 3.48562 0.286218 3.03572 0.725428C2.58583 1.16464 2.32846 1.76432 2.32002 2.393V28.3C2.32898 28.9285 2.58652 29.5279 3.0363 29.967C3.48608 30.4061 4.09147 30.6491 4.72002 30.643H8.96901C9.40401 31.02 9.86101 31.379 10.335 31.715C13.3137 33.8262 16.876 34.9572 20.527 34.951C21.4527 34.9509 22.3771 34.88 23.292 34.739C26.2998 34.2876 29.0708 32.8446 31.165 30.639H31.327C31.9556 30.6451 32.5609 30.4021 33.0107 29.963C33.4605 29.5239 33.718 28.9245 33.727 28.296V26.776C34.7243 24.4948 35.0391 21.9734 34.633 19.517C34.4722 18.5249 34.1687 17.5612 33.732 16.656ZM5.87502 24.547L6.96703 24.604L6.36 25.504C6.18667 25.1913 6.02502 24.8723 5.87502 24.547ZM11.096 30.741C11.0884 30.7352 11.08 30.7304 11.071 30.727C10.689 30.453 10.324 30.168 9.97102 29.869L11.356 29.394L11.096 30.741ZM16.457 33.211L17.371 32.179L17.845 33.506C17.377 33.429 16.914 33.329 16.457 33.212V33.211ZM23.699 33.425L24.235 31.962L25.166 33.032C24.6849 33.1913 24.1951 33.3218 23.699 33.425ZM30.899 29.06L29.915 30.067L29.452 28.531L31.024 28.9C30.986 28.955 30.947 29.01 30.903 29.061L30.899 29.06ZM31.345 28.477L28.727 27.858L29.527 30.51C28.3942 31.5219 27.0842 32.3159 25.663 32.852L24.05 31L23.13 33.522C23.119 33.522 23.108 33.522 23.097 33.528C21.5428 33.7736 19.9612 33.7908 18.402 33.579L17.555 31.217L15.924 33.06C14.3726 32.606 12.8982 31.9217 11.55 31.03L12.007 28.649L9.53902 29.5C8.40711 28.4751 7.43023 27.291 6.63902 25.985L7.85701 24.166L5.644 24.047C5.15688 22.8993 4.80875 21.6974 4.60701 20.467C4.05055 16.9894 4.41634 13.4266 5.66786 10.1346C6.91938 6.84262 9.0128 3.93665 11.739 1.707L13.071 0.73H24.465L21.011 1.707C17.18 2.7472 13.8656 5.16044 11.6993 8.48692C9.53297 11.8134 8.66618 15.8206 9.26402 19.745C9.50281 21.2002 10.0309 22.5928 10.817 23.8404C11.6031 25.0881 12.6314 26.1655 13.841 27.009C15.7987 28.3978 18.1407 29.1417 20.541 29.137C21.1486 29.1384 21.7555 29.0926 22.356 29C24.0911 28.6992 25.6759 27.8274 26.8588 26.5229C28.0417 25.2184 28.7549 23.5561 28.885 21.8C28.9005 21.0741 28.7655 20.3528 28.4886 19.6817C28.2117 19.0105 27.7988 18.4038 27.276 17.9C25.6723 16.455 23.5772 15.6773 21.419 15.726C20.4302 15.7213 19.4473 15.878 18.509 16.19C18.3134 16.2581 18.1082 16.2949 17.901 16.299C17.8192 16.3122 17.7355 16.3089 17.6549 16.2893C17.5744 16.2697 17.4985 16.2343 17.4318 16.185C17.3652 16.1357 17.309 16.0736 17.2666 16.0024C17.2242 15.9311 17.1965 15.8521 17.185 15.77C17.026 15.07 17.934 14.185 18.236 13.894C18.319 13.813 18.397 13.734 18.464 13.661C19.5613 12.721 20.8998 12.1069 22.328 11.888C24.8555 11.4937 27.4372 12.0972 29.528 13.571C30.5519 14.284 31.422 15.1954 32.0868 16.2512C32.7516 17.307 33.1975 18.4856 33.398 19.717C33.6489 21.2403 33.5971 22.7982 33.2455 24.3014C32.8939 25.8047 32.2495 27.2239 31.349 28.478L31.345 28.477Z" fill="#343434"/> <path d="M21.839 12.359C21.5664 12.3661 21.302 12.4534 21.0788 12.61C20.8556 12.7667 20.6836 12.9856 20.5843 13.2395C20.4849 13.4935 20.4627 13.771 20.5203 14.0375C20.578 14.304 20.7129 14.5476 20.9083 14.7378C21.1037 14.9279 21.3508 15.0562 21.6188 15.1066C21.8868 15.157 22.1636 15.1273 22.4148 15.0211C22.6659 14.9149 22.8801 14.737 23.0306 14.5097C23.1812 14.2823 23.2613 14.0157 23.261 13.743C23.2589 13.5586 23.2204 13.3765 23.1478 13.207C23.0751 13.0376 22.9697 12.8842 22.8375 12.7556C22.7054 12.627 22.5492 12.5257 22.3778 12.4577C22.2064 12.3896 22.0233 12.3561 21.839 12.359ZM21.839 14.642C21.6619 14.6381 21.4899 14.582 21.3445 14.4807C21.1992 14.3794 21.087 14.2375 21.0219 14.0728C20.9569 13.908 20.9418 13.7277 20.9788 13.5545C21.0157 13.3812 21.103 13.2227 21.2296 13.0989C21.3563 12.975 21.5166 12.8912 21.6906 12.8581C21.8647 12.825 22.0446 12.8439 22.2079 12.9126C22.3712 12.9813 22.5105 13.0966 22.6086 13.2441C22.7066 13.3917 22.759 13.5649 22.759 13.742C22.7577 13.8615 22.7329 13.9796 22.6859 14.0895C22.639 14.1994 22.5708 14.299 22.4854 14.3826C22.4 14.4661 22.2989 14.5321 22.188 14.5766C22.0771 14.6211 21.9585 14.6433 21.839 14.642Z" fill="#343434"/> </g> </svg>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="relative py-10" id="pricing">
	<div class="container relative">
		<div class="p-11 border rounded-[50px] relative max-lg:px-5">
			<x-section-header
				mb="7"
				title="{{__('Flexible Pricing.')}}"
				subtitle="{{__('Flexible and affording plans tailored to your needs. Save up to %20 for a limited time.')}}"
			/>
			<div class="text-center lqd-tabs">
				<div class="lqd-tabs-triggers inline-flex flex-wrap gap-2 mx-auto mb-9 text-[15px] font-medium leading-none border rounded-md">
					<x-tabs-trigger target="#pricing-annual" style="3" label="{{__('Annual Billing')}}" badge="Save 30%" active="true" />
					<x-tabs-trigger target="#pricing-monthly" style="3" label="{{__('Monthly Billing')}}" />
				</div>
				<div class="px-10 lqd-tabs-content-wrap max-xl:px-0">
					<div class="lqd-tabs-content">
						<div id="pricing-annual">
							<div class="grid grid-cols-3 gap-2 max-md:grid-cols-1">
								<x-price-table
									title="{{__('Free Trial')}}"
									price="0"
									period="month"
									buttonLabel="{{__('Select Basic')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}"
									inactiveFeatures="{{__('Full API Integration')}}; {{__('VIP Support')}}"
								/>
								<x-price-table
									featured="true"
									title="{{__('Professional Plan')}}"
									price="7.90"
									period="month"
									buttonLabel="{{__('Select Standard')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}; {{__('Full API Integration')}}"
									inactiveFeatures="{{__('VIP Support')}}"
								/>
								<x-price-table
									title="{{__('Enterprise')}}"
									price="9.99"
									period="month"
									buttonLabel="{{__('Contact Us')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}; {{__('Full API Integration')}}; {{__('VIP Support')}}"
									inactiveFeatures=""
								/>
							</div>
						</div>
						<div class="hidden" id="pricing-monthly">
							<div class="grid grid-cols-3 gap-2">
								<x-price-table
									title="{{__('Free Trial')}}"
									price="0"
									period="month"
									buttonLabel="{{__('Select Basic')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}"
									inactiveFeatures="{{__('Full API Integration')}}; {{__('VIP Support')}}"
								/>
								<x-price-table
									featured="true"
									title="{{__('Professional Plan')}}"
									price="7.90"
									period="month"
									buttonLabel="{{__('Select Standard')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}; {{__('Full API Integration')}}"
									inactiveFeatures="{{__('VIP Support')}}"
								/>
								<x-price-table
									title="{{__('Enterprise')}}"
									price="9.99"
									period="month"
									buttonLabel="{{__('Contact Us')}}"
									buttonLink="#"
									activeFeatures="{{__('Unlimited')}}; {{__('30+ Languages')}}; {{__('Custom Templates')}}; {{__('Full API Integration')}}; {{__('VIP Support')}}"
									inactiveFeatures=""
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="flex justify-center mt-9">
				<div class="flex w-[305px] gap-5 text-sm text-[#002A40] text-opacity-60">
					<span class="inline-flex items-center justify-center w-10 h-10 rounded-xl shrink-0 bg-[#6C727B] bg-opacity-10">
						<svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.346 6.323H4.024V3.449C4.024 2.839 4.26632 2.25399 4.69765 1.82266C5.12899 1.39132 5.714 1.149 6.324 1.149C6.934 1.149 7.51901 1.39132 7.95035 1.82266C8.38168 2.25399 8.624 2.839 8.624 3.449C8.624 3.6015 8.68458 3.74775 8.79241 3.85559C8.90025 3.96342 9.0465 4.024 9.199 4.024C9.3515 4.024 9.49775 3.96342 9.60558 3.85559C9.71342 3.74775 9.774 3.6015 9.774 3.449C9.774 2.534 9.41052 1.65648 8.76352 1.00948C8.11652 0.362482 7.23899 -0.000999451 6.324 -0.000999451C5.409 -0.000999451 4.53148 0.362482 3.88448 1.00948C3.23748 1.65648 2.874 2.534 2.874 3.449V6.323H2.3C1.69001 6.323 1.10499 6.56532 0.673653 6.99666C0.242319 7.42799 0 8.013 0 8.623V14.946C0 15.248 0.0594935 15.5471 0.175079 15.8262C0.290665 16.1052 0.460078 16.3588 0.673653 16.5723C0.887227 16.7859 1.14078 16.9553 1.41983 17.0709C1.69888 17.1865 1.99796 17.246 2.3 17.246H10.347C10.649 17.246 10.9481 17.1865 11.2272 17.0709C11.5062 16.9553 11.7598 16.7859 11.9733 16.5723C12.1869 16.3588 12.3563 16.1052 12.4719 15.8262C12.5875 15.5471 12.647 15.248 12.647 14.946V8.622C12.6469 8.31996 12.5872 8.0209 12.4715 7.7419C12.3558 7.46291 12.1863 7.20943 11.9726 6.99595C11.759 6.78247 11.5053 6.61316 11.2262 6.49769C10.9472 6.38223 10.648 6.32287 10.346 6.323Z" fill="#6C727B"/>
						</svg>
					</span>
					<p>{!! __('<strong>Safe Payment:</strong> Use Stripe, ApplePay, AmazonPay, PayPal or Credit Card.') !!}</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-10" id="faq">
	<div class="container">
		<div class="p-11 pb-16 border rounded-[50px] relative max-sm:px-5">
			<x-section-header
				mb="9"
				width="w-1/2"
				title="{{__('Have a question?')}}"
				subtitle="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
			>
				<h6 class="inline-block py-1 px-3 mb-6 rounded-md text-[13px] font-medium text-[#60027C] bg-[#60027C] bg-opacity-15">
					{{__('FAQ')}}
					<span class="dot"></span>
					<span class="opacity-50">{{__('Help Center')}}</span>
				</h6>
			</x-section-header>
			<div class="w-5/6 mx-auto lqd-accordion max-lg:w-full">
				<x-accordion-item
					id="faq-1"
					title="{{ __('How does it generate responses?') }}"
					content="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
				/>
				<x-accordion-item
					id="faq-2"
					title="{{ __('Is AI copywriting more cost-effective than hiring human writers?') }}"
					content="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
				/>
				<x-accordion-item
					id="faq-3"
					title="{{ __('How do you handle my data?') }}"
					content="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
				/>
				<x-accordion-item
					id="faq-4"
					title="{{ __('Can AI copywriting be customized to my brand and audience?') }}"
					content="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
				/>
				<x-accordion-item
					id="faq-5"
					title="{{ __('What kind of support is available for AI copywriting tools?') }}"
					content="{{__('Our support team will get assistance from AI-powered suggestions, making it quicker than ever to handle support requests.')}}"
				/>
			</div>
		</div>
	</div>
</section>

<section class="pt-10 pb-24">
	<div class="container">
		<div class="grid grid-cols-4 gap-10 max-md:grid-cols-2">
			<a href="#" class="flex flex-col items-center text-center text-heading group">
				<svg class="mb-5 h-[4.8125rem] transition-transform duration-300 group-hover:-translate-y-2 group-hover:scale-110" width="75" height="73" viewBox="0 0 75 73" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M24.95 58.562C24.95 58.216 24.559 57.975 24.108 58.021C23.672 58.021 23.326 58.262 23.326 58.562C23.326 58.908 23.672 59.148 24.168 59.103C24.604 59.104 24.95 58.863 24.95 58.562ZM20.273 57.885C20.168 58.185 20.473 58.532 20.92 58.622C21.084 58.7025 21.2727 58.7161 21.4466 58.6602C21.6204 58.6042 21.7658 58.483 21.852 58.322C21.942 58.022 21.652 57.675 21.205 57.54C21.0338 57.4787 20.8464 57.4797 20.6759 57.543C20.5054 57.6063 20.3627 57.7268 20.273 57.885ZM26.92 57.629C26.484 57.734 26.183 58.02 26.228 58.366C26.273 58.666 26.664 58.866 27.115 58.757C27.566 58.648 27.852 58.366 27.807 58.065C27.762 57.78 27.356 57.584 26.92 57.629ZM36.82 -0.000991821C15.961 -0.000991821 0.00400121 15.835 0.00400121 36.699C-0.0601398 44.6112 2.36682 52.3431 6.94111 58.7994C11.5154 65.2556 18.0051 70.109 25.491 72.672C27.416 73.018 28.091 71.83 28.091 70.852C28.091 69.92 28.046 64.776 28.046 61.618C28.046 61.618 17.519 63.874 15.308 57.136C15.308 57.136 13.594 52.76 11.127 51.636C11.127 51.636 7.683 49.275 11.368 49.32C12.5673 49.4815 13.7138 49.9151 14.7199 50.5876C15.7261 51.26 16.5651 52.1536 17.173 53.2C20.466 59.005 25.986 57.336 28.136 56.343C28.3301 54.4256 29.1808 52.6342 30.544 51.272C22.137 50.34 13.655 49.121 13.655 34.654C13.655 30.518 14.798 28.443 17.204 25.796C16.0631 22.4602 16.2032 18.8193 17.597 15.581C20.74 14.603 27.974 19.642 27.974 19.642C31.0495 18.7913 34.226 18.361 37.417 18.363C40.6083 18.3606 43.7852 18.7905 46.861 19.641C46.861 19.641 54.095 14.588 57.238 15.58C58.6312 18.8175 58.7705 22.4574 57.629 25.792C60.035 28.454 61.509 30.529 61.509 34.65C61.509 49.163 52.651 50.321 44.244 51.268C45.629 52.456 46.797 54.712 46.797 58.246C46.797 63.315 46.757 69.586 46.757 70.819C46.757 71.797 47.449 72.985 49.357 72.639C64.397 67.646 74.597 53.372 74.597 36.696C74.597 15.836 57.675 7.62939e-06 36.816 7.62939e-06L36.82 -0.000991821ZM14.62 51.869C14.42 52.019 14.47 52.369 14.725 52.651C14.966 52.892 15.311 52.997 15.507 52.801C15.707 52.651 15.657 52.301 15.402 52.019C15.159 51.78 14.814 51.672 14.618 51.872L14.62 51.869ZM12.997 50.652C12.892 50.852 13.042 51.088 13.343 51.239C13.3915 51.2768 13.4473 51.3042 13.507 51.3195C13.5666 51.3348 13.6287 51.3375 13.6894 51.3277C13.7501 51.3178 13.8082 51.2955 13.8599 51.2622C13.9116 51.2289 13.9559 51.1852 13.99 51.134C14.095 50.934 13.945 50.698 13.644 50.547C13.34 50.456 13.097 50.501 12.997 50.652ZM17.87 56.006C17.629 56.206 17.72 56.653 18.07 56.938C18.416 57.284 18.852 57.329 19.048 57.088C19.248 56.888 19.153 56.441 18.848 56.156C18.513 55.81 18.062 55.765 17.866 56.006H17.87ZM16.156 53.795C15.915 53.945 15.915 54.336 16.156 54.682C16.397 55.028 16.803 55.182 16.998 55.028C17.1154 54.9012 17.1806 54.7348 17.1806 54.562C17.1806 54.3892 17.1154 54.2228 16.998 54.096C16.784 53.75 16.397 53.599 16.152 53.795H16.156Z"/>
				</svg>
				<span class="text-[15px] font-medium">{{__('Open Source')}}</span>
				<span class="text-[14px]">{{__('GitHub Repo')}}</span>
			</a>
			<a href="#" class="flex flex-col items-center text-center text-heading group">
				<svg class="mb-5 h-[4.8125rem] transition-transform duration-300 group-hover:-translate-y-2 group-hover:scale-110" width="77" height="63" viewBox="0 0 77 63" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M69.085 15.586C72.1635 13.3309 74.8394 10.5725 77 7.427C74.1097 8.68975 71.0468 9.51319 67.913 9.87C71.2079 7.91157 73.6749 4.81807 74.851 1.17C71.7582 3.01206 68.3687 4.3026 64.834 4.984C63.3566 3.40593 61.5701 2.149 59.5857 1.29153C57.6014 0.434059 55.4617 -0.00558246 53.3 -9.19208e-07C51.2277 -0.000395249 49.1756 0.407555 47.261 1.20053C45.3464 1.99351 43.6068 3.15598 42.1417 4.62151C40.6765 6.08704 39.5145 7.82692 38.722 9.74171C37.9295 11.6565 37.5221 13.7087 37.523 15.781C37.5297 16.9962 37.6607 18.2075 37.914 19.396C31.6358 19.0773 25.4948 17.4425 19.889 14.5978C14.2833 11.7531 9.33804 7.76186 5.374 2.883C3.9585 5.29783 3.21608 8.0479 3.224 10.847C3.2221 13.4479 3.86353 16.0089 5.09114 18.3018C6.31875 20.5948 8.09443 22.5485 10.26 23.989C7.75798 23.8936 5.31391 23.2083 3.127 21.989V22.189C3.12463 25.8335 4.38361 29.3665 6.6902 32.1882C8.99679 35.01 12.2088 36.9465 15.781 37.669C14.4247 38.0217 13.0294 38.2021 11.628 38.206C10.63 38.1996 9.63381 38.118 8.648 37.962C9.66065 41.0956 11.6266 43.8347 14.2713 45.7969C16.916 47.7591 20.1074 48.8464 23.4 48.907C17.8133 53.2914 10.9127 55.6663 3.811 55.649C2.53786 55.6567 1.26535 55.5899 0 55.449C7.22622 60.0968 15.6411 62.5585 24.233 62.538C53.255 62.538 69.133 38.5 69.133 17.638C69.134 16.954 69.134 16.27 69.085 15.586Z"/>
				</svg>
				<span class="text-[15px] font-medium">{{__('Follow Us on Twitter')}}</span>
				<span class="text-[14px]">{{__('Latest news and updates')}}</span>
			</a>
			<a href="#" class="flex flex-col items-center text-center text-heading group">
				<svg class="mb-5 h-[4.8125rem] transition-transform duration-300 group-hover:-translate-y-2 group-hover:scale-110" width="75" height="75" viewBox="0 0 75 75" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M37.282 16.979L35.943 14.618C35.7413 14.2681 35.4727 13.9615 35.1524 13.7154C34.8322 13.4694 34.4666 13.2889 34.0766 13.1841C33.6866 13.0794 33.2798 13.0525 32.8794 13.105C32.479 13.1574 32.0928 13.2883 31.743 13.49C31.3932 13.6917 31.0865 13.9603 30.8404 14.2806C30.5944 14.6008 30.4139 14.9664 30.3091 15.3564C30.2044 15.7464 30.1775 16.1532 30.23 16.5536C30.2824 16.954 30.4133 17.3402 30.615 17.69L33.743 23.119L23.732 40.472H15.912C15.5089 40.4712 15.1096 40.55 14.737 40.7039C14.3644 40.8578 14.0259 41.0838 13.7408 41.3688C13.4558 41.6539 13.2298 41.9924 13.0759 42.365C12.922 42.7376 12.8432 43.1369 12.844 43.54C12.8432 43.9431 12.922 44.3424 13.0759 44.715C13.2298 45.0876 13.4558 45.4261 13.7408 45.7112C14.0259 45.9962 14.3644 46.2222 14.737 46.3761C15.1096 46.53 15.5089 46.6088 15.912 46.608H43.812C45.147 44.095 43.418 40.472 40.335 40.472H30.815L43.974 17.686C44.1763 17.3363 44.3075 16.9501 44.3603 16.5496C44.4131 16.1491 44.3863 15.7421 44.2815 15.3519C44.1767 14.9618 43.996 14.5961 43.7496 14.276C43.5033 13.9558 43.1962 13.6873 42.846 13.486C42.4963 13.2837 42.1101 13.1525 41.7096 13.0997C41.3091 13.0469 40.9021 13.0737 40.5119 13.1785C40.1218 13.2833 39.7561 13.464 39.436 13.7104C39.1158 13.9567 38.8473 14.2638 38.646 14.614L37.282 16.979ZM25.446 49.764C24.7614 48.8512 23.7975 48.1868 22.7009 47.8718C21.6042 47.5568 20.4346 47.6085 19.37 48.019L17.17 51.809C16.9677 52.1587 16.8365 52.5449 16.7837 52.9454C16.731 53.3459 16.7577 53.7529 16.8625 54.1431C16.9673 54.5332 17.148 54.8989 17.3944 55.219C17.6407 55.5392 17.9478 55.8077 18.298 56.009C18.6477 56.2113 19.0339 56.3425 19.4344 56.3953C19.8349 56.448 20.2419 56.4213 20.6321 56.3165C21.0222 56.2117 21.3879 56.031 21.708 55.7846C22.0282 55.5383 22.2967 55.2312 22.498 54.881L25.446 49.764ZM50.846 40.485C46.8313 33.5223 43.819 28.309 41.809 24.845C39.989 26.345 38.155 30.8 40.726 35.237C43.24 39.5983 47.0197 46.1453 52.065 54.878C52.2667 55.2278 52.5353 55.5345 52.8556 55.7806C53.1758 56.0266 53.5414 56.2071 53.9314 56.3119C54.3214 56.4166 54.7282 56.4435 55.1286 56.391C55.529 56.3386 55.9152 56.2077 56.265 56.006C56.6149 55.8043 56.9215 55.5357 57.1676 55.2154C57.4136 54.8952 57.5941 54.5296 57.6989 54.1396C57.8036 53.7496 57.8305 53.3428 57.778 52.9424C57.7256 52.542 57.5947 52.1558 57.393 51.806L54.397 46.621H58.834C59.2367 46.6213 59.6356 46.5421 60.0076 46.3879C60.3797 46.2338 60.7177 46.0077 61.0022 45.7227C61.2868 45.4377 61.5123 45.0993 61.6658 44.727C61.8194 44.3547 61.8979 43.9557 61.897 43.553C61.8979 43.1498 61.8192 42.7505 61.6653 42.3778C61.5115 42.0052 61.2855 41.6666 61.0005 41.3815C60.7154 41.0965 60.3768 40.8705 60.0042 40.7167C59.6315 40.5628 59.2322 40.4841 58.829 40.485H50.846ZM37.297 1.34133e-06C32.3983 -0.0013125 27.5474 0.962579 23.0214 2.83661C18.4953 4.71065 14.3829 7.4581 10.919 10.922C7.4551 14.3859 4.70765 18.4983 2.83362 23.0244C0.959584 27.5504 -0.00431086 32.4013 -0.00299701 37.3C-0.0035226 42.1982 0.960956 47.0485 2.83534 51.5738C4.70973 56.0991 7.4573 60.2109 10.9211 63.6741C14.3849 67.1374 18.4971 69.8843 23.0227 71.758C27.5484 73.6316 32.3988 74.5953 37.297 74.594C42.1957 74.5953 47.0466 73.6314 51.5726 71.7574C56.0987 69.8833 60.2111 67.1359 63.675 63.672C67.1389 60.2081 69.8863 56.0957 71.7604 51.5696C73.6344 47.0436 74.5983 42.1927 74.597 37.294C74.5975 32.3958 73.633 27.5455 71.7587 23.0202C69.8843 18.4949 67.1367 14.3831 63.6729 10.9199C60.2091 7.45661 56.0969 4.7097 51.5713 2.83604C47.0456 0.962382 42.1952 -0.00131222 37.297 1.34133e-06ZM69.781 37.3C69.7805 45.9149 66.3578 54.1767 60.2659 60.268C54.174 66.3593 45.9119 69.7813 37.297 69.781C33.0311 69.7811 28.807 68.941 24.8658 67.3086C20.9246 65.6761 17.3435 63.2834 14.3271 60.2669C11.3106 57.2505 8.91786 53.6694 7.28543 49.7282C5.65301 45.787 4.81287 41.5629 4.813 37.297C4.81287 33.0311 5.65301 28.807 7.28543 24.8658C8.91786 20.9246 11.3106 17.3435 14.3271 14.3271C17.3435 11.3106 20.9246 8.91786 24.8658 7.28543C28.807 5.653 33.0311 4.81287 37.297 4.813C41.5629 4.81287 45.787 5.653 49.7282 7.28543C53.6694 8.91786 57.2505 11.3106 60.267 14.3271C63.2834 17.3435 65.6761 20.9246 67.3086 24.8658C68.941 28.807 69.7811 33.0311 69.781 37.297V37.3Z"/>
				</svg>
				<span class="text-[15px] font-medium">{{__('Visit App Store')}}</span>
				<span class="text-[14px]">{{__('Download for iOS Devices')}}</span>
			</a>
			<a href="#" class="flex flex-col items-center text-center text-heading group">
				<svg class="mb-5 h-[4.8125rem] transition-transform duration-300 group-hover:-translate-y-2 group-hover:scale-110" width="68" height="57" viewBox="0 0 68 57" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M67.177 5.144C68.077 0.917998 65.658 -0.736001 62.891 0.301999L3.126 23.326C-0.95 24.92 -0.888999 27.206 2.434 28.244L17.714 33.026L53.206 10.678C54.875 9.565 56.394 10.178 55.146 11.295L26.436 37.237L25.323 53.013C25.9243 53.017 26.5183 52.8816 27.0585 52.6173C27.5986 52.3531 28.0701 51.9672 28.436 51.49L35.91 44.301L51.401 55.72C54.243 57.314 56.244 56.472 57.011 53.088L67.177 5.144Z" />
				</svg>
				<span class="text-[15px] font-medium">{{__('Telegram Channel')}}</span>
				<span class="text-[14px]">{{__('Join the Community')}}</span>
			</a>
		</div>
	</div>
</section>

@endsection
