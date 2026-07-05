<?php
/**
 * Template Tags
 *
 * Reusable helper functions for template output.
 * All output is properly escaped following WordPress security standards.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Renders an SVG icon from the theme's icon set.
 *
 * @since 1.0.0
 *
 * @param string $icon_name The icon identifier.
 * @param array  $args      Optional. Additional arguments (class, aria-label, size).
 * @return void
 */
function estatein_icon( $icon_name, $args = array() ) {
	$defaults = array(
		'class'      => '',
		'aria_label' => '',
		'width'      => 24,
		'height'     => 24,
	);

	$args       = wp_parse_args( $args, $defaults );
	$class      = ! empty( $args['class'] ) ? ' class="' . esc_attr( $args['class'] ) . '"' : '';
	$aria_label = ! empty( $args['aria_label'] ) ? ' aria-label="' . esc_attr( $args['aria_label'] ) . '"' : ' aria-hidden="true"';
	$width      = absint( $args['width'] );
	$height     = absint( $args['height'] );

	$icons = estatein_get_icons();

	if ( isset( $icons[ $icon_name ] ) ) {
		printf(
			'<svg%s%s width="%d" height="%d" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">%s</svg>',
			$class,
			$aria_label,
			$width,
			$height,
			$icons[ $icon_name ] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG paths are hardcoded.
		);
	}
}

/**
 * Returns the icon SVG path data.
 *
 * @since 1.0.0
 * @return array Associative array of icon names to SVG path markup.
 */
function estatein_get_icons() {
	return array(
		'star'       => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="currentColor"/>',
		'bedroom'    => '<path d="M7 14c1.66 0 3-1.34 3-3S8.66 8 7 8s-3 1.34-3 3 1.34 3 3 3zm0-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm12-3h-8v5H3V7H1v10h2v-3h18v3h2V9c0-1.1-.9-2-2-2z" fill="currentColor"/>',
		'bathroom'   => '<path d="M7 7c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm13 2h-2V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v5H4c-1.1 0-2 .9-2 2v5h2v2h2v-2h12v2h2v-2h2v-5c0-1.1-.9-2-2-2z" fill="currentColor"/>',
		'area'       => '<path d="M3 5v14h18V5H3zm16 12H5V7h14v10z" fill="currentColor"/><path d="M7 9h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2zM7 13h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2z" fill="currentColor"/>',
		'arrow-right' => '<path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'arrow-left' => '<path d="M19 12H5M12 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'menu'       => '<path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'close'      => '<path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'mail'       => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" fill="none"/><polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" fill="none"/>',
		'phone'      => '<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" fill="none"/>',
		'location'   => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" fill="none"/>',
		'send'       => '<line x1="22" y1="2" x2="11" y2="13" stroke="currentColor" stroke-width="2"/><polygon points="22 2 15 22 11 13 2 9 22 2" stroke="currentColor" stroke-width="2" fill="none"/>',
		'sparkle'    => '<path d="M12 2L14.5 9.5L22 12L14.5 14.5L12 22L9.5 14.5L2 12L9.5 9.5L12 2Z" fill="currentColor"/>',
		'home'       => '<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'value'      => '<path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'management' => '<path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'investment' => '<path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'facebook'   => '<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'twitter'    => '<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
		'linkedin'   => '<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/><rect x="2" y="9" width="4" height="12" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="4" cy="4" r="2" stroke="currentColor" stroke-width="2" fill="none"/>',
		'youtube'    => '<path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.43z" stroke="currentColor" stroke-width="2" fill="none"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" stroke="currentColor" stroke-width="2" fill="none"/>',
		'lightning'  => '<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
	);
}

/**
 * Renders a section header component.
 *
 * @since 1.0.0
 *
 * @param array $args {
 *     Section header arguments.
 *
 *     @type string $title       Section title.
 *     @type string $description Section description text.
 *     @type string $badge       Optional badge/label text above title.
 *     @type string $cta_text    Optional CTA button text.
 *     @type string $cta_url     Optional CTA button URL.
 * }
 * @return void
 */
function estatein_section_header( $args = array() ) {
	$defaults = array(
		'title'       => '',
		'description' => '',
		'badge'       => '',
		'cta_text'    => '',
		'cta_url'     => '#',
	);

	$args = wp_parse_args( $args, $defaults );

	get_template_part( 'template-parts/components/section-header', null, $args );
}

/**
 * Returns property meta data.
 *
 * @since 1.0.0
 *
 * @param int $post_id Optional. Post ID. Defaults to current post.
 * @return array Property meta data.
 */
function estatein_get_property_meta( $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return array(
		'price'     => get_post_meta( $post_id, '_estatein_price', true ),
		'bedrooms'  => get_post_meta( $post_id, '_estatein_bedrooms', true ),
		'bathrooms' => get_post_meta( $post_id, '_estatein_bathrooms', true ),
		'area'      => get_post_meta( $post_id, '_estatein_area', true ),
		'location'  => get_post_meta( $post_id, '_estatein_location', true ),
	);
}

/**
 * Formats a price value for display.
 *
 * @since 1.0.0
 *
 * @param string|int $price Raw price value.
 * @return string Formatted price string.
 */
function estatein_format_price( $price ) {
	if ( empty( $price ) ) {
		return __( 'Price on Request', 'estatein' );
	}

	return '$' . number_format( (int) $price );
}