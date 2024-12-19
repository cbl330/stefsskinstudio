<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Transform Your Skin with Our Expert Skincare Services</h2>
        </div>
        
        <!-- Grid Layout -->
        <div class="row g-4">
            <?php
            // Query to fetch all 'service' posts
            $services_query = new WP_Query([
                'post_type' => 'service',
                'posts_per_page' => -1, // Fetch all services
                'post_status' => 'publish', // Only published posts
            ]);

            if ($services_query->have_posts()): 
                while ($services_query->have_posts()): $services_query->the_post(); 
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm h-100">
                        <!-- Service Image -->
                        <?php if (has_post_thumbnail()): ?>
                            <img 
                                src="<?php echo get_the_post_thumbnail_url(); ?>" 
                                class="card-img-top rounded-top" 
                                alt="<?php echo esc_attr(get_the_title()); ?>"
                            >
                        <?php else: ?>
                            <img 
                                src="https://via.placeholder.com/300x200" 
                                class="card-img-top rounded-top" 
                                alt="Placeholder Image"
                            >
                        <?php endif; ?>

                        <!-- Service Content -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo esc_html(get_the_title()); ?></h5>
                            <p class="card-text">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="text-primary fw-bold">
                                Book Now &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
                wp_reset_postdata(); // Reset the global post data
            else: 
            ?>
                <div class="col-12">
                    <p class="text-center">No services available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
