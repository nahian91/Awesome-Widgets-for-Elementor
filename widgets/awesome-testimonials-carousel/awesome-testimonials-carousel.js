jQuery(window).on('elementor/frontend/init', function () {

    elementorFrontend.hooks.addAction('frontend/element_ready/awesome-testimonials-carousel.default', function ($scope, $) {
        var testimonial_widget = $scope.find('.awea-testimonials');

        var testimonial_arrows = testimonial_widget.attr('awea-testimonial-arrows') === 'yes';
        var testimonial_dots = testimonial_widget.attr('awea-testimonial-dots') === 'yes';
        var testimonial_loops = testimonial_widget.attr('awea-testimonial-loops') === 'yes';
        var testimonial_autoplay = testimonial_widget.attr('awea-testimonial-autoplay') === 'yes';
        var testimonial_pause = testimonial_widget.attr('awea-testimonial-pause') === 'yes';
        var testimonial_autoplay_speed = parseInt(testimonial_widget.attr('awea-testimonial-autoplay-speed')) || 5000;
        var testimonial_autoplay_animation = parseInt(testimonial_widget.attr('awea-testimonial-autoplay-animation')) || 300;

        testimonial_widget.owlCarousel({
            nav: testimonial_arrows,
            dots: testimonial_dots,
            autoplay: testimonial_autoplay,
            autoplayTimeout: testimonial_autoplay_animation,
            autoplaySpeed: testimonial_autoplay_speed,
            autoplayHoverPause: testimonial_pause,
            loop: testimonial_loops,
            items: 3,
            margin: 30,
            navText: [
                "<div class='awea-carousel-arrow-border'><i class='fas fa-chevron-left'></i></div>",
                "<div class='awea-carousel-arrow-border'><i class='fas fa-chevron-right'></i></div>"
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: testimonial_arrows
                },
                600: {
                    items: 2,
                    nav: testimonial_arrows
                },
                1000: {
                    items: 3,
                    nav: testimonial_arrows
                }
            }
        });
    });
});
