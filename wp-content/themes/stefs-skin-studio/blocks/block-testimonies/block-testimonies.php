<?php
// ACF Repeater Field
$testimony_slides = get_field('review_slide', 'option');

if ( $testimony_slides ) : ?>
<section id="testimonies" class="section-testimonies position-relative">
    <div class="container text-center">
        
        <!-- Slick Slider Container -->
        <div class="testimonies-slider"> 
            <?php foreach ( $testimony_slides as $slide ) : 
                $testimony_text = $slide['review_text'];
                $testimony_name = $slide['review_name'];
                ?>
                
                <div class="testimony-slide">
                    <!-- Star Rating -->
                    <div class="mb-3">
                        <span class="text-warning fs-3">
                            ★ ★ ★ ★ ★
                        </span>
                    </div>
                    
                    <!-- Testimonial Text -->
                    <blockquote class="blockquote pb-2">
                        <p class="fs-5">
                            <?php echo wp_kses_post( $testimony_text ); ?>
                        </p>
                    </blockquote>
                    
                    <!-- Author -->
                    <footer class="fw-bold">
                        <?php echo esc_html( $testimony_name ); ?>
                    </footer>
                </div><!-- .testimony-slide -->
                
            <?php endforeach; ?>
        </div><!-- .testimonies-slider -->
        
    </div><!-- .container -->
</section>
<?php endif; ?>
