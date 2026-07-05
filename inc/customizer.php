<?php
/**
 * Theme Customizer
 *
 * Adds theme-specific options to the WordPress Customizer.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Customizer settings and controls.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function estatein_customize_register( $wp_customize ) {
	// Announcement Bar Section.
	$wp_customize->add_section(
		'estatein_announcement',
		array(
			'title'    => __( 'Announcement Bar', 'estatein' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'estatein_announcement_text',
		array(
			'default'           => __( 'Discover Your Dream Property with Estatein', 'estatein' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'estatein_announcement_text',
		array(
			'label'   => __( 'Announcement Text', 'estatein' ),
			'section' => 'estatein_announcement',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'estatein_announcement_link',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'estatein_announcement_link',
		array(
			'label'   => __( 'Announcement Link URL', 'estatein' ),
			'section' => 'estatein_announcement',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'estatein_announcement_visible',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'estatein_announcement_visible',
		array(
			'label'   => __( 'Show Announcement Bar', 'estatein' ),
			'section' => 'estatein_announcement',
			'type'    => 'checkbox',
		)
	);

	// Hero Section.
	$wp_customize->add_section(
		'estatein_hero',
		array(
			'title'    => __( 'Homepage Hero', 'estatein' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting(
		'estatein_hero_title',
		array(
			'default'           => __( 'Discover Your Dream Property with Estatein', 'estatein' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'estatein_hero_title',
		array(
			'label'   => __( 'Hero Title', 'estatein' ),
			'section' => 'estatein_hero',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'estatein_hero_description',
		array(
			'default'           => __( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatein' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control(
		'estatein_hero_description',
		array(
			'label'   => __( 'Hero Description', 'estatein' ),
			'section' => 'estatein_hero',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'estatein_customize_register' );