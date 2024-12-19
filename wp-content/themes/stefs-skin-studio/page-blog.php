<?php
/**
 * Template Name: Blog
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			// get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php
				// if ( have_posts() ) {
					?>
					<header class="page-header">
						<?php
						// the_archive_title( '<h1 class="page-title">', '</h1>' );
						// the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php
					// Start the loop.
				// 	while ( have_posts() ) {
				// 		the_post();

				// 		/*
				// 		 * Include the Post-Format-specific template for the content.
				// 		 * If you want to override this in a child theme, then include a file
				// 		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				// 		 */
				// 		get_template_part( 'loop-templates/content', get_post_format() );
				// 	}
				// } else {
				// 	get_template_part( 'loop-templates/content', 'none' );
				// }
				?>

			</main>

			<section class="py-5 bg-white">
  <div class="container">
    <!-- Breadcrumb and Title -->
    <div class="mb-4">
      <p class="text-muted mb-1">Home > Blog</p>
      <h1 class="fw-bold">Explore Our Latest Insights</h1>
    </div>

    <!-- Featured Post -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-6">
        <img 
          src="https://via.placeholder.com/800x500" 
          alt="How to Achieve Glowing Skin" 
          class="img-fluid rounded shadow"
        >
      </div>
      <div class="col-lg-6">
        <p class="text-muted">Category</p>
        <h2 class="fw-bold">How to Achieve Glowing Skin</h2>
        <p>
          Stay ahead of the curve with the latest skincare innovations and trends. From groundbreaking products to timeless techniques, this guide will help you achieve the glowing skin you’ve always desired. Transform your beauty journey by integrating simple tips into your skincare routine.
        </p>
        <a href="#" class="text-primary fw-bold">Read more &rarr;</a>
      </div>
    </div>

    <!-- Blog Post Grid -->
    <div class="row g-4">
      <!-- Single Blog Post -->
      <?php for ($i = 0; $i < 12; $i++): ?>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <img 
              src="https://via.placeholder.com/600x400" 
              class="card-img-top rounded-top" 
              alt="Top 5 Skincare Trends This Season"
            >
            <div class="card-body">
              <p class="text-muted mb-2">Category</p>
              <h5 class="card-title fw-bold">Top 5 Skincare Trends This Season</h5>
              <p class="card-text">
                Stay on top of the trends and unlock the secrets to radiant skin! Learn how to elevate your skincare routine with these expert tips tailored to your needs.
              </p>
              <a href="#" class="text-primary fw-bold">Read more &rarr;</a>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

			<?php
			// Display the pagination component.
			// understrap_pagination();

			// Do the right sidebar check and close div#primary.
			// get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
