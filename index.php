<?php
/**
 * Main Index Template
 *
 * The fallback template used when no more specific template is available.
 * In a fully-built theme, this would display a blog listing.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="section">
	<div class="container">
		<h1><?php esc_html_e( 'Latest Posts', 'estatein' ); ?></h1>

		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'estatein' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();