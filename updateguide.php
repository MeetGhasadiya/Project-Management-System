<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Guide</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4; /* Light gray background */
                margin: 0; /* Remove default margin */
                padding: 20px; /* Add padding around body */
            }
            .form-container {
                background-color: #ffffff; /* White background for form */
                border-radius: 8px; /* Rounded corners */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
                padding: 20px; /* Padding inside the form */
                max-width: 500px; /* Maximum width of the form */
                margin: auto; /* Center the form */
            }
            .form-container h2 {
                margin: 0; /* Remove default margin */
                color: #2980b9; /* Dark blue text for the header */
                text-align: center; /* Center align header text */
            }
            .update-tbl {
                width: 100%; /* Full width of the table */
                border-collapse: collapse; /* Collapse borders */
            }
            .update-tbl td {
                padding: 10px; /* Padding for table cells */
                vertical-align: top; /* Align items at the top */
                border-bottom: 1px solid #dddddd; /* Light bottom border */
            }
            .update-tbl p {
                margin: 0; /* Remove default margin for paragraphs */
                color: #555; /* Dark gray text */
            }
            .btn-submit {
                background-color: #3498db; /* Blue button */
                color: white; /* White text */
                padding: 10px 15px; /* Button padding */
                border: none; /* Remove border */
                border-radius: 5px; /* Rounded corners */
                cursor: pointer; /* Pointer cursor for buttons */
                font-size: 16px; /* Font size for button */
            }
            .btn-submit:hover {
                background-color: #2980b9; /* Darker blue on hover */
            }
        </style>
    </head>
    <body>
        <?php
        include 'connection.php';

        if (!$c) {
            echo "<script>alert('Error in connection')</script>";
        }

        $id = $_GET['id'];  // Use `id` to identify the group
        if (empty($id)) {
            echo "<script>alert('No group ID found');</script>";
            header("location:AssignGuide.php");
            exit();
        } else {
            if (isset($_POST['btnupdate'])) {
//                $prname = $_POST['projectTitle'];
                $guide = $_POST['Guide'];

                $update = "UPDATE guideallocation SET Guide = '$guide' WHERE groupid=$id";
                $query = mysqli_query($c, $update);

                if ($query) {
                    $_SESSION['updatemessage'] = "ok";
                    echo "<script>alert('Update record successfully')</script>";
                    echo "<script>window.location.replace('AssignGuide.php');</script>";
                    exit();
                } else {
                    echo "<script>alert('Error: " . $update . "<br>" . mysqli_error($c) . "');</script>";
                }
            }
        }
        // Retrieve the current student data
        $sql = "SELECT * FROM guideallocation WHERE groupid=$id";
        $result = mysqli_query($c, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="POST" class="form-container">
            <table class="update-tbl">
                <tr>
                    <td colspan="2" align="center">
                        <h2>Update Guide</h2>
                    </td>
                </tr>
                <tr>
                    <td><p>GROUP ID :</p></td>
                    <td id="set-id"><?php echo $row['groupid']; ?></td>
                </tr>
                <tr>
                    <td><p>PROJECT TITLE :</p></td>
                    <td><?php echo $row['projectTitle']; ?></td>
                </tr>
                <tr>
                    <td><p>GUIDE NAME :</p></td>
                    <td>
                        <select name="Guide">
                        <?php
                        $sql = "SELECT fname FROM faculty";
                        $result = mysqli_query($c, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $faculty_names = [];
                            while ($row = mysqli_fetch_assoc($result)) {
                                $faculty_names[] = $row['fname'];
                            }
                            echo "Faculty 1:- ";
                            echo "<option value=''></option>";
                            foreach ($faculty_names as $name) {
                                echo "<option value='" . $name . "'>" . $name . "</option>";
                            }
                        }
                        ?>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td  align="center">
                        <input type="submit" value="Update" class="btn-submit" name="btnupdate">
                    </td>
                    <td>
                        <input type="submit" value="Back" class="btn-submit" name="Back" formaction="AssignGuide.php">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
