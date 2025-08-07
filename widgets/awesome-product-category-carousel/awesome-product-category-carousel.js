// Initialize when Elementor frontend is ready
jQuery(window).on('elementor/frontend/init', function () {

    // Products Category Carousel Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/awesome-product-category-carousel.default', function ($scope, $) {
        var product_category_carousel = $scope.find('.awea-product-category-carousel');
        var product_category_carousel_items = product_category_carousel.attr('awea-product-category-carousel-items');
        var product_category_carousel_arrows = product_category_carousel.attr('awea-product-category-carousel-arrows');
        var product_category_carousel_loops = product_category_carousel.attr('awea-product-category-carousel-loops');
        var product_category_carousel_pause = product_category_carousel.attr('awea-product-category-carousel-pause');
        var product_category_carousel_autoplay = product_category_carousel.attr('awea-product-category-carousel-autoplay');
        var product_category_carousel_autoplay_speed = product_category_carousel.attr('awea-product-category-carousel-autoplay-speed');
        var product_category_carousel_autoplay_animation = product_category_carousel.attr('awea-product-category-carousel-autoplay-animation');

        // Initialize Owl Carousel for Product Category Carousel Widget
        product_category_carousel.owlCarousel({
            dots: false,
            margin: 30,
            autoplay: product_category_carousel_autoplay,
            autoplayTimeout: product_category_carousel_autoplay_animation,
            autoplaySpeed: product_category_carousel_autoplay_speed,
            autoplayHoverPause: product_category_carousel_pause,
            navText: [
                "<div class='awea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='awea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
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
                    items: 3,
                    nav: product_category_carousel_arrows,
                    loop: product_category_carousel_loops,
                }
            }
        });

        function setEqualHeight() {
            var maxItemHeight = 0;
            // Reset the height of all product-category items to auto
            $('.awea-product-category-carousel .awea-product-category').css('height', 'auto');
            
            // Loop through each product-category item to find the tallest one
            $('.awea-product-category-carousel .awea-product-category').each(function() {
                var currentItemHeight = $(this).outerHeight();
                // Update the maximum item height if necessary
                if (currentItemHeight > maxItemHeight) {
                    maxItemHeight = currentItemHeight;
                }
            });
            
            // Set the height of all product-category items to the maximum item height
            $('.awea-product-category-carousel .awea-product-category').css('height', maxItemHeight);
        }
    
        // Call setEqualHeight on window load and resize
        $(window).on('load resize', function() {
            setEqualHeight();
        });
    });
});