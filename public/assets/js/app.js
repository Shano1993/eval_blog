// current date
const date = document.querySelector("#date");
const dateToday = new Date();
const options = {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
};
date.innerHTML = dateToday.toLocaleDateString("fr-FR", options);

// actual hour
function clock() {
    const time = new Date(),
        hours = time.getHours(),
        minutes = time.getMinutes(),
        seconds = time.getSeconds();
    document.querySelectorAll(".clock")[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
    function harold(standIn) {
        if (standIn < 10) {
            standIn = '0' + standIn
        }
        return standIn;
    }
}
setInterval(clock, 0);
