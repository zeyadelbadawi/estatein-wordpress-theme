<?php
/**
 * Single Property Template
 *
 * Displays individual property details including gallery, features,
 * pricing, and inquiry form.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Get property meta.
$property_meta = estatein_get_property_meta();
$price         = ! empty( $property_meta['price'] ) ? $property_meta['price'] : '550,000';
$bedrooms      = ! empty( $property_meta['bedrooms'] ) ? $property_meta['bedrooms'] : '4';
$bathrooms     = ! empty( $property_meta['bathrooms'] ) ? $property_meta['bathrooms'] : '3';
$area          = ! empty( $property_meta['area'] ) ? $property_meta['area'] : '2,500';

// ACF fields with fallbacks.
$gallery  = estatein_get_field( 'property_gallery', array() );
$features = estatein_get_field( 'property_features', array() );
$pricing_details = estatein_get_field( 'property_pricing_details', array() );
?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'estatein' ); ?>">
	<div class="container">
		<ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
			<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php esc_html_e( 'Home', 'estatein' ); ?></span>
				</a>
				<meta itemprop="position" content="1">
			</li>
			<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" itemprop="item">
					<span itemprop="name"><?php esc_html_e( 'Properties', 'estatein' ); ?></span>
				</a>
				<meta itemprop="position" content="2">
			</li>
			<li class="breadcrumb__item breadcrumb__item--active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<span itemprop="name"><?php the_title(); ?></span>
				<meta itemprop="position" content="3">
			</li>
		</ol>
	</div>
</nav>

<!-- Property Header -->
<section class="property-header" aria-label="<?php esc_attr_e( 'Property overview', 'estatein' ); ?>">
	<div class="container">
		<div class="property-header__top">
			<div>
				<h1 class="property-header__title"><?php the_title(); ?></h1>
				<div class="property-header__location">
					<?php estatein_icon( 'location', array( 'width' => 16, 'height' => 16 ) ); ?>
					<span>
						<?php
						$location_terms = get_the_terms( get_the_ID(), 'property_location' );
						if ( $location_terms && ! is_wp_error( $location_terms ) ) {
							echo esc_html( $location_terms[0]->name );
						} else {
							esc_html_e( 'Metropolis, City Center', 'estatein' );
						}
						?>
					</span>
				</div>
			</div>
			<div class="property-header__price">
				<span class="property-header__price-label"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
				<span class="property-header__price-value">$<?php echo esc_html( $price ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Property Gallery -->
<section class="section" aria-label="<?php esc_attr_e( 'Property gallery', 'estatein' ); ?>">
	<div class="container">
		<div class="property-gallery">
			<?php if ( ! empty( $gallery ) ) : ?>
				<?php foreach ( $gallery as $index => $image ) : ?>
					<div class="property-gallery__item<?php echo 0 === $index ? ' property-gallery__item--main' : ''; ?>">
						<img
							src="<?php echo esc_url( $image['url'] ); ?>"
							alt="<?php echo esc_attr( $image['alt'] ); ?>"
							loading="<?php echo 0 === $index ? 'eager' : 'lazy'; ?>"
							width="<?php echo esc_attr( $image['width'] ); ?>"
							height="<?php echo esc_attr( $image['height'] ); ?>"
						>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<!-- Fallback gallery -->
				<div class="property-gallery__item property-gallery__item--main">
					<img
						src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=500&fit=crop"
						alt="<?php the_title_attribute(); ?>"
						loading="eager"
						width="800"
						height="500"
					>
				</div>
				<div class="property-gallery__item">
					<img
						src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&h=300&fit=crop"
						alt="<?php esc_attr_e( 'Property interior', 'estatein' ); ?>"
						loading="lazy"
						width="400"
						height="300"
					>
				</div>
				<div class="property-gallery__item">
					<img
						src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&h=300&fit=crop"
						alt="<?php esc_attr_e( 'Property kitchen', 'estatein' ); ?>"
						loading="lazy"
						width="400"
						height="300"
					>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Property Description & Details -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Property details', 'estatein' ); ?>">
	<div class="container">
		<div class="property-details">
			<!-- Description -->
			<div class="property-details__section">
				<h2 class="property-details__heading"><?php esc_html_e( 'Description', 'estatein' ); ?></h2>
				<div class="property-details__content">
					<?php
					if ( has_excerpt() ) {
						echo wp_kses_post( wpautop( get_the_excerpt() ) );
					} else {
						the_content();
					}

					if ( empty( get_the_content() ) ) :
						?>
						<p><?php esc_html_e( 'Discover your own piece of paradise with this stunning property. This exquisite property offers a harmonious blend of modern luxury and natural beauty. Nestled in a serene neighborhood, this home provides an ideal retreat for those seeking tranquility without sacrificing convenience.', 'estatein' ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Key Features -->
			<div class="property-details__section">
				<h2 class="property-details__heading"><?php esc_html_e( 'Key Features and Amenities', 'estatein' ); ?></h2>
				<?php if ( ! empty( $features ) ) : ?>
					<div class="property-features">
						<?php foreach ( $features as $feature ) : ?>
							<div class="property-features__item">
								<?php estatein_icon( $feature['icon'], array( 'width' => 20, 'height' => 20 ) ); ?>
								<div>
									<span class="property-features__label"><?php echo esc_html( $feature['label'] ); ?></span>
									<span class="property-features__value"><?php echo esc_html( $feature['value'] ); ?></span>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<!-- Fallback features -->
					<div class="property-features">
						<?php
						$default_features = array(
							array( 'icon' => 'bedroom', 'label' => __( 'Bedrooms', 'estatein' ), 'value' => $bedrooms ),
							array( 'icon' => 'bathroom', 'label' => __( 'Bathrooms', 'estatein' ), 'value' => $bathrooms ),
							array( 'icon' => 'area', 'label' => __( 'Area', 'estatein' ), 'value' => $area . ' sq ft' ),
						);
						foreach ( $default_features as $feature ) :
							?>
							<div class="property-features__item">
								<?php estatein_icon( $feature['icon'], array( 'width' => 20, 'height' => 20 ) ); ?>
								<div>
									<span class="property-features__label"><?php echo esc_html( $feature['label'] ); ?></span>
									<span class="property-features__value"><?php echo esc_html( $feature['value'] ); ?></span>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- Pricing Details -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Pricing details', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Comprehensive Pricing Details', 'estatein' ),
				'description' => __( 'At Estatein, transparency is key. Here is a breakdown of costs associated with this property.', 'estatein' ),
			)
		);
		?>

		<div class="pricing-grid">
			<div class="card pricing-card">
				<h3 class="pricing-card__title"><?php esc_html_e( 'Listing Price', 'estatein' ); ?></h3>
				<div class="pricing-card__amount">$<?php echo esc_html( $price ); ?></div>
			</div>
			<div class="card pricing-card">
				<h3 class="pricing-card__title"><?php esc_html_e( 'Additional Fees', 'estatein' ); ?></h3>
				<div class="pricing-card__rows">
					<div class="pricing-card__row">
						<span><?php esc_html_e( 'Property Transfer Tax', 'estatein' ); ?></span>
						<span>$25,000</span>
					</div>
					<div class="pricing-card__row">
						<span><?php esc_html_e( 'Legal Fees', 'estatein' ); ?></span>
						<span>$3,000</span>
					</div>
					<div class="pricing-card__row">
						<span><?php esc_html_e( 'Home Inspection', 'estatein' ); ?></span>
						<span>$500</span>
					</div>
				</div>
			</div>
			<div class="card pricing-card">
				<h3 class="pricing-card__title"><?php esc_html_e( 'Monthly Costs', 'estatein' ); ?></h3>
				<div class="pricing-card__rows">
					<div class="pricing-card__row">
						<span><?php esc_html_e( 'Property Taxes', 'estatein' ); ?></span>
						<span>$1,250</span>
					</div>
					<div class="pricing-card__row">
						<span><?php esc_html_e( "Homeowner's Association Fee", 'estatein' ); ?></span>
						<span>$300</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Inquiry Form -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Property inquiry', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Inquire About This Property', 'estatein' ),
				'description' => __( 'Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details.', 'estatein' ),
			)
		);
		?>

		<div class="contact-form-wrapper">
			<form class="contact-form" action="#" method="post" aria-label="<?php esc_attr_e( 'Property inquiry form', 'estatein' ); ?>">
				<?php wp_nonce_field( 'estatein_inquiry', 'estatein_inquiry_nonce' ); ?>
				<input type="hidden" name="property_id" value="<?php echo esc_attr( get_the_ID() ); ?>">

				<div class="contact-form__grid">
					<div class="form-group">
						<label class="form-label" for="inquiry-first-name"><?php esc_html_e( 'First Name', 'estatein' ); ?></label>
						<input type="text" id="inquiry-first-name" name="first_name" class="form-input" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="inquiry-last-name"><?php esc_html_e( 'Last Name', 'estatein' ); ?></label>
						<input type="text" id="inquiry-last-name" name="last_name" class="form-input" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="inquiry-email"><?php esc_html_e( 'Email', 'estatein' ); ?></label>
						<input type="email" id="inquiry-email" name="email" class="form-input" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="inquiry-phone"><?php esc_html_e( 'Phone', 'estatein' ); ?></label>
						<input type="tel" id="inquiry-phone" name="phone" class="form-input" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>">
					</div>
				</div>

				<div class="form-group form-group--full">
					<label class="form-label" for="inquiry-message"><?php esc_html_e( 'Message', 'estatein' ); ?></label>
					<textarea id="inquiry-message" name="message" class="form-textarea" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatein' ); ?>" required></textarea>
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

<!-- CTA Banner -->
<div class="container">
	<?php get_template_part( 'template-parts/components/cta-banner' ); ?>
</div>

<?php
get_footer();