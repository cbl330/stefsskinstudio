<section class="py-5 bg-white">
    <div class="container">
        <!-- Section Heading -->
        <div class="mb-4">
            <?php if (get_field('faq_header')): ?>
                <h2 class="fw-bold"><?php echo esc_html(get_field('faq_header')); ?></h2>
            <?php endif; ?>
            
            <?php if (get_field('faq_content')): ?>
                <p class="text-muted"><?php echo wp_kses_post(get_field('faq_content')); ?></p>
            <?php endif; ?>
        </div>

        <!-- Accordion -->
        <?php if (have_rows('faq_questions')): ?>
            <div class="accordion" id="faqAccordion">
                <?php $faq_count = 0; ?>
                <?php while (have_rows('faq_questions')): the_row(); ?>
                    <?php 
                    $faq_count++;
                    $question = get_sub_field('faq_question');
                    $answer = get_sub_field('faq_answer');
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $faq_count; ?>">
                            <button class="accordion-button <?php echo $faq_count === 1 ? '' : 'collapsed'; ?>" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#collapse<?php echo $faq_count; ?>" 
                                    aria-expanded="<?php echo $faq_count === 1 ? 'true' : 'false'; ?>" 
                                    aria-controls="collapse<?php echo $faq_count; ?>">
                                <?php echo esc_html($question); ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $faq_count; ?>" 
                             class="accordion-collapse collapse <?php echo $faq_count === 1 ? 'show' : ''; ?>" 
                             aria-labelledby="heading<?php echo $faq_count; ?>" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo wp_kses_post($answer); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
