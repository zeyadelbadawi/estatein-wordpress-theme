<?php
/**
 * Front Page Template
 *
 * The homepage template displaying hero, stats, services,
 * featured properties, testimonials, FAQs, and CTA sections.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

$hero_title       = get_theme_mod( 'estatein_hero_title', __( 'Discover Your Dream Property with Estatein', 'estatein' ) );
$hero_description = get_theme_mod( 'estatein_hero_description', __( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatein' ) );
?>

<!-- Hero Section -->
<section class="hero" aria-label="<?php esc_attr_e( 'Homepage hero', 'estatein' ); ?>">
	<div class="container">
		<div class="hero__inner">
			<div class="hero__content">
				<h1 class="hero__title"><?php echo esc_html( $hero_title ); ?></h1>
				<p class="hero__description"><?php echo esc_html( $hero_description ); ?></p>
				<div class="hero__actions">
					<a href="#featured-properties" class="btn btn--secondary">
						<?php esc_html_e( 'Learn More', 'estatein' ); ?>
					</a>
					<a href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" class="btn btn--primary">
						<?php esc_html_e( 'Browse Properties', 'estatein' ); ?>
					</a>
				</div>
			</div>

			<div class="hero__image">
				<img
					src="<?php echo esc_url( ESTATEIN_URI . '/assets/images/hero-building.jpeg' ); ?>"
					alt="<?php esc_attr_e( 'Modern architectural building with glass facade', 'estatein' ); ?>"
					width="600"
					height="450"
					loading="eager"
					fetchpriority="high"
				>
				<div class="hero__badge" aria-hidden="true">
					&#10024; <?php esc_html_e( 'Discover Your Dream Property', 'estatein' ); ?>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="stats-grid" aria-label="<?php esc_attr_e( 'Company statistics', 'estatein' ); ?>">
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

		<!-- Service Cards -->
		<div class="services-grid">
			<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="card service-card">
				<div class="service-card__icon">
					<?php estatein_icon( 'home', array( 'width' => 24, 'height' => 24 ) ); ?>
				</div>
				<div class="service-card__content">
					<h3 class="service-card__title"><?php esc_html_e( 'Find Your Dream Home', 'estatein' ); ?></h3>
				</div>
				<span class="service-card__arrow" aria-hidden="true">
					<?php estatein_icon( 'arrow-right', array( 'width' => 20, 'height' => 20 ) ); ?>
				</span>
			</a>

			<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="card service-card">
				<div class="service-card__icon">
					<?php estatein_icon( 'value', array( 'width' => 24, 'height' => 24 ) ); ?>
				</div>
				<div class="service-card__content">
					<h3 class="service-card__title"><?php esc_html_e( 'Unlock Property Value', 'estatein' ); ?></h3>
				</div>
				<span class="service-card__arrow" aria-hidden="true">
					<?php estatein_icon( 'arrow-right', array( 'width' => 20, 'height' => 20 ) ); ?>
				</span>
			</a>

			<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="card service-card">
				<div class="service-card__icon">
					<?php estatein_icon( 'management', array( 'width' => 24, 'height' => 24 ) ); ?>
				</div>
				<div class="service-card__content">
					<h3 class="service-card__title"><?php esc_html_e( 'Effortless Property Management', 'estatein' ); ?></h3>
				</div>
				<span class="service-card__arrow" aria-hidden="true">
					<?php estatein_icon( 'arrow-right', array( 'width' => 20, 'height' => 20 ) ); ?>
				</span>
			</a>

			<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="card service-card">
				<div class="service-card__icon">
					<?php estatein_icon( 'investment', array( 'width' => 24, 'height' => 24 ) ); ?>
				</div>
				<div class="service-card__content">
					<h3 class="service-card__title"><?php esc_html_e( 'Smart Investments, Informed Decisions', 'estatein' ); ?></h3>
				</div>
				<span class="service-card__arrow" aria-hidden="true">
					<?php estatein_icon( 'arrow-right', array( 'width' => 20, 'height' => 20 ) ); ?>
				</span>
			</a>
		</div>
	</div>
</section>

<!-- Featured Properties Section -->
<section class="section section--bordered" id="featured-properties" aria-label="<?php esc_attr_e( 'Featured Properties', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Featured Properties', 'estatein' ),
				'description' => __( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein.', 'estatein' ),
				'cta_text'    => __( 'View All Properties', 'estatein' ),
				'cta_url'     => get_post_type_archive_link( 'property' ),
			)
		);

		// Query featured properties.
		$properties_query = new WP_Query(
			array(
				'post_type'      => 'property',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);

		if ( $properties_query->have_posts() ) :
			?>
			<div class="cards-grid">
				<?php
				while ( $properties_query->have_posts() ) :
					$properties_query->the_post();
					get_template_part( 'template-parts/components/property-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>

			<div class="carousel-controls">
				<span class="carousel-controls__counter">
					<?php
					printf(
						/* translators: %1$s: current page, %2$s: total pages */
						esc_html__( '%1$s of %2$s', 'estatein' ),
						'<strong>01</strong>',
						'60'
					);
					?>
				</span>
				<div class="carousel-controls__arrows">
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Previous properties', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-left', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Next properties', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-right', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
				</div>
			</div>
		<?php else : ?>
			<!-- Fallback: Static property cards for demo -->
			<div class="cards-grid">
				<?php
				$demo_properties = array(
					array(
						'title'       => 'Seaside Serenity Villa',
						'description' => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood...',
						'bedrooms'    => '4',
						'bathrooms'   => '3',
						'area'        => 'Villa',
						'price'       => '550,000',
					),
					array(
						'title'       => 'Metropolitan Haven',
						'description' => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views...',
						'bedrooms'    => '2',
						'bathrooms'   => '2',
						'area'        => 'Apartment',
						'price'       => '550,000',
					),
					array(
						'title'       => 'Rustic Retreat Cottage',
						'description' => 'An elegant 3-bedroom, 2-bathroom townhouse in a bytes historic district...',
						'bedrooms'    => '3',
						'bathrooms'   => '2',
						'area'        => 'Cottage',
						'price'       => '550,000',
					),
				);

				foreach ( $demo_properties as $property ) :
					?>
					<article class="card property-card">
						<div class="property-card__image">
							<img
								src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&amp;h=280&amp;fit=crop"
								alt="<?php echo esc_attr( $property['title'] ); ?>"
								loading="lazy"
								width="400"
								height="280"
							>
						</div>

						<h3 class="property-card__title">
							<a href="#"><?php echo esc_html( $property['title'] ); ?></a>
						</h3>

						<p class="property-card__description"><?php echo esc_html( $property['description'] ); ?></p>

						<div class="property-card__meta">
							<span class="property-card__meta-item">
								<?php estatein_icon( 'bedroom', array( 'width' => 16, 'height' => 16 ) ); ?>
								<?php echo esc_html( $property['bedrooms'] ); ?>-Bedroom
							</span>
							<span class="property-card__meta-item">
								<?php estatein_icon( 'bathroom', array( 'width' => 16, 'height' => 16 ) ); ?>
								<?php echo esc_html( $property['bathrooms'] ); ?>-Bathroom
							</span>
							<span class="property-card__meta-item">
								<?php estatein_icon( 'area', array( 'width' => 16, 'height' => 16 ) ); ?>
								<?php echo esc_html( $property['area'] ); ?>
							</span>
						</div>

						<div class="property-card__footer">
							<div>
								<span class="property-card__price-label"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
								<div class="property-card__price">$<?php echo esc_html( $property['price'] ); ?></div>
							</div>
							<a href="#" class="btn btn--primary btn--sm">
								<?php esc_html_e( 'View Property Details', 'estatein' ); ?>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="carousel-controls">
				<span class="carousel-controls__counter">
					<strong>01</strong> <?php esc_html_e( 'of 60', 'estatein' ); ?>
				</span>
				<div class="carousel-controls__arrows">
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Previous properties', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-left', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Next properties', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-right', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- Testimonials Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Client Testimonials', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'What Our Clients Say', 'estatein' ),
				'description' => __( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'estatein' ),
				'cta_text'    => __( 'View All Testimonials', 'estatein' ),
				'cta_url'     => '#',
			)
		);

		// Query testimonials.
		$testimonials_query = new WP_Query(
			array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);

		if ( $testimonials_query->have_posts() ) :
			?>
			<div class="cards-grid">
				<?php
				while ( $testimonials_query->have_posts() ) :
					$testimonials_query->the_post();
					get_template_part( 'template-parts/components/testimonial-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<!-- Fallback: Static testimonial cards for demo -->
			<div class="cards-grid">
				<?php
				$demo_testimonials = array(
					array(
						'title'    => 'Exceptional Service!',
						'text'     => "Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze. Highly recommended!",
						'name'     => 'Wade Warren',
						'location' => 'USA, California',
					),
					array(
						'title'    => 'Efficient and Reliable',
						'text'     => "Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn't be happier with the results.",
						'name'     => 'Emelie Thomson',
						'location' => 'USA, Florida',
					),
					array(
						'title'    => 'Trusted Advisors',
						'text'     => "The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for making our dream home a reality!",
						'name'     => 'John Mans',
						'location' => 'USA, Nevada',
					),
				);

				foreach ( $demo_testimonials as $testimonial ) :
					?>
					<article class="card testimonial-card">
						<div class="testimonial-card__rating" aria-label="<?php esc_attr_e( 'Rating: 5 out of 5 stars', 'estatein' ); ?>">
							<?php for ( $i = 0; $i < 5; $i++ ) : ?>
								<?php estatein_icon( 'star', array( 'width' => 20, 'height' => 20 ) ); ?>
							<?php endfor; ?>
						</div>

						<h3 class="testimonial-card__title"><?php echo esc_html( $testimonial['title'] ); ?></h3>

						<div class="testimonial-card__text">
							<?php echo esc_html( $testimonial['text'] ); ?>
						</div>

						<div class="testimonial-card__author">
							<img
								src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&amp;h=48&amp;fit=crop&amp;crop=face"
								alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
								class="testimonial-card__avatar"
								loading="lazy"
								width="48"
								height="48"
							>
							<div>
								<div class="testimonial-card__author-name"><?php echo esc_html( $testimonial['name'] ); ?></div>
								<div class="testimonial-card__author-location"><?php echo esc_html( $testimonial['location'] ); ?></div>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="carousel-controls">
			<span class="carousel-controls__counter">
				<strong>01</strong> <?php esc_html_e( 'of 60', 'estatein' ); ?>
			</span>
			<div class="carousel-controls__arrows">
				<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Previous testimonials', 'estatein' ); ?>">
					<?php estatein_icon( 'arrow-left', array( 'width' => 18, 'height' => 18 ) ); ?>
				</button>
				<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Next testimonials', 'estatein' ); ?>">
					<?php estatein_icon( 'arrow-right', array( 'width' => 18, 'height' => 18 ) ); ?>
				</button>
			</div>
		</div>
	</div>
</section>

<!-- FAQ Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Frequently Asked Questions', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Frequently Asked Questions', 'estatein' ),
				'description' => __( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'estatein' ),
				'cta_text'    => __( "View All FAQ's", 'estatein' ),
				'cta_url'     => '#',
			)
		);

		// Query FAQs.
		$faqs_query = new WP_Query(
			array(
				'post_type'      => 'faq',
				'posts_per_page' => 3,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			)
		);

		if ( $faqs_query->have_posts() ) :
			?>
			<div class="cards-grid">
				<?php
				while ( $faqs_query->have_posts() ) :
					$faqs_query->the_post();
					get_template_part( 'template-parts/components/faq-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<!-- Fallback: Static FAQ cards for demo -->
			<div class="cards-grid">
				<?php
				$demo_faqs = array(
					array(
						'question' => 'How do I search for properties on Estatein?',
						'answer'   => 'Learn how to use our advanced search tools to find properties that match your specific criteria.',
					),
					array(
						'question' => 'What documents do I need to sell my property through Estatein?',
						'answer'   => 'Find out about the necessary documentation for listing your property with us.',
					),
					array(
						'question' => 'How can I contact an Estatein agent?',
						'answer'   => 'Discover the different ways you can get in touch with our experienced real estate agents.',
					),
				);

				foreach ( $demo_faqs as $faq ) :
					?>
					<article class="card faq-card">
						<h3 class="faq-card__question"><?php echo esc_html( $faq['question'] ); ?></h3>
						<div class="faq-card__answer"><?php echo esc_html( $faq['answer'] ); ?></div>
						<a href="#" class="btn btn--secondary btn--sm">
							<?php esc_html_e( 'Read More', 'estatein' ); ?>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="carousel-controls">
			<span class="carousel-controls__counter">
				<strong>01</strong> <?php esc_html_e( 'of 10', 'estatein' ); ?>
			</span>
			<div class="carousel-controls__arrows">
				<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Previous questions', 'estatein' ); ?>">
					<?php estatein_icon( 'arrow-left', array( 'width' => 18, 'height' => 18 ) ); ?>
				</button>
				<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Next questions', 'estatein' ); ?>">
					<?php estatein_icon( 'arrow-right', array( 'width' => 18, 'height' => 18 ) ); ?>
				</button>
			</div>
		</div>
	</div>
</section>

<!-- CTA Banner -->
<div class="container">
	<?php get_template_part( 'template-parts/components/cta-banner' ); ?>
</div>

<?php
get_footer();