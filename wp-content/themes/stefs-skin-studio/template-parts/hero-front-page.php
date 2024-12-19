<?php
$background_image = get_field('hph_background_image'); // Background image
$secondary_image = get_field('hph_secondary_image'); // Secondary decorative image
$hero_content = get_field('hero_content'); // Hero content group
?>

<section 
    class="bg-light position-relative overflow-hidden" 
    style="background: url('<?php echo esc_url($background_image); ?>') no-repeat center/cover;"
>
    <div class="container">
        <div class="row align-items-center py-5">
            <!-- Text Content -->
            <div class="col-lg-6 text-center text-lg-start">
                <?php if (!empty($hero_content['hph_hero_header'])): ?>
                    <h1 class="display-4 fw-bold mb-3">
                        <?php echo esc_html($hero_content['hph_hero_header']); ?>
                    </h1>
                <?php endif; ?>
                
                <?php if (!empty($hero_content['hph_hero_content'])): ?>
                    <p class="lead mb-4">
                        <?php echo wp_kses_post($hero_content['hph_hero_content']); ?>
                    </p>
                <?php endif; ?>
                
                <?php if (!empty($hero_content['hph_hero_buttons'])): ?>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <?php foreach ($hero_content['hph_hero_buttons'] as $index => $button): ?>
                            <a 
                                href="<?php echo esc_url($button['hph_button_link']); ?>" 
                                class="btn <?php echo ($index === 0 ? 'btn-primary' : 'btn-outline-secondary'); ?> btn-lg me-3"
                            >
                                <?php echo esc_html($button['hph_button_text']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
            
            <!-- Image Content -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="position-relative" style="max-width: 500px;">
                    <?php if (!empty($secondary_image)): ?>
                        <img
                            src="<?php echo esc_url($secondary_image); ?>"
                            alt="<?php echo esc_attr__('Hero Secondary Image', 'text-domain'); ?>"
                            class="img-fluid rounded-circle shadow"
                        />
                    <?php endif; ?>

                    <!-- Decorative Circles -->
                    <div class="position-absolute" style="top: -20%; left: -20%;">
                        <img 
                            src="https://via.placeholder.com/100" 
                            alt="Decorative Circle" 
                            class="img-fluid rounded-circle"
                        >
                    </div>
                    <div class="position-absolute" style="bottom: -10%; right: -10%;">
                        <img 
                            src="https://via.placeholder.com/100" 
                            alt="Decorative Circle" 
                            class="img-fluid rounded-circle"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Curved Background -->
    <div 
        class="position-absolute bottom-0 start-0 w-100" 
        style="height: 50px; background: white; clip-path: ellipse(80% 50% at 50% 100%);"
    ></div>
</section>
