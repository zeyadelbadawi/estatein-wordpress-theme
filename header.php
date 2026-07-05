<?php
/**
 * Theme Header
 *
 * Displays the site header including announcement bar and navigation.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">
	<?php esc_html_e( 'Skip to main content', 'estatein' ); ?>
</a>

<?php
// Announcement Bar.
if ( get_theme_mod( 'estatein_announcement_visible', true ) ) :
	get_template_part( 'template-parts/header/announcement-bar' );
endif;
?>

<header class="site-header" role="banner">
	<div class="site-header__inner">
		<?php get_template_part( 'template-parts/header/navigation' ); ?>
	</div>
</header>

<?php
// Mobile Menu Panel.
?>
<nav class="mobile-menu" id="mobile-menu" aria-hidden="true" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'estatein' ); ?>">
	<div class="mobile-menu__header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" aria-label="<?php esc_attr_e( 'Estatein Home', 'estatein' ); ?>">
			<span class="site-header__logo-icon" aria-hidden="true">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="white">
					<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
				</svg>
			</span>
			<?php echo esc_html( 'Estatein' ); ?>
		</a>
		<button class="mobile-menu__close" aria-label="<?php esc_attr_e( 'Close menu', 'estatein' ); ?>" data-menu-close>
			<?php estatein_icon( 'close', array( 'width' => 24, 'height' => 24 ) ); ?>
		</button>
	</div>

	<ul class="mobile-menu__list" role="list">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-menu__link<?php echo is_front_page() ? ' mobile-menu__link--active' : ''; ?>"><?php esc_html_e( 'Home', 'estatein' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="mobile-menu__link"><?php esc_html_e( 'About Us', 'estatein' ); ?></a></li>
		<li><a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" class="mobile-menu__link"><?php esc_html_e( 'Properties', 'estatein' ); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="mobile-menu__link"><?php esc_html_e( 'Services', 'estatein' ); ?></a></li>
	</ul>

	<div class="mobile-menu__cta">
		<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary btn--full"><?php esc_html_e( 'Contact Us', 'estatein' ); ?></a>
	</div>
</nav>

<main id="main-content" role="main">