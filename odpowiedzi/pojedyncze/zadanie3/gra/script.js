var amount_digits;
var number_generated;

function level(selected) {
    if (selected === "easy") {
        amount_digits = 2;
    }
    if (selected === "normal") {
        amount_digits = 3;
    }
    if (selected === "hard") {
        amount_digits = 4;
    }
    document.getElementById("levels").hidden = true;
    document.getElementById("start").hidden = false;
}

function start() {
    generateNumbers();
    document.getElementById("start").hidden = true;
    document.getElementById("container").hidden = false;
}

function generateNumbers() {
    if (amount_digits == 2) {
        number_generated = Math.floor(Math.random() * 100);
    }
    if (amount_digits == 3) {
        number_generated = Math.floor(Math.random() * 1000);
    }
    if (amount_digits == 4) {
        number_generated = Math.floor(Math.random() * 10000);
    }
    console.log(number_generated);
}

function check() {
    var number = parseInt(document.getElementById('number').value);
    console.log(number);
    if (number === number_generated) {
        alert("Brawo, wygrałeś! Wylosowana liczba to: " + number_generated);
    } else if (number < number_generated) {
        alert("Wpisana liczba jest mniejsza od wygenerowanej.");
    } else {
        alert("Wpisana liczba jest większa od wygenerowanej.");
    }
}
