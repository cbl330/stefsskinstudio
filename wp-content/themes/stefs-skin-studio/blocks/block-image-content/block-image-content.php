<?php 
    $content_block_option = get_field('content_block_options'); // Retrieve selected block option
?>

<?php if ($content_block_option === 'simple'): ?>
    <!-- START SIMPLE OPTION -->
    <?php 
        $simple_content = get_field('simple_content_block');
        if ($simple_content): // Check if repeater field has rows
    ?>
        <section id="image-content-simple" class="section-image-content">
            <div class="container container-image-content">
                <?php foreach ($simple_content as $row): ?>
                    <?php 
                        $layout = $row['scb_content_layout']; // Image Right or Left
                        $image = $row['scb_image_group']['scb_image'];
                        $content = $row['scb_content_group'];
                    ?>
                    <!-- <div class="row row-image-content align-items-center mb-5"> -->
                    <div class="row row-image-content <?php echo $layout === 'image-right' ? 'row-right' : 'row-left'; ?>">
                        <?php if ($layout === 'image-left'): ?>
                            <!-- Start Image Wrap - Img-Left -->
                            <div class="wrap-image img-left col-lg-6 mb-4 mb-lg-0">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Image for Simple Content', 'text-domain'); ?>" class="image-simple">
                            </div>
                            <!-- End Image Wrap - Img-Left -->
                        <?php endif; ?>

                        <!-- Start Content Wrap -->
                        <div class="wrap-content col-lg-6">
                            <?php if (!empty($content['scb_sub_header'])): ?>
                                <!-- Subhead -->
                                <p class="eyebrow-text"><?php echo esc_html($content['scb_sub_header']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_header'])): ?>
                                <!-- Header -->
                                <h2 class="mb-3"><?php echo esc_html($content['scb_header']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_main_content'])): ?>
                                <!-- Body Text -->
                                <div class="wrap-text mb-4"><?php echo wp_kses_post($content['scb_main_content']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content['scb_content_button'])): ?>
                                <!-- Buttons - Max 2 -->
                                <div class="wrap-btn">
                                    <?php foreach ($content['scb_content_button'] as $button): ?>
                                        <a href="<?php echo esc_url($button['scb_button_link']); ?>" class="btn"><?php echo esc_html($button['scb_button_text']); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- End Content Wrap -->

                        <?php if ($layout === 'image-right'): ?>
                            <!-- Start Image - Img-Right -->
                            <div class="wrap-image img-right col-lg-6 mb-4 mb-lg-0">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Image for Simple Content', 'text-domain'); ?>" class="image-simple">
                            </div>
                            <!-- End Image - Img-Right -->
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- END SIMPLE OPTION -->

<?php elseif ($content_block_option === 'grid'): ?>
    <!-- START GRID OPTION -->
    <?php 
        $grid_content = get_field('grid_content_block');
        if ($grid_content): // Check if repeater field has rows
    ?>
        <section id="image-content-grid" class="section-image-content">
            <div class="container container-image-content">
                <?php foreach ($grid_content as $row): ?>
                    <?php 
                        $layout = $row['gcb_layout_option']; // Image Right or Left
                        $image = $row['gcb_image_group']['gcb_image'];
                        $content = $row['gcb_content_group'];
                    ?>
                    <div class="row row-image-content <?php echo $layout === 'image-right' ? 'row-right' : 'row-left'; ?>">
                        <?php if ($layout === 'image-left'): ?>
                            <!-- Start Image Wrap - Img-Left -->
                            <div class="wrap-image img-left col-lg-6 mb-4 mb-lg-0">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Image for Grid Content', 'text-domain'); ?>" class="image-grid">
                            </div>
                            <!-- End Image Wrap - Img-Left -->
                        <?php endif; ?>

                        <!-- Start Content Wrap -->
                        <div class="wrap-content col-lg-6">
                            <?php if (!empty($content['gcb_sub_header'])): ?>
                                <!-- Subhead -->
                                <p class="eyebrow-text"><?php echo esc_html($content['gcb_sub_header']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_header'])): ?>
                                <!-- Header -->
                                <h2 class="mb-3"><?php echo esc_html($content['gcb_header']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_main_content'])): ?>
                                <!-- Body Text -->
                                <div class="wrap-text mb-4"><?php echo wp_kses_post($content['gcb_main_content']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content['gcb_content_button'])): ?>
                                <!-- Buttons - Max 2 -->
                                <div class="wrap-btn">
                                    <?php foreach ($content['gcb_content_button'] as $button): ?>
                                            <a href="<?php echo esc_url($button['gcb_button_link']); ?>" class="btn"><?php echo esc_html($button['gcb_button_text']); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- End Content Wrap -->

                        <?php if ($layout === 'image-right'): ?>
                            <!-- Start Image - Img-Right  -->
                            <div class="wrap-image img-right col-lg-6">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Image for Grid Content', 'text-domain'); ?>" class="image-grid">
                            </div>
                            <!-- End Image - Img-Right  -->
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- END GRID OPTION -->

<?php endif; ?>
