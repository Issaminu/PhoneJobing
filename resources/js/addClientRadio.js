
window.onload = function () {
    window.clickedMrButton = document.getElementById('MrButton').onclick = function () {
        radiobtn = document.getElementById("MrRadio");
        radiobtn.checked = true;
        document.getElementById("MrButton").style.backgroundColor = "#1f2937";
        document.getElementById("MrButton").style.color = "#FFFF";
        document.getElementById("MmeButton").style.backgroundColor = "#FFFF";
        document.getElementById("MmeButton").style.color = "#4b5563";
    };
    window.clickedMmeButton = document.getElementById('MmeButton').onclick = function () {
        radiobtn = document.getElementById("MmeRadio");
        radiobtn.checked = true;
        document.getElementById("MmeButton").style.backgroundColor = "#1f2937";
        document.getElementById("MmeButton").style.color = "#FFFF";
        document.getElementById("MrButton").style.backgroundColor = "#FFFF";
        document.getElementById("MrButton").style.color = "#4b5563";
    };
}