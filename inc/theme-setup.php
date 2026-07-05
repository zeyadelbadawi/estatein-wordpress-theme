<?php
/**
 * Theme Setup
 *
 * Registers theme supports, navigation menus, and image sizes.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'estatein', ESTATEIN_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// HTML5 markup support.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Custom logo support.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 40,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary'     => esc_html__( 'Primary Navigation', 'estatein' ),
			'footer-home' => esc_html__( 'Footer - Home', 'estatein' ),
			'footer-about' => esc_html__( 'Footer - About Us', 'estatein' ),
			'footer-properties' => esc_html__( 'Footer - Properties', 'estatein' ),
			'footer-services' => esc_html__( 'Footer - Services', 'estatein' ),
			'footer-contact' => esc_html__( 'Footer - Contact Us', 'estatein' ),
		)
	);

	// Custom image sizes for property listings.
	add_image_size( 'estatein-property-card', 400, 280, true );
	add_image_size( 'estatein-property-gallery', 800, 600, true );
	add_image_size( 'estatein-hero', 1200, 800, false );
	add_image_size( 'estatein-team-member', 300, 360, true );
}
add_action( 'after_setup_theme', 'estatein_setup' );

/**
 * Set the content width in pixels.
 *
 * @since 1.0.0
 * @global int $content_width
 * @return void
 */
function estatein_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'estatein_content_width', 1200 );
}
add_action( 'after_setup_theme', 'estatein_content_width', 0 );