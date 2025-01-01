jQuery(document).ready(function ($) {
    // 1. Keep your existing toggle logic for .posts-slider
    function togglePostsSlider() {
        if ($(window).width() >= 992) {
            // Destroy the slider if the viewport is 992px or wider
            if ($('.posts-slider').hasClass('slick-initialized')) {
                $('.posts-slider').slick('unslick'); // Destroy
                $('.posts-slider').removeClass('slick-initialized');
            }
        } else {
            // Initialize the slider if the viewport is < 992px
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

    // 2. Initialize testimonies-slider ALWAYS (no toggling by width)
    $('.testimonies-slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 400,
        slidesToShow: 1,
        fade: true,
        autoplay: true,
        autoplaySpeed: 8000,
        adaptiveHeight: false,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 768, // Mobile view
                settings: {
                    adaptiveHeight: true,
                    autoplay: false,
                    fade: false,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    // 3. Run toggle for .posts-slider on page load
    togglePostsSlider();

    // 4. Re-check posts-slider on window resize
    $(window).on('resize', function () {
        togglePostsSlider();
    });
});