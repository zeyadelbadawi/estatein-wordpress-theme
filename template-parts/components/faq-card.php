<?php
/**
 * Template Part: FAQ Card
 *
 * Displays a single FAQ with question and answer excerpt.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<article class="card faq-card">
	<h3 class="faq-card__question"><?php the_title(); ?></h3>

	<div class="faq-card__answer">
		<?php echo esc_html( wp_trim_words( get_the_content(), 25, '...' ) ); ?>
	</div>

	<a href="<?php the_permalink(); ?>" class="btn btn--secondary btn--sm">
		<?php esc_html_e( 'Read More', 'estatein' ); ?>
	</a>
</article>