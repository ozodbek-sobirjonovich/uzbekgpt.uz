//Admin
function userSave( user_id ) {
	"use strict";

	document.getElementById( "user_edit_button" ).disabled = true;
	document.getElementById( "user_edit_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'user_id', user_id );
	formData.append( 'name', $( "#name" ).val() );
	formData.append( 'surname', $( "#surname" ).val() );
	formData.append( 'phone', $( "#phone" ).val() );
	formData.append( 'email', $( "#email" ).val() );
	formData.append( 'country', $( "#country" ).val() );
	formData.append( 'type', $( "#type" ).val() );
	formData.append( 'status', $( "#status" ).val() );
	formData.append( 'remaining_words', $( "#remaining_words" ).val() );
	formData.append( 'remaining_images', $( "#remaining_images" ).val() );

	$.ajax( {
		type: "post",
		url: "/dashboard/admin/users/save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'User saved succesfully.' );
			document.getElementById( "user_edit_button" ).disabled = false;
			document.getElementById( "user_edit_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "user_edit_button" ).disabled = false;
			document.getElementById( "user_edit_button" ).innerHTML = "Save";
		}
	} );
	return false;
}

//User
function userProfileSave() {
	"use strict";

	document.getElementById( "user_edit_button" ).disabled = true;
	document.getElementById( "user_edit_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'name', $( "#name" ).val() );
	formData.append( 'surname', $( "#surname" ).val() );
	formData.append( 'phone', $( "#phone" ).val() );
	formData.append( 'country', $( "#country" ).val() );

	if ( $( '#avatar' ).val() != 'undefined' ) {
		formData.append( 'avatar', $( '#avatar' ).prop( 'files' )[ 0 ] );
	}

	$.ajax( {
		type: "post",
		url: "/dashboard/user/settings/save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'User saved succesfully.' );
			document.getElementById( "user_edit_button" ).disabled = false;
			document.getElementById( "user_edit_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "user_edit_button" ).disabled = false;
			document.getElementById( "user_edit_button" ).innerHTML = "Save";
		}
	} );
	return false;
}
