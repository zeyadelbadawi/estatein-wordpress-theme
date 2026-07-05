<?php
/**
 * Advanced Custom Fields Configuration
 *
 * Registers ACF field groups for all editable sections.
 * Falls back gracefully when ACF Pro is not active.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Check if ACF Pro is active.
 *
 * @since 1.0.0
 * @return bool
 */
function estatein_is_acf_active() {
	return class_exists( 'ACF' ) && function_exists( 'acf_add_local_field_group' );
}

/**
 * Register ACF field groups.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_register_acf_fields() {
	if ( ! estatein_is_acf_active() ) {
		return;
	}

	// Property Details Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_property_details',
		'title'    => __( 'Property Details', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_property_price',
				'label' => __( 'Price', 'estatein' ),
				'name'  => 'property_price',
				'type'  => 'number',
				'prefix' => '$',
			),
			array(
				'key'   => 'field_property_bedrooms',
				'label' => __( 'Bedrooms', 'estatein' ),
				'name'  => 'property_bedrooms',
				'type'  => 'number',
			),
			array(
				'key'   => 'field_property_bathrooms',
				'label' => __( 'Bathrooms', 'estatein' ),
				'name'  => 'property_bathrooms',
				'type'  => 'number',
			),
			array(
				'key'   => 'field_property_area',
				'label' => __( 'Area (sq ft)', 'estatein' ),
				'name'  => 'property_area',
				'type'  => 'number',
			),
			array(
				'key'   => 'field_property_year_built',
				'label' => __( 'Year Built', 'estatein' ),
				'name'  => 'property_year_built',
				'type'  => 'number',
			),
			array(
				'key'   => 'field_property_gallery',
				'label' => __( 'Gallery', 'estatein' ),
				'name'  => 'property_gallery',
				'type'  => 'gallery',
				'return_format' => 'array',
			),
			array(
				'key'   => 'field_property_features',
				'label' => __( 'Key Features', 'estatein' ),
				'name'  => 'property_features',
				'type'  => 'repeater',
				'sub_fields' => array(
					array(
						'key'   => 'field_feature_icon',
						'label' => __( 'Icon', 'estatein' ),
						'name'  => 'icon',
						'type'  => 'select',
						'choices' => array(
							'bedroom'    => __( 'Bedroom', 'estatein' ),
							'bathroom'   => __( 'Bathroom', 'estatein' ),
							'area'       => __( 'Area', 'estatein' ),
							'home'       => __( 'Home', 'estatein' ),
							'management' => __( 'Building', 'estatein' ),
						),
					),
					array(
						'key'   => 'field_feature_label',
						'label' => __( 'Label', 'estatein' ),
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_feature_value',
						'label' => __( 'Value', 'estatein' ),
						'name'  => 'value',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_property_pricing_details',
				'label' => __( 'Pricing Details', 'estatein' ),
				'name'  => 'property_pricing_details',
				'type'  => 'repeater',
				'sub_fields' => array(
					array(
						'key'   => 'field_pricing_label',
						'label' => __( 'Label', 'estatein' ),
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pricing_value',
						'label' => __( 'Value', 'estatein' ),
						'name'  => 'value',
						'type'  => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'property',
				),
			),
		),
	) );

	// Team Member Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_team_member',
		'title'    => __( 'Team Member Details', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_team_role',
				'label' => __( 'Role / Position', 'estatein' ),
				'name'  => 'team_role',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_team_twitter',
				'label' => __( 'Twitter URL', 'estatein' ),
				'name'  => 'team_twitter',
				'type'  => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'team_member',
				),
			),
		),
	) );

	// Testimonial Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_testimonial',
		'title'    => __( 'Testimonial Details', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_testimonial_rating',
				'label' => __( 'Rating (1-5)', 'estatein' ),
				'name'  => 'testimonial_rating',
				'type'  => 'number',
				'min'   => 1,
				'max'   => 5,
				'default_value' => 5,
			),
			array(
				'key'   => 'field_testimonial_location',
				'label' => __( 'Client Location', 'estatein' ),
				'name'  => 'testimonial_location',
				'type'  => 'text',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'testimonial',
				),
			),
		),
	) );

	// About Page Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_about_page',
		'title'    => __( 'About Page Settings', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_about_hero_title',
				'label' => __( 'Hero Title', 'estatein' ),
				'name'  => 'about_hero_title',
				'type'  => 'text',
				'default_value' => 'Our Journey',
			),
			array(
				'key'   => 'field_about_hero_description',
				'label' => __( 'Hero Description', 'estatein' ),
				'name'  => 'about_hero_description',
				'type'  => 'textarea',
			),
			array(
				'key'   => 'field_about_stats',
				'label' => __( 'Statistics', 'estatein' ),
				'name'  => 'about_stats',
				'type'  => 'repeater',
				'sub_fields' => array(
					array(
						'key'   => 'field_stat_number',
						'label' => __( 'Number', 'estatein' ),
						'name'  => 'number',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_stat_label',
						'label' => __( 'Label', 'estatein' ),
						'name'  => 'label',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_about_values',
				'label' => __( 'Our Values', 'estatein' ),
				'name'  => 'about_values',
				'type'  => 'repeater',
				'sub_fields' => array(
					array(
						'key'   => 'field_value_title',
						'label' => __( 'Title', 'estatein' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_value_description',
						'label' => __( 'Description', 'estatein' ),
						'name'  => 'description',
						'type'  => 'textarea',
					),
					array(
						'key'   => 'field_value_icon',
						'label' => __( 'Icon', 'estatein' ),
						'name'  => 'icon',
						'type'  => 'select',
						'choices' => array(
							'star'       => __( 'Star', 'estatein' ),
							'home'       => __( 'Home', 'estatein' ),
							'value'      => __( 'Value', 'estatein' ),
							'lightning'  => __( 'Lightning', 'estatein' ),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-templates/about.php',
				),
			),
		),
	) );

	// Services Page Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_services_page',
		'title'    => __( 'Services Page Settings', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_services_hero_title',
				'label' => __( 'Hero Title', 'estatein' ),
				'name'  => 'services_hero_title',
				'type'  => 'text',
				'default_value' => 'Elevate Your Real Estate Experience',
			),
			array(
				'key'   => 'field_services_hero_description',
				'label' => __( 'Hero Description', 'estatein' ),
				'name'  => 'services_hero_description',
				'type'  => 'textarea',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-templates/services.php',
				),
			),
		),
	) );

	// Contact Page Field Group.
	acf_add_local_field_group( array(
		'key'      => 'group_contact_page',
		'title'    => __( 'Contact Page Settings', 'estatein' ),
		'fields'   => array(
			array(
				'key'   => 'field_contact_offices',
				'label' => __( 'Office Locations', 'estatein' ),
				'name'  => 'contact_offices',
				'type'  => 'repeater',
				'sub_fields' => array(
					array(
						'key'   => 'field_office_title',
						'label' => __( 'Office Name', 'estatein' ),
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_office_address',
						'label' => __( 'Address', 'estatein' ),
						'name'  => 'address',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_office_description',
						'label' => __( 'Description', 'estatein' ),
						'name'  => 'description',
						'type'  => 'textarea',
					),
					array(
						'key'   => 'field_office_email',
						'label' => __( 'Email', 'estatein' ),
						'name'  => 'email',
						'type'  => 'email',
					),
					array(
						'key'   => 'field_office_phone',
						'label' => __( 'Phone', 'estatein' ),
						'name'  => 'phone',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_office_location',
						'label' => __( 'City', 'estatein' ),
						'name'  => 'city',
						'type'  => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-templates/contact.php',
				),
			),
		),
	) );

	// Global Theme Settings (Options Page).
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => __( 'Theme Settings', 'estatein' ),
			'menu_title' => __( 'Theme Settings', 'estatein' ),
			'menu_slug'  => 'estatein-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 2,
		) );

		acf_add_local_field_group( array(
			'key'      => 'group_global_settings',
			'title'    => __( 'Global Settings', 'estatein' ),
			'fields'   => array(
				array(
					'key'   => 'field_footer_newsletter_title',
					'label' => __( 'Footer Newsletter Title', 'estatein' ),
					'name'  => 'footer_newsletter_title',
					'type'  => 'text',
					'default_value' => 'Stay Updated',
				),
				array(
					'key'   => 'field_cta_title',
					'label' => __( 'CTA Banner Title', 'estatein' ),
					'name'  => 'cta_title',
					'type'  => 'text',
					'default_value' => 'Start Your Real Estate Journey Today',
				),
				array(
					'key'   => 'field_cta_description',
					'label' => __( 'CTA Banner Description', 'estatein' ),
					'name'  => 'cta_description',
					'type'  => 'textarea',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'estatein-settings',
					),
				),
			),
		) );
	}
}
add_action( 'acf/init', 'estatein_register_acf_fields' );

/**
 * Helper: Get ACF field with fallback.
 *
 * Returns ACF field value if ACF is active, otherwise returns default.
 *
 * @since 1.0.0
 *
 * @param string $field_name ACF field name.
 * @param mixed  $default    Default value if ACF is not active or field is empty.
 * @param mixed  $post_id    Optional post ID or 'option' for options page.
 * @return mixed
 */
function estatein_get_field( $field_name, $default = '', $post_id = false ) {
	if ( estatein_is_acf_active() && function_exists( 'get_field' ) ) {
		$value = get_field( $field_name, $post_id );
		return ! empty( $value ) ? $value : $default;
	}

	// Fallback to post meta if ACF is not active.
	if ( $post_id && 'option' !== $post_id ) {
		$meta = get_post_meta( $post_id, $field_name, true );
		return ! empty( $meta ) ? $meta : $default;
	}

	return $default;
}