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

// Validate form
let button = document.querySelector("#submit");
let firstname = document.querySelector("#firstname");
let lastname = document.querySelector("#lastname");
let password = document.querySelector("#password");
let passwordRepeat = document.querySelector("#passwordRepeat");
let email = document.querySelector("#email");
let age = document.querySelector("#age");
let email1 = "@";

button.addEventListener('click', function () {
    if (firstname.value === "") {
        alert("Entrer votre prénom.");
    }
    if (lastname.value === "") {
        alert("Entrer votre nom.");
    }
    if (password.value === "") {
        alert("Entrer votre mot de passe.");
    }
    if (password.value.length < 6 || password.value.length > 255) {
        alert("Votre mot de passe est trop long ou trop court, et dois comporter une majuscule, un chiffre et un caractère spécial.");
    }
    if (password.value !== passwordRepeat.value) {
        alert("Les mots de passe ne correspondent pas.");
    }
    if (email.value === "") {
        alert("Entrer votre adresse email.");
    }
    if (email.value !== email.includes(email1)) {
        alert("Votre adresse email n'est pas valide.")
    }
    if (email.value.length < 6 || email.value.length > 150) {
        alert("Votre adresse email est trop longue ou trop courte.")
    }
    if (age.value < 12 || age.value > 120) {
        alert("Vous n'avez pas l'âge pour vous inscrire.")
    }
})






