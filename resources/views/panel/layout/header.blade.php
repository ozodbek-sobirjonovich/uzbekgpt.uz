<!-- Sidebar -->
<button class="navbar-expander w-[17px] h-[40px] fixed top-[18px] left-[--navbar-width] p-0 border-0 bg-[--lqd-header-search-bg] rounded-[0_20px_20px_0] z-10 transition-colors max-lg:hidden hover:bg-[--lqd-faded-out]">
	<svg class="w-full h-auto transition-transform group-[.navbar-shrinked]/body:-scale-x-100 group-hover:-translate-x-[2px] group-[.navbar-shrinked]/body:group-hover:translate-x-[2px]" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--lqd-heading-color)" fill="none" stroke-linecap="round" stroke-linejoin="round">
		<path d="M15 6l-6 6l6 6"></path>
	</svg>
</button>
<aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent !overflow-hidden max-lg:absolute max-lg:top-[65px] max-lg:left-0 max-lg:w-full max-lg:z-10 max-lg:!bg-white max-lg:!shadow-xl max-lg:min-h-0 max-lg:p-0 max-lg:max-h-[85vh] max-lg:overflow-y-auto max-lg:group-[.theme-dark]/body:!bg-[--tblr-body-bg] group-[.navbar-shrinked]/body:!overflow-visible">
    <div class="navbar-inner h-full overflow-x-hidden overflow-y-auto max-h-[inherit] max-lg:w-full">
        <div class="container-fluid p-0 max-lg:w-full">
            <h1 class="navbar-brand navbar-brand-autodark max-w-full max-lg:hidden group-[.navbar-shrinked]/body:text-center">
                <a class="px-[1.428em] group-[.navbar-shrinked]/body:px-0" href="{{ LaravelLocalization::localizeUrl( route('dashboard.index') ) }}">
                    <img src="/{{$setting->logo_path}}" width="110" height="32" alt="{{$setting->site_name}}" class="navbar-brand-image h-auto group-[.navbar-shrinked]/body:hidden">
                    <img src="/{{$setting->logo_path}}" width="110" height="32" alt="{{$setting->site_name}}" class="navbar-brand-image h-auto hidden group-[.navbar-shrinked]/body:block">
                </a>
            </h1>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav max-lg:py-4">
                    <li>
                        <div class="nav-link-label transition-all">
							<span class="text-[10px] font-medium uppercase tracking-widest bg-[--lqd-faded-out-more] px-[0.5em] py-[0.35em] rounded-[3px]">
								{{__('User')}}
							</span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{activeRoute('dashboard.user.index')}}" href="{{route('dashboard.user.index')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M4 4h6v6h-6z"></path> <path d="M14 4h6v6h-6z"></path> <path d="M4 14h6v6h-6z"></path> <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> </svg>
							</span>
                            <span class="nav-link-title flex items-center grow transition-all">
								{{__('Dashboard')}}
							</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{activeRoute('dashboard.user.openai.documents.all')}}" href="{{route('dashboard.user.openai.documents.all')}}">
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path> <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path> <path d="M10 12l4 0"></path> </svg>
							</span>
                            <span class="nav-link-title flex items-center grow transition-all">
								{{__('Documents')}}
							</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{activeRoute('dashboard.user.openai.list')}}" href="{{route('dashboard.user.openai.list')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path> <path d="M9 7l6 0"></path> <path d="M9 11l6 0"></path> <path d="M9 15l4 0"></path> </svg>
							</span>
                            <span class="nav-link-title flex items-center grow transition-all">
								{{__('AI Writer')}}
							</span>
                        </a>
                    </li>
					<li class="nav-item">
						<a class="nav-link {{ route('dashboard.user.openai.generator', 'ai_image_generator') == url()->current() ? 'active' : '' }}" href="{{route('dashboard.user.openai.generator', 'ai_image_generator')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M15 8h.01"></path> <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z"></path> <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path> <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path> </svg>
							</span>
							<span class="nav-link-title flex items-center grow transition-all">
								{{__('AI Image')}}
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ route('dashboard.user.openai.chat.list') == url()->current() ? 'active' : '' }}" href="{{route('dashboard.user.openai.chat.list')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path> <path d="M12 12l0 .01"></path> <path d="M8 12l0 .01"></path> <path d="M16 12l0 .01"></path> </svg>
							</span>
							<span class="nav-link-title flex items-center grow transition-all">
								{{__('AI Chat')}}
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ route('dashboard.user.openai.generator.workbook', 'ai_code_generator') == url()->current() ? 'active' : '' }}" href="{{route('dashboard.user.openai.generator.workbook', 'ai_code_generator')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M8 9l3 3l-3 3"></path> <path d="M13 15l3 0"></path> <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path> </svg>
							</span>
							<span class="nav-link-title flex items-center grow transition-all">
								{{__('AI Code')}}
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ route('dashboard.user.openai.generator', 'ai_speech_to_text') == url()->current() ? 'active' : '' }}" href="{{route('dashboard.user.openai.generator', 'ai_speech_to_text')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M9 2m0 3a3 3 0 0 1 3 -3h0a3 3 0 0 1 3 3v5a3 3 0 0 1 -3 3h0a3 3 0 0 1 -3 -3z"></path> <path d="M5 10a7 7 0 0 0 14 0"></path> <path d="M8 21l8 0"></path> <path d="M12 17l0 4"></path> </svg>
							</span>
							<span class="nav-link-title flex items-center grow transition-all">
								{{__('AI Speech to Text')}}
							</span>
						</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link {{activeRoute('dashboard.user.affiliates.index')}}" href="{{route('dashboard.user.affiliates.index')}}" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path> <path d="M12 3v3m0 12v3"></path> </svg>
							</span>
                            <span class="nav-link-title flex items-center grow transition-all">
								{{__('Affiliates')}}
							</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{activeRoute('dashboard.support.list')}}" href="{{route('dashboard.support.list')}}" >
						<span class="nav-link-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path> <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> <path d="M15 15l3.35 3.35"></path> <path d="M9 15l-3.35 3.35"></path> <path d="M5.65 5.65l3.35 3.35"></path> <path d="M18.35 5.65l-3.35 3.35"></path> </svg>
						</span>
                            <span class="nav-link-title flex items-center grow transition-all">
							{{__('Support')}}
						</span>
                        </a>
                    </li>

                    <li>
                        <hr>
                    </li>

                    <li>
                        <div class="nav-link-label transition-all">
						<span class="text-[10px] font-medium uppercase tracking-widest bg-[--lqd-faded-out-more] px-[0.5em] py-[0.35em] rounded-[3px]">
							{{__('Links')}}
						</span>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link {{activeRoute('dashboard.user.openai.list.favorites')}}" href="{{route('dashboard.user.openai.list.favorites')}}">
						<span class="nav-link-icon inline-flex items-center justify-center w-[24px] h-[24px] shrink-0 rounded-[6px] bg-[#7A8193] text-white text-[10px] font-normal">
							{{mb_substr(__('Favorites'), 0, 1)}}
						</span>
                            <span class="nav-link-title flex items-center grow transition-all">
							{{__('Favorites')}}
						</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link {{activeRoute('dashboard.user.openai.documents.all')}}" href="{{route('dashboard.user.openai.documents.all')}}">
						<span class="nav-link-icon inline-flex items-center justify-center w-[24px] h-[24px] shrink-0 rounded-[6px] bg-[#658C8E] text-white text-[10px] font-normal">
							{{mb_substr(__('Workbook'), 0, 1)}}
						</span>
                            <span class="nav-link-title flex items-center grow transition-all">
							{{__('Workbook')}}
						</span>
                        </a>
                    </li>

                    @if(Auth::user()->type == 'admin')
                        <!-- Admin sidebar -->
                        <li>
                            <hr>
                        </li>
                        <li>
                            <div class="nav-link-label transition-all">
							<span class="text-[10px] font-medium uppercase tracking-widest bg-[--lqd-faded-out-more] px-[0.5em] py-[0.35em] rounded-[3px]">
								{{__('Admin')}}
							</span>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{activeRoute('dashboard.admin.index')}}" href="{{route('dashboard.admin.index')}}" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M4 4h6v6h-6z"></path> <path d="M14 4h6v6h-6z"></path> <path d="M4 14h6v6h-6z"></path> <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> </svg>
								</span>
                                <span class="nav-link-title flex items-center grow transition-all">
									{{__('Dashboard')}}
								</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{activeRoute('dashboard.admin.users.index')}}" href="{{route('dashboard.admin.users.index')}}" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path> <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path> <path d="M16 3.13a4 4 0 0 1 0 7.75"></path> <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path> </svg>
								</span>
                                <span class="nav-link-title flex items-center grow transition-all">
									{{__('User Management')}}
								</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{activeRoute('dashboard.support.list')}}" href="{{route('dashboard.support.list')}}" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path> <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> <path d="M15 15l3.35 3.35"></path> <path d="M9 15l-3.35 3.35"></path> <path d="M5.65 5.65l3.35 3.35"></path> <path d="M18.35 5.65l-3.35 3.35"></path> </svg>
								</span>
                                <span class="nav-link-title flex items-center grow transition-all">
									{{__('Support Requests')}}
								</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{activeRouteBulk(['dashboard.admin.openai.list', 'dashboard.admin.openai.custom.list'])}}" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M13 5h8"></path> <path d="M13 9h5"></path> <path d="M13 15h8"></path> <path d="M13 19h5"></path> <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path> <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path> </svg>
								</span>
                                <span class="nav-link-title flex items-center grow transition-all">
								{{__('Templates')}}
								</span>
                            </a>
                            <div class="dropdown-menu {{activeRouteBulkShow(['dashboard.admin.openai.list', 'dashboard.admin.openai.custom.list'])}}">
                                <a class="dropdown-item {{activeRoute('dashboard.admin.openai.list')}}" href="{{route('dashboard.admin.openai.list')}}">
                                    {{__('Built-in Templates')}}
                                </a>
                                <a class="dropdown-item {{activeRoute('dashboard.admin.openai.custom.list')}}" href="{{route('dashboard.admin.openai.custom.list')}}">
                                    {{__('Custom Templates')}}
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link {{activeRoute('dashboard.admin.frontend.settings')}}" href="{{route('dashboard.admin.frontend.settings')}}">
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M3 19l18 0"></path> <path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z"></path> </svg>
								</span>
									<span class="nav-link-title flex items-center grow transition-all">
									{{__('Frontend Settings')}}
								</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{activeRouteBulk(['dashboard.admin.finance.plans.index'])}}" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
							<span class="nav-link-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path> <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path> </svg>
							</span>
                                <span class="nav-link-title flex items-center grow transition-all">
								{{__('Finance')}}
							</span>
                            </a>
                            <div class="dropdown-menu {{activeRouteBulkShow(['dashboard.admin.finance.plans.index'])}}">
                                <a class="dropdown-item {{activeRoute('dashboard.admin.finance.plans.index')}}" href="{{route('dashboard.admin.finance.plans.index')}}">
                                    {{__('Payment Plans')}}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{activeRoute('dashboard.admin.affiliates.index')}}" href="{{route('dashboard.admin.affiliates.index')}}" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M14 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> <path d="M12 9.765a3 3 0 1 0 0 4.47"></path> <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path> </svg>
								</span>
									<span class="nav-link-title flex items-center grow transition-all">
									{{__('Affiliates')}}
								</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{activeRouteBulk(['dashboard.admin.settings.general', 'dashboard.admin.settings.invoice', 'dashboard.admin.settings.payment', 'dashboard.admin.settings.openai', 'dashboard.admin.settings.affiliate'])}}" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
								<span class="nav-link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M4 8h4v4h-4z"></path> <path d="M6 4l0 4"></path> <path d="M6 12l0 8"></path> <path d="M10 14h4v4h-4z"></path> <path d="M12 4l0 10"></path> <path d="M12 18l0 2"></path> <path d="M16 5h4v4h-4z"></path> <path d="M18 4l0 1"></path> <path d="M18 9l0 11"></path> </svg>
								</span>
									<span class="nav-link-title flex items-center grow transition-all">
									{{__('Settings')}}
								</span>
                            </a>
                            <div class="dropdown-menu {{activeRouteBulkShow(['dashboard.admin.settings.general', 'dashboard.admin.settings.invoice', 'dashboard.admin.settings.payment', 'dashboard.admin.settings.openai', 'dashboard.admin.settings.affiliate'])}}">
                                <a class="dropdown-item {{activeRoute('dashboard.admin.settings.general')}}" href="{{route('dashboard.admin.settings.general')}}">
                                    {{__('General Settings')}}
                                </a>
                                <a class="dropdown-item {{activeRoute('dashboard.admin.settings.invoice')}}" href="{{route('dashboard.admin.settings.invoice')}}">
                                    {{__('Invoice Settings')}}
                                </a>
                                <a class="dropdown-item {{activeRoute('dashboard.admin.settings.payment')}}" href="{{route('dashboard.admin.settings.payment')}}">
                                    {{__('Payment Stripe Settings')}}
                                </a>
                                <a class="dropdown-item {{activeRoute('dashboard.admin.settings.openai')}}" href="{{route('dashboard.admin.settings.openai')}}">
                                    {{__('OpenAI Settings')}}
                                </a>
                                <a class="dropdown-item {{activeRoute('dashboard.admin.settings.affiliate')}}" href="{{route('dashboard.admin.settings.affiliate')}}">
                                    {{__('Affiliate Settings')}}
                                </a>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item h-[auto] transition-all group-[.navbar-shrinked]/body:opacity-0 group-[.navbar-shrinked]/body:translate-x-3 group-[.navbar-shrinked]/body:h-0 group-[.navbar-shrinked]/body:overflow-hidden">
                        <hr>
                        <div class="nav-link-label transition-all mb-2">
							<span class="text-[10px] font-medium uppercase tracking-widest bg-[--lqd-faded-out-more] px-[0.5em] py-[0.35em] rounded-[3px]">
								{{__('Credits')}}
							</span>
                        </div>
                        <div class="px-[1.428rem]">
                            <div class="flex flex-col mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="legend me-2 bg-primary"></span>
                                    <span>{{__('Word')}}</span>
                                    <span class="ms-2">{{number_format((int)Auth::user()->remaining_words)}}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="legend me-2 bg-info"></span>
                                    <span>{{__('Image')}}</span>
                                    <span class="ms-2">{{number_format((int)Auth::user()->remaining_images)}}</span>
                                </div>
                            </div>
                            <div class="progress progress-separated mb-2">
                                @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                    <div class="progress-bar grow-0 shrink-0 basis-auto bg-primary" role="progressbar" style="width: {{(int)Auth::user()->remaining_words/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="{{__('Text')}}"></div>
                                @endif
                                @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                    <div class="progress-bar grow-0 shrink-0 basis-auto bg-info" role="progressbar" style="width: {{(int)Auth::user()->remaining_images/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="{{__('Images')}}"></div>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="nav-item h-[auto] transition-all group-[.navbar-shrinked]/body:opacity-0 group-[.navbar-shrinked]/body:translate-x-3 group-[.navbar-shrinked]/body:h-0 group-[.navbar-shrinked]/body:overflow-hidden">
                        <hr>
                        <div class="nav-link-label transition-all">
							<span class="text-[10px] font-medium uppercase tracking-widest bg-[--lqd-faded-out-more] px-[0.5em] py-[0.35em] rounded-[3px]">
								{{__('Affiliation')}}
							</span>
                        </div>
                        <div class="nav-link-label transition-all">
                            <div class="text-center italic text-[13px] leading-none text-muted border-solid border-[var(--tblr-border-color)] rounded-[var(--tblr-border-radius)] p-[1rem_2rem]">
                                <p class="not-italic text-[20px] m-0 mb-2">🎁</p>
                                <p class="mb-[0.75em]">{{__('Invite your friend and get')}} {{$setting->affiliate_commission_percentage}}% {{__('on their all purchases.')}}</p>
                                <p class="m-0">
                                    <a href="{{route('dashboard.user.affiliates.index')}}" class="btn btn-sm text-[11px]">{{__('Invite')}}</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</aside>
<!-- Navbar -->
<header class="navbar navbar-expand-md navbar-light flex max-lg:h-[65px]">
    <div class="container-xl flex-nowrap">
        <div class="hidden max-lg:flex gap-2 basis-[33.33%]">
            <button class="navbar-toggler max-lg:!block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="navbar-toggler max-lg:!block collapsed group" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-search" aria-controls="navbar-search" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon group-[&.collapsed]:hidden"></span>
                <svg class="group-[&:not(.collapsed)]:hidden" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24" fill="currentColor"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg>
            </button>
        </div>
        <a class="hidden max-lg:flex items-center justify-center basis-[33.33%] px-2" href=".">
            <img src="/{{$setting->logo_path}}" width="110" height="32" alt="MagicAI" class="navbar-brand-image">
        </a>
        <div class="navbar-nav flex-row justify-end max-lg:basis-[33.33%]">
            <div class="flex md:mr-7 items-center gap-[18px] max-lg:mr-3">
                @if(Auth::user()->type == 'admin') <!--<3-->
                <a class="btn" href="{{route('dashboard.admin.index')}}" >
                    <svg class="hidden max-lg:block" xmlns="http://www.w3.org/2000/svg" height="20" fill="currentColor" viewBox="0 96 960 960" width="20"><path d="M690.882 786q25.883 0 44-19Q753 748 753 722.118q0-25.883-18.118-44-18.117-18.118-44-18.118Q665 660 646 678.118q-19 18.117-19 44Q627 748 646 767q19 19 44.882 19ZM689.5 911q33.5 0 60.5-14t46-40q-26-14-51.962-21-25.961-7-54-7-28.038 0-54.538 7-26.5 7-51.5 21 19 26 45.5 40t60 14Zm3 65Q615 976 560 920.5T505 789q0-78.435 54.99-133.718Q614.98 600 693 600q77 0 132.5 55.282Q881 710.565 881 789q0 76-55.5 131.5t-133 55.5ZM480 976q-138-32-229-156.5T160 534V295l320-120 320 120v270q-25-12-52-18.5t-55-6.5q-102.743 0-175.371 72.921Q445 685.843 445 789q0 48 19.5 94t53.5 80q-9 5-19 7.5t-19 5.5Z"/></svg>
                    <span class="max-lg:hidden">{{__('Admin Panel')}}</span>
                </a>
                @endif
                @if(getSubscriptionStatus())
                    <a class="btn max-xl:hidden" href="{{route('dashboard.user.payment.subscription')}}">
                        {{getSubscriptionName()}} - {{getSubscriptionDaysLeft()}} {{__('Days Left')}}
                    </a>
                @else
                    <a class="btn max-xl:hidden" href="{{route('dashboard.user.payment.subscription')}}">
                        {{__('No Active Subscription')}}
                    </a>
                @endif
                <a class="btn btn-primary max-lg:hidden" href="{{route('dashboard.user.payment.subscription')}}">
                    <svg class="md:mr-2 max-lg:w-[20px] max-lg:h-[20px]" width="11" height="15" viewBox="0 0 11 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.6 0L0 9.375H4.4V15L11 5.625H6.6V0Z" />
                    </svg>
                    <span class="max-lg:hidden">{{__('Upgrade')}}</span>
                </a>
                <div class="flex items-center md:mr-2">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark hover:!bg-transparent" title="Enable dark mode">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light hover:!bg-transparent" title="Enable light mode">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                    </a>
                </div>
                <div class="nav-item dropdown !hidden !md:flex">
                    <a href="#" class="nav-link px-0 hover:!bg-transparent" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="whitespace-nowrap">{{__('No new notifications')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-item dropdown max-md:!hidden">
                    <a href="#" class="nav-link px-0 hover:!bg-transparent" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <span class="text-[21px] mr-2">{{ country2flag(substr(LaravelLocalization::getCurrentLocaleRegional(), strrpos(LaravelLocalization::getCurrentLocaleRegional(), '_') + 1)) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
						<div class="flex flex-col">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
							<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="flex items-center px-3 py-2 border-solid border-[--tblr-border-color] border-t-0 border-r-0 border-l-0 last:border-b-0 text-heading transition-colors hover:no-underline hover:bg-[--tblr-border-color]">
								<span class="text-[21px] mr-2">{{ country2flag(substr($properties['regional'], strrpos($properties['regional'], '_') + 1)) }} </span>{{$properties['native']}}
							</a>
                            @endforeach
						</div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(/{{Auth::user()->avatar}})"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <div class="dropdown-item disabled">
                        <div>
                            <div>{{Auth::user()->fullName()}}</div>
                            <div class="mt-1 small text-muted">{{Auth::user()->email}}</div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item disabled">
                        <li class="nav-item">
                            <div class="progress progress-separated mb-3">
                                @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                    <div class="progress-bar grow-0 shrink-0 basis-auto bg-primary" role="progressbar" style="width: {{(int)Auth::user()->remaining_words/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="Text"></div>
                                @endif
                                @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                    <div class="progress-bar grow-0 shrink-0 basis-auto bg-info" role="progressbar" style="width: {{(int)Auth::user()->remaining_images/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="Images"></div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-auto d-flex align-items-center">
                                    <span class="legend me-2 bg-primary"></span>
                                    <span>{{__('Word Credits')}}</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">{{number_format((int)Auth::user()->remaining_words)}}</span>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <span class="legend me-2 bg-info"></span>
                                    <span>{{__('Image Credits')}}</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">{{number_format((int)Auth::user()->remaining_images)}}</span>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item {{activeRoute('dashboard.user.payment.subscription')}}" href="{{route('dashboard.user.payment.subscription')}}" >
						{{__('Plan')}}
					</a>
					<a class="dropdown-item {{activeRoute('dashboard.user.orders.index')}}" href="{{route('dashboard.user.orders.index')}}" >
						{{__('Orders')}}
					</a>
					<a class="dropdown-item {{activeRouteBulk(['dashboard.user.settings.index'])}}" href="{{route('dashboard.user.settings.index')}}" >
						{{__('Settings')}}
					</a>
                    <form id="logout" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <a href="javascript:;" onclick="document.getElementById('logout').submit();" class="dropdown-item">{{__('Logout')}}</a>
                </div>
            </div>
        </div>
        <form class="navbar-search group mr-2 max-lg:hidden lg:-order-1 max-lg:[&.show]:flex max-lg:[&.collapsing]:flex max-lg:absolute max-lg:top-[65px] max-lg:left-0 max-lg:m-0 max-lg:w-full max-lg:bg-[--tblr-body-bg] " id="navbar-search" autocomplete="off" novalidate>
            <div class="input-icon w-full max-lg:p-3">
				<span class="input-icon-addon">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
				</span>
                <input type="search" class="form-control navbar-search-input peer max-lg:!rounded-md" id="top_search_word" onkeydown="return event.key != 'Enter';" placeholder="Search for templates and documents..." aria-label="Search in website">
                <kbd class="inline-block absolute top-1/2 right-[12px] -translate-y-1/2 bg-[var(--tblr-bg-surface)] transition-all pointer-events-none peer-focus:opacity-0 peer-focus:invisible peer-focus:scale-70 group-[.is-searching]:opacity-0 group-[.is-searching]:invisible max-lg:hidden">cmd + K</kbd>
                <span class="absolute top-1/2 -translate-y-1/2 right-[20px]">
					<span class="spinner-border spinner-border-sm text-muted hidden group-[.is-searching]:block" role="status"></span>
				</span>
				<span class="absolute right-3 top-1/2 -translate-y-1/2 -translate-x-2 transition-all opacity-0 pointer-events-none peer-focus:!opacity-100 peer-focus:translate-x-0  group-[.is-searching]:hidden group-[.done-searching]:hidden">
					<svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 96 960 960" width="25" fill="currentColor"><path d="m375 816-43-43 198-198-198-198 43-43 241 241-241 241Z"/></svg>
				</span>
                <div class="navbar-search-results absolute top-[calc(100%+17px)] left-0 bg-white shadow-[0_10px_70px_rgba(0,0,0,0.1)] rounded-md w-full max-h-[380px] overflow-y-auto hidden group-[.done-searching]:block group-[.theme-dark]/body:!bg-[--tblr-bg-surface]" id="search_results" style="z-index: 999;">
                    <!-- Search results here -->
					<h3 class="m-0 py-[0.75rem] px-3 border-solid border-b border-t-0 border-r-0 border-l-0 border-[--tblr-border-color] text-[1rem] font-medium">{{__('Search results')}}</h3>
					<div class="search-results-container"></div>
                </div>
            </div>
        </form>
    </div>
</header>
