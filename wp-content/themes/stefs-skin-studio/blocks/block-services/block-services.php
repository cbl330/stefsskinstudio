<section id="services" class="section-services">
    <div class="container container-services">
        <!-- Section Title -->
        <div class="wrap-header mb-4">
            <h2>Transform Your Skin with Our Expert Skincare Services</h2>
        </div>

        <!-- Desktop Grid Layout -->
        <div class="row-card row g-4 d-none d-lg-flex">
            <?php
            // Fetch all 'service' posts
            $services_query = new WP_Query([
                'post_type' => 'service',
                'posts_per_page' => -1, // Fetch all services
                'post_status' => 'publish', // Only published posts
            ]);

            if ($services_query->have_posts()) : 
                while ($services_query->have_posts()) : $services_query->the_post(); 
            ?>
                <div class="wrap-card col-lg-3 col-md-4 col-sm-6">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="card border-0 shadow-sm h-100 text-decoration-none">
                        <!-- Service Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <img 
                                src="<?php echo get_the_post_thumbnail_url(); ?>" 
                                class="card-img-top rounded-top" 
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                            >
                        <?php else : ?>
                            <img 
                                src="https://via.placeholder.com/300x200" 
                                class="card-img-top rounded-top" 
                                alt="Placeholder Image"
                            >
                        <?php endif; ?>

                        <!-- Service Content -->
                        <div class="card-body">
                            <h4 class="card-title"><?php echo esc_html(get_the_title()); ?></h4>
                            <div class="card-text">
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                            <div class="btn-post">Book Now <i class="fas fa-chevron-right"></i></div>
                        </div>
                    </a>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata(); // Reset post data
            else : 
            ?>
                <div class="col-12">
                    <p class="text-center">No services available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Tablet and Mobile Slider Layout -->
        <div class="d-lg-none">
            <div class="row posts-slider">
                <?php
                // Reuse query for slider layout
                if ($services_query->have_posts()) : 
                    while ($services_query->have_posts()) : $services_query->the_post(); 
                ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="card border-0 shadow-sm h-100 text-decoration-none">
                            <!-- Service Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top rounded-top" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php else : ?>
                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-top" alt="Placeholder Image">
                            <?php endif; ?>

                            <!-- Service Content -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo esc_html(get_the_title()); ?></h5>
                                <div class="card-text">
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                </div>
                                <div class="btn-service">Book Now <i class="fas fa-chevron-right"></i></div>
                            </div>
                        </a>
                    </div>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                endif; 
                ?>
            </div>
        </div>
    </div>
</section>
