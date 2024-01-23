<?php
function generateRandomCode($length = 6) {
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= rand(0, 9);
    }

    return $code;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $phoneNumber = 'clientnumber';

    // Generate and send OTP (for simplicity, assuming OTP is numeric and 6 digits)
    $otp = generateRandomCode(6);

    // Store OTP in session for verification
    session_start();
    $_SESSION['otp'] = $otp;

    // Send OTP using the provided webhook
    $webhookUrl = "https://app.crmsoftware.ae/api/message.php";
    $message = "Your OTP is $otp";
    $params = array(
        'agent' => 'yournumber',
        'client' => $phoneNumber,
        'country' => 'AE',
        'message' => $message
    );

    // Build query string
    $queryString = http_build_query($params);

    // Create full URL with query string
    $fullUrl = $webhookUrl . '?' . $queryString;

    // Make GET request using file_get_contents
    $otpResponse = file_get_contents($fullUrl);

    // Check if the OTP was sent successfully
    $data = json_decode($otpResponse, true);
    $status = isset($data['status']) ? $data['status'] : '';

    if ($status === 'success') {
        $response = array('success' => true, 'message' => 'OTP sent successfully');
    } else {
        $response = array('success' => false, 'message' => 'Failed to send OTP. Response: ' . $otpResponse);
    }

    // Output only the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle invalid request method
    http_response_code(400);
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}
?>
