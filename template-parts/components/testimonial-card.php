<?php
/**
 * Template Part: Testimonial Card
 *
 * Displays a single testimonial with rating, quote, and author info.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$rating   = get_post_meta( get_the_ID(), '_estatein_rating', true );
$rating   = ! empty( $rating ) ? absint( $rating ) : 5;
$location = get_post_meta( get_the_ID(), '_estatein_client_location', true );
?>

<article class="card testimonial-card" aria-label="<?php the_title_attribute(); ?>">
	<div class="testimonial-card__rating" aria-label="<?php printf( esc_attr__( 'Rating: %d out of 5 stars', 'estatein' ), $rating ); ?>">
		<?php for ( $i = 0; $i < $rating; $i++ ) : ?>
			<?php estatein_icon( 'star', array( 'width' => 20, 'height' => 20 ) ); ?>
		<?php endfor; ?>
	</div>

	<h3 class="testimonial-card__title"><?php the_title(); ?></h3>

	<div class="testimonial-card__text">
		<?php echo esc_html( get_the_excerpt() ); ?>
	</div>

	<div class="testimonial-card__author">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'thumbnail',
				array(
					'class'   => 'testimonial-card__avatar',
					'loading' => 'lazy',
					'alt'     => get_the_title(),
				)
			);
			?>
		<?php endif; ?>

		<div>
			<div class="testimonial-card__author-name"><?php the_title(); ?></div>
			<?php if ( ! empty( $location ) ) : ?>
				<div class="testimonial-card__author-location"><?php echo esc_html( $location ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</article>