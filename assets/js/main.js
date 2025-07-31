document.addEventListener("DOMContentLoaded", function () {

	// Countdown Timer
	document.querySelectorAll(".awesome-countdown").forEach(function (timer) {
		const end = new Date(timer.dataset.end).getTime();

		const update = setInterval(function () {
			const now = new Date().getTime();
			const distance = end - now;

			if (distance < 0) {
				clearInterval(update);
				timer.innerHTML = "Expired";
				return;
			}

			const days = Math.floor(distance / (1000 * 60 * 60 * 24));
			const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((distance % (1000 * 60)) / 1000);

			timer.querySelector(".days").textContent = String(days).padStart(2, "0");
			timer.querySelector(".hours").textContent = String(hours).padStart(2, "0");
			timer.querySelector(".minutes").textContent = String(minutes).padStart(2, "0");
			timer.querySelector(".seconds").textContent = String(seconds).padStart(2, "0");
		}, 1000);
	});

	// Number Counter
	document.querySelectorAll(".awe-counter-number").forEach(function (counter) {
		const target = +counter.getAttribute("data-count");
		let count = 0;

		const step = Math.ceil(target / 100);
		const interval = setInterval(() => {
			count += step;
			if (count >= target) {
				counter.textContent = target;
				clearInterval(interval);
			} else {
				counter.textContent = count;
			}
		}, 20);
	});
});
