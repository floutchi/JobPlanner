let icon = document.getElementById("connectionManager");
let item = document.getElementById('formContent');
let body = document.querySelector('body');

item.hidden = true;

icon.addEventListener('click', () => {
    item.hidden = false;
})

body.addEventListener('click', () => {
    if (item.hidden == false) {
        item.hidden == true;
    }
})

body.addEventListener('dblclick', () => {
    item.hidden = true;
})

item.addEventListener('dblclick', () => {
    item.hidden = true;
})