<?php
/**
 * Template Part: CTA Banner
 *
 * Full-width call-to-action banner with grid background pattern.
 * Reused across multiple pages.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$title       = $args['title'] ?? __( 'Start Your Real Estate Journey Today', 'estatein' );
$description = $args['description'] ?? __( "Your dream property is just a click away. Whether you're looking for a new home, a## strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way.", 'estatein' );
$cta_text    = $args['cta_text'] ?? __( 'Explore Properties', 'estatein' );
$cta_url     = $args['cta_url'] ?? get_post_type_archive_link( 'property' );
?>

<section class="cta-banner" aria-label="<?php esc_attr_e( 'Call to action', 'estatein' ); ?>">
	<div class="cta-banner__bg" aria-hidden="true"></div>
	<div class="cta-banner__inner">
		<div>
			<h2 class="cta-banner__title"><?php echo esc_html( $title ); ?></h2>
			<p class="cta-banner__description"><?php echo esc_html( $description ); ?></p>
		</div>
		<a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn--primary btn--lg">
			<?php echo esc_html( $cta_text ); ?>
		</a>
	</div>
</section>