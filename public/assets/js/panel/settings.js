function frontendSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'site_name', $( "#site_name" ).val() );
	formData.append( 'register_active', $( "#register_active" ).val() );
	formData.append( 'site_url', $( "#site_url" ).val() );
	formData.append( 'site_email', $( "#site_email" ).val() );
	if ( $( '#logo' ).val() != 'undefined' ) {
		formData.append( 'logo', $( '#logo' ).prop( 'files' )[ 0 ] );
	}
	if ( $( '#favicon' ).val() != 'undefined' ) {
		formData.append( 'favicon', $( '#favicon' ).prop( 'files' )[ 0 ] );
	}
	formData.append( 'frontend_pricing_section', $( "#frontend_pricing_section" ).val() );
	formData.append( 'frontend_custom_templates_section', $( "#frontend_custom_templates_section" ).val() );
	formData.append( 'frontend_business_partners_section', $( "#frontend_business_partners_section" ).val() );
	formData.append( 'frontend_additional_url', $( "#frontend_additional_url" ).val() );
	formData.append( 'frontend_custom_css', $( "#frontend_custom_css" ).val() );
	formData.append( 'frontend_custom_js', $( "#frontend_custom_js" ).val() );
	formData.append( 'frontend_footer_facebook', $( "#frontend_footer_facebook" ).val() );
	formData.append( 'frontend_footer_twitter', $( "#frontend_footer_twitter" ).val() );
	formData.append( 'frontend_footer_instagram', $( "#frontend_footer_instagram" ).val() );



	formData.append( 'google_analytics_code', $( "#google_analytics_code" ).val() );
	formData.append( 'meta_title', $( "#meta_title" ).val() );
	formData.append( 'meta_description', $( "#meta_description" ).val() );


	$.ajax( {
		type: "post",
		url: "/dashboard/admin/frontend/settings-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}


function affiliateSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'affiliate_minimum_withdrawal', $( "#affiliate_minimum_withdrawal" ).val() );
	formData.append( 'affiliate_commission_percentage', $( "#affiliate_commission_percentage" ).val() );
	$.ajax( {
		type: "post",
		url: "/dashboard/admin/settings/affiliate-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}


function generalSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'site_name', $( "#site_name" ).val() );
	formData.append( 'site_url', $( "#site_url" ).val() );
	formData.append( 'site_email', $( "#site_email" ).val() );
	formData.append( 'register_active', $( "#register_active" ).val() );
	formData.append( 'default_country', $( "#default_country" ).val() );
	formData.append( 'default_currency', $( "#default_currency" ).val() );
	if ( $( '#logo' ).val() != 'undefined' ) {
		formData.append( 'logo', $( '#logo' ).prop( 'files' )[ 0 ] );
	}
	if ( $( '#favicon' ).val() != 'undefined' ) {
		formData.append( 'favicon', $( '#favicon' ).prop( 'files' )[ 0 ] );
	}
	formData.append( 'google_analytics_code', $( "#google_analytics_code" ).val() );
	formData.append( 'meta_title', $( "#meta_title" ).val() );
	formData.append( 'meta_description', $( "#meta_description" ).val() );


	$.ajax( {
		type: "post",
		url: "/dashboard/admin/settings/general-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}


function invoiceSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'invoice_name', $( "#invoice_name" ).val() );
	formData.append( 'invoice_website', $( "#invoice_website" ).val() );
	formData.append( 'invoice_address', $( "#invoice_address" ).val() );
	formData.append( 'invoice_city', $( "#invoice_city" ).val() );
	formData.append( 'invoice_state', $( "#invoice_state" ).val() );
	formData.append( 'invoice_postal', $( "#invoice_postal" ).val() );
	formData.append( 'invoice_country', $( "#invoice_country" ).val() );
	formData.append( 'invoice_phone', $( "#invoice_phone" ).val() );
	formData.append( 'invoice_vat', $( "#invoice_vat" ).val() );

	$.ajax( {
		type: "post",
		url: "/dashboard/admin/settings/invoice-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}

function stripeSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'default_currency', $( "#default_currency" ).val() );
	formData.append( 'stripe_key', $( "#stripe_key" ).val() );
	formData.append( 'stripe_secret', $( "#stripe_secret" ).val() );
	formData.append( 'stripe_base_url', $( "#stripe_base_url" ).val() );

	$.ajax( {
		type: "post",
		url: "/dashboard/admin/settings/payment-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}


function openaiSettingsSave() {
	"use strict";

	document.getElementById( "settings_button" ).disabled = true;
	document.getElementById( "settings_button" ).innerHTML = "Please Wait...";

	var formData = new FormData();
	formData.append( 'openai_api_secret', $( "#openai_api_secret" ).val() );
	formData.append( 'openai_default_model', $( "#openai_default_model" ).val() );
	formData.append( 'openai_default_language', $( "#openai_default_language" ).val() );
	formData.append( 'openai_default_tone_of_voice', $( "#openai_default_tone_of_voice" ).val() );
	formData.append( 'openai_default_creativity', $( "#openai_default_creativity" ).val() );
	formData.append( 'openai_max_input_length', $( "#openai_max_input_length" ).val() );
	formData.append( 'openai_max_output_length', $( "#openai_max_output_length" ).val() );

	$.ajax( {
		type: "post",
		url: "/dashboard/admin/settings/openai-save",
		data: formData,
		contentType: false,
		processData: false,
		success: function ( data ) {
			toastr.success( 'Settings saved succesfully.' );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		},
		error: function ( data ) {
			var err = data.responseJSON.errors;
			$.each( err, function ( index, value ) {
				toastr.error( value );
			} );
			document.getElementById( "settings_button" ).disabled = false;
			document.getElementById( "settings_button" ).innerHTML = "Save";
		}
	} );
	return false;
}
