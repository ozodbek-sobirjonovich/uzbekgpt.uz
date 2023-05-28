<?php
	$wrapper_classname = 'px-12 pt-7 pb-11 rounded-3xl text-center';

	if ( $featured ) {
		$wrapper_classname .= ' border';
	}
?>

<div class="{{$wrapper_classname}} max-xl:px-6 max-lg:px-4">
	<h6 class="p-[0.35rem] mb-6 border rounded-md text-[11px] text-opacity-80">{{$title}}</h6>
	<p class="text-[45px] font-medium text-heading leading-none -tracking-wide mb-1">
		<sup class="text-[0.53em]">{{$currency}}</sup>
		{{$price}}
	</p>
	<p class="mb-4 text-sm opacity-60">per {{$period}}</p>
	<a href="{{$buttonLink}}" class="block w-full p-3 mb-6 rounded-lg bg-black text-heading bg-opacity-[0.03] font-medium hover:bg-black hover:text-white transition-colors">{{$buttonLabel}}</a>
	<ul class="px-3 text-left max-lg:p-0">
		@if ( !empty( $activeFeatures ) )
			@foreach( explode( ';', $activeFeatures ) as $feature )
				<li class="flex items-center mb-4">
					<span class="inline-grid place-content-center w-[22px] h-[22px] mr-3 rounded-xl text-[#684AE2] bg-[#684AE2] bg-opacity-10 shrink-0">
						<svg width="13" height="10" viewBox="0 0 13 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.952 7.537L11.489 0L12.452 1L3.952 9.5L1.78814e-07 5.545L1 4.545L3.952 7.537Z"/>
						</svg>
					</span>
					{{ trim( $feature ) }}
				</li>
			@endforeach
		@endif
		@if ( !empty( $inactiveFeatures ) )
			@foreach( explode( ';', $inactiveFeatures ) as $feature )
				<li class="flex items-center mb-4 opacity-25">
					<span class="inline-grid place-content-center w-[22px] h-[22px] mr-3 rounded-xl text-[#684AE2] bg-[#684AE2] bg-opacity-10 shrink-0">
						<svg width="5" height="2" viewBox="0 0 5 2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0.00299835H4.167V1.539H0V0.00299835Z"/>
						</svg>
					</span>
					{{ trim( $feature ) }}
				</li>
			@endforeach
		@endif
	</ul>
</div>