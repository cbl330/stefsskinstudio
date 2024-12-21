jQuery(document).ready(function ($) {
    $('.services-slider').slick({
        dots: true,         // Show navigation dots
        infinite: true,     // Enable infinite scrolling
        speed: 500,         // Transition speed
        slidesToShow: 1,    // Show one slide at a time
        slidesToScroll: 1,  // Scroll one slide at a time
        autoplay: true,     // Enable autoplay
        autoplaySpeed: 3000, // Autoplay interval
        responsive: [
            {
                breakpoint: 992, // Below 992px (tablet)
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768, // Below 768px (mobile)
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});
