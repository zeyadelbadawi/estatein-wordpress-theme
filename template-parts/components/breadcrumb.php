<?php
/**
 * Template Part: Breadcrumb Navigation
 *
 * Displays breadcrumb navigation with Schema.org markup.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$breadcrumb_items = isset( $args['items'] ) ? $args['items'] : array();

if ( empty( $breadcrumb_items ) ) {
	return;
}
?>
<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'estatein' ); ?>">
	<div class="container">
		<ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
			<?php foreach ( $breadcrumb_items as $index => $item ) : ?>
				<li class="breadcrumb__item<?php echo ( $index === count( $breadcrumb_items ) - 1 ) ? ' breadcrumb__item--active' : ''; ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<?php if ( $index < count( $breadcrumb_items ) - 1 && ! empty( $item['url'] ) ) : ?>
						<a href="<?php echo esc_url( $item['url'] ); ?>" itemprop="item">
							<span itemprop="name"><?php echo esc_html( $item['label'] ); ?></span>
						</a>
					<?php else : ?>
						<span itemprop="name"><?php echo esc_html( $item['label'] ); ?></span>
					<?php endif; ?>
					<meta itemprop="position" content="<?php echo esc_attr( $index + 1 ); ?>">
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</nav>