let icon = document.getElementById("connectionManager");
let item = document.getElementById('formContent');
let body = document.querySelector('body');

item.hidden = true;

icon.addEventListener('click', () => {
    item.hidden = false;
    setTimeout(disableScroll, 1000)
})

body.addEventListener('dblclick', () => {
    item.hidden = true;
    window.onscroll = function() {};
})

item.addEventListener('dblclick', () => {
    item.hidden = true;
    window.onscroll = function() {};
})


/**
 * Désactive le scroll sur notre page.
 */
function disableScroll() {
    let scrollLeft, scrollTop;
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

        window.scroll = function () {
            window.scrollTo(scrollLeft, realTop)
        }
            window.onscroll = function() {
                window.scrollTo(scrollLeft, scrollTop);
            };
}