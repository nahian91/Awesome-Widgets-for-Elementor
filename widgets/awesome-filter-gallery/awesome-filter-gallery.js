(function ($) {
    'use strict';

    $(window).on('elementor/frontend/init', function () {

        /**
         * =========================
         * Filter Gallery Widget
         * Widget name: webbricks-filter-gallery-widget
         * =========================
         */
        elementorFrontend.hooks.addAction('frontend/element_ready/awesome-filter-gallery.default', function ($scope) {
            const $gridActive = $scope.find('.awea-grid-active');
            if (!$gridActive.length || typeof $.fn.isotope !== 'function') return;

            function equalizeImageHeights() {
                let maxHeight = 0;
                $gridActive.find('.awea-single-filter-gallery img').each(function () {
                    $(this).css('height', 'auto');
                    const currentHeight = $(this).height();
                    if (currentHeight > maxHeight) maxHeight = currentHeight;
                });
                $gridActive.find('.awea-single-filter-gallery img').height(maxHeight);
            }

            // Init Isotope
            const grid = $gridActive.isotope({
                itemSelector: '.awea-grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.awea-grid-item'
                }
            });

            // ImagesLoaded before isotope + equal heights
            $gridActive.imagesLoaded(function () {
                grid.isotope('layout');
                equalizeImageHeights();
            });

            // Filter buttons
            $scope.find('.awea-filter-gallery-menu').off('click').on('click', 'button', function () {
                const filterValue = $(this).attr('data-filter');
                grid.isotope({ filter: filterValue });
                setTimeout(equalizeImageHeights, 300);

                $(this).addClass('active').siblings().removeClass('active');
            });

            // Equal heights after arrange
            grid.on('arrangeComplete', function () {
                equalizeImageHeights();
            });

            // Re-equal heights on window resize
            $(window).on('resize', function () {
                equalizeImageHeights();
            });
        });

    });

})(jQuery);
