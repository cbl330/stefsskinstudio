<section id="faq" class="section-faq mb-4 mb-lg-5">
    <div class="container container-faq">
        
        <!-- Start Section Heading Wrap -->
        <div class="wrap-heading mb-4">
            <?php if (get_field('faq_header')): ?>
                <h2 class="mb-3"><?php echo esc_html(get_field('faq_header')); ?></h2>
            <?php endif; ?>
            
            <?php if (get_field('faq_content')): ?>
                <p><?php echo wp_kses_post(get_field('faq_content')); ?></p>
            <?php endif; ?>
        </div>
        <!-- End Section Heading Wrap -->

        <!-- Start Accordion Wrap -->
        <?php if (have_rows('faq_questions')): ?>
            <div class="wrap-accordion accordion" id="faqAccordion">
                <?php $faq_count = 0; ?>
                <?php while (have_rows('faq_questions')): the_row(); ?>
                    <?php 
                    $faq_count++;
                    $question = get_sub_field('faq_question');
                    $answer = get_sub_field('faq_answer');
                    ?>
                    <div class="wrap-item accordion-item">
                        <p class="accordion-header" id="heading<?php echo $faq_count; ?>">
                            <button class="btn-accordion accordion-button <?php echo $faq_count === 1 ? '' : 'collapsed'; ?>" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#collapse<?php echo $faq_count; ?>" 
                                    aria-expanded="<?php echo $faq_count === 1 ? 'true' : 'false'; ?>" 
                                    aria-controls="collapse<?php echo $faq_count; ?>">
                                <?php echo esc_html($question); ?>
                            </button>
                        </p>
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
        <!-- End Accordion Wrap -->

    </div>
</section>
