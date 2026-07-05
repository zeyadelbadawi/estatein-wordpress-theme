/**
 * Navigation Module
 *
 * Handles mobile menu toggle, announcement bar dismissal,
 * and sticky header behavior.
 *
 * @package Estatein
 * @since   1.0.0
 */

( function() {
	'use strict';

	/**
	 * Mobile Menu Controller
	 *
	 * Manages the mobile navigation panel open/close state,
	 * focus trapping, and body scroll locking.
	 */
	const MobileMenu = {
		menu: null,
		toggleBtn: null,
		closeBtn: null,
		focusableElements: null,
		firstFocusable: null,
		lastFocusable: null,

		init() {
			this.menu = document.getElementById( 'mobile-menu' );
			this.toggleBtn = document.querySelector( '[data-menu-toggle]' );
			this.closeBtn = document.querySelector( '[data-menu-close]' );

			if ( ! this.menu || ! this.toggleBtn ) {
				return;
			}

			this.toggleBtn.addEventListener( 'click', () => this.open() );

			if ( this.closeBtn ) {
				this.closeBtn.addEventListener( 'click', () => this.close() );
			}

			// Close on escape key.
			document.addEventListener( 'keydown', ( e ) => {
				if ( e.key === 'Escape' && this.isOpen() ) {
					this.close();
				}
			} );

			// Close when clicking outside menu (on overlay area).
			this.menu.addEventListener( 'click', ( e ) => {
				if ( e.target === this.menu ) {
					this.close();
				}
			} );
		},

		isOpen() {
			return this.menu.getAttribute( 'aria-hidden' ) === 'false';
		},

		open() {
			this.menu.setAttribute( 'aria-hidden', 'false' );
			this.toggleBtn.setAttribute( 'aria-expanded', 'true' );
			document.body.style.overflow = 'hidden';

			// Set focus to close button.
			if ( this.closeBtn ) {
				this.closeBtn.focus();
			}

			// Setup focus trap.
			this.setupFocusTrap();
		},

		close() {
			this.menu.setAttribute( 'aria-hidden', 'true' );
			this.toggleBtn.setAttribute( 'aria-expanded', 'false' );
			document.body.style.overflow = '';

			// Return focus to toggle button.
			this.toggleBtn.focus();
		},

		setupFocusTrap() {
			this.focusableElements = this.menu.querySelectorAll(
				'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])'
			);

			if ( this.focusableElements.length === 0 ) {
				return;
			}

			this.firstFocusable = this.focusableElements[ 0 ];
			this.lastFocusable = this.focusableElements[ this.focusableElements.length - 1 ];

			this.menu.addEventListener( 'keydown', ( e ) => this.trapFocus( e ) );
		},

		trapFocus( e ) {
			if ( e.key !== 'Tab' ) {
				return;
			}

			if ( e.shiftKey ) {
				if ( document.activeElement === this.firstFocusable ) {
					e.preventDefault();
					this.lastFocusable.focus();
				}
			} else {
				if ( document.activeElement === this.lastFocusable ) {
					e.preventDefault();
					this.firstFocusable.focus();
				}
			}
		},
	};

	/**
	 * Announcement Bar Controller
	 *
	 * Handles dismissal with sessionStorage persistence.
	 */
	const AnnouncementBar = {
		bar: null,
		dismissBtn: null,
		storageKey: 'estatein_announcement_dismissed',

		init() {
			this.bar = document.getElementById( 'announcement-bar' );

			if ( ! this.bar ) {
				return;
			}

			// Check if previously dismissed in this session.
			if ( sessionStorage.getItem( this.storageKey ) === 'true' ) {
				this.bar.remove();
				return;
			}

			this.dismissBtn = this.bar.querySelector( '[data-dismiss="announcement-bar"]' );

			if ( this.dismissBtn ) {
				this.dismissBtn.addEventListener( 'click', () => this.dismiss() );
			}
		},

		dismiss() {
			this.bar.style.display = 'none';
			sessionStorage.setItem( this.storageKey, 'true' );
		},
	};

	/**
	 * Initialize all navigation modules on DOM ready.
	 */
	document.addEventListener( 'DOMContentLoaded', () => {
		MobileMenu.init();
		AnnouncementBar.init();
	} );
} )();