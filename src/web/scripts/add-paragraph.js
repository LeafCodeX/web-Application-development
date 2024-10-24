function addParagraph(element, string) {
	let paragraph = document.createElement("p");
	let text = document.createTextNode(string);

	paragraph.appendChild(text);
	element.appendChild(paragraph);
}


document.addEventListener("DOMContentLoaded", function() {
	let element = document.getElementsByClassName("tresc")[0];
	addParagraph(element, "Służę pomocą w sprawach technicznych i nie tylko! Jeśli widzisz jakieś niedopatrzenie na stronie, poinformuj mnie o tym! :D");
});
