// scripts/ajax.js

function fetchData(url, callback) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => callback(data))
        .catch(error => console.error('Error fetching data:', error));
}

function sendData(url, data, callback) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(result => callback(result))
        .catch(error => console.error('Error sending data:', error));
}

// Example usage:
document.addEventListener("DOMContentLoaded", function () {
    const loadButton = document.getElementById("loadDataButton");
    if (loadButton) {
        loadButton.addEventListener("click", function () {
            fetchData('/api/get_donors.php', function (data) {
                console.log("Donors loaded:", data);
            });
        });
    }
});