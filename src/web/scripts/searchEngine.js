document.addEventListener("DOMContentLoaded", () => {
	let searchQuery = document.getElementById("searchQuery");
	searchQuery.addEventListener("input", () => {
		let request = new XMLHttpRequest();

		request.onreadystatechange = function() {
			if (this.status == 200 && this.readyState == 4) {
				document.getElementById("searchOutput").innerHTML = request.responseText;
			}
		};

		request.open("POST", "/searchEngine", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("query=" + searchQuery.value);
	});
});
