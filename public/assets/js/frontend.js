( () => {
	"use strict";

	const navbarExpander = document.querySelector( '.navbar-expander' );
	const dropdownMenus = document.querySelectorAll( '.dropdown-menu' );
	const mobileNavTrigger = document.querySelector( '.mobile-nav-trigger' );
	const siteNavContainer = document.querySelector( '.site-nav-container' );
	const templatesShowMore = document.querySelector( '.templates-show-more' );
	const filterTriggers = document.querySelectorAll( 'button[data-target]' );
	const frontendLocalNav = document.querySelector( '#frontend-local-navbar' );
	let lastActiveTrigger = null;
	let lastOpenedAccordions = null;

	navbarExpander?.addEventListener( 'click', event => {
		event.preventDefault();
		const navbarIsShrinked = document.body.classList.contains( 'navbar-shrinked' );
		document.body.classList.toggle( 'navbar-shrinked' );
		localStorage.setItem( 'lqd-navbar-shrinked', !navbarIsShrinked );
	} );

	dropdownMenus.forEach( dd => {
		if ( document.body.classList.contains( 'navbar-shrinked' ) ) {
			dd.classList.remove( 'show' );
		}
	} );

	document.addEventListener( 'click', ev => {
		const { target } = ev;
		dropdownMenus.forEach( dd => {
			const clickedOutside = !dd.parentElement.contains( target );
			if ( clickedOutside ) {
				dd.classList.remove( 'show' );
				searchResultsVisible = false;
			};
		} )
	} );

	templatesShowMore?.addEventListener( 'click', ev => {
		ev.preventDefault();
		const list = document.querySelector( '.templates-cards' );
		const overlay = document.querySelector( '.templates-cards-overlay' );
		list.style.overflow = 'visible';
		list.animate(
			[
				// keyframes
				{ maxHeight: '28rem' },
				{ maxHeight: '500rem' },
			],
			{
				// timing options
				duration: 3000,
				easing: 'ease-out',
				fill: 'forwards'
			}
		);
		overlay.animate(
			[
				{ opacity: 0 }
			],
			{
				duration: 650,
				fill: 'forwards',
				easing: 'ease-out'
			}
		);
		const btnAnima = templatesShowMore.animate(
			[
				{ opacity: 0 }
			],
			{
				duration: 650,
				fill: 'forwards',
				easing: 'ease-out'
			}
		);
		btnAnima.onfinish = () => {
			overlay.style.visibility = 'hidden';
			templatesShowMore.style.visibility = 'hidden';
		}
	} );

	filterTriggers?.forEach( trigger => {
		const targetId = trigger.getAttribute( 'data-target' );
		const targets = document.querySelectorAll( targetId );
		const triggerType = trigger.getAttribute( 'data-trigger-type' ) || 'toggle';

		if ( targets.length <= 0 ) {
			return trigger.setAttribute( 'disabled', true );
		};

		trigger.addEventListener( 'click', ev => {
			ev?.preventDefault();


			trigger.classList.add( 'lqd-is-active' );

			if ( triggerType === 'toggle' ) {
				[ ...trigger.parentElement.children ]
					.filter( c => c.getAttribute( 'data-target' ) !== targetId )
					.forEach( c => c.classList.remove( 'lqd-is-active' ) );
			} else if ( triggerType === 'accordion' ) {
				if ( lastActiveTrigger ) {
					lastActiveTrigger.classList.remove( 'lqd-is-active' );
				}
				lastActiveTrigger = trigger;
			}

			targets?.forEach( t => {
				t.style.display = 'block';
				t.animate(
					[
						{ opacity: 0 },
						{ opacity: 1 },
					],
					{
						duration: 650,
						easing: 'cubic-bezier(.48,.81,.52,.99)'
					}
				);
			} );

			if ( triggerType === 'toggle' ) {
				[ ...targets[ 0 ]?.parentElement?.children ]
					?.filter( c => targetId.startsWith( '.' ) ? !c.classList.contains( targetId.replace( '.', '' ) ) : c.getAttribute( 'id' ) !== targetId.replace( '#', '' ) )
					?.forEach( c => c.style.display = 'none' );
			} else if ( triggerType === 'accordion' ) {
				if ( lastOpenedAccordions ) {
					lastOpenedAccordions.forEach( t => {
						t.style.display = 'none';
					} )
				}
				lastOpenedAccordions = targets;
			}
		} )
	} );

	if ( frontendLocalNav ) {
		const scrollspy = VanillaScrollspy( { menu: frontendLocalNav } )
		scrollspy.init()
	}

	mobileNavTrigger?.addEventListener( 'click', ev => {
		ev.preventDefault();
		mobileNavTrigger.classList.toggle( 'lqd-is-active' );
		siteNavContainer.classList.toggle( 'lqd-is-active' );
	} )

} )();