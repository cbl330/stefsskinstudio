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

            <main class="site-main" id="main">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <section id="single-post" class="section-post py-5">
                        <div class="container">

                          <!-- Start Breadcrumbs -->
                          <div class="breadcrumbs mb-3">
                              <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                          </div>
                          <!-- End Breadcrumbs -->

                          <!-- Start Post Title and Meta Information -->
                          <div class="post-header mb-3 mb-lg-5">
                            <h1 class="post-title mb-3"><?php the_title(); ?></h1>

                              <div class="wrap-header-meta">
                                <!-- Start Post Meta -->
                                <div class="post-meta">
                                  <span class="meta author">
                                    <?php 
                                      $first_name = get_the_author_meta('first_name');
                                      $last_name = get_the_author_meta('last_name');
                                      echo esc_html($first_name . ' ' . $last_name); 
                                    ?>
                                  </span>
                                  <div class="wrap-details mb-4 mb-lg-0">
                                    <span class="meta date"><?php echo get_the_date(); ?></span>
                                    <span class="meta divider"><i class="fas fa-circle"></i></span>
                                    <span class="meta read"><?php echo reading_time(); ?> min read</span>
                                  </div>
                                </div>
                                <!-- End Post Meta -->

                                <!-- Start Social Group -->
                                <div class="social-group mb-4 mb-lg-0">
                                  <a href="#" class="facebook me-3"><i class="fab fa-facebook-f"></i></a>
                                  <a href="#" class="instagram me-3"><i class="fab fa-instagram"></i></a>
                                  <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                </div>
                                <!-- End Social Group -->
                              </div>
                          </div>
                          <!-- Start Post Title and Meta Information -->

                          <!-- Featured Image -->
                          <?php if ( has_post_thumbnail() ) : ?>
                              <div class="post-image mb-4 mb-md-5">
                                  <?php the_post_thumbnail( 'large', ['alt'   => esc_attr( get_the_title() )] ); ?>
                              </div>
                          <?php endif; ?>

                          <!-- Post Content -->
                          <div class="post-content mb-5">
                              <?php the_content(); ?>
                          </div>

                          <!-- Start Social Grouup -->
                          <div class="social-group mb-5">
                            <p class="fw-bold mb-3">Spread The Love</p>
                            <a href="#" class="facebook me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="instagram me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                          </div>
                          <!-- End Social Group -->

                          <!-- Author Section -->
                          <div class="post-author d-flex align-items-center py-5">
                              <?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', '', [ 'class' => 'rounded-circle me-3' ] ); ?>
                              <div>
                                  <div class="author">
                                      <?php 
                                        $first_name = get_the_author_meta('first_name');
                                        $last_name = get_the_author_meta('last_name');
                                        echo esc_html($first_name . ' ' . $last_name); 
                                      ?>
                                  </div>
                                  <div class="author-bio"><?php the_author_meta( 'description' ); ?></div>
                              </div>
                          </div>

                          <!-- Custom Blocks Section -->
                          <div class="custom-sections">

                            <!-- Google Reviews -->
                            <?php //get_template_part( 'blocks/block-testimonies/block-testimonies' ); ?>

                            <!-- CTA -->
                            <?php get_template_part( 'blocks/block-cta/block-cta' ); ?>

                            <!-- Related Posts Section -->
                            <?php get_template_part( 'blocks/block-related-posts/block-related-posts' ); ?>

                          </div>

                        </div>
                    </section>

                <?php endwhile; endif; ?>

            </main>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>

<?php
/**
 * Helper function to calculate reading time.
 */
function reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // Assuming 200 words per minute.
    return $reading_time;
}
?>
