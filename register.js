let validateButton = document.getElementById("form");
let firstName = document.getElementById("firstName");
let regexExpressionName = /^[a-zA-Z]+$/;
let nameRegex = new RegExp(regexExpressionName);
let lastName = document.getElementById("lastName");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmPassword");
let firstNameError = document.getElementById("firstNameError");
let lastNameError = document.getElementById("lastNameError");
let emailError = document.getElementById("emailError");
let passwordError = document.getElementById("passwordError");
let passwordErrorStyle = document.getElementById("passwordErrorStyle");
let confirmPasswordError = document.getElementById("confirmPasswordError");
let confirmPasswordErrorSameText = document.getElementById("confirmPasswordErrorSameText");
let firstNameMinLengthError = document.getElementById("firstNameMinLengthError");
let lastNameMinLenthError = document.getElementById("lastNameMinLenthError");
let regexExpressionFormEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
let emailRegex = new RegExp(regexExpressionFormEmail);
let regexExpressionForPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#^+\-\[\]])[A-Za-z\d#^+\-\[\]]{8,}$/;
let passwordRegex = new RegExp(regexExpressionForPassword);


validateButton.addEventListener("submit", validateForm);


function validateForm(e){
    let firstNameValid = checkIfFirstNameIsValid();
    let lastNameValid = checkIfLastNameIsValid();
    let emailValid = checkIfEmailIsValid();
    let passwordValid = checkIfPasswordIsValid();
    let confirmPasswordValid = checkIfConfirmPasswordIsValid();
    let formValid = firstNameValid && lastNameValid && emailValid && passwordValid && confirmPasswordValid;

    if(formValid == false){
        e.preventDefault();
    }else {
        let mail = document.getElementById("email").value;
        let motDePasse = document.getElementById("password").value;
        let identifiant = document.getElementById("firstName").value;

        const user = {
            nom: mail,
            identifiant: identifiant,
            mdp: motDePasse
        }

        dataUser = localStorage.setItem("data user", JSON.stringify(user));
    }
}

function checkIfFirstNameIsValid(){
    if(firstName.value.match(nameRegex) && firstName.value != "" && firstName.value.length > 3){
        return true;
    }
    if(!firstName.value.match(nameRegex)){
        firstNameMinLengthError.style.display = "block";
        firstName.style.borderColor = "red";
        return false;
    }
    if(firstName.value.length < 3){
        firstNameMinLengthError.style.display = "block";
        firstName.style.borderColor = "red";
        return false;
    }
    if(firstName.value == ""){
        firstNameError.style.display = "block";
        firstName.style.borderColor = "red";
        return false;
    }
}

function checkIfLastNameIsValid(){
    if(lastName.value.match(nameRegex) && lastName.value != "" && lastName.value.length > 3){
        return true;
    }
    if(!lastName.value.match(nameRegex)){
        lastNameMinLenthError.style.display = "block";
        lastName.style.borderColor = "red";
        return false;
    }
    if(lastName.value.length < 3){
        lastNameMinLenthError.style.display = "block";
        lastName.style.borderColor = "red";
        return false;
    }
    if(lastName.value == ""){
        lastNameError.style.display = "block";
        lastName.style.borderColor = "red";
        return false;
    }
}

function checkIfEmailIsValid(){
    if(email.value.match(emailRegex)){
        return true;
    } else{
        emailError.style.display = "block";
        email.style.borderColor = "red";
        return false;
    }
}

function checkIfPasswordIsValid(){
    if(password.value.match(passwordRegex)){
        return true;
    } else if (password.value == ""){
        passwordError.style.display = "block";
        password.style.borderColor = "red";
        return false;
    } else {
        passwordErrorStyle.style.display = "block";
        password.style.borderColor = "red";
        return false;
    }
}

function checkIfConfirmPasswordIsValid(){
    if(confirmPassword.value === password.value && confirmPassword.value != ""){
        return true;
    } else {
        confirmPasswordErrorSameText.style.display = "block";
        confirmPasswordError.style.display = "block";
        confirmPassword.style.borderColor = "red";
        return false;
    }

}