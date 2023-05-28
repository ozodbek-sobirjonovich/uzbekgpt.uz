@extends('panel.layout.app')
@section('title', $openai->title)

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{$openai->description}}
                    </div>
                    <h2 class="page-title mb-2">
                        {{$openai->title}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body page-generator pt-6">
        <div class="container-xl">
            @if($openai->type == 'image')
                @include('panel.user.openai.generator_components.generator_image')
            @else
                @include('panel.user.openai.generator_components.generator_others')
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script src="/assets/libs/tom-select/dist/js/tom-select.base.min.js?1674944402" defer></script>
    <script src="/assets/js/panel/openai_generator.js"></script>

    @if($openai->type == 'code')
        <link rel="stylesheet" href="/assets/css/prism.css">
        <script src="/assets/js/prism.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
				"use strict";

                const codeLang = document.querySelector('#code_lang');
                const codePre = document.querySelector('#code-pre');
                const codeOutput = codePre?.querySelector('#code-output');

                if (!codeOutput) return;

                codePre.classList.add(`language-${codeLang && codeLang.value !== '' ? codeLang.value : 'javascript'}`);

                // saving for copy
                window.codeRaw = codeOutput.innerText;

                Prism.highlightElement(codeOutput);
            });
        </script>
    @endif

    <script>
        function sendOpenaiGeneratorForm(ev) {
			"use strict";

			ev?.preventDefault();
			ev?.stopPropagation();
            document.getElementById("openai_generator_button").disabled = true;
            document.getElementById("openai_generator_button").innerHTML = "Please Wait";
			document.querySelector('#app-loading-indicator')?.classList?.remove('opacity-0');

            var formData = new FormData();
            formData.append('post_type', '{{$openai->slug}}');
            formData.append('openai_id', {{$openai->id}});
            formData.append('custom_template', {{$openai->custom_template}});
            @if($openai->type == 'text')
            formData.append('maximum_length', $("#maximum_length").val());
            formData.append('number_of_results', $("#number_of_results").val());
            formData.append('creativity', $("#creativity").val());
            formData.append('tone_of_voice', $("#tone_of_voice").val());
            formData.append('language', $("#language").val());
            @endif
            @if($openai->type == 'audio')
            formData.append('file', $('#file').prop('files')[0]);
            @endif

            @foreach(json_decode($openai->questions) as $question)
            formData.append('{{$question->name}}', $("{{'#'.$question->name}}").val());
            @endforeach

            $.ajax({
                type: "post",
                url: "/dashboard/user/openai/generate",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    toastr.success('Generated Successfully!');
                    setTimeout(function () {
                        @if($openai->type == 'image')
                        $("#generator_sidebar_table").html(data.html2);
                        @elseif($openai->type == 'audio')
                        $("#generator_sidebar_table").html(data.html2);
                        @else
                        if ( $("#code-output").length ) {
                            $("#workbook_textarea").html(data.html2);
                            window.codeRaw = $("#code-output").text();
                            $("#code-output").addClass(`language-${$('#code_lang').val() || 'javascript'}`);
                            Prism.highlightElement($("#code-output")[0]);
                        } else {
                            tinymce.activeEditor.destroy();
                            $("#generator_sidebar_table").html(data.html2);
                            getResult();
                        }
                        @endif

                        document.getElementById("openai_generator_button").disabled = false;
                        document.getElementById("openai_generator_button").innerHTML = "Regenerate";
						document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
						document.querySelector('#workbook_regenerate')?.classList?.remove('hidden');
                    }, 750);
                },
                error: function (data) {
                    if ( data.responseJSON.errors ) {
						$.each(data.responseJSON.errors, function(index, value) {
							toastr.error(value);
						});
					} else if ( data.responseJSON.message ) {
						toastr.error(data.responseJSON.message);
					}
                    document.getElementById("openai_generator_button").disabled = false;
                    document.getElementById("openai_generator_button").innerHTML = "Genarate";
					document.querySelector('#app-loading-indicator')?.classList?.add('opacity-0');
					document.querySelector('#workbook_regenerate')?.classList?.add('hidden');
                }
            });
            return false;
        }
    </script>
@endsection
