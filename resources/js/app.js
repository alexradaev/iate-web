//require('./bootstrap');
import 'bootstrap';


let monthSelect = document.getElementById("selectMonth");
if (monthSelect) {
    monthSelect.addEventListener("change", function () {
        changeDayList(this.selectedIndex);
    });
}

function changeDayList(index) {
    let items = [];
    for (let i = 1; i<=28; i++){
        items.push(i);
    }
    if (index !== 1){
        items.push(29);
        items.push(30);
        if ((index <= 6 && index%2 === 0) || (index > 6 && index%2 !== 0)) {
            items.push(31);
        }
    }
    let str = ""
    for (let item of items) {
        str += "<option>" + item + "</option>"
    }
    document.getElementById("selectDay").innerHTML = str;
}

const mainForm = document.getElementById('main-form');

if (mainForm) mainForm.addEventListener('submit', showDate);

function showDate(event){
    const daySelect = document.getElementById('selectDay');
    alert("Месяц: " + monthSelect.value + "\n День: " + daySelect.value);
}
