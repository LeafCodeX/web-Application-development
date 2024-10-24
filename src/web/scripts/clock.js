document.addEventListener("DOMContentLoaded", function() {
    addClockToElement("clock");
});

function addClockToElement(elementId) {
    var clockElement = document.getElementById(elementId);

    if (clockElement) {
        function updateClock() {
            var date = new Date();
            var hour = date.getHours();
            var minute = date.getMinutes();
            var second = date.getSeconds();

            hour = (hour < 10) ? "0" + hour : hour;
            minute = (minute < 10) ? "0" + minute : minute;
            second = (second < 10) ? "0" + second : second;

            clockElement.innerHTML = hour + ":" + minute + ":" + second;

            setTimeout(updateClock, 1000);
        }
        updateClock();
    } else {
        console.error("Element o id " + elementId + " nie został znaleziony.");
    }
}
