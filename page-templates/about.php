<?php
/**
 * Template Name: About Us
 * Template Post Type: page
 *
 * About page template displaying company story, values, achievements, and team.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

$hero_title       = estatein_get_field( 'about_hero_title', __( 'Our Journey', 'estatein' ) );
$hero_description = estatein_get_field( 'about_hero_description', __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, and today, we are proud to be a leading name in the real estate industry.', 'estatein' ) );
?>

<!-- Page Hero -->
<section class="page-hero" aria-label="<?php esc_attr_e( 'About page introduction', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<span class="page-hero__badge">
				<?php estatein_icon( 'sparkle', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php esc_html_e( 'About Estatein', 'estatein' ); ?>
			</span>
			<h1 class="page-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="page-hero__description"><?php echo esc_html( $hero_description ); ?></p>
		</div>
		<div class="page-hero__image">
			<img
				src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&h=500&fit=crop"
				alt="<?php esc_attr_e( 'Modern office building representing our growth', 'estatein' ); ?>"
				width="800"
				height="500"
				loading="eager"
			>
		</div>
	</div>
</section>

<!-- Stats Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Our achievements', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Our Achievements', 'estatein' ),
				'description' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, and today, we are proud to be a leading name in the real estate industry.', 'estatein' ),
			)
		);
		?>
		<div class="stats-grid stats-grid--4">
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
			<div class="stat-box">
				<div class="stat-box__number">25+</div>
				<div class="stat-box__label"><?php esc_html_e( 'Awards Won', 'estatein' ); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- Values Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Our values', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Our Values', 'estatein' ),
				'description' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, and today, we are proud to be a leading name in the real estate industry.', 'estatein' ),
			)
		);

		$values = array(
			array(
				'icon'        => 'star',
				'title'       => __( 'Trust', 'estatein' ),
				'description' => __( 'Trust is the cornerstone of every successful real estate transaction.', 'estatein' ),
			),
			array(
				'icon'        => 'home',
				'title'       => __( 'Excellence', 'estatein' ),
				'description' => __( 'We set the bar high for ourselves. From the properties we list to the services we provide.', 'estatein' ),
			),
			array(
				'icon'        => 'value',
				'title'       => __( 'Client-Centric', 'estatein' ),
				'description' => __( 'Your dreams and needs are at the center of our universe. We listen, understand, and tailor our services.', 'estatein' ),
			),
			array(
				'icon'        => 'lightning',
				'title'       => __( 'Our Commitment', 'estatein' ),
				'description' => __( 'We are dedicated to providing you with the highest level of service, professionalism, and expertise.', 'estatein' ),
			),
		);
		?>
		<div class="cards-grid cards-grid--4">
			<?php foreach ( $values as $value ) : ?>
				<article class="card value-card">
					<div class="value-card__icon">
						<?php estatein_icon( $value['icon'], array( 'width' => 24, 'height' => 24 ) ); ?>
					</div>
					<h3 class="value-card__title"><?php echo esc_html( $value['title'] ); ?></h3>
					<p class="value-card__description"><?php echo esc_html( $value['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Experience Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Navigating the Estatein experience', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Navigating the Estatein Experience', 'estatein' ),
				'description' => __( 'At Estatein, we have designed a streamlined process to help you find and purchase your dream property with ease. Here is a step-by-step guide to how it works.', 'estatein' ),
			)
		);

		$steps = array(
			array(
				'step'        => '01',
				'title'       => __( 'Discover a World of Possibilities', 'estatein' ),
				'description' => __( 'Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties by location, type, and budget.', 'estatein' ),
			),
			array(
				'step'        => '02',
				'title'       => __( 'Narrowing Down Your Choices', 'estatein' ),
				'description' => __( 'Once you have found properties that catch your eye, save them to your favorites. This allows you to compare and revisit your top choices.', 'estatein' ),
			),
			array(
				'step'        => '03',
				'title'       => __( 'Making It Yours', 'estatein' ),
				'description' => __( 'Ready to take the next step? Our experienced agents will guide you through the process, from negotiations to paperwork, ensuring a smooth transaction.', 'estatein' ),
			),
		);
		?>
		<div class="cards-grid cards-grid--3">
			<?php foreach ( $steps as $step ) : ?>
				<article class="card step-card">
					<span class="step-card__number"><?php echo esc_html( $step['step'] ); ?></span>
					<h3 class="step-card__title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p class="step-card__description"><?php echo esc_html( $step['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Team Section -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Meet the team', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Meet the Estatein Team', 'estatein' ),
				'description' => __( 'At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to transform your real estate experience.', 'estatein' ),
			)
		);

		// Query team members.
		$team_query = new WP_Query(
			array(
				'post_type'      => 'team_member',
				'posts_per_page' => 4,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			)
		);

		if ( $team_query->have_posts() ) :
			?>
			<div class="cards-grid cards-grid--4">
				<?php
				while ( $team_query->have_posts() ) :
					$team_query->the_post();
					get_template_part( 'template-parts/components/team-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<!-- Fallback: Static team cards for demo -->
			<div class="cards-grid cards-grid--4">
				<?php
				$demo_team = array(
					array(
						'name' => 'Max Mitchell',
						'role' => 'Founder',
					),
					array(
						'name' => 'Sarah Johnson',
						'role' => 'Chief Real Estate Officer',
					),
					array(
						'name' => 'David Brown',
						'role' => 'Head of Property Management',
					),
					array(
						'name' => 'Michael Turner',
						'role' => 'Legal Counsel',
					),
				);

				foreach ( $demo_team as $member ) :
					?>
					<article class="card team-card">
						<div class="team-card__image">
							<img
								src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=360&fit=crop&crop=face"
								alt="<?php echo esc_attr( $member['name'] ); ?>"
								loading="lazy"
								width="300"
								height="360"
							>
						</div>
						<div class="team-card__info">
							<h3 class="team-card__name"><?php echo esc_html( $member['name'] ); ?></h3>
							<p class="team-card__role"><?php echo esc_html( $member['role'] ); ?></p>
						</div>
						<div class="team-card__social">
							<a href="#" class="team-card__social-link" aria-label="<?php esc_attr_e( 'Twitter', 'estatein' ); ?>">
								<?php estatein_icon( 'twitter', array( 'width' => 18, 'height' => 18 ) ); ?>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- Clients Section (Testimonials) -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Our valued clients', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Our Valued Clients', 'estatein' ),
				'description' => __( 'At Estatein, we have had the privilege of working with a diverse range of clients, each with unique dreams and aspirations.', 'estatein' ),
				'cta_text'    => __( 'View All Testimonials', 'estatein' ),
				'cta_url'     => '#',
			)
		);

		// Reuse testimonial cards.
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
			<div class="cards-grid">
				<?php
				$demo_testimonials = array(
					array(
						'title'    => 'Exceptional Service!',
						'text'     => "Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze.",
						'name'     => 'Wade Warren',
						'location' => 'USA, California',
					),
					array(
						'title'    => 'Efficient and Reliable',
						'text'     => "Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price.",
						'name'     => 'Emelie Thomson',
						'location' => 'USA, Florida',
					),
					array(
						'title'    => 'Trusted Advisors',
						'text'     => "The Estatein team guided us through the entire buying process. Their knowledge and commitment were impressive.",
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
						<div class="testimonial-card__text"><?php echo esc_html( $testimonial['text'] ); ?></div>
						<div class="testimonial-card__author">
							<img
								src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&h=48&fit=crop&crop=face"
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
	</div>
</section>

<!-- CTA Banner -->
<div class="container">
	<?php get_template_part( 'template-parts/components/cta-banner' ); ?>
</div>

<?php
get_footer();