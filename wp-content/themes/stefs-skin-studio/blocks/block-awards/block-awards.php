<?php
// Fetch ACF fields
$header = get_field('award_header');
$awards = get_field('award_repeater');

if ($awards): ?>
    <section class="awards-block py-5 bg-light">
        <div class="container text-center">
            <!-- Header -->
            <?php if ($header): ?>
                <h2 class="awards-header display-5 fw-bold mb-4">
                    <?php echo esc_html($header); ?>
                </h2>
            <?php endif; ?>
            
            <!-- Awards -->
            <div class="row justify-content-center">
                <?php foreach ($awards as $award): ?>
                    <div class="col-6 col-md-3 mb-4">
                        <img src="<?php echo esc_url($award['award']); ?>" 
                             alt="Award Image" 
                             class="img-fluid rounded-circle shadow">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .awards-block {
    background-color: #f9f9f9;
}

.awards-block .awards-header {
    color: #333;
}

.awards-block img {
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.awards-block img:hover {
    transform: scale(1.1); /* Slight zoom effect on hover */
}
</style>