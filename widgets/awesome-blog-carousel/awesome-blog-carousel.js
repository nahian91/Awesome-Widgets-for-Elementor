// Initialize when Elementor frontend is ready
jQuery(window).on('elementor/frontend/init', function () {

    elementorFrontend.hooks.addAction('frontend/element_ready/awesome-blog-carousel.default', function ($scope, $) {
        var blog_carousel = $scope.find('.awea-blog-carousel');
        var blog_items = blog_carousel.attr('awea-blog-items');
        var blog_arrows = blog_carousel.attr('awea-blog-arrows');
        var blog_loops = blog_carousel.attr('awea-blog-loops');
        var blog_pause = blog_carousel.attr('awea-blog-pause');
        var blog_autoplay = blog_carousel.attr('awea-blog-autoplay');
        var blog_autoplay_speed = blog_carousel.attr('awea-blog-autoplay-speed');
        var blog_autoplay_animation = blog_carousel.attr('awea-blog-autoplay-animation');
    
        // Initialize Owl Carousel for Blog Carousel
        blog_carousel.owlCarousel({
            dots: true,
            loop: true,
            autoplay: blog_autoplay,
            margin: 30,
            nav: blog_arrows,
            autoplayTimeout: blog_autoplay_animation,
            autoplaySpeed: blog_autoplay_speed,
            autoplayHoverPause: blog_pause,
            items: blog_items,
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
                    items: blog_items,
                    nav: blog_arrows,
                    loop: blog_loops,
                }
            },
            onInitialized: equalizeHeights, // Equalize heights on initialization
            onChanged: equalizeHeights // Equalize heights on slide change
        });
    
        function equalizeHeights() {
            // Reset height to auto to calculate actual height of each item
            blog_carousel.find('.owl-item').css('height', 'auto');
    
            // Find the maximum height among all items
            var maxHeight = 0;
            blog_carousel.find('.owl-item').each(function () {
                var currentHeight = $(this).height();
                maxHeight = currentHeight > maxHeight ? currentHeight : maxHeight;
            });
    
            // Set the maximum height to all items
            blog_carousel.find('.owl-item').css('height', maxHeight + 'px');
        }
    });  

});