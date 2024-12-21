<?php
$background_image = get_field('hph_background_image'); // Background image
$secondary_image = get_field('hph_secondary_image'); // Secondary decorative image
$hero_content = get_field('hero_content'); // Hero content group
?>

<section id="hero-home" class="container-fluid section-hero" style="background: url('<?php echo esc_url($background_image); ?>') no-repeat;">
    <div class="container container-hero">
        <div class="row-content row align-items-center">
            
            <!-- Start Content Wrap -->
            <div class="wrap-content col-lg-6">
                <?php if (!empty($hero_content['hph_hero_header'])): ?>
                    <!-- Header -->
                    <h1><?php echo esc_html($hero_content['hph_hero_header']); ?></h1>
                <?php endif; ?>
                
                <?php if (!empty($hero_content['hph_hero_content'])): ?>
                    <!-- Text -->
                     <div class="wrap-text">
                        <?php echo wp_kses_post($hero_content['hph_hero_content']); ?>
                     </div>
                <?php endif; ?>
                
                <?php if (!empty($hero_content['hph_hero_buttons'])): ?>
                    <!-- Buttons -->
                    <div class="wrap-btn d-flex justify-content-center justify-content-lg-start">
                        <?php foreach ($hero_content['hph_hero_buttons'] as $index => $button): ?>
                            <a href="<?php echo esc_url($button['hph_button_link']); ?>" class="btn"><?php echo esc_html($button['hph_button_text']); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End Content Wrap -->

            <?php if (!empty($secondary_image)): ?>
                <!-- Start Image Wrap -->
                <div class="wrap-image col-lg-6">
                    <img src="<?php echo esc_url($secondary_image); ?>" alt="<?php echo esc_attr__('Hero Secondary Image', 'text-domain'); ?>"/>
                </div>
                <!-- End Image Wrap -->
            <?php endif; ?>

    </div>
</section>
