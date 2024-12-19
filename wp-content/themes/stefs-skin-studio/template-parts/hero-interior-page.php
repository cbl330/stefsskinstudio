<?php 
$iph_content = get_field('iph_content'); // Hero content group
$iph_image_group = get_field('iph_hero_image_group'); // Hero image group
?>

<section class="bg-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Content -->
            <?php if (!empty($iph_image_group['iph_primary_image']) || !empty($iph_image_group['iph_secondary_image'])): ?>
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <div class="position-relative d-inline-block" style="max-width: 300px;">
                        <?php if (!empty($iph_image_group['iph_primary_image'])): ?>
                            <img 
                                src="<?php echo esc_url($iph_image_group['iph_primary_image']); ?>" 
                                alt="<?php echo esc_attr__('Hero Primary Image', 'text-domain'); ?>" 
                                class="img-fluid rounded-circle shadow"
                            >
                        <?php endif; ?>
                        
                        <?php if (!empty($iph_image_group['iph_secondary_image'])): ?>
                            <img 
                                src="<?php echo esc_url($iph_image_group['iph_secondary_image']); ?>" 
                                alt="<?php echo esc_attr__('Hero Secondary Image', 'text-domain'); ?>" 
                                class="img-fluid rounded-circle position-absolute" 
                                style="width: 50%; bottom: -10%; left: 50%; transform: translateX(-50%);"
                            >
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Text Content -->
            <div class="col-lg-6 text-center text-lg-start">
                <?php if (!empty($iph_content['iph_sub_hero_header'])): ?>
                    <p class="text-muted mb-2">
                        <?php echo esc_html($iph_content['iph_sub_hero_header']); ?>
                    </p>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_header'])): ?>
                    <h1 class="fw-bold">
                        <?php echo esc_html($iph_content['iph_hero_header']); ?>
                    </h1>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_content'])): ?>
                    <div class="mb-4">
                        <?php echo wp_kses_post($iph_content['iph_hero_content']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($iph_content['iph_hero_buttons'])): ?>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <?php foreach ($iph_content['iph_hero_buttons'] as $button): ?>
                            <a 
                                href="<?php echo esc_url($button['iph_button_link']); ?>" 
                                class="btn <?php echo ($loop->first ? 'btn-primary' : 'btn-outline-secondary'); ?> me-3"
                            >
                                <?php echo esc_html($button['iph_button_text']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
