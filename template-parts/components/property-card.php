<?php
/**
 * Template Part: Property Card
 *
 * Displays a single property in card format.
 * Used in property grids and carousels.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$property_meta = estatein_get_property_meta();
$property_type = get_the_terms( get_the_ID(), 'property_type' );
$badge_text    = ! empty( $property_type ) && ! is_wp_error( $property_type ) ? $property_type[0]->name : '';
?>

<article class="card property-card" aria-label="<?php the_title_attribute(); ?>">
	<div class="property-card__image">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'estatein-property-card',
				array(
					'loading' => 'lazy',
					'alt'     => get_the_title(),
				)
			);
			?>
		<?php else : ?>
			<img
				src="<?php echo esc_url( ESTATEIN_URI . '/assets/images/placeholder-property.jpg' ); ?>"
				alt="<?php the_title_attribute(); ?>"
				loading="lazy"
				width="400"
				height="280"
			>
		<?php endif; ?>

		<?php if ( ! empty( $badge_text ) ) : ?>
			<span class="property-card__badge"><?php echo esc_html( $badge_text ); ?></span>
		<?php endif; ?>
	</div>

	<h3 class="property-card__title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>

	<?php if ( has_excerpt() ) : ?>
		<p class="property-card__description"><?php echo esc_html( get_the_excerpt() ); ?></p>
	<?php endif; ?>

	<div class="property-card__meta">
		<?php if ( ! empty( $property_meta['bedrooms'] ) ) : ?>
			<span class="property-card__meta-item">
				<?php estatein_icon( 'bedroom', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php
				printf(
					/* translators: %s: number of bedrooms */
					esc_html__( '%s-Bedroom', 'estatein' ),
					esc_html( $property_meta['bedrooms'] )
				);
				?>
			</span>
		<?php endif; ?>

		<?php if ( ! empty( $property_meta['bathrooms'] ) ) : ?>
			<span class="property-card__meta-item">
				<?php estatein_icon( 'bathroom', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php
				printf(
					/* translators: %s: number of bathrooms */
					esc_html__( '%s-Bathroom', 'estatein' ),
					esc_html( $property_meta['bathrooms'] )
				);
				?>
			</span>
		<?php endif; ?>

		<?php if ( ! empty( $property_meta['area'] ) ) : ?>
			<span class="property-card__meta-item">
				<?php estatein_icon( 'area', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php echo esc_html( $property_meta['area'] ); ?>
			</span>
		<?php endif; ?>
	</div>

	<div class="property-card__footer">
		<div>
			<span class="property-card__price-label"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
			<div class="property-card__price"><?php echo esc_html( estatein_format_price( $property_meta['price'] ) ); ?></div>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn--primary btn--sm">
			<?php esc_html_e( 'View Property Details', 'estatein' ); ?>
		</a>
	</div>
</article>