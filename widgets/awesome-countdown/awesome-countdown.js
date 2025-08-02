(function($){
	$(window).on('elementor/frontend/init', function () {

		const initCountdown = function($scope, $) {
			const el = $scope.find('.awea-countdown-wrapper').get(0);
			if (!el) return;

			let remaining = parseInt(el.getAttribute('data-time'));
			const daysEl = el.querySelector('.days');
			const hoursEl = el.querySelector('.hours');
			const minsEl = el.querySelector('.minutes');
			const secsEl = el.querySelector('.seconds');

			function updateCountdown() {
				let days = Math.floor(remaining / (60 * 60 * 24));
				let hours = Math.floor((remaining % (60 * 60 * 24)) / (60 * 60));
				let minutes = Math.floor((remaining % (60 * 60)) / 60);
				let seconds = remaining % 60;

				daysEl.textContent = String(days).padStart(2, '0');
				hoursEl.textContent = String(hours).padStart(2, '0');
				minsEl.textContent = String(minutes).padStart(2, '0');
				secsEl.textContent = String(seconds).padStart(2, '0');

				if (remaining > 0) {
					remaining--;
					setTimeout(updateCountdown, 1000);
				}
			}

			updateCountdown();
		};

		elementorFrontend.hooks.addAction('frontend/element_ready/awesome-countdown.default', initCountdown);

	});
})(jQuery);
