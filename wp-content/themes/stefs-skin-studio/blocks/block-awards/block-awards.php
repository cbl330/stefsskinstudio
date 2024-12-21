<section id="awards" class="section-awards py-5 bg-white text-center">
    <div class="container">
        <!-- Heading -->
        <?php if (get_field('award_header')): ?>
            <h2 class="mb-5"><?php echo esc_html(get_field('award_header')); ?></h2>
        <?php endif; ?>

        <!-- Award Badges -->
        <?php if (have_rows('award_repeater')): ?>
            <div class="row-awards row">
                <?php while (have_rows('award_repeater')): the_row(); ?>
                    <?php 
                        $award_image = get_sub_field('award'); 
                        if ($award_image): 
                    ?>
                        <!-- Single Badge -->
                        <div class="col-6 col-md-3 mb-3">
                            <img src="<?php echo esc_url($award_image); ?>" alt="<?php echo esc_attr__('Award Badge', 'text-domain'); ?>">
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
