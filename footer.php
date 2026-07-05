<?php
/**
 * Theme Footer
 *
 * Displays the site footer with newsletter, navigation links, and social icons.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
</main><!-- #main-content -->

<footer class="site-footer" role="contentinfo">
	<div class="container">
		<div class="footer__top">
			<div class="footer__brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer__brand-logo">
					<span class="site-header__logo-icon" aria-hidden="true">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="white">
							<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
						</svg>
					</span>
					<?php echo esc_html( 'Estatein' ); ?>
				</a>

				<form class="input-group" action="#" method="post" aria-label="<?php esc_attr_e( 'Newsletter signup', 'estatein' ); ?>">
					<label for="footer-email" class="sr-only"><?php esc_html_e( 'Email address', 'estatein' ); ?></label>
					<input
						type="email"
						id="footer-email"
						class="form-input"
						placeholder="<?php esc_attr_e( 'Enter Your Email', 'estatein' ); ?>"
						required
					>
					<button type="submit" class="btn btn--primary btn--icon" aria-label="<?php esc_attr_e( 'Subscribe', 'estatein' ); ?>">
						<?php estatein_icon( 'send', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
				</form>
			</div>

			<div class="footer__nav-grid">
				<div class="footer__nav-column">
					<h4><?php esc_html_e( 'Home', 'estatein' ); ?></h4>
					<ul role="list">
						<li><a href="#"><?php esc_html_e( 'Hero Section', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Features', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Properties', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Testimonials', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( "FAQ's", 'estatein' ); ?></a></li>
					</ul>
				</div>

				<div class="footer__nav-column">
					<h4><?php esc_html_e( 'About Us', 'estatein' ); ?></h4>
					<ul role="list">
						<li><a href="#"><?php esc_html_e( 'Our Story', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Our Works', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'How It Works', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Our Team', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Our Clients', 'estatein' ); ?></a></li>
					</ul>
				</div>

				<div class="footer__nav-column">
					<h4><?php esc_html_e( 'Properties', 'estatein' ); ?></h4>
					<ul role="list">
						<li><a href="#"><?php esc_html_e( 'Portfolio', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Categories', 'estatein' ); ?></a></li>
					</ul>
				</div>

				<div class="footer__nav-column">
					<h4><?php esc_html_e( 'Services', 'estatein' ); ?></h4>
					<ul role="list">
						<li><a href="#"><?php esc_html_e( 'Valuation Mastery', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Strategic Marketing', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Negotiation Wizardry', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Closing Success', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Property Management', 'estatein' ); ?></a></li>
					</ul>
				</div>

				<div class="footer__nav-column">
					<h4><?php esc_html_e( 'Contact Us', 'estatein' ); ?></h4>
					<ul role="list">
						<li><a href="#"><?php esc_html_e( 'Contact Form', 'estatein' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Our Offices', 'estatein' ); ?></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="footer__bottom">
			<div class="footer__bottom-left">
				<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Estatein. All Rights Reserved.', 'estatein' ); ?></span>
				<a href="#"><?php esc_html_e( 'Terms & Conditions', 'estatein' ); ?></a>
			</div>

			<div class="footer__social">
				<a href="#" aria-label="<?php esc_attr_e( 'Facebook', 'estatein' ); ?>">
					<?php estatein_icon( 'facebook', array( 'width' => 18, 'height' => 18 ) ); ?>
				</a>
				<a href="#" aria-label="<?php esc_attr_e( 'LinkedIn', 'estatein' ); ?>">
					<?php estatein_icon( 'linkedin', array( 'width' => 18, 'height' => 18 ) ); ?>
				</a>
				<a href="#" aria-label="<?php esc_attr_e( 'Twitter', 'estatein' ); ?>">
					<?php estatein_icon( 'twitter', array( 'width' => 18, 'height' => 18 ) ); ?>
				</a>
				<a href="#" aria-label="<?php esc_attr_e( 'YouTube', 'estatein' ); ?>">
					<?php estatein_icon( 'youtube', array( 'width' => 18, 'height' => 18 ) ); ?>
				</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>