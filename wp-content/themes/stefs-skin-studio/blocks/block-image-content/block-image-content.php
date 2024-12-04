<?php
// Fetch ACF fields
$block_type = get_field('content_block_options');

// Check if it's a Simple or Grid block
if ($block_type === 'simple') {
    // Simple Content Block Fields
    $layout = get_field('simple_content_block')['scb_content_layout'];
    $image = get_field('simple_content_block')['scb_image_group']['scb_image'];
    $content_group = get_field('simple_content_block')['scb_content_group'];
} elseif ($block_type === 'grid') {
    // Grid Content Block Fields
    $layout = get_field('grid_content_block')['gcb_layout_option'];
    $image = get_field('grid_content_block')['gcb_image_group']['gcb_image'];
    $content_group = get_field('grid_content_block')['gcb_content_group'];
}

// Extract Content Fields
$sub_header = $content_group['scb_sub_header'] ?? $content_group['gcb_sub_header'];
$header = $content_group['scb_header'] ?? $content_group['gcb_header'];
$content = $content_group['scb_main_content'] ?? $content_group['gcb_main_content'];
$buttons = $content_group['scb_content_button'] ?? $content_group['gcb_content_button'];

// Determine image position class
$image_class = ($layout === 'image-left') ? 'order-lg-1' : 'order-lg-2';
$content_class = ($layout === 'image-left') ? 'order-lg-2' : 'order-lg-1';
?>

<section class="image-content-block py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-lg-6 mb-4 mb-lg-0 <?php echo esc_attr($image_class); ?>">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="Block Image" class="img-fluid rounded shadow">
                <?php endif; ?>
            </div>
            
            <!-- Content Section -->
            <div class="col-lg-6 <?php echo esc_attr($content_class); ?>">
                <?php if ($sub_header): ?>
                    <p class="text-uppercase text-muted fw-bold small mb-2">
                        <?php echo esc_html($sub_header); ?>
                    </p>
                <?php endif; ?>
                
                <?php if ($header): ?>
                    <h2 class="fw-bold display-5 mb-3">
                        <?php echo esc_html($header); ?>
                    </h2>
                <?php endif; ?>
                
                <?php if ($content): ?>
                    <div class="mb-4">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($buttons): ?>
                    <div class="d-flex flex-wrap gap-2">
                        <?php foreach ($buttons as $button): ?>
                            <a href="<?php echo esc_url($button['scb_button_link'] ?? $button['gcb_button_link']); ?>" class="btn btn-primary">
                                <?php echo esc_html($button['scb_button_text'] ?? $button['gcb_button_text']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .image-content-block {
    background-color: #fff;
}

.image-content-block img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.image-content-block h2 {
    color: #333;
}

.image-content-block .btn-primary {
    background-color: #e96a69;
    border-color: #e96a69;
    text-transform: uppercase;
    font-size: 0.9rem;
    padding: 0.75rem 1.25rem;
}

.image-content-block .btn-primary:hover {
    background-color: #d95858;
    border-color: #d95858;
}
</style>