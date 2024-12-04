<?php
// Fetch ACF fields
$mask_options = get_field('cta_mask_options');
$image_background = get_field('cta_image_background');
$header = get_field('cta_header');
$content = get_field('cta_content');
$button_link = get_field('cta_button_link');
$button_text = get_field('cta_button_text');

// Mask classes
$mask_class = '';
if ($mask_options === 'top') {
    $mask_class = 'mask-top';
} elseif ($mask_options === 'bottom') {
    $mask_class = 'mask-bottom';
} elseif ($mask_options === 'top-bottom') {
    $mask_class = 'mask-top-bottom';
}
?>

<section 
    class="cta-block position-relative text-center text-white py-5 <?php echo esc_attr($mask_class); ?>" 
    style="background-image: url('<?php echo esc_url($image_background); ?>'); background-size: cover; background-position: center;">
    <div class="container">
        <!-- Header -->
        <?php if ($header): ?>
            <h2 class="cta-header display-4 fw-bold mb-3">
                <?php echo esc_html($header); ?>
            </h2>
        <?php endif; ?>

        <!-- Content -->
        <?php if ($content): ?>
            <div class="cta-content mb-4">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <!-- Button -->
        <?php if ($button_link && $button_text): ?>
            <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary btn-lg">
                <?php echo esc_html($button_text); ?>
            </a>
        <?php endif; ?>
    </div>

    <!-- Masks -->
    <?php if ($mask_options === 'top' || $mask_options === 'top-bottom'): ?>
        <div class="mask mask-top"></div>
    <?php endif; ?>
    <?php if ($mask_options === 'bottom' || $mask_options === 'top-bottom'): ?>
        <div class="mask mask-bottom"></div>
    <?php endif; ?>
</section>

<style>
    .cta-block {
    position: relative;
    color: #fff;
    text-align: center;
    overflow: hidden;
    background-color: #000; /* Fallback color */
}

.cta-block .cta-header {
    text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
}

.cta-block .cta-content {
    font-size: 1.2rem;
    line-height: 1.8;
    text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5);
}

.cta-block .btn-primary {
    background-color: #e96a69;
    border-color: #e96a69;
    color: #fff;
    font-size: 1.1rem;
    padding: 0.8rem 1.5rem;
    text-transform: uppercase;
}

.cta-block .mask {
    position: absolute;
    width: 100%;
    height: 100px;
    background: #fff;
    z-index: 1;
    pointer-events: none;
}

.cta-block .mask-top {
    top: -50px;
    clip-path: ellipse(150% 50% at 50% 100%);
}

.cta-block .mask-bottom {
    bottom: -50px;
    clip-path: ellipse(150% 50% at 50% 0%);
}

.cta-block.mask-top .mask-top,
.cta-block.mask-bottom .mask-bottom,
.cta-block.mask-top-bottom .mask-top,
.cta-block.mask-top-bottom .mask-bottom {
    display: block;
}

.cta-block .mask-top-bottom .mask-top {
    clip-path: ellipse(150% 50% at 50% 100%);
}

.cta-block .mask-top-bottom .mask-bottom {
    clip-path: ellipse(150% 50% at 50% 0%);
}
</style>
