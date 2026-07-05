<?php
/**
 * Template Part: Section Header
 *
 * Reusable section header with badge, title, description, and optional CTA.
 * Accepts arguments via $args parameter.
 *
 * @package Estatein
 * @since   1.0.0
 *
 * @param array $args {
 *     @type string $title       Section title.
 *     @type string $description Section description.
 *     @type string $badge       Badge text (displayed with sparkle icon).
 *     @type string $cta_text    CTA button text.
 *     @type string $cta_url     CTA button URL.
 * }
 */

defined( 'ABSPATH' ) || exit;

$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$badge       = $args['badge'] ?? '';
$cta_text    = $args['cta_text'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';

if ( empty( $title ) ) {
	return;
}
?>

<div class="section__header<?php echo ! empty( $cta_text ) ? ' section__header--row' : ''; ?>">
	<div class="section__header-content">
		<?php if ( ! empty( $badge ) ) : ?>
			<span class="section__badge">
				<?php estatein_icon( 'sparkle', array( 'width' => 14, 'height' => 14 ) ); ?>
				<?php echo esc_html( $badge ); ?>
			</span>
		<?php endif; ?>

		<h2><?php echo esc_html( $title ); ?></h2>

		<?php if ( ! empty( $description ) ) : ?>
			<p><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( ! empty( $cta_text ) ) : ?>
		<a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn--secondary">
			<?php echo esc_html( $cta_text ); ?>
		</a>
	<?php endif; ?>
</div>