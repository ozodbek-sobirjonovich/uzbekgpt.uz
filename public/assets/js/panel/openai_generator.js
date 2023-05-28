$( '#file' ).on( 'change', function () {
	"use strict";

	if ( this.files[ 0 ].size > 24900000 ) {
		toastr.error( 'This file exceed the limit of file upload.' );
		document.getElementById( "file" ).value = null;
	}
	var ext = $( '#file' ).val().split( '.' ).pop().toLowerCase();
	if ( $.inArray( ext, [ 'mp3', 'mp4', 'mpeg', 'mpga', 'm4a', 'wav', 'webm' ] ) == -1 ) {
		toastr.error( 'Invalid extension. Accepted extensions are mp3, mp4, mpeg, mpga, m4a, wav, and webm' );
		document.getElementById( "file" ).value = null;
	}
} );
// @formatter:off
document.addEventListener( "DOMContentLoaded", function () {
	"use strict";

	var el;
	window.TomSelect && ( new TomSelect( el = document.getElementById( 'language' ), {
		copyClassesToDropdown: false,
		dropdownClass: 'dropdown-menu ts-dropdown',
		optionClass: 'dropdown-item',
		controlInput: '<input>',
		render: {
			item: function ( data, escape ) {
				if ( data.customProperties ) {
					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape( data.text ) + '</div>';
				}
				return '<div>' + escape( data.text ) + '</div>';
			},
			option: function ( data, escape ) {
				if ( data.customProperties ) {
					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape( data.text ) + '</div>';
				}
				return '<div>' + escape( data.text ) + '</div>';
			},
		},
	} ) );
} );
// @formatter:on
