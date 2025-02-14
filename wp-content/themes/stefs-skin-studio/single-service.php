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

		<div class="row py-5">

      <!-- Breadcrumbs with Schema Markup -->
      <div class="breadcrumbs mb-3">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
      </div>

      <?php get_template_part('template-parts/hero', 'interior-page'); ?>

			<main class="site-main" id="main">

        <?php
          while ( have_posts() ) {
            the_post();
            get_template_part( 'loop-templates/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }
          }
        ?>

			</main>
      
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
