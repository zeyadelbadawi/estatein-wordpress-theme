<?php
/**
 * Estatein Theme Functions
 *
 * This file serves as the theme bootstrapper.
 * All functionality is organized into modular includes.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants.
 */
define( 'ESTATEIN_VERSION', '1.0.0' );
define( 'ESTATEIN_DIR', get_template_directory() );
define( 'ESTATEIN_URI', get_template_directory_uri() );

/**
 * Include theme modules.
 *
 * Each module is responsible for a single concern:
 * - theme-setup.php:    Theme supports, menus, image sizes
 * - enqueue.php:        Script and style registration
 * - post-types.php:     Custom Post Types and Taxonomies
 * - template-tags.php:  Reusable template helper functions
 * - customizer.php:     Theme Customizer settings
 */
$estatein_includes = array(
	'/inc/theme-setup.php',
	'/inc/enqueue.php',
	'/inc/post-types.php',
	'/inc/template-tags.php',
	'/inc/customizer.php',
	'/inc/acf-fields.php',
);

foreach ( $estatein_includes as $file ) {
	$filepath = ESTATEIN_DIR . $file;

	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	}
}