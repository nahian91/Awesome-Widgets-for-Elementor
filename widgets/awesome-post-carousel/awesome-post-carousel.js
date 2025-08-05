// Initialize when Elementor frontend is ready
jQuery(window).on('elementor/frontend/init', function () {

    elementorFrontend.hooks.addAction('frontend/element_ready/awesome-post-carousel.default', function ($scope, $) {
        var post_carousel = $scope.find('.awea-post-carousel');
        var post_items = post_carousel.attr('awea-post-items');
        var post_arrows = post_carousel.attr('awea-post-arrows');
        var post_loops = post_carousel.attr('awea-post-loops');
        var post_pause = post_carousel.attr('awea-post-pause');
        var post_autoplay = post_carousel.attr('awea-post-autoplay');
        var post_autoplay_speed = post_carousel.attr('awea-post-autoplay-speed');
        var post_autoplay_animation = post_carousel.attr('awea-post-autoplay-animation');
    
        // Initialize Owl Carousel for post Carousel
        post_carousel.owlCarousel({
            dots: true,
            loop: true,
            autoplay: post_autoplay,
            margin: 30,
            nav: true,
            autoplayTimeout: post_autoplay_animation,
            autoplaySpeed: post_autoplay_speed,
            autoplayHoverPause: post_pause,
            items: post_items,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: post_items,
                    nav: post_arrows,
                    loop: post_loops,
                }
            },
            onInitialized: equalizeHeights, // Equalize heights on initialization
            onChanged: equalizeHeights // Equalize heights on slide change
        });
    
        function equalizeHeights() {
            // Reset height to auto to calculate actual height of each item
            post_carousel.find('.owl-item').css('height', 'auto');
    
            // Find the maximum height among all items
            var maxHeight = 0;
            post_carousel.find('.owl-item').each(function () {
                var currentHeight = $(this).height();
                maxHeight = currentHeight > maxHeight ? currentHeight : maxHeight;
            });
    
            // Set the maximum height to all items
            post_carousel.find('.owl-item').css('height', maxHeight + 'px');
        }
    });  

});