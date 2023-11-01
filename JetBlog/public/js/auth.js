const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const showPasswordBox = document.getElementById("showPasswordBox");

function showPassword() {
    if (showPasswordBox.checked) {
        if(confirmPassword) {
            password.type = "text";
            confirmPassword.type = "text";
        } else {
            password.type = "text";
        }
    } else {
        if(confirmPassword) {
            password.type = "password";
            confirmPassword.type = "password";
        } else {
            password.type = "password";
        }
    }
}

showPasswordBox.addEventListener("change", showPassword);