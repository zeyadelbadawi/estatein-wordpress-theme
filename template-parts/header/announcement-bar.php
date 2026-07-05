<?php
/**
 * Template Part: Announcement Bar
 *
 * Dismissible top bar with promotional message.
 * Content managed via Theme Customizer.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$announcement_text = get_theme_mod( 'estatein_announcement_text', __( 'Discover Your Dream Property with Estatein', 'estatein' ) );
$announcement_link = get_theme_mod( 'estatein_announcement_link', '#' );
?>

<div class="announcement-bar" id="announcement-bar" role="complementary" aria-label="<?php esc_attr_e( 'Announcement', 'estatein' ); ?>">
	<div class="announcement-bar__content">
		<span aria-hidden="true">✨</span>
		<span><?php echo esc_html( $announcement_text ); ?></span>
		<a href="<?php echo esc_url( $announcement_link ); ?>">
			<?php esc_html_e( 'Learn More', 'estatein' ); ?>
		</a>
	</div>

</div>