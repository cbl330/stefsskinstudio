<?php 
$cta_mask_options = get_field('cta_mask_options'); // Retrieve mask options
$cta_image_background = get_field('cta_image_background'); // Background image
$cta_header = get_field('cta_header'); // Header
$cta_content = get_field('cta_content'); // Content
$cta_button_link = get_field('cta_button_link'); // Button link
$cta_button_text = get_field('cta_button_text'); // Button text
?>

<section id="cta" class="section-cta position-relative text-center" style="background: url('<?php echo esc_url($cta_image_background); ?>') no-repeat center/cover;">
    <div class="container-fluid">
        <div class="wrap-content position-relative">
            <?php if (!empty($cta_header)): ?>
                <h2 class="mb-3"><?php echo esc_html($cta_header); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($cta_content)): ?>
                <div class="wrap-text mb-4">
                    <?php echo wp_kses_post($cta_content); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($cta_button_link) && !empty($cta_button_text)): ?>
                <div class="wrap-btn">
                    <a href="<?php echo esc_url($cta_button_link); ?>" class="btn"><?php echo esc_html($cta_button_text); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mask Effects -->
    <?php if ($cta_mask_options === 'top' || $cta_mask_options === 'top-bottom'): ?>
        <div class="mask mask-top position-absolute start-0 w-100"></div>
    <?php endif; ?>

    <?php if ($cta_mask_options === 'bottom' || $cta_mask_options === 'top-bottom'): ?>
        <div class="mask mask-bottom position-absolute start-0 w-100"></div>
    <?php endif; ?>
</section>
