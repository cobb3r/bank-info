function validate() {
    let passValid = false
    let numberCheck = document.getElementById("number")
    let lengthCheck = document.getElementById("length")
    let caseCheck = document.getElementById("upper")
    let password = document.getElementById("pass").value
    let containsUpper = false
    let containsNumber = false

    if (password.length > 8) {
        lengthCheck.style.color = "green";
    } else {
        lengthCheck.style.color = "red";
    }

    for (let x = 0; x < password.length; x++) {
        if (containsUpper == false) {
            if (password[x] == password[x].toUpperCase()) {
                containsUpper = true
                if (password[x] >= 0 && password[x] <= 9) {
                    containsUpper = false
                }
            }
        }
        if (password[x] >= 0 && password[x] <= 9) {
            containsNumber = true;
        }
    } 

    if (containsNumber == true) {
        numberCheck.style.color = "green";
    } else {
        numberCheck.style.color = "red";
    }

    if (containsUpper == true) {
        caseCheck.style.color = "green";
    } else {
        caseCheck.style.color = "red";
    }

    if (containsUpper == true && containsNumber == true && password.length > 8) {
        passValid = true
    } else {
        passValid = false
    }
}
