<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your validation and database insertion code would go here
    // For simplicity, let's just print the submitted data
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password;
}
?>
