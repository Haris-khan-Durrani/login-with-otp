# OTP-Based Login System in PHP

This repository contains a simple OTP (One-Time Password) login system implemented in PHP. Users can register, receive an OTP on their mobile number, and then log in by verifying the OTP.


[![Buy Me a Coffee](https://img.shields.io/badge/Donate-Buy%20Me%20a%20Coffee-orange.svg)](https://www.buymeacoffee.com/hariskha)

## Files

- **index.html:**
  - Contains the HTML and JavaScript code for the user interface.
  - Allows users to enter their mobile number, request OTP, and verify OTP.

- **dashboard.php:**
  - The dashboard page that users are redirected to after successful OTP verification.
  - Displays a welcome message or additional user information.

- **send_otp.php:**
  - Generates a random OTP, stores it in the session for verification, and sends it to the user's mobile number using a webhook.

- **verify_otp.php:**
  - Verifies the user-entered OTP against the one stored in the session.

## Setup

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/Haris-khan-Durrani/login-with-otp.git
   cd login-with-otp
