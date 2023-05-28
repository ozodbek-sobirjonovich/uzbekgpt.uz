@extends('panel.layout.app')
@section('title', 'Frontend Settings')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 items-center">
                <div class="col">
                    <a href="{{ LaravelLocalization::localizeUrl( route('dashboard.index') ) }}" class="page-pretitle flex items-center">
                        <svg class="mr-2" width="8" height="10" viewBox="0 0 6 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z"/>
                        </svg>
                        {{__('Back to dashboard')}}
                    </a>
                    <h2 class="page-title mb-2">
                        {{__('Frontend Settings')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body pt-6">
        <div class="container-xl">
            <div class="row col-md-5 mx-auto">
                <form id="settings_form" onsubmit="return frontendSettingsSave();" enctype="multipart/form-data">
                    <h3 class="mb-[25px] text-[20px]">{{__('General Settings')}}</h3>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Site Name')}}</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" value="{{$setting->site_name}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Site Url')}}</label>
                                <input type="text" class="form-control" id="site_url" name="site_url" value="{{$setting->site_url}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Site Email')}}</label>
                                <input type="text" class="form-control" id="site_email" name="site_email" value="{{$setting->site_email}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Site Logo')}}</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Site Favicon')}}</label>
                                <input type="file" class="form-control" id="favicon" name="favicon">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Registration Active')}}</label>
                                <select class="form-select" name="register_active" id="register_active">
                                    <option value="1" {{$setting->register_active == 1 ? 'selected' : ''}}>{{__('Active')}}</option>
                                    <option value="0" {{$setting->register_active == 0 ? 'selected' : ''}}>{{__('Passive')}}</option>
                                </select>
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <h3 class="mb-[25px] text-[20px]">{{__('Frontend Settings')}}</h3>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Pricing Section')}}</label>
                                <select class="form-select" name="frontend_pricing_section" id="frontend_pricing_section">
                                    <option value="1" {{$setting->frontend_pricing_section == 1 ? 'selected' : ''}}>{{__('Active')}}</option>
                                    <option value="0" {{$setting->frontend_pricing_section == 0 ? 'selected' : ''}}>{{__('Passive')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Custom Templates Section')}}</label>
                                <select class="form-select" name="frontend_custom_templates_section" id="frontend_custom_templates_section">
                                    <option value="1" {{$setting->frontend_custom_templates_section == 1 ? 'selected' : ''}}>{{__('Active')}}</option>
                                    <option value="0" {{$setting->frontend_custom_templates_section == 0 ? 'selected' : ''}}>{{__('Passive')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Additional Landing Page Url')}}</label>
                                <input type="text" class="form-control" id="frontend_additional_url" name="frontend_additional_url" value="{{$setting->frontend_additional_url}}">
                                <div class="alert alert-info mt-1">
                                    {{__('Please provide full URL with http:// or https://')}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Custom CSS Url')}}</label>
                                <input type="text" class="form-control" id="frontend_custom_css" name="frontend_custom_css" value="{{$setting->frontend_custom_css}}">
                                <div class="alert alert-info mt-1">
                                    {{__('Please provide full URL with http:// or https://')}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Custom JS Url')}}</label>
                                <input type="text" class="form-control" id="frontend_custom_js" name="frontend_custom_js" value="{{$setting->frontend_custom_js}}">
                                <div class="alert alert-info mt-1">
                                    {{__('Please provide full URL with http:// or https://')}}
                                </div>
                            </div>
                        </div>

                    </div>

                    <h3 class="mb-[25px] text-[20px]">{{__('Seo Settings')}}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Google Analytics Tracking ID (UA-1xxxxx)')}}</label>
                                <input type="text" class="form-control" id="google_analytics_code" name="google_analytics_code" value="{{$setting->google_analytics_code}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Meta Title')}}</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$setting->meta_title}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{__('Meta Description')}}</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="5">{{$setting->meta_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-[25px] text-[20px]">{{__('Footer Social Media Settings')}}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Facebook {{__('Address')}}</label>
                                <input type="text" class="form-control" id="frontend_footer_facebook" name="frontend_footer_facebook" value="{{$setting->frontend_footer_facebook}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Twitter {{__('Address')}}</label>
                                <input type="text" class="form-control" id="frontend_footer_twitter" name="frontend_footer_twitter" value="{{$setting->frontend_footer_twitter}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Instagram {{__('Address')}}</label>
                                <input type="text" class="form-control" id="frontend_footer_instagram" name="frontend_footer_instagram" value="{{$setting->frontend_footer_instagram}}">
                            </div>
                        </div>



                    </div>

                    <button form="settings_form" id="settings_button" class="btn btn-primary w-100">
                        {{__('Save')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/panel/settings.js"></script>
@endsection
