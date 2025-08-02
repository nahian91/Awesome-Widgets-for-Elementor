(function($){
	$(window).on('elementor/frontend/init', function() {
		const initCounter = function($scope, $) {
			const el = $scope.find('.awea-counter-number').closest('.awea-counter-wrapper').get(0);
			if (!el) return;

			const numberEl = el.querySelector('.awea-counter-number');
			let start = parseInt(numberEl.getAttribute('data-start'));
			let end = parseInt(numberEl.getAttribute('data-end'));
			let current = start;
			let duration = 1500; // milliseconds
			let interval = 30;
			let steps = duration / interval;
			let increment = (end - start) / steps;

			let counter = setInterval(() => {
				current += increment;
				if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
					current = end;
					clearInterval(counter);
				}
				numberEl.innerText = Math.floor(current);
			}, interval);
		};

		elementorFrontend.hooks.addAction('frontend/element_ready/awesome-counter.default', initCounter);
	});
})(jQuery);
