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

            <main class="site-main" id="main">
                <section id="blog-archive" class="section-blog-archive py-5">
                    <div class="container">

                        <!-- Start Page Header Wrap -->
                        <div class="wrap-page-header mb-4 mb-lg-5">
                            <!-- Breadcrumbs with Schema Markup -->
                            <div class="breadcrumbs mb-3">
                                <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                            </div>
                            <h1 class="page-title"><?php the_title(); ?></h1>
                        </div>
                        <!-- End Page Header Wrap -->

                        <?php
                        // Pagination settings
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $posts_per_page = 12; // Number of posts per page

                        if ($paged == 1) {
                            // Start Featured Post Row
                            $featured_query = new WP_Query(array(
                                'posts_per_page' => 1,
                                'post_status'    => 'publish',
                            ));

                            if ($featured_query->have_posts()) : 
                                while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                                    <!-- Start Featured Post -->
                                    <div class="row-featured row align-items-center mb-4 mb-lg-5">
                                        
                                        <!-- Start Image Wrap -->
                                        <div class="wrap-image col-lg-6">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php 
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('large', array('class' => 'img-fluid shadow', 'loading' => 'lazy', 'alt' => get_the_title()));
                                                } else { ?>
                                                    <img class="shadow" src="<?php echo get_stylesheet_directory_uri(); ?>/img/image-placeholder.jpg" alt="Placeholder image">
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <!-- End Image Wrap -->

                                        <!-- Start Content Wrap -->
                                        <div class="wrap-content col-lg-6">
                                            <!-- Category -->
                                            <div class="category mb-2"><?php the_category(', '); ?></div>
                                            <!-- Post Title -->
                                            <h2 class="post-title mb-2">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <!-- Post Excerpt -->
                                            <p class="card-text excerpt mb-2"><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                            <!-- Button Wrap -->
                                            <div class="wrap-btn">
                                                <a href="<?php the_permalink(); ?>" class="btn-post">Read more <i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Content Wrap -->

                                    </div>
                                    <!-- End Featured Post -->
                                <?php endwhile; 
                                wp_reset_postdata();
                            endif;
                        }

                        // Query for additional posts
                        $offset = ($paged == 1) ? 1 : 0; // Skip the featured post only on the first page
                        $additional_query = new WP_Query(array(
                            'posts_per_page' => $posts_per_page,
                            'post_status'    => 'publish',
                            'paged'          => $paged,
                            'offset'         => $offset,
                        ));
                        ?>

                        <!-- Start Blog Post Grid -->
                        <div class="row-posts row">
                            <?php 
                            if ($additional_query->have_posts()) : 
                                while ($additional_query->have_posts()) : $additional_query->the_post(); ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrap-post mb-4" itemscope itemtype="https://schema.org/BlogPosting">
                                            
                                            <!-- Start Image Wrap -->
                                            <div class="wrap-image pb-2">
                                                <a href="<?php the_permalink(); ?>" itemprop="url">
                                                    <?php 
                                                    if (has_post_thumbnail()) {
                                                        the_post_thumbnail('medium', array('class' => 'card-img-top rounded-top shadow', 'loading' => 'lazy', 'alt' => get_the_title()));
                                                    } else { ?>
                                                        <img class="card-img-top rounded-top shadow" src="<?php echo get_stylesheet_directory_uri(); ?>/img/image-placeholder.jpg" alt="Placeholder image">
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <!-- End Image Wrap -->

                                            <!-- Start Content Wrap -->
                                            <div class="wrap-content">
                                                <!-- Category -->
                                                <div class="category mb-2"><?php the_category(', '); ?></div>
                                                <!-- Post Title -->
                                                <h2 class="post-title mb-2" itemprop="headline">
                                                    <a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
                                                </h2>
                                                <!-- Post Excerpt -->
                                                <p class="card-text excerpt mb-2" itemprop="description">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                                </p>
                                                <!-- Button Wrap -->
                                                <div class="wrap-btn">
                                                    <a href="<?php the_permalink(); ?>" class="btn-post">Read more <i class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- End Content Wrap -->

                                        </div>
                                    </div>
                                <?php endwhile; 
                                wp_reset_postdata();
                            else : ?>
                                <p>No posts found.</p>
                            <?php endif; ?>
                        </div>
                        <!-- End Blog Post Grid -->

                        <!-- Start Pagination -->
                        <?php render_pagination($additional_query); ?>
                        <!-- End Pagination -->

                    </div>
                </section>
            </main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
