<div class="card max-md:text-center">
    <div class="card-body py-8 px-10">
        <div class="row align-items-center subheader font-medium text-[1em] leading-[1.5em]">
            <div class="col-12 col-md-6 col-lg-5 max-md:mb-4">
                <h2 class="mb-[1em]">{{__('Upgrade')}}</h2>
                @if(Auth::user()->activePlan()!=null)
                    <p class="mb-3">
                        {{__('You have currently')}}
                        <strong class="text-heading">{{getSubscriptionName()}}</strong> {{__('plan.')}}
                        {{__('Will refill automatically in')}} {{getSubscriptionDaysLeft()}} {{__('Days.')}}
                        <br>
                        {{__('Total')}} <strong class="text-heading">{{number_format(Auth::user()->remaining_words)}}</strong>
                        {{__('word and')}} <strong class="text-heading">{{number_format(Auth::user()->remaining_images)}}</strong> {{__('image tokens left.')}}
                    </p>
                @else
                    <p class="mb-3">
                        {{__('You have no subscription at the moment. Please select a subscription plan or prepaid plan.')}}
                        <br>
                        {{__('Total')}} <strong class="text-heading">{{number_format(Auth::user()->remaining_words)}}</strong> {{__('word and')}}
                        <strong class="text-heading">{{number_format(Auth::user()->remaining_images)}}</strong> {{__('image tokens left.')}}
                    </p>
                @endif
				<a class="btn mr-4 hover:bg-green-500 hover:text-white group-[.theme-dark]/body:!bg-[rgba(255,255,255,0.2)]" href="{{ LaravelLocalization::localizeUrl( route('dashboard.user.payment.subscription') ) }}" >
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						<path d="M12 5l0 14"></path>
						<path d="M5 12l14 0"></path>
					</svg>
					{{__('Select a Plan')}}
				</a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 ml-auto">
				<div class="relative">
					<h3 class="text-[14px] font-normal text-center m-0 absolute top-[calc(50%-5px)] left-1/2 -translate-x-1/2">
						<strong class="text-[2em] font-semibold leading-none max-sm:text-[1.5em]">{{number_format(Auth::user()->remaining_words)}}</strong>
						<br>
						{{__('Credits')}}
					</h3>
					<div id="chart-credit" class="relative"></div>
				</div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
			"use strict";

            const options = {
                series: [{{(int)Auth::user()->remaining_words+$total_words}}, {{(int)$total_words}}],
                labels: [ 'Remaining' , 'Used'],
                colors: ['#9A34CD', 'rgba(154,52,205,0.2)'],
                chart: {
                    type: 'donut',
                    height: 205,
                },
                legend: {
                    position: 'bottom',
                    fontFamily: 'inherit',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle: 90,
                        offsetY: 0,
                        donut: {
                            size: '75%',
                        }
                    },
                },
                grid: {
                    padding: {
                        bottom: -130
                    }
                },
                stroke: {
                    width: 5,
					colors: 'var(--tblr-body-bg)'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300,
							height: 250
                        },
                    }
                }],
                dataLabels: {
                    enabled: false,
                }
            };
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-credit'), options)).render();
        });
        // @formatter:on
    </script>
@endsection
