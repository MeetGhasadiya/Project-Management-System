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
            background-color: #f4f4f9;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8rem;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            padding: 5px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #5c67f2;
            box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
        }

        .form-button {
            width: 100%;
            padding: 10px;
            background-color: #3498DB;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-button:hover {
            background-color: #3b48a1;
            transform: translateY(-1px);
        }

        .form-button:active {
            transform: translateY(1px);
        }

        /* Animations */
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
    </style>
</head>
<body>

    <form method="POST" class="form-container">
        <h1>Forgot Password</h1>
        <table>
            <tr>
                <td><label for="userId" class="form-label">ID</label></td>
                <td><input type="text" id="userId" name="userId" class="form-input" placeholder="Enter your ID" required></td>
            </tr>
            <tr>
                <td><label for="otp" class="form-label">OTP</label></td>
                <td><input type="text" id="otp" name="otp" class="form-input" placeholder="Enter OTP" required></td>
            </tr>
            <tr>
                <td><label for="newPassword" class="form-label">New Password</label></td>
                <td><input type="password" id="newPassword" name="newPassword" class="form-input" placeholder="Enter new password" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="form-button">Reset Password</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
