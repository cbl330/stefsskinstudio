<div class="related-posts py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-4">
            <div class="wrap-header">
                <h2 class="section-title">Related Posts</h2>
            </div>

            <div class="wrap-btn d-none d-lg-block">
                <a href="/insights" class="btn">View All</a>
            </div>
        </div>
        <div class="posts-slider row">
            <?php
            // Fetch related posts based on categories
            $categories = wp_get_post_categories(get_the_ID());
            if ($categories) {
                $args = array(
                    'category__in'   => $categories,
                    'post__not_in'   => array(get_the_ID()), // Exclude current post
                    'posts_per_page' => 3, // Adjust the number of posts
                );
                $related_posts = new WP_Query($args);

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="wrap-post mb-4" itemscope itemtype="https://schema.org/BlogPosting">
                                
                                <!-- Start Image Wrap -->
                                <div class="wrap-image">
                                    <a href="<?php the_permalink(); ?>" itemprop="url">
                                        <?php 
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium', array('class' => 'card-img-top rounded-top', 'loading' => 'lazy', 'alt' => get_the_title()));
                                        } else { ?>
                                            <img src="https://via.placeholder.com/600x400" class="card-img-top rounded-top" alt="Placeholder image">
                                        <?php } ?>
                                    </a>
                                </div>
                                <!-- End Image Wrap -->

                                <!-- Start Content Wrap -->
                                <div class="wrap-content">
                                    <!-- Category -->
                                    <div class="category mb-2"><?php the_category(', '); ?></div>
                                    <!-- Post Title -->
                                    <h3 class="post-title mb-2" itemprop="headline">
                                        <a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
                                    </h3>
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
                    <p>No related posts found.</p>
                <?php endif;
            }
            ?>
        </div>

        <div class="wrap-btn d-lg-none">
            <a href="/insights" class="btn">View All</a>
        </div>
    </div>
</div>
