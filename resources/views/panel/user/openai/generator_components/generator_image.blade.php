<!-- Start image generator -->
@if($openai->type == 'image')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card bg-[#F3E2FD] !shadow-sm group-[.theme-dark]/body:bg-[#14171C] group-[.theme-dark]/body:shadow-black">
                <div class="card-body md:p-10">
                    <div class="row">
                        <label for="description" class="h2 mb-3">{{__('Explain your idea')}}.</label>
                        <form id="openai_generator_form" onsubmit="return sendOpenaiGeneratorForm();">
                            <div class="relative mb-3">
                                @foreach(json_decode($openai->questions) as $question)
                                    @if($question->type == 'textarea')
                                        <input class="form-control bg-white rounded-full h-[53px] text-black !shadow-sm placeholder:text-black" type="text" id="{{$question->name}}" name="{{$question->name}}" placeholder="{{__('an astronaut riding a horse on mars, hd, dramatic lighting')}}">
                                    @endif
                                @endforeach
                                <button id="openai_generator_button" class="btn btn-primary h-[36px] absolute top-1/2 right-[1rem] -translate-y-1/2 hover:-translate-y-1/2 hover:scale-110 max-lg:relative max-lg:top-auto max-lg:right-auto max-lg:translate-y-0 max-lg:w-full max-lg:mt-2" type="submit">
                                    Generate
                                    <svg class="ml-2" width="14" height="13" viewBox="0 0 14 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.25 13L6.09219 11.8625L10.6422 7.3125H0.75V5.6875H10.6422L6.09219 1.1375L7.25 0L13.75 6.5L7.25 13Z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-wrap justify-between">
                                <a href="#advanced-settings" class="flex items-center text-[11px] font-semibold text-heading hover:no-underline group collapsed" data-bs-toggle="collapse" data-bs-auto-close="false">
                                    {{__('Advanced Settings')}}
                                    <span class="inline-flex items-center justify-center w-[36px] h-[36px] p-0 ml-2 bg-white !shadow-sm rounded-full group-[.theme-dark]/body:!bg-[--tblr-bg-surface]">
										<svg class="hidden group-[&.collapsed]:block" width="12" height="12" viewBox="0 0 12 12" fill="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
											<path d="M6.76708 5.464H11.1451V7.026H6.76708V11.558H5.18308V7.026H0.805078V5.464H5.18308V0.909999H6.76708V5.464Z"/>
										</svg>
										<svg class="block group-[&.collapsed]:hidden" width="6" height="2" viewBox="0 0 6 2" fill="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
											<path d="M0.335078 1.962V0.246H5.65908V1.962H0.335078Z"/>
										</svg>
									</span>
                                </a>
                                <div class="max-sm:-order-1 max-sm:mb-4 max-sm:w-full">
                                    <div class="flex justify-between flex-wrap mb-2">
                                        <div class="flex items-center mr-3">
                                            <span class="legend me-2 bg-primary" style="--tblr-legend-size:0.5rem;"></span>
                                            <span>{{__('Words')}}</span>
                                            <span class="ms-2 text-heading font-medium">{{number_format((int)Auth::user()->remaining_words)}}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="legend me-2 bg-info" style="--tblr-legend-size:0.5rem;"></span>
                                            <span>{{__('Images')}}</span>
                                            <span class="ms-2 text-heading font-medium">{{number_format((int)Auth::user()->remaining_images)}}</span>
                                        </div>
                                    </div>
                                    <div class="progress progress-separated h-1">
                                        @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                            <div class="progress-bar grow-0 shrink-0 basis-auto bg-primary" role="progressbar" style="width: {{(int)Auth::user()->remaining_words/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="{{__('Text')}}"></div>
                                        @endif
                                        @if((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images != 0)
                                            <div class="progress-bar grow-0 shrink-0 basis-auto bg-info" role="progressbar" style="width: {{(int)Auth::user()->remaining_images/((int)Auth::user()->remaining_words+(int)Auth::user()->remaining_images)*100}}%" aria-label="{{__('Images')}}"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div id="advanced-settings" class="collapse">
                                <div class="flex flex-wrap justify-between gap-3 mt-8">
                                    @foreach(json_decode($openai->questions) as $question)
                                        @if($question->type == 'select')
                                            <div class="grow">
                                                <label for="mood" class="form-label text-heading">{{__('Image resolution')}}</label>
                                                <select class="form-control form-select bg-white placeholder:text-black" name="{{$question->name}}" id="{{$question->name}}">
                                                    {!! $question->select !!}
                                                </select>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="generator_sidebar_table">
        @include('panel.user.openai.generator_components.generator_sidebar_table')
        </div>
    </div>
@endif
<!-- End image generator -->
