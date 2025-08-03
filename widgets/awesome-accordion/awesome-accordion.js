(function ($) {
    'use strict';

    $(window).on('elementor/frontend/init', function () {

        // FAQ Widget
        elementorFrontend.hooks.addAction(
            'frontend/element_ready/awesome-accordion.default',
            function ($scope) {

                var $faq = $scope.find('.awea-faq');

                if (!$faq.length) return;

                // Open first FAQ item
                $faq.find('> li:eq(0) span').addClass('active').next().slideDown();

                // Handle click
                $faq.find('span').on('click', function (e) {
                    var $this = $(this);
                    var dropDown = $this.closest('li').find('p');

                    // Close others
                    $faq.find('p').not(dropDown).slideUp();

                    if ($this.hasClass('active')) {
                        $this.removeClass('active');
                    } else {
                        $faq.find('span.active').removeClass('active');
                        $this.addClass('active');
                    }

                    dropDown.stop(true, true).slideToggle();
                    e.preventDefault();
                });
            }
        );

    });

})(jQuery);
