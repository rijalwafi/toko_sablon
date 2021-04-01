document.addEventListener("DOMContentLoaded", function () {
	var elems = document.querySelectorAll(".datepicker");
	let options = {
		autoClose: true,
		format: "dd mmmm,yyyy",
		firstDay: 1,
		yearRange: [1980, 2022],
		showDaysInNextAndPreviousMonths: true,
	};
	M.Datepicker.init(elems, options);
});
