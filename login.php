<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your database connection logic goes here
    // Example: $conn = mysqli_connect("localhost", "username", "password", "database");

    // Check if the user exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Login failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
