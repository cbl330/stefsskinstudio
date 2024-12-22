jQuery(document).ready(function ($) {
    $('.services-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,     // Enable infinite scrolling
        speed: 500,         // Transition speed
        slidesToShow: 2,    // Show one slide at a time
        slidesToScroll: 1,  // Scroll one slide at a time
        autoplay: false,    // Disable autoplay
        autoplaySpeed: 5000, // Autoplay interval
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 992, // Tablet view
                settings: {
                    // slidesToShow: 2,       // Fractional slides
                    slidesToScroll: 1,       // Scroll one slide at a time
                    centerMode: false,       // Align slides to the left
                    variableWidth: false     // Uniform slide widths
                }
            },
            {
                breakpoint: 768, // Mobile view
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    variableWidth: false,
                }
            }
        ]
    });

    $('.services-slider').on('setPosition', function () {
        var $slickList = $(this).find('.slick-list');
        var $activeSlide = $(this).find('.slick-active');
        var activeSlideHeight = $activeSlide.outerHeight();
    
        $slickList.height(activeSlideHeight + 10); // Add a 10px buffer
    });
    
});
