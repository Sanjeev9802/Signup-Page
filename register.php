<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Your MySQL database connection logic goes here
    $mysqli = new mysqli("localhost", "Sanjeev", "sanjeev66", "Signup_Page");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Registration failed: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
