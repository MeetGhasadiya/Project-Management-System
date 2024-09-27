<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <style>
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

            /* Additional Styling */
            .note {
                text-align: center;
                color: #888;
                font-size: 0.85rem;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>

        <form method="POST" class="form-container">
            <h1>Forgot Password</h1>
            <p>Please enter your ID and request an OTP to reset your password</p>
            <table style="width: 100%; border-spacing: 15px;">
                <!-- ID Input -->
                <tr>
                    <td><label for="userId" class="form-label">ID</label></td>
                    <td><input type="text" id="userId" name="userId" class="form-input" placeholder="Enter your ID" required></td>
                </tr>

                <!-- Send OTP Button -->
                <tr>
                    <td></td>
                    <td><button type="button" class="otp-button" name="btnsend" id="sendOtpBtn">Send OTP</button></td>
                </tr>

                <!-- OTP Input -->
                <tr>
                    <td><label for="otp" class="form-label">OTP</label></td>
                    <td><input type="text" id="otp" name="verify" class="form-input" placeholder="Enter OTP" required disabled></td>
                </tr>

                <!-- Verify OTP Button -->
                <tr>
                    <td></td>
                    <td><button type="button" class="otp-button" name="btnver" id="verifyOtpBtn" disabled>Verify OTP</button></td>
                </tr>

                <!-- New Password Input -->
                <tr>
                    <td><label for="newPassword" class="form-label">New Password</label></td>
                    <td><input type="password" id="newPassword" name="newPassword" class="form-input" placeholder="Enter new password" required disabled></td>
                </tr>

                <!-- Reset Password Button -->
                <tr>
                    <td colspan="2">
                        <button type="submit" name="btnchange" class="form-button" id="resetPasswordBtn" disabled>Reset Password</button>
                    </td>
                </tr>
            </table>

            <div class="note">* Your new password should be at least 8 characters long.</div>
        </form>


        <script>
            const sendOtpBtn = document.getElementById('sendOtpBtn');
            const verifyOtpBtn = document.getElementById('verifyOtpBtn');
            const otpInput = document.getElementById('otp');
            const newPasswordInput = document.getElementById('newPassword');
            const resetPasswordBtn = document.getElementById('resetPasswordBtn');

            // Send OTP button logic
            sendOtpBtn.addEventListener('click', function () {
                alert('OTP sent to your registered email/phone!');
                otpInput.disabled = false;
                verifyOtpBtn.disabled = false;
            });

            // Verify OTP button logic
            verifyOtpBtn.addEventListener('click', function () {
                if (otpInput.value === '123456') { // Simulate OTP verification
                    alert('OTP verified successfully!');
                    newPasswordInput.disabled = false;
                    resetPasswordBtn.disabled = false;
                } else {
                    alert('Invalid OTP. Please try again.');
                }
            });
        </script>

        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'C:\xampp\htdocs\PMS\PHPMailer-master\src\PHPMailer.php';
        require 'C:\xampp\htdocs\PMS\PHPMailer-master\src\Exception.php';
        require 'C:\xampp\htdocs\PMS\PHPMailer-master\src\SMTP.php';

        if (isset($_POST['btnsend'])) {
            echo "<script>alert('otp')</script>";
            sendotp();
        } else if (isset($_POST['btnver'])) {
            verifyOTP();
        } else if (isset($_POST['btnchange'])) {

            store_data();
        }


        if (isset($_POST['btnver'])) {
            $_SESSION['vstatus'] = 1;
        }

        function sendotp() {
            if (isset($_POST['userId'])) {

                sendEmail($_POST['userId']);
                $_SESSION['vemail'] = $_POST['userId'];
            }
        }

        function sendEmail($recipient_email) {
            try {


                $recipient_email = $_POST['userId'];

                $otp = mt_rand(100000, 999999);
                $otp_generation_time = time();

                echo "<script>alert('1')</script>";
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = '22bmiit055@gmail.com'; //enter email address
                $mail->Password = 'iaorlmeokkkimlkw'; // Enter email password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                echo "<script>alert('2')</script>";
                // Sender and recipient
                $mail->setFrom('22bmiit055@gmail.com', 'Milestone Master');
                $mail->addAddress($recipient_email);

                echo "<script>alert('3')</script>";
                $mail->isHTML(true);
                $mail->Subject = 'OTP for registration';
                $mail->Body = getEmailTemplate($otp);

                echo "<script>alert('4')</script>";
                $mail->send();
                
                echo "<script>alert('5')</script>";
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $recipient_email;

                $_SESSION['otp_generation_time'] = $otp_generation_time;
                echo "<script>alert('OTP has been sent to your email.')</script>";
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }

        function verifyOTP() {
            if (isset($_POST['verify'])) {

                $enteredOTP = $_POST['verify'];
                $storedOTP = $_SESSION['otp'];
                $email = $_SESSION['email'];

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
        }

        function getEmailTemplate($otp) {
            return '
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                        }
                        .header {
                            background-color: #004f9f;
                            color: #ffffff;
                            padding: 10px;
                            text-align: center;
                        }
                        .content {
                            margin-top: 20px;
                            text-align: center;
                        }
                        .footer {
                            background-color: #f4f4f4;
                            color: #666666;
                            padding: 10px;
                            text-align: center;
                            font-size: 12px;
                            border-top: 1px solid #ddd;
                        }
                        .otp-code {
                            font-size: 24px;
                            font-weight: bold;
                            margin: 20px 0;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h1>PMS</h1>
                        </div>
                        <div class="content">
                            <p>Dear User,</p>
                            <p>Your One-Time Password (OTP) for email verification is:</p>
                            <h2>New OTP</h2>
                            <div class="otp-code">' . $otp . '</div>
                            <p>Please use this OTP to verify your email address.</p>
                            <p>If you did not request this OTP, please ignore this email.</p>
                        </div>
                        <div class="footer">
                            <p>© 2024 E-Auction System. All rights reserved.</p>
                            <p><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></p>
                        </div>
                    </div>
                </body>
                </html>';
        }

        function store_data() {
            ob_start();

            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "pms";

// Connect to the database
            $c = mysqli_connect($hostname, $username, $password, $database);

            if (!$c) {
                die("Connection failed: " . mysqli_connect_error());
            } else {

                if ($_SESSION['vstatus'] == 1 and $_SESSION['verifiystatus'] == 1) {
                    // Retrieve and sanitize user inputs
                    $email = $_POST['userId'];
                    $pass = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

                    // Create the update query
                    $qus = "UPDATE tblstudent SET password='$pass' WHERE email='$email'";
                    $quf = "UPDATE tblfaculty SET password='$pass' WHERE email='$email'";

                    // Execute the query
                    $qs = mysqli_query($c, $qus);
                    $qf = mysqli_query($c, $quf);

                    if (!$qs and !$qf) {
                        // Display the error if the query failed
                        $e = mysqli_error($c);
                        die("Error: " . $e);
                    } else {
                        // Display success message and redirect
                        echo '<script>alert("Password Change Successful")</script>';
                        echo '<script>location.replace("auth-signin.php")</script>';
                    }
                } else {
                    echo '<script>alert("Something Wrong to verify")</script>';
                }
                // Close the database connection
                mysqli_close($c);
            }
        }
        ?>

    </body>
</html>
