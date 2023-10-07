document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    // Get input values
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Validate username and password (for demonstration purposes, considering a specific username and password)
    if (username === "waiter" && password === "password") {
        // Successful login, redirect to another page or perform other actions
        window.location.href = "dashboard.html";
    } else {
        // Display error message for invalid login
        document.getElementById("error-message").textContent = "Invalid username or password. Please try again.";
    }
});
