//Admin
//admin.openai.list
function updateStatus( status, entry_id ) {
	"use strict";

	var formData = new FormData();
	formData.append( 'status', status );
	formData.append( 'entry_id', entry_id );

	$.ajax( {
		type: "post",
		url: "/dashboard/admin/openai/update-status",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Status changed succesfully.' );
			if ( status == 1 ) {
				$( "#passive_btn_" + entry_id ).hide();
				$( "#active_btn_" + entry_id ).show();
			} else {
				$( "#passive_btn_" + entry_id ).show();
				$( "#active_btn_" + entry_id ).hide();
			}

		},
		error: function ( data ) {
			toastr.error( 'Something went wrong. Please reload the page and try it again.' );
		}
	} );
	return false;
}

//admin.openai.custom.form
$( document ).ready( function () {
	"use strict";
	if ( !$.fn.select2 ) return;
	$( '.select2' ).select2( {
		tags: true
	} );
} );
function templateSave( template_id ) {
	"use strict";

	document.getElementById( "custom_template_button" ).disabled = true;
	document.getElementById( "custom_template_button" ).innerHTML = "Please Wait...";

	var input_name = [];
	$( ".input_name" ).each( function () {
		input_name.push( $( this ).val() );
	} );
	var input_description = [];
	$( ".input_description" ).each( function () {
		input_description.push( $( this ).val() );
	} );
	var input_type = [];
	$( ".input_type" ).each( function () {
		input_type.push( $( this ).val() );
	} );

	var formData = new FormData();
	formData.append( 'template_id', template_id );
	formData.append( 'title', $( "#title" ).val() );
	formData.append( 'filters', $( "#filters" ).val() );
	formData.append( 'description', $( "#description" ).val() );
	formData.append( 'image', $( "#image" ).val() );
	formData.append( 'color', $( "#color" ).val() );
	formData.append( 'prompt', $( "#prompt" ).val() );
	formData.append( 'input_name', input_name );
	formData.append( 'input_description', input_description );
	formData.append( 'input_type', input_type );


	$.ajax( {
		type: "post",
		url: "/dashboard/admin/openai/custom/save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Template Saved Succesfully.' );
			//location.href = '/dashboard/admin/openai/custom';
			document.getElementById( "custom_template_button" ).disabled = false;
			document.getElementById( "custom_template_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "custom_template_button" ).disabled = false;
			document.getElementById( "custom_template_button" ).innerHTML = "Save";
		}
	} );
	return false;
}


$( document ).ready( function () {
	"use strict";
	const slugify = str =>
		str.toLowerCase().trim().replace( /[^\w\s-]/g, '' ).replace( /[\s_-]+/g, '-' ).replace( /^-+|-+$/g, '' );


	$( ".add-more" ).click( function () {
		if ( $( ".input_name" ).last().val() != '' && $( ".input_description" ).last().val() != '' && $( ".input_type" ).last().val() != '' ) {
			var html = '<div class="control-group input-group" style="margin-top:10px"> <input type="text" class="form-control input_name" placeholder="Enter Name Here"> <input type="text" class="form-control input_description" placeholder="Enter Description Here"> <select class="form-select input_type"> <option value="text" >Input Field</option> <option value="textarea">Textarea Field</option> </select> <div class="input-group-btn"> <button class="btn btn-danger remove" type="button"><i class="las la-minus-circle fs-3"></i> Remove</button> </div> </div>';
			var inputname = '  **' + slugify( $( ".input_name" ).last().val() ) + '**  ';
			var button = '<button type="button" onclick="addText(this.innerHTML)" class="btn btn-primary m-2 button">' + inputname + '</button>';
			$( ".after-add-more-button" ).after( button );
			$( ".after-add-more" ).after( html );
		} else {
			toastr.error( 'Please fill all fields in User Group Input areas.' )
		}

	} );

	$( "body" ).on( "click", ".remove", function () {
		$( this ).parents( ".control-group" ).remove();
	} );

} );

function addText( value ) {
	"use strict";

	document.getElementById( 'prompt' ).value += value;
}
