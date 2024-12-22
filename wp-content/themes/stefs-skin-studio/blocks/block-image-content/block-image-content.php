<?php 
$content_block_option = get_field('content_block_options'); // Retrieve selected block option
?>

<?php if ($content_block_option === 'simple'): ?>
    <!-- Simple Option -->
    <?php 
    $simple_content = get_field('simple_content_block');
    if ($simple_content): // Check if repeater field has rows
    ?>
        <section class="section-image-content">
            <div class="container">
                <?php foreach ($simple_content as $row): ?>
                    <?php 
                    $layout = $row['scb_content_layout']; // Image Right or Left
                    $image = $row['scb_image_group']['scb_image'];
                    $content = $row['scb_content_group'];
                    ?>
                    <div class="row align-items-center mb-5">
                        <?php if ($layout === 'image-left'): ?>
                            <!-- Image -->
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img 
                                    src="<?php echo esc_url($image); ?>" 
                                    alt="<?php echo esc_attr__('Image for Simple Content', 'text-domain'); ?>" 
                                    class="img-fluid rounded shadow"
                                >
                            </div>
                        <?php endif; ?>
                        <!-- Text Content -->
                        <div class="col-lg-6">
                            <?php if (!empty($content['scb_sub_header'])): ?>
                                <p class="text-muted"><?php echo esc_html($content['scb_sub_header']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_header'])): ?>
                                <h2 class="fw-bold mb-3"><?php echo esc_html($content['scb_header']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_main_content'])): ?>
                                <div><?php echo wp_kses_post($content['scb_main_content']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_content_button'])): ?>
                                <div class="d-flex mt-3">
                                    <?php 
                                    $first = true; // Track first button
                                    foreach ($content['scb_content_button'] as $button): ?>
                                        <a href="<?php echo esc_url($button['scb_button_link']); ?>" 
                                           class="btn <?php echo $first ? 'btn-primary me-3' : 'btn-outline-secondary'; ?>">
                                            <?php echo esc_html($button['scb_button_text']); ?>
                                        </a>
                                        <?php $first = false; // Ensure subsequent buttons are styled differently ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($layout === 'image-right'): ?>
                            <!-- Image -->
                            <div class="col-lg-6">
                                <img 
                                    src="<?php echo esc_url($image); ?>" 
                                    alt="<?php echo esc_attr__('Image for Simple Content', 'text-domain'); ?>" 
                                    class="img-fluid rounded shadow"
                                >
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

<?php elseif ($content_block_option === 'grid'): ?>
    <!-- Grid Option -->
    <?php 
    $grid_content = get_field('grid_content_block');
    if ($grid_content): // Check if repeater field has rows
    ?>
        <section class="py-5 bg-white">
            <div class="container">
                <?php foreach ($grid_content as $row): ?>
                    <?php 
                    $layout = $row['gcb_layout_option']; // Image Right or Left
                    $image = $row['gcb_image_group']['gcb_image'];
                    $content = $row['gcb_content_group'];
                    ?>
                    <div class="row align-items-center mb-5">
                        <?php if ($layout === 'image-left'): ?>
                            <!-- Image -->
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img 
                                    src="<?php echo esc_url($image); ?>" 
                                    alt="<?php echo esc_attr__('Image for Grid Content', 'text-domain'); ?>" 
                                    class="img-fluid rounded shadow"
                                >
                            </div>
                        <?php endif; ?>
                        <!-- Text Content -->
                        <div class="col-lg-6">
                            <?php if (!empty($content['gcb_sub_header'])): ?>
                                <p class="text-muted"><?php echo esc_html($content['gcb_sub_header']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_header'])): ?>
                                <h2 class="fw-bold mb-3"><?php echo esc_html($content['gcb_header']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_main_content'])): ?>
                                <div><?php echo wp_kses_post($content['gcb_main_content']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_content_button'])): ?>
                                <div class="d-flex mt-3">
                                    <?php 
                                    $first = true; // Track first button
                                    foreach ($content['gcb_content_button'] as $button): ?>
                                        <a href="<?php echo esc_url($button['gcb_button_link']); ?>" 
                                           class="btn <?php echo $first ? 'btn-primary me-3' : 'btn-outline-secondary'; ?>">
                                            <?php echo esc_html($button['gcb_button_text']); ?>
                                        </a>
                                        <?php $first = false; // Ensure subsequent buttons are styled differently ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($layout === 'image-right'): ?>
                            <!-- Image -->
                            <div class="col-lg-6">
                                <img 
                                    src="<?php echo esc_url($image); ?>" 
                                    alt="<?php echo esc_attr__('Image for Grid Content', 'text-domain'); ?>" 
                                    class="img-fluid rounded shadow"
                                >
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
