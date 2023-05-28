@extends('panel.layout.app')
@section('title', 'Support Request #'.$ticket->ticket_id)

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
                        {{__('Support Request')}} #{{$ticket->ticket_id}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
			<div class="card" style="height: 50rem">
				<div class="card-header">
					<p class="card-title">{{__('Ticket')}} #{{$ticket->ticket_id}}
						<br>
						{{__('Ticket Subject')}}: {{$ticket->subject}}
						<br>
						{{__('Ticket Category')}}: {{$ticket->category}}
						<br>
						{{__('Ticket Status')}}: {{$ticket->status}}
					</p>
				</div>
				<div id="scrollable_content" class="card-body card-body-scrollable card-body-scrollable-shadow">

					@foreach($ticket->messages as $message)
						@if($message->sender == 'user')
							<div class="d-flex flex-wrap justify-content-end mb-2 text-right lg:ml-auto lg:max-w-[50%]">
								<strong class="text-dark w-full block mb-1 group-[.theme-dark]/body:!text-white">{{$ticket->user->fullName()}}</strong>
								<div class="border-none rounded-[2em] mb-[7px] bg-[#F3E2FD] text-[#090A0A]">
									<div class="py-[0.75rem] px-[1.5rem]">
										{{$message->message}}
									</div>
								</div>
								<div class="w-full text-[11px] font-normal text-[rgba(0,0,0,0.4)] group-[.theme-dark]/body:!text-[rgba(255,255,255,0.7)]">
									{{$message->created_at}}
								</div>
							</div>
						@else
							<div class="d-flex flex-wrap justify-content-start mb-2 lg:max-w-[50%]">
								<strong class="text-dark w-full block mb-1 group-[.theme-dark]/body:!text-white">{{__('Administrator')}}</strong>
								<div class="border-none rounded-[2em] mb-[7px] bg-[#E5E7EB] text-[#090A0A]">
									<div class="py-[0.75rem] px-[1.5rem]">
										{{$message->message}}
									</div>
								</div>
								<div class="w-full text-[11px] font-normal text-[rgba(0,0,0,0.4)] group-[.theme-dark]/body:!text-[rgba(255,255,255,0.7)]">
									{{$message->created_at}}
								</div>
							</div>
						@endif
					@endforeach
				</div>
				<hr>
				<form class="flex items-end gap-3 p-3 pt-0" id="support_form" onsubmit="return sendMessage('{{$ticket->ticket_id}}');">
					<textarea class="form-control min-h-[52px]" name="message" id="message" cols="30" rows="1" placeholder="{{__('Your Message')}}"></textarea>
					<button class="btn btn-primary w-[52px] h-[52px] rounded-full" id="send_message_button" form="support_form">
						<svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.125 14V8.76172L11.375 7.25L0.125 5.73828V0.5L15.875 7.25L0.125 14Z" />
						</svg>
					</button>
				</form>
			</div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/assets/js/panel/support.js"></script>
@endsection
