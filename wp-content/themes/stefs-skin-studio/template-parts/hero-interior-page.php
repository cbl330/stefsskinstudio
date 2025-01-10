<?php 
    $iph_content = get_field('iph_content'); // Hero content group
    $iph_image_group = get_field('iph_hero_image_group'); // Hero image group

    // Check if the image group is not empty
    if ($iph_image_group) {
        // Access each image's data directly from the image group
        $image_prime = $iph_image_group['iph_primary_image'];
        $image_sec = $iph_image_group['iph_secondary_image'];

        // Extract URL and alt text from the array
        $image_url_prime = $image_prime['url'] ?? '';
        $image_alt_prime = $image_prime['alt'] ?? 'Hero Primary Image';
        $image_url_sec = $image_sec['url'] ?? '';
        $image_alt_sec = $image_sec['alt'] ?? 'Hero Secondary Image';
    }
?>

<section id="hero-internal" class="section-hero bg-white py-4">
    <div class="container container-hero">
        <div class="row row-content">

            <!-- Start Image Wrap -->
            <?php if (!empty($image_url_prime) || !empty($image_url_sec)): ?>
                <div class="wrap-image">
                    <div class="img-group">
                        <div class="img-lg">
                            <?php if (!empty($image_url_prime)): ?>
                                <img src="<?php echo esc_url($image_url_prime); ?>" alt="<?php echo esc_attr($image_alt_prime); ?>" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                            
                        <div class="img-sm">
                            <?php if (!empty($image_url_sec)): ?>
                                <img src="<?php echo esc_url($image_url_sec); ?>" alt="<?php echo esc_attr($image_alt_sec); ?>" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Image Wrap -->

            <!-- Start Content Wrap -->
            <div class="wrap-content">
                <?php if (!empty($iph_content['iph_sub_hero_header'])): ?>
                    <div class="eyebrow-text">
                        <?php echo esc_html($iph_content['iph_sub_hero_header']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_header'])): ?>
                    <h1><?php echo wp_kses_post($iph_content['iph_hero_header']); ?></h1>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_content'])): ?>
                    <div class="wrap-text mb-4">
                        <?php echo wp_kses_post($iph_content['iph_hero_content']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_buttons'])): ?>
                    <div class="wrap-btn d-flex justify-content-center justify-content-lg-start">
                        <?php foreach ($iph_content['iph_hero_buttons'] as $button): ?>
                            <a href="<?php echo esc_url($button['iph_button_link']); ?>" class="btn <?php echo esc_html($button['iph_button_class']); ?> me-3"><?php echo esc_html($button['iph_button_text']); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End Content Wrap -->

        </div>
    </div>
</section>
