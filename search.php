<?php
/**
 * Search Results Template
 *
 * The template for displaying search results pages.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="page-hero" aria-label="<?php esc_attr_e( 'Search results', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<h1 class="page-hero__title">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Search Results for: %s', 'estatein' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</div>
	</div>
</section>

<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Search results listing', 'estatein' ); ?>">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="cards-grid">
				<?php
				while ( have_posts() ) :
					the_post();

					if ( 'property' === get_post_type() ) :
						get_template_part( 'template-parts/components/property-card' );
					else :
						?>
						<article class="card">
							<h3 class="property-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="property-card__description"><?php the_excerpt(); ?></p>
						</article>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>

			<?php
			the_posts_pagination( array(
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			) );
			?>
		<?php else : ?>
			<div style="text-align: center; padding: var(--est-space-12) 0;">
				<h2><?php esc_html_e( 'Nothing Found', 'estatein' ); ?></h2>
				<p class="page-hero__description"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'estatein' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();