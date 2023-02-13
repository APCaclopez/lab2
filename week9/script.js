function displayDate() {
	document.getElementById('showDate').innerHTML = Date();
}

var messageArray = ["i am aliyah kirstie."];
var textPosition = 0;
var speed = 100;

function typewriter() {
	document.querySelector("#text").innerHTML = messageArray[0].substring(0,
	textPosition) + "<span>\u25ae</span>";

	if (textPosition++ != messageArray[0].length)
		setTimeout(typewriter, speed);
}

window.addEventListener("load", typewriter)

function portfolioAlert() {
	alert('This section is not available yet.');
}
