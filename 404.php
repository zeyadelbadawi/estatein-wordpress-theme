<?php
/**
 * 404 Template
 *
 * The template for displaying 404 pages (Not Found).
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="page-hero" aria-label="<?php esc_attr_e( 'Page not found', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content" style="text-align: center; max-width: 600px; margin: 0 auto;">
			<h1 class="page-hero__title"><?php esc_html_e( '404', 'estatein' ); ?></h1>
			<p class="page-hero__description">
				<?php esc_html_e( "Oops! The page you're looking for doesn't exist. It might have been moved or deleted.", 'estatein' ); ?>
			</p>
			<div class="hero__actions" style="justify-content: center; margin-top: var(--est-space-6);">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary btn--lg">
					<?php esc_html_e( 'Back to Homepage', 'estatein' ); ?>
				</a>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" class="btn btn--secondary btn--lg">
					<?php esc_html_e( 'Browse Properties', 'estatein' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();