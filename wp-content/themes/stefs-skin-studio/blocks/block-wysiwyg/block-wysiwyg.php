<?php 
    $custom_wysiwyg = get_field('custom_wysiwyg'); // Retrieve the WYSIWYG content
?>

<?php if (!empty($custom_wysiwyg)): ?>
    <section id="custom-wysiwyg" class="section-wysiwyg">
        <div class="container container-wysiwyg">
            <div class="wrap-wysiwyg">
                <div class="wrap-content">
                    <?php echo wp_kses_post($custom_wysiwyg); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>