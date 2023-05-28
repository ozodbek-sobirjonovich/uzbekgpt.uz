<div class="flex flex-col justify-between conversation-area grow lg:h-full" id="chat_area_to_hide">
	<div class="overflow-hidden">
		<div class="chats-container h-full overflow-auto p-8 max-md:max-h-[60vh] max-md:p-4" >
			@include('panel.user.openai_chat.components.chat_area')
		</div>
	</div>

	<form class="flex items-end gap-3 p-8 pt-[1.5rem] pb-[2rem] sticky bottom-0 self-end w-full bg-[--tblr-body-bg] max-md:p-4" id="chat_form">
		<input type="hidden" value="{{$category->id}}" id="category_id">
		<input type="hidden" value="{{$chat->id}}" id="chat_id">
		<input class="form-control min-h-[52px] rounded-full" name="prompt" id="prompt" type="text" placeholder="{{__('Your Message')}}"/>
		<button class="btn btn-primary w-[52px] h-[52px] rounded-full" id="send_message_button" form="chat_form">
			<svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path d="M0.125 14V8.76172L11.375 7.25L0.125 5.73828V0.5L15.875 7.25L0.125 14Z"/> </svg>
		</button>
	</form>

</div>

