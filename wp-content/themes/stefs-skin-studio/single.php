<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			// get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php
				// while ( have_posts() ) {
				// 	the_post();
				// 	get_template_part( 'loop-templates/content', 'single' );
				// 	understrap_post_nav();

				// 	// If comments are open or we have at least one comment, load up the comment template.
				// 	if ( comments_open() || get_comments_number() ) {
				// 		comments_template();
				// 	}
				// }
				?>

<section class="py-5 bg-white">
  <div class="container">
    <!-- Breadcrumb -->
    <div class="mb-4">
      <p class="text-muted mb-1">Home > Blog > Unlock Radiant Skin with Expert Care</p>
    </div>

    <!-- Post Title and Meta Information -->
    <div class="mb-4">
      <h1 class="fw-bold">Unlock Radiant Skin with Expert Care</h1>
      <div class="d-flex align-items-center text-muted">
        <span class="me-3">By Stef Sudduth</span>
        <span class="me-3">11 July 2023</span>
        <span>5 min read</span>
        <div class="ms-auto">
          <a href="#" class="text-muted me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-muted me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-muted"><i class="bi bi-share"></i></a>
        </div>
      </div>
    </div>

    <!-- Featured Image -->
    <div class="mb-5">
      <img 
        src="https://via.placeholder.com/1200x600" 
        alt="Skincare products" 
        class="img-fluid rounded shadow"
      >
    </div>

    <!-- Post Content -->
    <div class="mb-5">
      <!-- Introduction -->
      <h2>Introduction</h2>
      <p>
        Welcome, dear reader, to the glowing world of skincare. With radiant expressions and the perfect skincare routines, we understand your journey to unlock your skin’s potential. Join us as we delve into expert skincare solutions designed to bring out the best version of you.
      </p>

      <!-- Additional Content with Image -->
      <div class="my-4">
        <img 
          src="https://via.placeholder.com/800x400" 
          alt="Closeup of skincare jars" 
          class="img-fluid rounded shadow mb-2"
        >
        <p class="text-muted small">Image caption goes here</p>
      </div>
      <p>
        Let’s dive into how our bespoke services can provide the rejuvenation you need. Aliquam vestibulum, nulla non odio, vitae in aliquet placerat leo eget placerat. Aenean bibendum turpis in bibendum donec. Tempor incididunt ut labore et dolore magna aliqua.
      </p>

      <!-- Quote Block -->
      <blockquote class="blockquote px-4 py-3 border-start border-3 border-primary bg-light">
        <p class="mb-0">"Great skin isn’t magic; it’s a daily routine. Elevate your skincare game and uncover the brilliance within."</p>
        <footer class="blockquote-footer">Stef Sudduth</footer>
      </blockquote>

      <h2>Conclusion</h2>
      <p>
        We’ve reached the end of our journey, shedding light on the secrets to radiant skin. At Stef’s Skin Studio, we take pride in offering solutions tailored to your unique skin needs. Let’s walk this path to radiance together.
      </p>
    </div>

    <!-- Tags and Social Sharing -->
    <div class="d-flex flex-wrap align-items-center border-top pt-4">
      <span class="me-3 fw-bold">Spread the love:</span>
      <a href="#" class="text-muted me-3"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-muted me-3"><i class="bi bi-twitter"></i></a>
      <a href="#" class="text-muted"><i class="bi bi-envelope"></i></a>
    </div>
    <div class="d-flex flex-wrap mt-3">
      <a href="#" class="badge bg-light text-dark me-2">Skincare Tips</a>
      <a href="#" class="badge bg-light text-dark me-2">Beauty Routine</a>
      <a href="#" class="badge bg-light text-dark">Product Reviews</a>
    </div>

    <!-- Author Section -->
    <div class="d-flex align-items-center mt-5 pt-5 border-top">
      <img 
        src="https://via.placeholder.com/100" 
        alt="Author image" 
        class="rounded-circle me-3"
        style="width: 60px; height: 60px;"
      >
      <div>
        <h5 class="mb-0">Stef Sudduth</h5>
        <p class="text-muted mb-0 small">Founder, Stef’s Skin Studio</p>
      </div>
    </div>
  </div>
</section>


			</main>

			<?php
			// Do the right sidebar check and close div#primary.
			// get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
