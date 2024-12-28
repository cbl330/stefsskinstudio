jQuery(document).ready(function ($) {
    // Function to initialize or destroy the slider
    function toggleSlider() {
        if ($(window).width() >= 992) {
            // Destroy the slider if the viewport is 992px or wider
            if ($('.posts-slider').hasClass('slick-initialized')) {
                $('.posts-slider').slick('unslick'); // Destroy the slider
                $('.posts-slider').removeClass('slick-initialized'); // Ensure the class is removed
            }
        } else {
            // Initialize the slider if the viewport is less than 992px
            if (!$('.posts-slider').hasClass('slick-initialized')) {
                $('.posts-slider').slick({
                    dots: true,
                    arrows: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    adaptiveHeight: true,
                    responsive: [
                        {
                            breakpoint: 768, // Mobile view
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false,
                                variableWidth: false,
                            },
                        },
                    ],
                });
            }
        }
    }

    // Run on page load
    toggleSlider();

    // Re-check on window resize
    $(window).on('resize', function () {
        toggleSlider();
    });
});


// jQuery(document).ready(function ($) {
//     $('.posts-slider').slick({
//         dots: true,
//         arrows: false,
//         infinite: true,     // Enable infinite scrolling
//         speed: 500,         // Transition speed
//         slidesToShow: 2,    // Show one slide at a time
//         slidesToScroll: 1,  // Scroll one slide at a time
//         autoplay: false,    // Disable autoplay
//         autoplaySpeed: 5000, // Autoplay interval
//         adaptiveHeight: true,
//         responsive: [
//             {
//                 breakpoint: 992, // Tablet view
//                 settings: {
//                     // slidesToShow: 2,       // Fractional slides
//                     slidesToScroll: 1,       // Scroll one slide at a time
//                     centerMode: false,       // Align slides to the left
//                     variableWidth: false     // Uniform slide widths
//                 }
//             },
//             {
//                 breakpoint: 768, // Mobile view
//                 settings: {
//                     slidesToShow: 1,
//                     slidesToScroll: 1,
//                     centerMode: false,
//                     variableWidth: false,
//                 }
//             }
//         ]
//     });

//     $('.posts-slider').on('setPosition', function () {
//         var $slickList = $(this).find('.slick-list');
//         var $activeSlide = $(this).find('.slick-active');
//         var activeSlideHeight = $activeSlide.outerHeight();
    
//         $slickList.height(activeSlideHeight + 10); // Add a 10px buffer
//     });
    
// });
