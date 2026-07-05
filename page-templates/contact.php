<?php
/**
 * Template Name: Contact Us
 * Template Post Type: page
 *
 * Contact page template with form and office locations.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- Page Hero -->
<section class="page-hero" aria-label="<?php esc_attr_e( 'Contact page introduction', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<span class="page-hero__badge">
				<?php estatein_icon( 'sparkle', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php esc_html_e( 'Get In Touch', 'estatein' ); ?>
			</span>
			<h1 class="page-hero__title"><?php esc_html_e( 'Get in Touch with Estatein', 'estatein' ); ?></h1>
			<p class="page-hero__description">
				<?php esc_html_e( "Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. We're dedicated to providing exceptional service.", 'estatein' ); ?>
			</p>
		</div>
		<div class="page-hero__stats">
			<div class="stat-box">
				<div class="stat-box__number">200+</div>
				<div class="stat-box__label"><?php esc_html_e( 'Happy Customers', 'estatein' ); ?></div>
			</div>
			<div class="stat-box">
				<div class="stat-box__number">10k+</div>
				<div class="stat-box__label"><?php esc_html_e( 'Properties For Clients', 'estatein' ); ?></div>
			</div>
			<div class="stat-box">
				<div class="stat-box__number">16+</div>
				<div class="stat-box__label"><?php esc_html_e( 'Years of Experience', 'estatein' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- Contact Form Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Contact form', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( "Let's Connect", 'estatein' ),
				'description' => __( "We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein.", 'estatein' ),
			)
		);
		?>

		<div class="contact-form-wrapper">
			<form class="contact-form" action="#" method="post" aria-label="<?php esc_attr_e( 'Contact form', 'estatein' ); ?>">
				<?php wp_nonce_field( 'estatein_contact', 'estatein_contact_nonce' ); ?>

				<div class="contact-form__grid">
					<div class="form-group">
						<label class="form-label" for="contact-first-name"><?php esc_html_e( 'First Name', 'estatein' ); ?></label>
						<input type="text" id="contact-first-name" name="first_name" class="form-input" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="contact-last-name"><?php esc_html_e( 'Last Name', 'estatein' ); ?></label>
						<input type="text" id="contact-last-name" name="last_name" class="form-input" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="contact-email"><?php esc_html_e( 'Email', 'estatein' ); ?></label>
						<input type="email" id="contact-email" name="email" class="form-input" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="contact-phone"><?php esc_html_e( 'Phone', 'estatein' ); ?></label>
						<input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>">
					</div>

					<div class="form-group form-group--select">
						<label class="form-label" for="contact-inquiry"><?php esc_html_e( 'Inquiry Type', 'estatein' ); ?></label>
						<select id="contact-inquiry" name="inquiry_type" class="form-select">
							<option value=""><?php esc_html_e( 'Select Inquiry Type', 'estatein' ); ?></option>
							<option value="buying"><?php esc_html_e( 'Buying', 'estatein' ); ?></option>
							<option value="selling"><?php esc_html_e( 'Selling', 'estatein' ); ?></option>
							<option value="renting"><?php esc_html_e( 'Renting', 'estatein' ); ?></option>
							<option value="investment"><?php esc_html_e( 'Investment', 'estatein' ); ?></option>
							<option value="other"><?php esc_html_e( 'Other', 'estatein' ); ?></option>
						</select>
					</div>

					<div class="form-group form-group--select">
						<label class="form-label" for="contact-hear"><?php esc_html_e( 'How Did You Hear About Us?', 'estatein' ); ?></label>
						<select id="contact-hear" name="referral_source" class="form-select">
							<option value=""><?php esc_html_e( 'Select', 'estatein' ); ?></option>
							<option value="social_media"><?php esc_html_e( 'Social Media', 'estatein' ); ?></option>
							<option value="referral"><?php esc_html_e( 'Referral', 'estatein' ); ?></option>
							<option value="search_engine"><?php esc_html_e( 'Search Engine', 'estatein' ); ?></option>
							<option value="advertisement"><?php esc_html_e( 'Advertisement', 'estatein' ); ?></option>
							<option value="other"><?php esc_html_e( 'Other', 'estatein' ); ?></option>
						</select>
					</div>
				</div>

				<div class="form-group form-group--full">
					<label class="form-label" for="contact-message"><?php esc_html_e( 'Message', 'estatein' ); ?></label>
					<textarea id="contact-message" name="message" class="form-textarea" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatein' ); ?>" required></textarea>
				</div>

				<div class="contact-form__footer">
					<label class="form-checkbox">
						<input type="checkbox" name="terms_agree" required>
						<span class="form-checkbox__label">
							<?php
							printf(
								/* translators: %1$s: Terms link, %2$s: Privacy link */
								esc_html__( 'I agree with %1$s and %2$s', 'estatein' ),
								'<a href="#">' . esc_html__( 'Terms of Use', 'estatein' ) . '</a>',
								'<a href="#">' . esc_html__( 'Privacy Policy', 'estatein' ) . '</a>'
							);
							?>
						</span>
					</label>
					<button type="submit" class="btn btn--primary btn--lg">
						<?php esc_html_e( 'Send Your Message', 'estatein' ); ?>
					</button>
				</div>
			</form>
		</div>
	</div>
</section>

<!-- Office Locations -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Our offices', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Discover Our Office Locations', 'estatein' ),
				'description' => __( "Estatein is here to serve you across multiple locations. Whether you're looking to meet in person, our offices are conveniently located to provide you with the best service.", 'estatein' ),
			)
		);

		$offices = array(
			array(
				'title'       => __( 'Main Headquarters', 'estatein' ),
				'address'     => '123 Estatein Plaza, City Center, Metropolis',
				'description' => __( 'Our main headquarters serve as the heart of Estatein. Located in the bustling city center.', 'estatein' ),
				'email'       => 'info@estatein.com',
				'phone'       => '+1 (123) 456-7890',
				'city'        => 'Metropolis',
			),
			array(
				'title'       => __( 'Regional Office', 'estatein' ),
				'address'     => '456 Urban Avenue, Downtown, Metropolis',
				'description' => __( 'Our regional office is strategically located in the downtown area, providing easy access for our clients.', 'estatein' ),
				'email'       => 'regional@estatein.com',
				'phone'       => '+1 (123) 456-7891',
				'city'        => 'Metropolis',
			),
		);
		?>
		<div class="cards-grid cards-grid--2">
			<?php foreach ( $offices as $office ) : ?>
				<article class="card office-card">
					<span class="office-card__badge"><?php echo esc_html( $office['city'] ); ?></span>
					<h3 class="office-card__title"><?php echo esc_html( $office['title'] ); ?></h3>
					<p class="office-card__description"><?php echo esc_html( $office['description'] ); ?></p>
					<div class="office-card__details">
						<div class="office-card__detail">
							<?php estatein_icon( 'mail', array( 'width' => 18, 'height' => 18 ) ); ?>
							<a href="mailto:<?php echo esc_attr( $office['email'] ); ?>"><?php echo esc_html( $office['email'] ); ?></a>
						</div>
						<div class="office-card__detail">
							<?php estatein_icon( 'phone', array( 'width' => 18, 'height' => 18 ) ); ?>
							<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $office['phone'] ) ); ?>"><?php echo esc_html( $office['phone'] ); ?></a>
						</div>
						<div class="office-card__detail">
							<?php estatein_icon( 'location', array( 'width' => 18, 'height' => 18 ) ); ?>
							<span><?php echo esc_html( $office['address'] ); ?></span>
						</div>
					</div>
					<a href="#" class="btn btn--primary btn--full">
						<?php esc_html_e( 'Get Direction', 'estatein' ); ?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- CTA Banner -->
<div class="container">
	<?php get_template_part( 'template-parts/components/cta-banner' ); ?>
</div>

<?php
get_footer();