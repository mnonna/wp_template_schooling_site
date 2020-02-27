jQuery(document).ready(function ($) {
    $('.post-slider-wrapper').slick({
        slidesToShow: 1,
        autoplay: true,
        dots: true,
        speed: 2000,
        arrows: false,
        fade: true,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    autoplay: false,
                    dots: false
                }
            }
        ]
    });
});