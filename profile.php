<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have the MongoDB PHP extension installed
    $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $username = $_POST['username'];
    $profileData = [
        'username' => $username,
        'email' => $_POST['email'], // Add more fields as needed
        // ...
    ];

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($profileData);

    $result = $mongo->executeBulkWrite('mongodb_database.collection', $bulk);

    if ($result) {
        echo "Profile creation successful!";
    } else {
        echo "Profile creation failed.";
    }
}
?>
