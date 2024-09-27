kvjfdyufd




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
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
            }

            form {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                width: 400px; /* Reduced size */
                animation: fadeIn 0.5s ease-in-out;
            }

            h1 {
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

            label {
                font-weight: 600;
                color: #555;
                font-size: 1rem;
            }

            input[type="text"], input[type="password"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                outline: none;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            input[type="text"]:focus, input[type="password"]:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }

            a {
                display: block;
                text-align: right;
                text-decoration: none;
                color: #5c67f2;
                font-weight: 600;
                margin-bottom: 10px;
                font-size: 0.9rem;
            }

            a:hover {
                color: #3b48a1;
            }

            button {
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

            button:hover {
                background-color: #3b48a1;
                transform: translateY(-1px);
            }

            button:active {
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

        <form method="POST" id="loginForm">
            <h1>Login</h1>
            <table>
                <tr>
                    <td><label for="userId">ID</label></td>
                    <td><input type="text" id="userId" name="txtid" placeholder="Enter your ID" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="txtpass" placeholder="Enter your password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="ForgetPassword.php" id="forgotPassword">Forgot Password?</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="btnlogin">Submit</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['btnlogin'])) {
            $hostname = "localhost:3308";
            $username = "root";
            $password = "";
            $database = "pms";

            // Establish database connection
            $c = mysqli_connect($hostname, $username, $password, $database);
            if (!$c) {
//                echo '<script>alert("Connection Error: ' . mysqli_connect_error() . '");</script>';
                echo '<script>alert("Some Went Wrong While Connecting server.");</script>';
            } else {

                $id = $_POST['txtid'];
                $pass = $_POST['txtpass'];
                $qus = "SELECT password FROM student WHERE sid='$id'";
                $quf = "SELECT password FROM faculty WHERE fid='$id'";

                echo "<script>alert('$id')</script>";

                $qs = mysqli_query($c, $qus);
                $qf = mysqli_query($c, $quf);

                $s = mysqli_num_rows($qs);
                $f = mysqli_num_rows($qf);

                if (!$qs and !$qf) {

                    echo '<script>alert("Query Error: ' . mysqli_error($c) . '");</script>';
                } else {
                    $rs = mysqli_fetch_row($qs);
                    $rf = mysqli_fetch_row($qf);
                    $stupass = $rs[0];
                    $facpass = $rf[0];

                    if (password_verify($pass, $stupass)) {
                        $_SESSION['txtemail'] = $id;
                        echo '<script>alert("Login Successfully student");</script>';
                        echo '<script>window.location.replace("http://localhost/pms2/StudentDashboard.php");</script>';
                    } else if (password_verify($pass, $facpass)) {
                        $_SESSION['txtemail'] = $id;
                        echo '<script>alert("Login Successfully faculty");</script>';
                        echo '<script>window.location.replace("http://localhost/pms2/index.php");</script>';
                    } else {
                        echo '<script>alert("Wrong Password");</script>';
                    }
                }

                // Close the database connection
                mysqli_close($c);
            }
        }
        ?>
    </body>
</html>
