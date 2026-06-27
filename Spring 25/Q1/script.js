let password_input = document.getElementById("password");
let button = document.getElementById("btn");
let label = document.getElementById("result");

let attempts = 0;

function checkStrength(){
    let password = password_input.value.trim();
    if(password.length === 0){
        alert("Enter a password to check strength.");
        return;
    }

    attempts++;

    let score = 0;

    //Length score
    if(password.length >= 6){
        score += Math.floor(password.length/2) * 10;
    }

    //Uppercase
    if(/[A-Z]/.test(password)){
        score += 15;
    }

    //Lowercase
    if(/[a-z]/.test(password)){
        score += 15;
    }

    //Numbers
    if(/[0-9]/.test(password)){
        score += 20;
    }

    //Special characters
    if(/[!@#$%^&*]/.test(password)){
        score += 25;
    }

    let strength;
    if(score > 100) strength = "Perfect Password!";
    else if(score >= 91) strength = "Very Strong";
    else if(score >= 71) strength = "Strong";
    else if(score >= 51) strength = "Medium";
    else if(score >= 31) strength = "Weak";
    else strength = "Very Weak";

    let message = strength;
    if(score > 100) message += "<br>You have created a perfect password.";

    //Checking attemps
    if(attempts > 8 && score < 71){
        message += "<br>Need practice!";
        message += "<br><br>Tips: ";
        message += "<br> -Use uppercase letters";
        message += "<br> -Use lowercase letters";
        message += "<br> -Use numbers";
        message += "<br> -Use special characters";
        message += "<br> -Make password longer";
    }

    label.innerHTML = message;
}

button.addEventListener("click", (e) => {
    e.preventDefault();
    checkStrength();
});