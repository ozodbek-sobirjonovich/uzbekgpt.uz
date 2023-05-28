var searchResultsVisible = false;

( () => {
	"use strict";

	const searchInput = document.querySelector( '.navbar-search-input' );

	if ( !searchInput ) return;

	const navbarSearch = document.querySelector( '#navbar-search' );
	let inputFocused = false;
	var timer = null;

	searchInput.addEventListener( 'focus', function () {
		if ( !onlySpaces( searchInput.value ) ) {
			navbarSearch.classList.add( 'done-searching' );
			searchResultsVisible = true;
		}
	} );

	searchInput.addEventListener( 'keyup', function () {
		if ( onlySpaces( searchInput.value ) ) {
			searchResultsVisible = false;
			clearTimeout( timer );
			navbarSearch.classList.remove( 'is-searching' );
			navbarSearch.classList.remove( 'done-searching' );
		} else {
			navbarSearch.classList.add( 'is-searching' );
			clearTimeout( timer );
			timer = setTimeout( searchFunction, 1000 )
		}
	} );

	window.addEventListener( 'keydown', function ( e ) {
		if ( ( e.key === 'Meta' || e.metaKey ) && e.key === 'k' ) {
			if ( inputFocused ) return;
			searchInput.focus();
			inputFocused = true;
		}
		if ( e.key === 'Escape' ) {
			if ( !inputFocused ) return;
			searchInput.blur();
			inputFocused = false;
			navbarSearch.classList.remove( 'done-searching' );
		}
	} );

	document.addEventListener( 'click', ev => {
		const { target } = ev;
		const clickedOutside = !searchInput?.contains( target );
		if ( searchResultsVisible && clickedOutside ) {
			navbarSearch.classList.remove( 'is-searching' );
			navbarSearch.classList.remove( 'done-searching' );
			searchResultsVisible = false;
		};
	} );

} )();

//sadece boşlukla arama mı yapmış
function onlySpaces( str ) {
	"use strict";

	return str.trim().length === 0 || str === '';
}

function resetSearch() {
	"use strict";

	document.getElementById( "search_form" ).reset();
	return searchFunction( 'delete' );
}

function searchFunction( n ) {
	"use strict";

	const formData = new FormData();
	const navbarSearch = document.querySelector( '#navbar-search' );
	const searchInput = document.querySelector( '.navbar-search-input' );
	formData.append( '_token', document.querySelector( "input[name=_token]" )?.value );

	if ( n == 'delete' ) {
		formData.append( 'search', n );
	} else {
		formData.append( 'search', searchInput.value );
	}

	$.ajax( {
		type: "POST",
		url: '/dashboard/api/search',
		data: formData,
		contentType: false,
		processData: false,
		success: function ( result ) {
			//DİV LOAD
			$( "#search_results .search-results-container" ).html( result.html );
			navbarSearch.classList.add( 'done-searching' );
			navbarSearch.classList.remove( 'is-searching' );
			searchResultsVisible = true;
		}
	} );
}

