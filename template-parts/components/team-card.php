<?php
/**
 * Template Part: Team Member Card
 *
 * Displays a team member card with photo, name, role, and social links.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$team_role    = estatein_get_field( 'team_role', '', get_the_ID() );
$team_twitter = estatein_get_field( 'team_twitter', '', get_the_ID() );

if ( empty( $team_role ) ) {
	$team_role = get_post_meta( get_the_ID(), '_estatein_team_role', true );
}
?>
<article class="card team-card" itemscope itemtype="https://schema.org/Person">
	<div class="team-card__image">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'estatein-team-member',
				array(
					'itemprop' => 'image',
					'loading'  => 'lazy',
				)
			);
			?>
		<?php else : ?>
			<img
				src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=360&fit=crop&crop=face"
				alt="<?php the_title_attribute(); ?>"
				loading="lazy"
				width="300"
				height="360"
			>
		<?php endif; ?>
	</div>

	<div class="team-card__info">
		<h3 class="team-card__name" itemprop="name"><?php the_title(); ?></h3>
		<?php if ( $team_role ) : ?>
			<p class="team-card__role" itemprop="jobTitle"><?php echo esc_html( $team_role ); ?></p>
		<?php endif; ?>
	</div>

	<div class="team-card__social">
		<?php if ( $team_twitter ) : ?>
			<a href="<?php echo esc_url( $team_twitter ); ?>" class="team-card__social-link" aria-label="<?php esc_attr_e( 'Twitter profile', 'estatein' ); ?>" target="_blank" rel="noopener noreferrer">
				<?php estatein_icon( 'twitter', array( 'width' => 18, 'height' => 18 ) ); ?>
			</a>
		<?php else : ?>
			<a href="#" class="team-card__social-link" aria-label="<?php esc_attr_e( 'Twitter', 'estatein' ); ?>">
				<?php estatein_icon( 'twitter', array( 'width' => 18, 'height' => 18 ) ); ?>
			</a>
		<?php endif; ?>
	</div>
</article>