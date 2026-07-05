<?php
/**
 * Custom Post Types and Taxonomies
 *
 * Registers all custom content types for the Estatein theme.
 * Each CPT is designed with proper labels, capabilities, and REST API support.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Custom Post Types.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_register_post_types() {
	// Properties CPT.
	register_post_type(
		'property',
		array(
			'labels'             => array(
				'name'                  => _x( 'Properties', 'Post type general name', 'estatein' ),
				'singular_name'         => _x( 'Property', 'Post type singular name', 'estatein' ),
				'menu_name'             => _x( 'Properties', 'Admin Menu text', 'estatein' ),
				'add_new'               => __( 'Add New Property', 'estatein' ),
				'add_new_item'          => __( 'Add New Property', 'estatein' ),
				'edit_item'             => __( 'Edit Property', 'estatein' ),
				'new_item'              => __( 'New Property', 'estatein' ),
				'view_item'             => __( 'View Property', 'estatein' ),
				'search_items'          => __( 'Search Properties', 'estatein' ),
				'not_found'             => __( 'No properties found.', 'estatein' ),
				'not_found_in_trash'    => __( 'No properties found in Trash.', 'estatein' ),
				'all_items'             => __( 'All Properties', 'estatein' ),
				'featured_image'        => __( 'Property Image', 'estatein' ),
				'set_featured_image'    => __( 'Set property image', 'estatein' ),
				'remove_featured_image' => __( 'Remove property image', 'estatein' ),
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'properties' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-building',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		)
	);

	// Testimonials CPT.
	register_post_type(
		'testimonial',
		array(
			'labels'             => array(
				'name'               => _x( 'Testimonials', 'Post type general name', 'estatein' ),
				'singular_name'      => _x( 'Testimonial', 'Post type singular name', 'estatein' ),
				'menu_name'          => _x( 'Testimonials', 'Admin Menu text', 'estatein' ),
				'add_new'            => __( 'Add New Testimonial', 'estatein' ),
				'add_new_item'       => __( 'Add New Testimonial', 'estatein' ),
				'edit_item'          => __( 'Edit Testimonial', 'estatein' ),
				'view_item'          => __( 'View Testimonial', 'estatein' ),
				'search_items'       => __( 'Search Testimonials', 'estatein' ),
				'not_found'          => __( 'No testimonials found.', 'estatein' ),
				'not_found_in_trash' => __( 'No testimonials found in Trash.', 'estatein' ),
			),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'testimonials' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-format-quote',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		)
	);

	// FAQs CPT.
	register_post_type(
		'faq',
		array(
			'labels'             => array(
				'name'               => _x( 'FAQs', 'Post type general name', 'estatein' ),
				'singular_name'      => _x( 'FAQ', 'Post type singular name', 'estatein' ),
				'menu_name'          => _x( 'FAQs', 'Admin Menu text', 'estatein' ),
				'add_new'            => __( 'Add New FAQ', 'estatein' ),
				'add_new_item'       => __( 'Add New FAQ', 'estatein' ),
				'edit_item'          => __( 'Edit FAQ', 'estatein' ),
				'view_item'          => __( 'View FAQ', 'estatein' ),
				'search_items'       => __( 'Search FAQs', 'estatein' ),
				'not_found'          => __( 'No FAQs found.', 'estatein' ),
				'not_found_in_trash' => __( 'No FAQs found in Trash.', 'estatein' ),
			),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'faqs' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-editor-help',
			'supports'           => array( 'title', 'editor', 'custom-fields' ),
		)
	);

	// Services CPT.
	register_post_type(
		'service',
		array(
			'labels'             => array(
				'name'               => _x( 'Services', 'Post type general name', 'estatein' ),
				'singular_name'      => _x( 'Service', 'Post type singular name', 'estatein' ),
				'menu_name'          => _x( 'Services', 'Admin Menu text', 'estatein' ),
				'add_new'            => __( 'Add New Service', 'estatein' ),
				'add_new_item'       => __( 'Add New Service', 'estatein' ),
				'edit_item'          => __( 'Edit Service', 'estatein' ),
				'view_item'          => __( 'View Service', 'estatein' ),
				'search_items'       => __( 'Search Services', 'estatein' ),
				'not_found'          => __( 'No services found.', 'estatein' ),
				'not_found_in_trash' => __( 'No services found in Trash.', 'estatein' ),
			),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-hammer',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		)
	);

	// Team Members CPT.
	register_post_type(
		'team_member',
		array(
			'labels'             => array(
				'name'               => _x( 'Team Members', 'Post type general name', 'estatein' ),
				'singular_name'      => _x( 'Team Member', 'Post type singular name', 'estatein' ),
				'menu_name'          => _x( 'Team', 'Admin Menu text', 'estatein' ),
				'add_new'            => __( 'Add New Member', 'estatein' ),
				'add_new_item'       => __( 'Add New Team Member', 'estatein' ),
				'edit_item'          => __( 'Edit Team Member', 'estatein' ),
				'view_item'          => __( 'View Team Member', 'estatein' ),
				'search_items'       => __( 'Search Team Members', 'estatein' ),
				'not_found'          => __( 'No team members found.', 'estatein' ),
				'not_found_in_trash' => __( 'No team members found in Trash.', 'estatein' ),
			),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		)
	);
}
add_action( 'init', 'estatein_register_post_types' );

/**
 * Register Custom Taxonomies.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_register_taxonomies() {
	// Property Type taxonomy.
	register_taxonomy(
		'property_type',
		'property',
		array(
			'labels'            => array(
				'name'              => _x( 'Property Types', 'taxonomy general name', 'estatein' ),
				'singular_name'     => _x( 'Property Type', 'taxonomy singular name', 'estatein' ),
				'search_items'      => __( 'Search Property Types', 'estatein' ),
				'all_items'         => __( 'All Property Types', 'estatein' ),
				'edit_item'         => __( 'Edit Property Type', 'estatein' ),
				'update_item'       => __( 'Update Property Type', 'estatein' ),
				'add_new_item'      => __( 'Add New Property Type', 'estatein' ),
				'new_item_name'     => __( 'New Property Type Name', 'estatein' ),
				'menu_name'         => __( 'Property Types', 'estatein' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'property-type' ),
		)
	);

	// Property Location taxonomy.
	register_taxonomy(
		'property_location',
		'property',
		array(
			'labels'            => array(
				'name'              => _x( 'Locations', 'taxonomy general name', 'estatein' ),
				'singular_name'     => _x( 'Location', 'taxonomy singular name', 'estatein' ),
				'search_items'      => __( 'Search Locations', 'estatein' ),
				'all_items'         => __( 'All Locations', 'estatein' ),
				'edit_item'         => __( 'Edit Location', 'estatein' ),
				'update_item'       => __( 'Update Location', 'estatein' ),
				'add_new_item'      => __( 'Add New Location', 'estatein' ),
				'new_item_name'     => __( 'New Location Name', 'estatein' ),
				'menu_name'         => __( 'Locations', 'estatein' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'location' ),
		)
	);
}
add_action( 'init', 'estatein_register_taxonomies' );

/**
 * Flush rewrite rules on theme activation.
 *
 * @since 1.0.0
 * @return void
 */
function estatein_rewrite_flush() {
	estatein_register_post_types();
	estatein_register_taxonomies();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'estatein_rewrite_flush' );