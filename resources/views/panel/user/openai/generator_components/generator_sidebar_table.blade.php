@if($openai->type == 'image')
    <div class="col-12">
        <div class="w-full">
            <h2 class="mb-3">{{__('Result')}}</h2>
            <div class="image-results row">
                @foreach($userOpenai as $entry)
                    <div class="col-6 col-md-4 col-xl-2 mb-8">
                        <div class="image-result group">
                            <div class="relative aspect-square rounded-lg mb-2 overflow-hidden group-hover:shadow-lg transition-all">
                                <img src="{{$entry->output}}" class="w-full h-full aspect-square object-cover object-center" alt="{{$entry->input}}">
                                <div class="flex items-center justify-center gap-2 w-full h-full absolute top-0 left-0 opacity-0 transition-opacity group-hover:!opacity-100">
                                    <a href="{{$entry->output}}" class="btn items-center justify-center w-9 h-9 p-0" target="_blank">
                                        <svg width="8" height="11" viewBox="0 0 8 11" fill="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.57422 0.5V8.75781L6.67969 6.67969L7.5 7.5L4 11L0.5 7.5L1.32031 6.67969L3.42578 8.75781V0.5H4.57422Z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.openai.documents.delete', $entry->slug)) }}" onclick="return confirm('Are you sure?')" class="btn items-center justify-center w-9 h-9 p-0">
                                        <svg width="10" height="9" viewBox="0 0 10 9" fill="var(--lqd-heading-color)" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.08789 1.49609L5.80664 4.75L9.08789 8.00391L8.26758 8.82422L4.98633 5.57031L1.73242 8.82422L0.912109 8.00391L4.16602 4.75L0.912109 1.49609L1.73242 0.675781L4.98633 3.92969L8.26758 0.675781L9.08789 1.49609Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <p class="w-full overflow-ellipsis whitespace-nowrap text-heading mb-1 overflow-hidden" title="{{$entry->input}}">{{$entry->input}}</p>
                            <p class="mb-0 text-muted">{{$entry->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
<div class="table-responsive">
    <table
        class="table table-vcenter card-table">
        <thead>
        <tr>
            <th>{{__('Type')}}</th>
            <th>{{__('Result')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userOpenai as $entry)
            <tr>
                <td class="text-muted">
                    <span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px]" style="background: {{$entry->generator->color}}">
						@if ( $entry->generator->image !== 'none' )
						{!! html_entity_decode($entry->generator->image) !!}
						@endif
					</span>
                </td>
                @if($openai->type == 'text')
                    <td>
                        {!! $entry->output !!}
                    </td>
                @elseif($openai->type == 'code')
                    <td>
                        <div class="min-h-full border-solid border-t border-r-0 border-b-0 border-l-0 border-[var(--tblr-border-color)] pt-[30px] mt-[15px]">
                            <pre id="code-pre" class="line-numbers min-h-full"><code id="code-output">{{$entry->output}}</code></pre>
                        </div>
                    </td>
                @else
                    <td>
                        {{$entry->output}}
                    </td>
                @endif
            </tr>
        @endforeach
        @if(count($userOpenai) == 0)
            <tr>
                <td colspan="2">{{__('No entries created yet.')}}</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endif
