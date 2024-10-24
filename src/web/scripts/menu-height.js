document.addEventListener("DOMContentLoaded", () => {

	if (window.innerWidth > 800) {
		let nav = document.getElementsByTagName("nav")[0];

		let header = document.getElementsByTagName("header")[0];
		let headerHeight = parseInt(getComputedStyle(header).height);

		let footer = document.getElementsByTagName("footer")[0];
		let footerHeight = parseInt(getComputedStyle(footer).height);

		let height = window.innerHeight - headerHeight - footerHeight;

		nav.style.minHeight = height + "px";
	}
});
