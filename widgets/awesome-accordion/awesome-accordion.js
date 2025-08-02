(function($) {
    // Wait until Elementor frontend is ready
    $(window).on('elementor/frontend/init', function() {

        const initAccordion = function($scope, $) {
            const accordion = $scope.find('.awea-accordion').get(0);
            if (!accordion) return;

            const headers = accordion.querySelectorAll('.awea-accordion-header');

            headers.forEach(header => {
                header.addEventListener('click', () => {
                    const allItems = accordion.querySelectorAll('.awea-accordion-item');

                    allItems.forEach(item => {
                        const content = item.querySelector('.awea-accordion-content');
                        const icon = item.querySelector('.awea-icon');
                        if (item.querySelector('.awea-accordion-header') === header) {
                            const isActive = item.classList.contains('active');
                            if (isActive) {
                                item.classList.remove('active');
                                content.style.display = 'none';
                                if (icon) icon.className = 'awea-icon ' + icon.dataset.iconDefault;
                            } else {
                                item.classList.add('active');
                                content.style.display = 'block';
                                if (icon) icon.className = 'awea-icon ' + icon.dataset.iconActive;
                            }
                        } else {
                            item.classList.remove('active');
                            content.style.display = 'none';
                            const icon = item.querySelector('.awea-icon');
                            if (icon) icon.className = 'awea-icon ' + icon.dataset.iconDefault;
                        }
                    });
                });
            });
        };

        // Hook the function to your widget
        elementorFrontend.hooks.addAction('frontend/element_ready/awesome-accordion.default', initAccordion);
    });
})(jQuery);
