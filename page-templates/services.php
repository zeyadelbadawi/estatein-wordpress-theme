<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * Services page template showcasing all services offered by Estatein.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

$hero_title       = estatein_get_field( 'services_hero_title', __( 'Elevate Your Real Estate Experience', 'estatein' ) );
$hero_description = estatein_get_field( 'services_hero_description', __( 'Welcome to Estatein, where your real estate aspirations meet expert guidance. Explore our comprehensive range of services, each designed to cater to your unique needs.', 'estatein' ) );
?>

<!-- Page Hero -->
<section class="page-hero" aria-label="<?php esc_attr_e( 'Services introduction', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<span class="page-hero__badge">
				<?php estatein_icon( 'sparkle', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php esc_html_e( 'Our Services', 'estatein' ); ?>
			</span>
			<h1 class="page-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="page-hero__description"><?php echo esc_html( $hero_description ); ?></p>
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

<!-- Unlock Property Value -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Unlock property value', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Unlock Property Value', 'estatein' ),
				'description' => __( 'Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property.', 'estatein' ),
			)
		);

		$selling_services = array(
			array(
				'icon'        => 'value',
				'title'       => __( 'Valuation Mastery', 'estatein' ),
				'description' => __( 'Discover the true worth of your property with our expert valuation services.', 'estatein' ),
			),
			array(
				'icon'        => 'sparkle',
				'title'       => __( 'Strategic Marketing', 'estatein' ),
				'description' => __( 'Selling a property requires more than just a listing; it demands a strategic marketing approach.', 'estatein' ),
			),
			array(
				'icon'        => 'lightning',
				'title'       => __( 'Negotiation Wizardry', 'estatein' ),
				'description' => __( 'Negotiating the best deal is an art, and our team of skilled negotiators is here to represent your interests.', 'estatein' ),
			),
			array(
				'icon'        => 'star',
				'title'       => __( 'Closing Success', 'estatein' ),
				'description' => __( 'A successful satisfying satisfying satisfying closing is the ultimate goal. We guide you through the closing process.', 'estatein' ),
			),
		);
		?>
		<div class="cards-grid cards-grid--4">
			<?php foreach ( $selling_services as $service ) : ?>
				<article class="card feature-card">
					<div class="feature-card__icon">
						<?php estatein_icon( $service['icon'], array( 'width' => 24, 'height' => 24 ) ); ?>
					</div>
					<h3 class="feature-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p class="feature-card__description"><?php echo esc_html( $service['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Effortless Property Management -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Effortless property management', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Effortless Property Management', 'estatein' ),
				'description' => __( 'Owning a property should be a joy, not a burden. Estatein\'s Property Management Service takes the stress out of property ownership.', 'estatein' ),
			)
		);

		$management_services = array(
			array(
				'icon'        => 'management',
				'title'       => __( 'Tenant Harmony', 'estatein' ),
				'description' => __( 'Our Tenant Management services ensure that your tenants have a smooth and positive experience.', 'estatein' ),
			),
			array(
				'icon'        => 'home',
				'title'       => __( 'Maintenance Mastery', 'estatein' ),
				'description' => __( 'Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.', 'estatein' ),
			),
			array(
				'icon'        => 'value',
				'title'       => __( 'Financial Peace of Mind', 'estatein' ),
				'description' => __( 'Managing property finances can be complex. Our financial experts take care of rent collection and expense tracking.', 'estatein' ),
			),
			array(
				'icon'        => 'investment',
				'title'       => __( 'Legal Guardian', 'estatein' ),
				'description' => __( 'Stay compliant with property laws and regulations effortlessly. Our legal team keeps you informed.', 'estatein' ),
			),
		);
		?>
		<div class="cards-grid cards-grid--4">
			<?php foreach ( $management_services as $service ) : ?>
				<article class="card feature-card">
					<div class="feature-card__icon">
						<?php estatein_icon( $service['icon'], array( 'width' => 24, 'height' => 24 ) ); ?>
					</div>
					<h3 class="feature-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p class="feature-card__description"><?php echo esc_html( $service['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Smart Investments -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Smart investments', 'estatein' ); ?>">
	<div class="container">
		<?php
		estatein_section_header(
			array(
				'title'       => __( 'Smart Investments, Informed Decisions', 'estatein' ),
				'description' => __( 'Building a real estate portfolio requires a strategic approach. Estatein\'s Investment Advisory Service empowers you to make smart investments and informed decisions.', 'estatein' ),
			)
		);

		$investment_services = array(
			array(
				'icon'        => 'investment',
				'title'       => __( 'Market Insight', 'estatein' ),
				'description' => __( 'Stay ahead of market trends with our expert Market Analysis. We provide in-depth insights into real estate market conditions.', 'estatein' ),
			),
			array(
				'icon'        => 'value',
				'title'       => __( 'ROI Assessment', 'estatein' ),
				'description' => __( 'Make investment decisions with confidence. Our ROI Assessment tools help you evaluate potential returns.', 'estatein' ),
			),
			array(
				'icon'        => 'star',
				'title'       => __( 'Customized Strategies', 'estatein' ),
				'description' => __( 'Every investor is unique, and so are their goals. We craft personalized investment strategies.', 'estatein' ),
			),
			array(
				'icon'        => 'lightning',
				'title'       => __( 'Diversification Mastery', 'estatein' ),
				'description' => __( 'Diversify your real estate portfolio effectively with our guidance on spreading investments.', 'estatein' ),
			),
		);
		?>
		<div class="cards-grid cards-grid--4">
			<?php foreach ( $investment_services as $service ) : ?>
				<article class="card feature-card">
					<div class="feature-card__icon">
						<?php estatein_icon( $service['icon'], array( 'width' => 24, 'height' => 24 ) ); ?>
					</div>
					<h3 class="feature-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p class="feature-card__description"><?php echo esc_html( $service['description'] ); ?></p>
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