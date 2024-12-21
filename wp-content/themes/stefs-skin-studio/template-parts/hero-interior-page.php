<?php 
$iph_content = get_field('iph_content'); // Hero content group
$iph_image_group = get_field('iph_hero_image_group'); // Hero image group
?>

<section id="hero-internal" class="section-hero bg-white py-4">
    <div class="container container-hero">
        <div class="row row-content">

            <!-- Start Image Wrap -->
            <?php if (!empty($iph_image_group['iph_primary_image']) || !empty($iph_image_group['iph_secondary_image'])): ?>
                <!-- <div class="wrap-image col-lg-5 col-xl-4"> -->
                <div class="wrap-image">
                    <div class="img-group">
                        <div class="img-lg">
                            <?php if (!empty($iph_image_group['iph_primary_image'])): ?>
                                <img src="<?php echo esc_url($iph_image_group['iph_primary_image']); ?>" alt="<?php echo esc_attr__('Hero Primary Image', 'text-domain'); ?>" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                            
                        <div class="img-sm">
                            <?php if (!empty($iph_image_group['iph_secondary_image'])): ?>
                                <img src="<?php echo esc_url($iph_image_group['iph_secondary_image']); ?>" alt="<?php echo esc_attr__('Hero Secondary Image', 'text-domain'); ?>" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Image Wrap -->

            <!-- Start Content Wrap -->
            <!-- <div class="wrap-content col-lg-7 col-xl-8"> -->
            <div class="wrap-content">
                <?php if (!empty($iph_content['iph_sub_hero_header'])): ?>
                    <div class="eyebrow-text mb-2">
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
                            <a href="<?php echo esc_url($button['iph_button_link']); ?>" class="btn <?php echo ($loop->first ? 'btn-primary' : 'btn-outline-secondary'); ?> me-3"><?php echo esc_html($button['iph_button_text']); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End Content Wrap -->

        </div>
    </div>
</section>
