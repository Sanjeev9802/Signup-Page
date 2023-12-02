// Function to handle registration using AJAX
function registerUser() {
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: "register.php",
        data: { username: username, password: password },
        success: function(response) {
            alert(response);
            if (response === "Registration successful!") {
                // Optionally, you can automatically log in the user after registration
                loginUser(username);
            }
        },
        error: function(error) {
            alert("Registration failed: " + error);
        }
    });
}

// Function to handle login using AJAX
function loginUser(username) {
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: "login.php",
        data: { username: username, password: password },
        success: function(response) {
            alert(response);
            if (response === "Login successful!") {
                
                localStorage.setItem("username", username);
                
                window.location.href = "profile.html";
            }
        },
        error: function(error) {
            alert("Login failed: " + error);
        }
    });
}


function checkLoginStatus() {
    var username = localStorage.getItem("username");
    if (username) {
        
        alert("Welcome back, " + username + "!");
    } else {
        
        window.location.href = "login.html";
    }
}


