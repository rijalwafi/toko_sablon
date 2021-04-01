import "./component/collapsible.js";
import "./component/navbar-scroll.js";
import "./component/menu-icon.js";
import "./component/slider.js";
import "./component/modal.js";
import "./component/dropdown.js";
import "./component/sidebar.js";
import "./component/tooltiped.js";
import "./component/date-picker.js";
import "./component/materializebox.js";
function toggleMenu() {
	let navigation = document.querySelectorAll(".navigation");
	navigation.classList.toggle("active");
}
let btn = document.querySelector(".toggle");
btn.addEventListener("click", toggleMenu);
