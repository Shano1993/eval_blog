// Current date
const date = document.querySelector("#date");
const dateToday = new Date();
const options = {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
};
date.innerHTML = dateToday.toLocaleDateString("fr-FR", options);

// Actual hour
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

// Interval remove message
const success = document.querySelector('.success');
const error = document.querySelector('.error');

function getMessage(message) {
    setTimeout(function () {
        message.remove();
    }, 5000)
}

getMessage(success);
getMessage(error);





