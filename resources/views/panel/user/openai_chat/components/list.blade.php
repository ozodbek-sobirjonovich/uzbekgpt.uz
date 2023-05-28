<div
    class="page-body mt-2 relative after:h-px after:w-full after:bg-[var(--tblr-body-bg)] after:absolute after:top-full after:left-0 after:-mt-px">
    <div class="container-fluid">
        <div class="row">
            @foreach ($aiList as $entry)
                <div data-filter="medical" class="col-lg-4 col-xl-3 col-md-6 py-8 10 px-16 relative border-b border-solid border-t-0 border-l-0 border-[var(--tblr-border-color)] group max-xl:px-10">
                    <div class="flex flex-col justify-center text-center relative">
                        <div
                            class="flex items-center justify-center w-[128px] h-[128px] rounded-full mx-auto mb-6 shadow-md transition-shadow text-[44px] font-medium group-hover:shadow-xl text-[rgba(0,0,0,0.65)]"
                            style="background: {{$entry->color}};">
                            @if( $entry->slug == 'ai-chat-bot' )
                                <svg class="svg" width="57" height="54" viewBox="0 0 57 54" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.387695 53.827V5.44295C0.387695 4.00269 0.870131 2.80012 1.835 1.83525C2.79987 0.870375 4.00244 0.387939 5.44271 0.387939H51.6603C53.1006 0.387939 54.3032 0.870375 55.268 1.83525C56.2329 2.80012 56.7153 4.00269 56.7153 5.44295V39.1433C56.7153 40.5836 56.2329 41.7861 55.268 42.751C54.3032 43.7159 53.1006 44.1983 51.6603 44.1983H10.0164L0.387695 53.827ZM3.51701 46.2505L8.69845 41.069H51.6603C52.222 41.069 52.6833 40.8885 53.0444 40.5274C53.4055 40.1663 53.586 39.705 53.586 39.1433V5.44295C53.586 4.88129 53.4055 4.41993 53.0444 4.05886C52.6833 3.69779 52.222 3.51725 51.6603 3.51725H5.44271C4.88105 3.51725 4.41969 3.69779 4.05861 4.05886C3.69754 4.41993 3.51701 4.88129 3.51701 5.44295V46.2505ZM3.51701 5.44295V3.51725V46.2505V5.44295ZM27.1674 36.375H29.9356V8.21122H27.1674V36.375ZM18.5618 30.1164H21.33V14.4698H18.5618V30.1164ZM10.7385 23.8578H13.5067V20.7285H10.7385V23.8578ZM35.773 30.1164H38.5412V14.4698H35.773V30.1164ZM43.5963 23.8578H46.3645V20.7285H43.5963V23.8578Z"
                                        fill="#0C6152"/>
                                </svg>
                            @else
                                {{$entry->short_name}}
                            @endif
                        </div>
                        <h3 class="mb-0">{{$entry->name}}</h3>
                        <p class="text-muted">{{$entry->description}}</p>
                        <!-- link to the chat -->
                        <a href="{{LaravelLocalization::localizeUrl(route('dashboard.user.openai.chat.chat', $entry->slug))}}" class="block w-full h-full absolute top-0 left-0 z-2"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
