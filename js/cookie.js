document.querySelector('.block-days').addEventListener('click', e => {
    // e.target - целевой элемент
    let content = e.target.innerHTML;
    let k = date.getMonth() + 1;
    createCookie("day", content, "1");
    createCookie("month", k, "1");
});
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
}