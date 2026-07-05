<?php
/**
 * Template Part: Main Navigation
 *
 * Primary site navigation with logo, links, and CTA.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" aria-label="<?php esc_attr_e( 'Estatein - Return to homepage', 'estatein' ); ?>">
	<span class="site-header__logo-icon" aria-hidden="true">
		<svg width="16" height="16" viewBox="0 0 24 24" fill="white">
			<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
		</svg>
	</span>
	<?php echo esc_html( 'Estatein' ); ?>
</a>

<nav class="nav-primary" aria-label="<?php esc_attr_e( 'Primary Navigation', 'estatein' ); ?>">
	<ul class="nav-primary__list" role="list">
		<li>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-primary__link<?php echo is_front_page() ? ' nav-primary__link--active' : ''; ?>">
				<?php esc_html_e( 'Home', 'estatein' ); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="nav-primary__link<?php echo is_page( 'about' ) ? ' nav-primary__link--active' : ''; ?>">
				<?php esc_html_e( 'About Us', 'estatein' ); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" class="nav-primary__link<?php echo is_post_type_archive( 'property' ) ? ' nav-primary__link--active' : ''; ?>">
				<?php esc_html_e( 'Properties', 'estatein' ); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="nav-primary__link<?php echo is_page( 'services' ) ? ' nav-primary__link--active' : ''; ?>">
				<?php esc_html_e( 'Services', 'estatein' ); ?>
			</a>
		</li>
	</ul>

	<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--outline nav-primary__cta">
		<?php esc_html_e( 'Contact Us', 'estatein' ); ?>
	</a>
</nav>

<button
	class="nav-toggle"
	aria-label="<?php esc_attr_e( 'Open menu', 'estatein' ); ?>"
	aria-expanded="false"
	aria-controls="mobile-menu"
	data-menu-toggle
>
	<?php estatein_icon( 'menu' ); ?>
</button>