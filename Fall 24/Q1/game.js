const form = document.querySelector("form");
const guess_input = document.getElementById("user-guess");
const submit_btn = document.getElementById("submit-btn");
const label = document.querySelector("label");

let guesses = 0;
const random_num = Math.floor(Math.random() * (5000 - 500 + 1)) + 500;
console.log(random_num);
form.addEventListener("submit", (e) => {
    e.preventDefault();
    label.textContent = "";

    if(guesses == 5){
        label.textContent = "Out of guesses!";
        submit_btn.classList.replace("submit-btn", "btn-disabled");
        return;
    }
    guesses++;

    let user_guess = parseInt(guess_input.value);
    if(user_guess > random_num) {
        if(user_guess - random_num >= 1000) label.textContent = "Too high!";
        else label.textContent = "High!";
    }
    else if(user_guess < random_num) {
        if(random_num - user_guess >= 1000) label.textContent = "Too low!";
        else label.textContent = "Low!";
    }
    else {
        label.textContent = "Correct!";
        submit_btn.disabled = true;
        submit_btn.classList.replace("submit-btn", "btn-disabled");
    }
});