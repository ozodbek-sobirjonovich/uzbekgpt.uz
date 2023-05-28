@if(count($template_search)>0)
<ul class="m-0 p-0 list-none font-medium">
    @foreach($template_search as $item)
    <li class="p-2 px-3 border-solid border-b border-t-0 border-r-0 border-l-0 border-[--tblr-border-color] last:border-b-0 transition-colors hover:bg-slate-50  group-[.theme-dark]/body:hover:!bg-[rgba(255,255,255,0.05)]">
        @if($item->type == 'text')
            <a href="{{route('dashboard.user.openai.generator.workbook', $item->slug)}}" class="d-flex align-items-center text-heading !no-underline">
				<span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative mr-2" style="background: {{$item->color}}">
					@if ( $item->image !== 'none' )
					{!! html_entity_decode($item->image) !!}
					@endif
					@if($item->active == 1)
						<span class="badge bg-green !w-[9px] !h-[9px]"></span>
					@else
						<span class="badge bg-red !w-[9px] !h-[9px]"></span>
					@endif
				</span>
                {{$item->title}}
				<small class="ml-auto text-muted opacity-75">{{__('Template')}}</small>
            </a>
        @elseif($item->type == 'image')
            <a href="{{route('dashboard.user.openai.generator', $item->slug)}}" class="d-flex align-items-center text-heading !no-underline">
				<span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative mr-2" style="background: {{$item->color}}">
					@if ( $item->image !== 'none' )
					{!! html_entity_decode($item->image) !!}
					@endif
					@if($item->active == 1)
						<span class="badge bg-green !w-[9px] !h-[9px]"></span>
					@else
						<span class="badge bg-red !w-[9px] !h-[9px]"></span>
					@endif
				</span>
                {{$item->title}}
				<small class="ml-auto text-muted opacity-75">{{__('Template')}}</small>
            </a>
        @elseif($item->type == 'audio')
            <a href="{{route('dashboard.user.openai.generator', $item->slug)}}" class="d-flex align-items-center text-heading !no-underline">
				<span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative mr-2" style="background: {{$item->color}}">
					@if ( $item->image !== 'none' )
					{!! html_entity_decode($item->image) !!}
					@endif
					@if($item->active == 1)
						<span class="badge bg-green !w-[9px] !h-[9px]"></span>
					@else
						<span class="badge bg-red !w-[9px] !h-[9px]"></span>
					@endif
				</span>
                {{$item->title}}
				<small class="ml-auto text-muted opacity-75">{{__('Template')}}</small>
            </a>
        @elseif($item->type == 'code')
            <a href="{{route('dashboard.user.openai.generator.workbook', $item->slug)}}" class="d-flex align-items-center text-heading !no-underline">
				<span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative mr-2" style="background: {{$item->color}}">
					@if ( $item->image !== 'none' )
					{!! html_entity_decode($item->image) !!}
					@endif
					@if($item->active == 1)
						<span class="badge bg-green !w-[9px] !h-[9px]"></span>
					@else
						<span class="badge bg-red !w-[9px] !h-[9px]"></span>
					@endif
				</span>
                {{$item->title}}
				<small class="ml-auto text-muted opacity-75">{{__('Template')}}</small>
            </a>
        @endif
    </li>
    @endforeach
</ul>
@endif
@if(count($workbook_search)>0)
    <hr class="border-[2px]">
    <h3 class="m-0 py-[0.75rem] px-3 border-solid border-b border-t-0 border-r-0 border-l-0 border-[--tblr-border-color] text-[1rem] font-medium">{{__('Workbooks')}}</h3>
    <ul class="m-0 p-0 list-none">
        @foreach($workbook_search as $item)
        <li class="p-2 px-3 border-solid border-b border-t-0 border-r-0 border-l-0 border-[--tblr-border-color] last:border-b-0 transition-colors hover:bg-slate-50  group-[.theme-dark]/body:hover:!bg-[rgba(255,255,255,0.05)]">
			<a href="{{route('dashboard.user.openai.generator.workbook', $item->slug)}}" class="d-flex align-items-center text-heading !no-underline">
				<span class="avatar w-[43px] h-[43px] [&_svg]:w-[20px] [&_svg]:h-[20px] relative mr-2" style="background: {{$item->color}}">
					@if ( $item->image !== 'none' )
					{!! html_entity_decode($item->image) !!}
					@endif
				</span>
				{{$item->title}}
				<small class="ml-auto text-muted opacity-75">{{__('Workbook')}}</small>
			</a>
		</li>
        @endforeach
    </ul>
@endif

@if(isset($result) and $result=='null')
	<div class="p-6 font-medium text-center text-heading">
		<h3 class="mb-2">{{__('No results.')}}</h3>
		<p class="opacity-70">{{__('Please try with another word.')}}</p>
	</div>
@endif
