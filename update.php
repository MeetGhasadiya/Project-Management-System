<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                background-color: #f4f4f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: 'Montserrat', sans-serif;
            }

            .form-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
                animation: fadeIn 1s ease-in-out;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
                font-weight: 600;
            }

            .update-tbl {
                width: 100%;
                border-spacing: 10px;
            }

            .update-tbl td {
                padding: 10px;
                vertical-align: middle;
            }

            input[type="text"], input[type="tel"], input[type="email"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                outline: none;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            input[type="text"]:focus, input[type="tel"]:focus, input[type="email"]:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }

            .btn-submit {
                width: 48%;
                padding: 12px;
                background-color: #5c67f2;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .btn-submit:hover {
                background-color: #4955d4;
                transform: translateY(-2px);
            }

            .btn-submit:active {
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
        <script>
            function validateMobileNo(input) {
                // Allow only digits (remove non-digit characters)
                input.value = input.value.replace(/\D/g, '');
            }

            window.onload = function () {
                document.getElementById('txtpn').addEventListener('input', function (event) {
                    validateMobileNo(event.target);
                });
            };
        </script>
    </head>
    <body>

        <?php
        include 'connection.php';


        $id = $_GET['id'];  // Use `id` to identify the student
        if (empty($id)) {
            header("location:AddStudent.php");
        } else {
            if (isset($_POST['btnupdate'])) {
                $fullName = $_POST['txtname'];
                $sem = $_POST['txtsem'];
                $email = $_POST['txtemail'];
                $contactno = $_POST['txtpn'];

                // Corrected query
                $update = "UPDATE student SET fullName='$fullName', sem='$sem', email='$email', contactno='$contactno' WHERE sid=$id";
                $query = mysqli_query($c, $update);

                if ($query) {
                    $_SESSION['updatemessage'] = "ok";
                    echo "<script>alert('Update record seccussfully')</script>";
                    echo "<script>window.location.replace('AddStudent.php');</script>";
                    exit();
                } else {
                    echo "<script>alert('Error: " . $update . "<br>" . mysqli_error($c) . "');</script>";
                }
            }
        }

        // Retrieve the current student data
        $sql = "SELECT * FROM student WHERE sid=$id";
        $result = mysqli_query($c, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="POST" class="form-container">
            <table align="center" class="update-tbl">
                <tr>
                    <td colspan="2" align="center">
                        <h2>Update Student Information</h2>
                    </td>
                </tr>
                <tr>
                    <td><p>ID :</p></td>
                    <td id="set-id"><?php echo $row['sid']; ?></td>
                </tr>
                <tr>
                    <td><p>Name :</p></td>
                    <td>
                        <input type="text" name="txtname" value="<?php echo $row['fullName']; ?>" required pattern="^[a-zA-Z\s]+$" title="Please enter a valid name using letters only.">
                    </td>
                </tr>
                <tr>
                    <td><p>Semester :</p></td>
                    <td>
                        <input type="text" name="txtsem" value="<?php echo $row['sem']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Email :</p></td>
                    <td>
                        <input type="email" name="txtemail" value="<?php echo $row['email']; ?>" required title="Please enter a valid email address.">
                    </td>
                </tr>
                <tr>
                    <td><p>Phone number :</p></td>
                    <td>
                        <input type="tel" name="txtpn" id="txtpn" value="<?php echo $row['contactno']; ?>" required pattern="[0-9]{10}" maxlength="10" title="Please enter a valid 10-digit phone number.">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <input type="submit" value="Cancal" class="btn-submit" name="Cancel" formaction="AddStudent.php">
                        <input type="submit" value="Update" class="btn-submit" name="btnupdate">    
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
