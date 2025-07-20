<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) {
    header("Location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $(".bulk-toggle").click(function () {
                    $(".main-bulk").slideToggle();
                });
            });
            $(document).ready(function () {
                $(".bulk-toggle2").click(function () {
                    $(".main-bulk2").slideToggle();
                });
            });

            function validaation_csv() {
                var filetype = document.getElementById("uploade").value;
                var extension = /(\.csv)$/i;

                if (!extension.exec(filetype)) {
                    alert("Please upload a valid CSV file.");
                    return false;
                }

                return true;
            }
        </script>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            /* Navbar */
            .navbar {
                background-color: #333;
                color: #fff;
                padding: 15px;
                display: flex;

                align-items: center;
            }


            .navbar h1 {
                margin-left: 20px;
                font-size: 24px;
            }

            .nav-links {
                display: flex;
                margin-right: 20px;
            }

            .nav-links a {

                padding: 10px 20px;
                text-decoration: none;
                font-size: 18px;
                display: flex;
                align-items: center;
            }

            .nav-links a i {
                margin-right: 8px;
            }

            .nav-links a:hover {
                background-color: #444;
                border-radius: 5px;
            }

            /* Sidebar */
            .sidebar {
                width: 250px;
                background-color: #2c3e50;
                position: fixed;
                height: 100%;
                padding-top: 20px;
                overflow-y: auto;
            }

            .sidebar a {
                padding: 15px;
                text-decoration: none;
                font-size: 18px;
                color: #fff;
                display: block;
                display: flex;
                align-items: center;
            }

            .sidebar a i {
                margin-right: 10px;
            }

            .main-bulk3 {
                padding: 15px;

                background-color: #ecf0f1; /* Light background for contrast */
                border-radius: 5px; /* Rounded corners */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
                animation: fadeIn 1s ease-in-out; /* Animation for appearance */
            }

            .bulk {
                margin-bottom: 20px; /* Space between sections */
            }

            .bulk h2 {
                font-size: 24px; /* Larger heading size */
                margin-bottom: 15px; /* Space below heading */
                color: #333; /* Dark text color */
            }

            .bulk button {
                margin-bottom: 15px; /* Space below buttons */
            }


            .sidebar a:hover {
                background-color: #34495e;
            }

            .main-content {
                margin-left: 250px;
                padding: 20px;
                background-color: #fff;
                height: 100vh;
            }

            .section {
                background-color: #ecf0f1;
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 5px;

            }

            .section.active {
                display: block; /* Only show the active section */
            }

            .section h2 {
                margin-bottom: 15px;
                font-size: 22px;
            }

            button {
                padding: 10px 15px;
                background-color: #2980b9;
                color: #fff;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }

            button:hover {
                background-color: #3498db;
            }

            /* Icons */
            i {
                font-size: 18px;
            }

            /* Responsive Sidebar */
            @media screen and (max-width: 768px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }

                .main-content {
                    margin-left: 0;
                }
            }

            .addsf{
                color: #3498DB;
            }
            /* Profile Dropdown Button */
            .profile-btn {
                background-color: transparent; /* Remove background */

                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 18px;
                cursor: pointer;
                display: flex;
                align-items: center;
            }

            .profile-btn i {
                margin-right: 8px;
            }



            /* Dropdown Menu */
            .dropdown-menu {
                background-color: #2c3e50;
                border: none;
                box-shadow: none;
            }

            .dropdown-menu li a {
                color: white;
                font-size: 16px;
                padding: 10px 20px;
                text-decoration: none;
            }

            .dropdown-menu li a i {
                margin-right: 10px;
            }

            .dropdown-menu li a:hover {
                background-color: #34495e;
                color: #fff;
                border-radius: 5px;
            }

            /* Adjust caret color */
            .caret {
                border-top: 4px solid white;
                margin-left: 5px;
            }

            /* Ensure proper alignment on smaller screens */
            @media screen and (max-width: 768px) {
                .profile-btn {
                    width: 100%;
                    text-align: left;
                }
            }
            input[type="file"]{

                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                outline: none;
                font-size: 12px;
                transition: all 0.3s ease;
                background-color: #3498DB;
                color: white;
            }
            input[type="file"]:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }
            .btnbulk{
                width: 10%;
                padding: 12px;
                background-color: #3498DB;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }
            .main-bulk,.main-bulk2{
                padding: 15px;
                display: none;
            }

            .bulk-toggle,.bulk-toggle2{
                color: white;
                background-color: #333333;
            }

            .bulk-toggle:hover,.bulk-toggle2:hover{
                color: white;
                background-color: black;
            }

            .form-container {

                padding: 20px;
                border-radius: 12px;

                max-width: 1000px;
                width: 100%;
                animation: fadeIn 1s ease-in-out;
            }

            .form-heading {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
                font-weight: 600;
            }

            .form-table {
                padding: 15px;
                width: 60%;
                border-spacing: 10px;
            }

            .form-table .form-row td {
                padding: 10px;

            }

            .form-input p{
                font-size: 15px;
            }

            .form-input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                outline: none;
                font-size: 15px;
                transition: all 0.3s ease;
            }

            .form-input:focus {
                border-color: #3498DB;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }

            .submit-btn {
                width: 100px;
                padding: 12px;
                background-color: #3498DB;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .submit-btn:hover {
                background-color: #4955d4;
                transform: translateY(-2px);
            }

            .submit-btn:active {
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

            .sidebar p{
                margin: 0px;
                padding: 0px;
            }

            /* Table Styles */
            .table-container {
                margin: 20px auto;
                max-width: 90%;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .table-container table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-container th,
            .table-container td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .table-container th {
                background-color: #2980b9;
                color: white;
            }

            .table-container tr:hover {
                background-color: #f2f2f2; /* Row highlight on hover */
            }

            .table-container input[type="submit"] {
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                background-color: #f39c12;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .table-container input[type="submit"]:hover {
                background-color: #e67e22; /* Darker shade on hover */
            }
            .search-bar {
                width: 100%;
                max-width: 600px;
                padding: 12px 20px;
                border: 1px solid #dcdcdc;
                border-radius: 10px;
                font-size: 16px;
                color: #333;
                background-color: #f8f8f8;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s, border-color 0.3s;
            }

            .search-bar:focus {
                border-color: #4285f4;
                outline: none;
                box-shadow: 0 2px 10px rgba(66, 133, 244, 0.5);
            }

            .search-bar::placeholder {
                color: #a0a0a0;
                opacity: 5;
            }
        </style>
        <script>
            $(document).ready(function () {
                function loadTableData(query = '') {
                    $.ajax({
                        url: "studentsearch.php",
                        method: "GET",
                        data: {sid: query},
                        success: function (data) {
                            $("#a").html(data);
                        }
                    });
                }

                // Initial load of data
                loadTableData();

                // Perform search as the user types
                $("#txtid").on("keyup", function () {
                    var searchQuery = $(this).val();
                    loadTableData(searchQuery);
                });
            });

        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p class="addsf">Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p>Add Faculty</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-bullhorn"></i><p>Announcement</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Student Registration</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            </div>
            <!-- Sections for different sidebar links -->

            <h2>Add New Student</h2>
            <div class="section" class="bulk">
                <button class="bulk-toggle">Bulk Insertion</button>
                <div class="main-bulk">

                    <form name="csvForm" id="csv-tbl" method="post" enctype="multipart/form-data" onsubmit="return validaation_csv();">
                        <input type="file" name="uploade" id="uploade" required>
                        <input type="submit" name="btnbulk" value="Bulk Insert" class="btnbulk">
                    </form>
                </div>
            </div>

            <div class="section" class="bulk">
                <button class="bulk-toggle2">Add Student</button>
                <div class="main-bulk2">
                    <form method="POST" enctype="multipart/form-data" class="form-container">

                        <table class="form-table">
                            <tr class="form-row">
                                <td colspan="2">
                                    <h1 class="form-heading">Student Registration Form</h1>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Enrollment No</p></td>
                                <td><input type="text" maxlength="15" name="enro" placeholder="Enter Enrollment No" title="please enter only number" pattern="^[0-9]*$" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Full Name</p></td>
                                <td><input type="text" name="name" placeholder="Enter Full name" title="please enter only characters" pattern="^[A-Za-z\s]*$" required="" class="form-input"></td>
                            </tr>

                            <tr class="form-row">
                                <td><p>Semester</p></td>
                                <td>
                                    <select name="sem" required="" class="form-input">
                                        <option value="5">5</option>
                                        <option value="7">7</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Email Address</p></td>
                                <td><input type="email" name="email" placeholder="name@example.com" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Contact Number</p></td>
                                <td><input type="tel" name="cno" placeholder="" pattern="[0-9]{10}" maxlength="10" title="Must contain 10 digits" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Password</p></td>
                                <td><input type="password" name="password" pattern="^(?=.*[a-zA-Z0-9]).{8,}$" placeholder="8+ characters required" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Confirm Password</p></td>
                                <td><input type="password" name="conpassword" pattern="^(?=.*[a-zA-Z0-9]).{8,}$" placeholder="8+ characters required" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td colspan="2" align="right">
                                    <input type="submit" name="btnsubmit" value="Submit" class="submit-btn">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>        
            </div>


            <?php
            if (isset($_POST['btnbulk'])) {
                $file = $_FILES['uploade']['tmp_name'];
                $handle = fopen($file, "r");
//                echo "<script>alert('fcgbhjmlk,;');</script>";
                $lines = file($file, FILE_IGNORE_NEW_LINES);

                foreach ($lines as $line) {

                    $data = explode(",", $line);

                    $sid = $data[0];
                    $fullname = $data[1];
                    $sem = $data[2];
                    $email = $data[3];
                    $con = $data[4];
                    $p = $data[5];
                    $pass = password_hash($p, PASSWORD_DEFAULT);

                    $qu = "SELECT * FROM student WHERE sid = $sid or email = '$email' or contactno = $con";
                    $q = mysqli_query($c, $qu);

                    if (mysqli_num_rows($q) > 0) {
                        echo "<script>alert('Please check id, contact number or Email..!');</script>";
                    } else {
                        $qu = "insert into student values($sid,'$fullname',$sem,'$email',$con,'$pass')";
                        $q = @mysqli_query($c, $qu);
                        if ($q) {
//                            echo "<script>alert('Record Successfully inserted...!');</script>";
                        } else {
                            echo "<script>alert('Error while Inserting...!');</script>";
                        }
                    }
                }
            }




            if (isset($_POST['btnsubmit'])) {
                $sid = $_POST['enro'];
                $fullname = $_POST['name'];
                $sem = $_POST['sem'];
                $email = $_POST['email'];
                $con = $_POST['cno'];
                $p = $_POST['password'];
                $pass = password_hash($p, PASSWORD_DEFAULT);

                $qu = "SELECT * FROM student WHERE sid = $sid or email = '$email' or contactno = $con";
                $q = mysqli_query($c, $qu);

                if (mysqli_num_rows($q) > 0) {
                    echo "<script>alert('Please check id, contact number or Email..!');</script>";
                } else {
                    $qu = "insert into student values($sid,'$fullname',$sem,'$email',$con,'$pass')";
                    $q = @mysqli_query($c, $qu);
                    if (!$q) {
                        echo "<script>alert('Error while Inserting...!');</script>";
                    }
                }
            }

            $qui = "select *from student";
            $qi = mysqli_query($c, $qui);

            

            if (isset($_POST['delete'])) {
                $id = $_POST['id'];

                // Start transaction
                mysqli_begin_transaction($c);

                try {
                    // Fetch the student data to archive
                    $select = "SELECT * FROM student WHERE sid = $id";
                    $result = mysqli_query($c, $select);

                    if (mysqli_num_rows($result) == 0) {
                        throw new Exception("No record found with the given ID.");
                    }

                    $student = mysqli_fetch_assoc($result);

                    // Insert the student data into the archived_students table
                    $archive = "INSERT INTO archived_students (sid, fullName, sem, email, contactno)
                    VALUES ('" . $student['sid'] . "', 
                            '" . mysqli_real_escape_string($c, $student['fullName']) . "', 
                            '" . mysqli_real_escape_string($c, $student['sem']) . "', 
                            '" . mysqli_real_escape_string($c, $student['email']) . "', 
                            '" . mysqli_real_escape_string($c, $student['contactno']) . "')";

                    if (!mysqli_query($c, $archive)) {
                        throw new Exception("Error archiving student: " . mysqli_error($c));
                    }

                    // Delete the student data from the student table
                    $delete = "DELETE FROM student WHERE sid = $id";
                    if (!mysqli_query($c, $delete)) {
                        throw new Exception("Error deleting student: " . mysqli_error($c));
                    }

                    // Commit the transaction
                    mysqli_commit($c);

                    // Success message
//                    echo "<script>alert('Deleted successfully');</script>";
                    echo "<script>window.location.replace('AddStudent.php');</script>";
                } catch (Exception $e) {
                    // Rollback the transaction in case of error
                    mysqli_rollback($c);
                    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
                }
            }

            ?>          

            <div class="section" class="bulk">
                <div class="table-container">
                    <form method="POST" enctype="multipart/form-data" align="center">
                        <table>
                            <tr>
                                <td align="center" colspan="4">
                                    <h1>Student Records</h1>

                                </td>
                                <td colspan="2" style="text-align:right;">
                                    <input type='text' name='search' id='txtid' placeholder="Search..." class="search-bar">
                                </td>

                            </tr>

                        </table>
                        <table border="1" align="center" id="a">
                        </table>
                    </form>
                </div>

            </div>
        </div>


    </body>
</html>
