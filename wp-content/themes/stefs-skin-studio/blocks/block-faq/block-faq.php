<?php
// Fetch ACF fields
$header = get_field('faq_header');
$content = get_field('faq_content');
$questions = get_field('faq_questions');
?>

<section class="faq-block py-5">
    <div class="container">
        <!-- FAQ Header -->
        <?php if ($header): ?>
            <h2 class="faq-header display-5 fw-bold mb-3">
                <?php echo esc_html($header); ?>
            </h2>
        <?php endif; ?>

        <!-- FAQ Content -->
        <?php if ($content): ?>
            <div class="faq-intro mb-4">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <!-- FAQ Questions -->
        <?php if ($questions): ?>
            <div class="accordion" id="faqAccordion">
                <?php foreach ($questions as $index => $faq): ?>
                    <div class="accordion-item border-0">
                        <h3 class="accordion-header" id="faqHeading<?php echo $index; ?>">
                            <button 
                                class="accordion-button collapsed fw-bold text-dark" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#faqCollapse<?php echo $index; ?>" 
                                aria-expanded="false" 
                                aria-controls="faqCollapse<?php echo $index; ?>">
                                <?php echo esc_html($faq['faq_question']); ?>
                            </button>
                        </h3>
                        <div 
                            id="faqCollapse<?php echo $index; ?>" 
                            class="accordion-collapse collapse" 
                            aria-labelledby="faqHeading<?php echo $index; ?>" 
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                <?php echo wp_kses_post($faq['faq_answer']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .faq-block {
    background-color: #fff;
    color: #333;
}

.faq-block .faq-header {
    color: #333;
}

.accordion-button {
    background: none;
    border: none;
    font-size: 1.1rem;
    padding: 1rem;
    text-align: left;
    box-shadow: none;
    transition: background 0.3s ease, color 0.3s ease;
}

.accordion-button:hover {
    background-color: #f8f8f8;
    color: #e96a69;
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-item {
    border-bottom: 1px solid #ddd;
}

.accordion-body {
    padding: 1rem 1.25rem;
    line-height: 1.6;
    font-size: 0.95rem;
    color: #555;
}
</style>