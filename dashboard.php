<?php
session_start();

// Debugging: Print session data
// echo "Session authenticated: " . $_SESSION['authenticated'] . "<br>";
// echo "Session OTP: " . $_SESSION['otp'] . "<br>";

// Check if the user is authenticated (OTP verified)
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page or handle unauthorized access
  //  header('Location: index.html');
    exit();
}

// If OTP is still in the session, you can access it here ($_SESSION['otp'])

// Your dashboard content goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard!</h2>
    <!-- Your dashboard content goes here -->
</body>
</html>
