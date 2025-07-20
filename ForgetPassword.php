<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'pms';
$con = mysqli_connect($host, $user, $pass, $db) or die("Error while connecting");
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <style>
            /* Your existing CSS */
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: 'Montserrat', sans-serif;
                background-color: #f0f2f5;
            }

            .form-container {
                background-color: #ffffff;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
                width: 380px;
                animation: fadeIn 0.6s ease-in-out;
            }

            .form-container h1 {
                text-align: center;
                margin-bottom: 25px;
                color: #333;
                font-size: 2rem;
                font-weight: 600;
            }

            .form-container p {
                text-align: center;
                color: #555;
                font-size: 0.9rem;
                margin-bottom: 20px;
            }

            .form-container .form-label {
                font-weight: 600;
                color: #555;
                font-size: 0.95rem;
                margin-bottom: 5px;
                display: block;
            }

            .form-input {
                width: 100%;
                padding: 12px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 1rem;
                outline: none;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            .form-input:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 10px rgba(92, 103, 242, 0.2);
            }

            .form-button, .otp-button {
                width: 100%;
                padding: 12px;
                background-color: #5c67f2;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .form-button:hover, .otp-button:hover {
                background-color: #3b48a1;
                transform: translateY(-1px);
            }

            .form-button:active, .otp-button:active {
                transform: translateY(1px);
            }

            .form-button:disabled, .otp-button:disabled {
                background-color: #ccc;
                cursor: not-allowed;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .note {
                text-align: center;
                color: #888;
                font-size: 0.85rem;
                margin-top: 10px;
            }
        </style>


        <script>

            function validateMobileNo(input) {
                // Allow only digits (remove non-digit characters)
                input.value = input.value.replace(/\D/g, '');
            }
            window.onload = function () {

                document.getElementById('otp').addEventListener('input', function (event) {
                    validateMobileNo(event.target);
                });
            };
        </script>


<!--        <script>
    // JavaScript for handling OTP and password reset interactions
    document.addEventListener('DOMContentLoaded', function() {
        const sendOtpBtn = document.getElementById('sendOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');
        const otpInput = document.getElementById('otp');
        const newPasswordInput = document.getElementById('newPassword');
        const resetPasswordBtn = document.getElementById('resetPasswordBtn');

        // Initially disable OTP and password fields
        otpInput.disabled = true;
        verifyOtpBtn.disabled = true;
        newPasswordInput.disabled = true;
        resetPasswordBtn.disabled = true;

        // Send OTP button logic
        sendOtpBtn.addEventListener('click', function () {
            
            otpInput.disabled = false;
            verifyOtpBtn.disabled = false;
        });

        
    });
</script>-->

    </head>
    <body>

        <form method="POST" class="form-container">
            <h1>Forgot Password</h1>
            <p>Please enter your ID and request an OTP to reset your password</p>
            <table style="width: 100%; border-spacing: 15px;">
                <tr>
                    <td><label class="form-label">EMAIL ID</label></td>
                    <td><input type="email" id="userId" name="userId" class="form-input" placeholder="Enter your ID"
                               <?php if (isset($_POST['userId'])) echo 'value="' . htmlspecialchars($_POST['userId']) . '"'; ?> required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><button type="submit" name="btnsend" class="otp-button" id="sendOtpBtn">Send OTP</button></td>
                </tr>

                <tr>
                    <td><label for="otp" class="form-label">OTP</label></td>
                    <td><input type="text" id="otp" name="verify" class="form-input" placeholder="Enter OTP" maxlength="6"
                               <?php if (isset($_POST['verify'])) echo 'value="' . htmlspecialchars($_POST['verify']) . '"'; ?>></td>
                </tr>

                <tr>
                    <td></td>
                    <td><button type="submit" name="btnver" class="otp-button" id="verifyOtpBtn">Verify OTP</button></td>
                </tr>

                <tr>
                    <td><label for="newPassword" class="form-label">New Password</label></td>
                    <td><input type="password" id="newPassword" name="newPassword" class="form-input" placeholder="Enter new password" ></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit" name="btnchange" class="form-button" id="resetPasswordBtn" >Reset Password</button>
                    </td>
                </tr>
            </table>

            <div class="note">* Your new password should be at least 8 characters long.</div>
        </form>



        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'C:\xampp\htdocs\pms2\PHPMailer-master\src\PHPMailer.php';
        require 'C:\xampp\htdocs\pms2\PHPMailer-master\src\Exception.php';
        require 'C:\xampp\htdocs\pms2\PHPMailer-master\src\SMTP.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnsend'])) {
                sendOtp();
            } elseif (isset($_POST['btnver'])) {

                verifyOtp();
            } elseif (isset($_POST['btnchange'])) {
                store_data();
            }
        }

        if (isset($_POST['btnver'])) {
            $_SESSION['vstatus'] = 1;
        } else {
            $_SESSION['vstatus'] = 0;
        }

        function sendOtp() {
            $userId = $_POST['userId'];
            if ($userId) {
                sendEmail($userId);
                $_SESSION['vemail'] = $userId;
            }
        }

        function sendEmail($recipient_email) {
            try {
                $otp = mt_rand(100000, 999999);
                $otp_generation_time = time();

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = '22bmiit055@gmail.com';
                $mail->Password = 'ismzgubeuwluayxb';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('22bmiit055@gmail.com', 'Milestone Master');
                $mail->addAddress($recipient_email);
                $mail->isHTML(true);
                $mail->Subject = 'OTP for registration';
                $mail->Body = getEmailTemplate($otp);

                $mail->send();

                $_SESSION['otp'] = $otp;
                $_SESSION['otp_generation_time'] = $otp_generation_time;

                echo "<script>alert('OTP has been sent to your email.');</script>";
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
        }

        function verifyOtp() {


            $enteredOTP = $_POST['verify'];
            $storedOTP = $_SESSION['otp'];
            $email = $_SESSION['vemail'];

            if ($enteredOTP == null) {
                echo '<script>alert("Enter OTP First");</script>';
            }
            if ($enteredOTP == $storedOTP) {
                echo '<script>alert("OTP verification successful for email: ' . $email . '");</script>';
                $_SESSION['verifiystatus'] = 1;
            } else {
                echo '<script>alert("OTP verification failed.Please again send OTP.");</script>';
                $_SESSION['verifiystatus'] = 0;
            }
        }

        function getEmailTemplate($otp) {
            return '
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; }
            .header { background-color: #004f9f; color: #fff; text-align: center; padding: 10px; }
            .otp-code { font-size: 24px; font-weight: bold; margin: 20px 0; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>PMS</h1>
            </div>
            <div class="content">
                <p>Dear User,</p>
                <p>Your One-Time Password (OTP) is:</p>
                <div class="otp-code">' . $otp . '</div>
                <p>Please use this OTP to verify your email.</p>
            </div>
            <div class="footer">
                <p>© 2024 PMS. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>';
        }

        function store_data() {
            ob_start();

            // Declare $con as global so it's accessible inside the function
            global $con;

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $a = $_SESSION['vstatus'];
                $b = $_SESSION['verifiystatus'];
               

                if ($_SESSION['vstatus'] == 1 and $_SESSION['verifiystatus'] == 1) {
                    // Retrieve and sanitize user inputs
                    $email = $_POST['userId'];
                    $pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

                    // Create the update query
                    $qus = "UPDATE student SET password='$pass' WHERE email='$email'";
                    $quf = "UPDATE faculty SET password='$pass' WHERE email='$email'";

                    // Execute the query
                    $qs = mysqli_query($con, $qus);
                    $qf = mysqli_query($con, $quf);

                    if (!$qs and !$qf) {
                        // Display the error if the query failed
                        $e = mysqli_error($con);
                        die("Error: " . $e);
                    } else {
                        // Display success message and redirect
                        echo '<script>alert("Password Change Successful")</script>';
                        echo '<script>location.replace("Login.php")</script>';
                    }
                } else {
                    echo '<script>alert("Something went wrong during verification")</script>';
                }
                // Close the database connection
                mysqli_close($con);
            }
        }
        ?>

    </body>
</html>
