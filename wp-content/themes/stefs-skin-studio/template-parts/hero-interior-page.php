<?php
// Fetch ACF fields
$hero_content = get_field('iph_content');
$hero_images = get_field('iph_hero_image_group');

if ($hero_content && $hero_images): ?>
    <section class="interior-page-hero py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Content -->
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                    <?php if (!empty($hero_content['iph_sub_hero_header'])): ?>
                        <p class="hero-sub-header text-muted small mb-2">
                            <?php echo esc_html($hero_content['iph_sub_hero_header']); ?>
                        </p>
                    <?php endif; ?>
                    
                    <?php if (!empty($hero_content['iph_hero_header'])): ?>
                        <h1 class="hero-header display-4 fw-bold mb-3">
                            <?php echo esc_html($hero_content['iph_hero_header']); ?>
                        </h1>
                    <?php endif; ?>
                    
                    <?php if (!empty($hero_content['iph_hero_content'])): ?>
                        <div class="hero-description mb-4">
                            <?php echo wp_kses_post($hero_content['iph_hero_content']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($hero_content['iph_hero_buttons'])): ?>
                        <div class="hero-buttons">
                            <?php foreach ($hero_content['iph_hero_buttons'] as $button): ?>
                                <a href="<?php echo esc_url($button['iph_button_link']); ?>" 
                                   class="btn btn-primary me-2 mb-2">
                                    <?php echo esc_html($button['iph_button_text']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Hero Images -->
                <div class="col-lg-6">
                    <div class="row g-3 justify-content-center">
                        <?php if (!empty($hero_images['iph_primary_image'])): ?>
                            <div class="col-12 text-center">
                                <img src="<?php echo esc_url($hero_images['iph_primary_image']); ?>" 
                                     alt="Primary Hero Image" 
                                     class="img-fluid rounded shadow">
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($hero_images['iph_secondary_image'])): ?>
                            <div class="col-6 text-center">
                                <img src="<?php echo esc_url($hero_images['iph_secondary_image']); ?>" 
                                     alt="Secondary Hero Image" 
                                     class="img-fluid rounded shadow-sm">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .interior-page-hero {
    background-color: #f9f9f9;
}

.hero-sub-header {
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

.hero-header {
    color: #333;
}

.hero-description {
    color: #555;
    line-height: 1.6;
}
</style>