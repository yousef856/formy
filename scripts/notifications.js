// scripts/notifications.js

function showAlert(message, type = "info") {
    const alertBox = document.createElement("div");
    alertBox.className = `alert ${type}`;
    alertBox.textContent = message;

    document.body.prepend(alertBox);

    setTimeout(() => {
        alertBox.remove();
    }, 3000); // Remove the alert after 3 seconds
}

document.addEventListener("DOMContentLoaded", function () {
    const notifyButton = document.getElementById("notifyButton");
    if (notifyButton) {
        notifyButton.addEventListener("click", function () {
            showAlert("This is a notification!", "success");
        });
    }
});