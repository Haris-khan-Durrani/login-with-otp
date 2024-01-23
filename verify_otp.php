<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userEnteredOTP = $_GET['otp'];

    // Start session to retrieve stored OTP
    session_start();

    if (isset($_SESSION['otp']) && $_SESSION['otp'] === $userEnteredOTP) {
        // OTP is valid
        $_SESSION['authenticated'] = true;
        $response = array('success' => true, 'message' => 'OTP verification successful');
    } else {
        // Invalid OTP
        $response = array('success' => false, 'message' => 'Invalid OTP');
    }

    // Clear the stored OTP from the session
    unset($_SESSION['otp']);

    echo json_encode($response);
} else {
    // Handle invalid request method
    http_response_code(400);
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}
?>
