const el = document.addEventListener("DOMContentLoaded", () => {
	const el = document.querySelectorAll(".slider");
	const options = {
		indicators: false,
		height: 400,
		duration: 400,
		interval: 5000,
	};
	M.Slider.init(el, options);
});
