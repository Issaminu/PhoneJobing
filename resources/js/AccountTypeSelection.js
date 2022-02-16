document.getElementById('AccTypeTeleButton').onclick = function () {
    radiobtn = document.getElementById("TeleRadio");
    radiobtn.checked = true;
    document.getElementById("AccTypeTeleButton").style.backgroundColor = "#1f2937";
    document.getElementById("AccTypeTeleButton").style.color = "#FFFF";
    document.getElementById("AccTypeCommButton").style.backgroundColor = "#FFFF";
    document.getElementById("AccTypeCommButton").style.color = "#4b5563";
};
document.getElementById('AccTypeCommButton').onclick = function () {
    radiobtn = document.getElementById("CommRadio");
    radiobtn.checked = true;
    document.getElementById("AccTypeCommButton").style.backgroundColor = "#1f2937";
    document.getElementById("AccTypeCommButton").style.color = "#FFFF";
    document.getElementById("AccTypeTeleButton").style.backgroundColor = "#FFFF";
    document.getElementById("AccTypeTeleButton").style.color = "#4b5563";
};