<?php 
$cta_mask_options = get_field('cta_mask_options'); // Retrieve mask options
$cta_image_background = get_field('cta_image_background'); // Background image
$cta_header = get_field('cta_header'); // Header
$cta_content = get_field('cta_content'); // Content
$cta_button_link = get_field('cta_button_link'); // Button link
$cta_button_text = get_field('cta_button_text'); // Button text
?>

<section 
    class="position-relative text-center text-white py-5" 
    style="background: url('<?php echo esc_url($cta_image_background); ?>') no-repeat center/cover;"
>
    <div class="container">
        <?php if (!empty($cta_header)): ?>
            <h2 class="fw-bold mb-3"><?php echo esc_html($cta_header); ?></h2>
        <?php endif; ?>
        
        <?php if (!empty($cta_content)): ?>
            <div class="lead mb-4">
                <?php echo wp_kses_post($cta_content); ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($cta_button_link) && !empty($cta_button_text)): ?>
            <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-primary btn-lg">
                <?php echo esc_html($cta_button_text); ?>
            </a>
        <?php endif; ?>
    </div>

    <!-- Mask Effects -->
    <?php if ($cta_mask_options === 'top' || $cta_mask_options === 'top-bottom'): ?>
        <div 
            class="position-absolute top-0 start-0 w-100" 
            style="height: 100px; background: white; clip-path: ellipse(100% 50% at 50% 0%);"
        ></div>
    <?php endif; ?>

    <?php if ($cta_mask_options === 'bottom' || $cta_mask_options === 'top-bottom'): ?>
        <div 
            class="position-absolute bottom-0 start-0 w-100" 
            style="height: 100px; background: white; clip-path: ellipse(100% 50% at 50% 100%);"
        ></div>
    <?php endif; ?>
</section>
