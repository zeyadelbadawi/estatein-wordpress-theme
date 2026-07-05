<?php
/**
 * Enqueue Scripts and Styles
 *
 * Handles all front-end asset registration and enqueueing.
 * Follows WordPress best practices for dependency management and versioning.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue front-end styles.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_enqueue_styles() {
	// Google Fonts - Urbanist.
	wp_enqueue_style(
		'estatein-google-fonts',
		'https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap',
		array(),
		null // Null version to avoid query string on external resource.
	);

	// Main theme stylesheet.
	wp_enqueue_style(
		'estatein-main',
		ESTATEIN_URI . '/assets/css/main.css',
		array( 'estatein-google-fonts' ),
		ESTATEIN_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'estatein_enqueue_styles' );

/**
 * Enqueue front-end scripts.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_enqueue_scripts() {
	// Navigation script (mobile menu toggle, sticky header).
	wp_enqueue_script(
		'estatein-navigation',
		ESTATEIN_URI . '/assets/js/navigation.js',
		array(),
		ESTATEIN_VERSION,
		true // Load in footer.
	);

	// Main script.
	wp_enqueue_script(
		'estatein-main',
		ESTATEIN_URI . '/assets/js/main.js',
		array( 'estatein-navigation' ),
		ESTATEIN_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'estatein_enqueue_scripts' );

/**
 * Preload critical fonts for performance.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_preload_fonts() {
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php
}
add_action( 'wp_head', 'estatein_preload_fonts', 1 );