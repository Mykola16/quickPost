document.getElementById('switchMode').querySelector('input').onclick = function () {
	let theme = document.getElementById("theme");

	if (theme) {
		if (theme.getAttribute('href') === "assets/styles/day.css") {
			theme.href = "assets/styles/night.css";
		} else {
			theme.href = "assets/styles/day.css";
		}
	}
}