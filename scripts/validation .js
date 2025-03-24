// scripts/validation.js

function validateForm(form) {
    let isValid = true;

    // Validate email field
    const emailInput = form.querySelector('input[type="email"]');
    if (emailInput && !emailInput.value.includes("@")) {
        alert("Please enter a valid email address.");
        isValid = false;
    }

    // Validate password field
    const passwordInput = form.querySelector('input[type="password"]');
    if (passwordInput && passwordInput.value.length < 6) {
        alert("Password must be at least 6 characters long.");
        isValid = false;
    }

    return isValid;
}

document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            if (!validateForm(form)) {
                event.preventDefault(); // Prevent form submission
            }
        });
    });
});