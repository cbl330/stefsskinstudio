<?php 
$custom_wysiwyg = get_field('custom_wysiwyg'); // Retrieve the WYSIWYG content
?>

<?php if (!empty($custom_wysiwyg)): ?>
    <section class="section-wysiwyg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php echo wp_kses_post($custom_wysiwyg); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
