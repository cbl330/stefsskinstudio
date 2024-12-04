<?php
// Fetch ACF fields
$background_image = get_field('hph_background_image');
$secondary_image = get_field('hph_secondary_image');
$hero_content = get_field('hero_content');

if ($background_image || $hero_content): ?>
    <section 
        class="home-page-hero d-flex align-items-center py-5" 
        style="background-image: url('<?php echo esc_url($background_image); ?>'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Content -->
                <div class="col-lg-6 text-center text-lg-start">
                    <?php if (!empty($hero_content['hph_hero_header'])): ?>
                        <h1 class="hero-header display-3 fw-bold text-white mb-4">
                            <?php echo esc_html($hero_content['hph_hero_header']); ?>
                        </h1>
                    <?php endif; ?>

                    <?php if (!empty($hero_content['hph_hero_content'])): ?>
                        <div class="hero-description text-white mb-4">
                            <?php echo wp_kses_post($hero_content['hph_hero_content']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($hero_content['hph_hero_buttons'])): ?>
                        <div class="hero-buttons">
                            <?php foreach ($hero_content['hph_hero_buttons'] as $button): ?>
                                <a href="<?php echo esc_url($button['hph_button_link']); ?>" 
                                   class="btn btn-light btn-lg me-2 mb-2">
                                    <?php echo esc_html($button['hph_button_text']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Secondary Image -->
                <div class="col-lg-6 text-center">
                    <?php if (!empty($secondary_image)): ?>
                        <img src="<?php echo esc_url($secondary_image); ?>" 
                             alt="Hero Secondary Image" 
                             class="img-fluid rounded shadow">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .home-page-hero {
    position: relative;
    background-color: #000; /* Fallback color */
    color: #fff;
    min-height: 80vh;
}

.home-page-hero .hero-header {
    text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
}

.home-page-hero .hero-description {
    font-size: 1.1rem;
    line-height: 1.8;
    text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5);
}

.home-page-hero img {
    max-width: 100%;
    height: auto;
}
</style>