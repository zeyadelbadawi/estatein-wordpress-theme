<?php
/**
 * Default Page Template
 *
 * The template for displaying all pages.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="page-hero" aria-label="<?php esc_attr_e( 'Page content', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<h1 class="page-hero__title"><?php the_title(); ?></h1>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="property-details__content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</section>

<?php
get_footer();