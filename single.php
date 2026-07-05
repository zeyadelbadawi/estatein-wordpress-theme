<?php
/**
 * Single Post Template
 *
 * The template for displaying single posts.
 *
 * @package Estatein
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
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
			<li class="breadcrumb__item breadcrumb__item--active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<span itemprop="name"><?php the_title(); ?></span>
				<meta itemprop="position" content="2">
			</li>
		</ol>
	</div>
</nav>

<article class="section" itemscope itemtype="https://schema.org/Article">
	<div class="container">
		<header class="property-header">
			<h1 class="property-header__title" itemprop="headline"><?php the_title(); ?></h1>
			<div class="property-header__location">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			</div>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="property-gallery" style="margin-bottom: var(--est-space-8);">
				<div class="property-gallery__item property-gallery__item--main">
					<?php the_post_thumbnail( 'estatein-hero', array( 'itemprop' => 'image' ) ); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="property-details__content" itemprop="articleBody">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</article>

<?php
get_footer();