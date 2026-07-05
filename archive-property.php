<?php
/**
 * Properties Archive Template
 *
 * Displays all properties with search/filter functionality.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- Page Hero -->
<section class="page-hero" aria-label="<?php esc_attr_e( 'Properties introduction', 'estatein' ); ?>">
	<div class="container">
		<div class="page-hero__content">
			<span class="page-hero__badge">
				<?php estatein_icon( 'sparkle', array( 'width' => 16, 'height' => 16 ) ); ?>
				<?php esc_html_e( 'Our Properties', 'estatein' ); ?>
			</span>
			<h1 class="page-hero__title"><?php esc_html_e( 'Find Your Dream Property', 'estatein' ); ?></h1>
			<p class="page-hero__description">
				<?php esc_html_e( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful city. Explore our curated selection of properties, each offering a unique lifestyle.', 'estatein' ); ?>
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

<!-- Search/Filter Bar -->
<section class="section" aria-label="<?php esc_attr_e( 'Property search filters', 'estatein' ); ?>">
	<div class="container">
		<form class="property-filter" action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>" method="get" role="search" aria-label="<?php esc_attr_e( 'Filter properties', 'estatein' ); ?>">
			<div class="property-filter__row">
				<div class="form-group">
					<label class="form-label" for="filter-search"><?php esc_html_e( 'Search', 'estatein' ); ?></label>
					<input type="text" id="filter-search" name="s" class="form-input" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatein' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
				</div>

				<div class="form-group">
					<label class="form-label" for="filter-location"><?php esc_html_e( 'Location', 'estatein' ); ?></label>
					<select id="filter-location" name="property_location" class="form-select">
						<option value=""><?php esc_html_e( 'Select Location', 'estatein' ); ?></option>
						<?php
						$locations = get_terms( array(
							'taxonomy'   => 'property_location',
							'hide_empty' => true,
						) );
						if ( ! is_wp_error( $locations ) && ! empty( $locations ) ) :
							foreach ( $locations as $location ) :
								$selected = ( isset( $_GET['property_location'] ) && $_GET['property_location'] === $location->slug ) ? 'selected' : '';
								?>
								<option value="<?php echo esc_attr( $location->slug ); ?>" <?php echo esc_attr( $selected ); ?>>
									<?php echo esc_html( $location->name ); ?>
								</option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label" for="filter-type"><?php esc_html_e( 'Property Type', 'estatein' ); ?></label>
					<select id="filter-type" name="property_type" class="form-select">
						<option value=""><?php esc_html_e( 'Select Property Type', 'estatein' ); ?></option>
						<?php
						$types = get_terms( array(
							'taxonomy'   => 'property_type',
							'hide_empty' => true,
						) );
						if ( ! is_wp_error( $types ) && ! empty( $types ) ) :
							foreach ( $types as $type ) :
								$selected = ( isset( $_GET['property_type'] ) && $_GET['property_type'] === $type->slug ) ? 'selected' : '';
								?>
								<option value="<?php echo esc_attr( $type->slug ); ?>" <?php echo esc_attr( $selected ); ?>>
									<?php echo esc_html( $type->name ); ?>
								</option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>

				<div class="form-group">
					<label class="form-label" for="filter-price"><?php esc_html_e( 'Pricing Range', 'estatein' ); ?></label>
					<select id="filter-price" name="price_range" class="form-select">
						<option value=""><?php esc_html_e( 'Select Price Range', 'estatein' ); ?></option>
						<option value="0-100000"><?php esc_html_e( '$0 - $100,000', 'estatein' ); ?></option>
						<option value="100000-300000"><?php esc_html_e( '$100,000 - $300,000', 'estatein' ); ?></option>
						<option value="300000-500000"><?php esc_html_e( '$300,000 - $500,000', 'estatein' ); ?></option>
						<option value="500000-1000000"><?php esc_html_e( '$500,000 - $1,000,000', 'estatein' ); ?></option>
						<option value="1000000+"><?php esc_html_e( '$1,000,000+', 'estatein' ); ?></option>
					</select>
				</div>

				<div class="form-group form-group--submit">
					<button type="submit" class="btn btn--primary btn--lg">
						<?php esc_html_e( 'Find Property', 'estatein' ); ?>
					</button>
				</div>
			</div>
		</form>
	</div>
</section>

<!-- Properties Grid -->
<section class="section section--bordered" aria-label="<?php esc_attr_e( 'Property listings', 'estatein' ); ?>">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="cards-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/components/property-card' );
				endwhile;
				?>
			</div>

			<?php
			// Pagination.
			$pagination = paginate_links( array(
				'type'      => 'array',
				'prev_text' => estatein_icon( 'arrow-left', array( 'width' => 16, 'height' => 16 ) ),
				'next_text' => estatein_icon( 'arrow-right', array( 'width' => 16, 'height' => 16 ) ),
			) );

			if ( $pagination ) :
				?>
				<nav class="pagination" aria-label="<?php esc_attr_e( 'Properties pagination', 'estatein' ); ?>">
					<ul class="pagination__list">
						<?php foreach ( $pagination as $page_link ) : ?>
							<li class="pagination__item"><?php echo $page_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>

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
						'description' => 'An elegant 3-bedroom, 2-bathroom townhouse in a historic district...',
						'bedrooms'    => '3',
						'bathrooms'   => '2',
						'area'        => 'Cottage',
						'price'       => '550,000',
					),
					array(
						'title'       => 'Urban Oasis Penthouse',
						'description' => 'A luxurious penthouse with stunning views of the city skyline...',
						'bedrooms'    => '3',
						'bathrooms'   => '3',
						'area'        => 'Penthouse',
						'price'       => '850,000',
					),
					array(
						'title'       => 'Coastal Escape Villa',
						'description' => 'A beautiful beachfront villa with direct access to pristine sandy beaches...',
						'bedrooms'    => '5',
						'bathrooms'   => '4',
						'area'        => 'Villa',
						'price'       => '1,200,000',
					),
					array(
						'title'       => 'Mountain View Ranch',
						'description' => 'A sprawling ranch property with breathtaking mountain views and open spaces...',
						'bedrooms'    => '4',
						'bathrooms'   => '3',
						'area'        => 'Ranch',
						'price'       => '750,000',
					),
				);

				foreach ( $demo_properties as $property ) :
					?>
					<article class="card property-card">
						<div class="property-card__image">
							<img
								src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&h=280&fit=crop"
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
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Previous page', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-left', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
					<button class="btn btn--icon btn--outline btn--round" aria-label="<?php esc_attr_e( 'Next page', 'estatein' ); ?>">
						<?php estatein_icon( 'arrow-right', array( 'width' => 18, 'height' => 18 ) ); ?>
					</button>
				</div>
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