/**
 * Main Script
 *
 * General-purpose JavaScript for the Estatein theme.
 * Handles progressive enhancement features.
 *
 * @package Estatein
 * @since   1.0.0
 */

( function() {
	'use strict';

	/**
	 * Lazy Load Images
	 *
	 * Uses native lazy loading with IntersectionObserver fallback
	 * for browsers that don't support loading="lazy".
	 */
	const LazyImages = {
		init() {
			// Native lazy loading is widely supported.
			// This module adds fade-in animation on load.
			const images = document.querySelectorAll( 'img[loading="lazy"]' );

			if ( ! images.length ) {
				return;
			}

			images.forEach( ( img ) => {
				if ( img.complete ) {
					img.classList.add( 'is-loaded' );
				} else {
					img.addEventListener( 'load', () => {
						img.classList.add( 'is-loaded' );
					} );
				}
			} );
		},
	};

	/**
	 * Smooth Scroll
	 *
	 * Handles smooth scrolling for anchor links.
	 * Respects prefers-reduced-motion.
	 */
	const SmoothScroll = {
		init() {
			const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

			if ( prefersReducedMotion ) {
				return;
			}

			document.querySelectorAll( 'a[href^="#"]' ).forEach( ( anchor ) => {
				anchor.addEventListener( 'click', ( e ) => {
					const targetId = anchor.getAttribute( 'href' );

					if ( targetId === '#' ) {
						return;
					}

					const target = document.querySelector( targetId );

					if ( target ) {
						e.preventDefault();
						target.scrollIntoView( {
							behavior: 'smooth',
							block: 'start',
						} );

						// Update focus for accessibility.
						target.setAttribute( 'tabindex', '-1' );
						target.focus( { preventScroll: true } );
					}
				} );
			} );
		},
	};

	/**
	 * Initialize on DOM ready.
	 */
	document.addEventListener( 'DOMContentLoaded', () => {
		LazyImages.init();
		SmoothScroll.init();
	} );
} )();