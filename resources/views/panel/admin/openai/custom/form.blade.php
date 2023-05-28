@extends('panel.layout.app')
@section('title', 'Add or Edit Custom Template')
@section('additional_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-header d-print-none" xmlns="http://www.w3.org/1999/html">
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
                        {{__('Add or Edit Custom Template')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body pt-6">
        <div class="container-xl">
			<div class="row">
				<div class="col-md-5 mx-auto">
					<form id="custom_template_form" onsubmit="return templateSave({{$template!=null ? $template->id : null}});" action="">
						<div class="row">
							<div class="col-md-12 col-xl-12">

								<div class="row">
									<div class="col-md-12">
										<div class="mb-[20px]">
											<label class="form-label">{{__('Template Title')}}</label>
											<input type="text" class="form-control" id="title" name="title" value="{{$template!=null ? $template->title : null}}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-[20px]">
											<label class="form-label">{{__('Template Description')}}</label>
											<textarea class="form-control" rows="3" id="description" name="description">{{$template!=null ? $template->description : null}}</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-[20px]">
											<label class="form-label">{{__('Template Icon')}} (<a target="_blank" href="https://tablericons.com/">TablerIcons as SVG</a>)</label>
											<input type="text" class="form-control" id="image" name="image" value="{{$template!=null ? $template->image : null}}">
										</div>
									</div>

                                    <div class="col-md-12">
                                        <div class="mb-[20px]">
                                            <label class="form-label">{{__('Template Color')}}</label>
                                            <input type="color" class="form-control" id="color" name="color" value="{{$template!=null ? $template->color : '#FFFFFFF'}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-[20px]">
                                            <label class="form-label">{{__('Template Filters')}}</label>
                                            <select class="form-control select2" name="filters" id="filters" multiple>
                                                @foreach($filters as $filter)
                                                <option value="{{$filter->name}}">
                                                    {{$filter->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="alert alert-info">
                                            {{__('You can add more filters, just add a filter and click enter.')}}
                                        </div>
                                    </div>

									<div class="col-md-12 mb-[20px]">
										<label for="" class="form-label">{{__('User Input Groups')}}</label>
										@if($template!= null)
											@foreach(json_decode($template->questions) as $question)
												<div class="row input-group control-group mb-[20px]">
													<div class="col-md-6 mb-[20px]">
														<input type="text" class="form-control input_name" placeholder="{{__('Enter Name Here')}}" value="{{$question->question}}">
													</div>
													<div class="col-md-6 mb-[20px]">
														<input type="text" class="form-control input_description" placeholder="{{__('Enter Description Here')}}" value="{{$question->description}}">
													</div>
													<div class="col-12 mb-[20px]">
														<select class="form-select input_type">
															<option value="text" {{$question->type == 'text' ? 'selected' : null}}>{{__('Input Field')}}</option>
															<option value="textarea" {{$question->type == 'textarea' ? 'selected' : null}}>{{__('Textarea Field')}}</option>
														</select>
													</div>
													<div class="col-12">
														<div class="input-group-btn">
															<button class="btn btn-danger remove" type="button"><i class="las la-minus-circle fs-3"></i> {{__('Remove')}}</button>
														</div>
													</div>
												</div>
											@endforeach
												<div class="input-group control-group after-add-more">
												</div>
										@else
											<div class="row input-group control-group after-add-more mb-[20px]">
												<div class="col-md-6 mb-[20px]">
													<input type="text" class="form-control input_name" placeholder="{{__('Enter Name Here')}}">
												</div>
												<div class="col-md-6 mb-[20px]">
													<input type="text" class="form-control input_description" placeholder="{{__('Enter Description Here')}}">
												</div>
												<div class="col-12 mb-[20px]">
													<select class="form-select input_type">
														<option value="text">{{__('Input Field')}}</option>
														<option value="textarea">{{__('Textarea Field')}}</option>
													</select>
												</div>
												<div class="col-12">
													<div class="input-group-btn">
														<button class="btn btn-secondary" type="button" disabled><i class="las la-minus-circle fs-3"></i> {{__('Remove')}}</button>
													</div>
												</div>
											</div>

										@endif

										<a class="btn btn-success add-more text-right mt-2 w-100">{{__('Add More User Input')}}</a>

									</div>

									<div class="col-md-12">
										<div class="mb-[20px]">
											<label class="form-label  after-add-more-button">{{__('Custom Prompt')}}</label>
											@if($template!= null)
												@foreach(json_decode($template->questions) as $question)
													<button type="button" onclick="addText(this.innerHTML)" class="btn btn-primary m-2 button"> **{{$question->name}}** </button>
												@endforeach
											@endif
											<textarea class="form-control" id="prompt" rows="6">{{$template!=null ? $template->prompt : null}}</textarea>
										</div>
									</div>
								</div>

								<button form="custom_template_form" id="custom_template_button" class="btn btn-primary w-100">
									{{__('Save')}}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/assets/js/panel/openai.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
