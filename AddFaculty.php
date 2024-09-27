<?php
$host = 'localhost:3308';
$user = 'root';
$pass = '';
$db = 'pms';
$c = mysqli_connect($host, $user, $pass, $db) or die("Error while connecting");
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
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p>Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p class="addsf">Add Faculty</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;">Admin Dashboard</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        <button class="profile-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Profile <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="AdminProfile.php"><i class="fas fa-user"></i> View Profile</a></li>
                            <li><a href="EditProfile.php"><i class="fas fa-edit"></i> Edit Profile</a></li>
                            <li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sections for different sidebar links -->

            <h2>Add New Faculty</h2>
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
                <button class="bulk-toggle2">Add Faculty</button>
                <div class="main-bulk2">
                    <form method="post" enctype="multipart/form-data" class="form-container">

                        <table class="form-table">
                            <tr class="form-row">
                                <td colspan="2">
                                    <h1 class="form-heading">Faculty Registration Form</h1>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Faculty Id</p></td>
                                <td><input type="text" name="fid" placeholder="Enter Faculty Id" title="please enter only number" pattern="^[0-9]*$" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Full Name</p></td>
                                <td><input type="text" name="fname" placeholder="Enter Full name" title="please enter only characters" pattern="^[A-Za-z]*$" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Contact Number</p></td>
                                <td><input type="tel" name="cno" placeholder="" pattern="[0-9]{10}" maxlength="10" title="Must contain number" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Designation</p></td>
                                <td><input type="text" name="desig" placeholder="Enter Designation" title="please enter only characters" pattern="^[A-Za-z]*$" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Email Address</p></td>
                                <td><input type="email" name="email" placeholder="name@example.com" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Password</p></td>
                                <td><input type="password" name="password" pattern="^(?=.[a-z]|.\d).{8,}$" placeholder="8+ character required" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td><p>Confirm Password</p></td>
                                <td><input type="password" name="password" pattern="^(?=.[a-z]|.\d).{8,}$" placeholder="8+ character required" required="" class="form-input"></td>
                            </tr>
                            <tr class="form-row">
                                <td colspan='2' align='right'>
                                    <input type="submit" name="btnsubmit" value="Submit" class="submit-btn">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <?php
                if (isset($_POST['btnbulk'])) {
                    $file = $_FILES['uploade']['tmp_name'];
                    $handle = fopen($file, "r");
                    echo "<script>alert('fcgbhjmlk,;');</script>";
                    $lines = file($file, FILE_IGNORE_NEW_LINES);

                    foreach ($lines as $line) {

                        $data = explode(",", $line);

                        $fid = $data[0];
                        $fname = $data[1];
                        $con = $data[2];
                        $deg = $data[3];
                        $email = $data[4];
                        $p = $data[5];
                        $pass = password_hash($p, PASSWORD_DEFAULT);

                        $qu = "SELECT * FROM faculty WHERE fid = $fid or email = '$email' or contactnumber = $con";
                        $q = mysqli_query($c, $qu);

                        if (mysqli_num_rows($q) > 0) {
                            echo "<script>alert('Please check id, contact number or Email..!');</script>";
                        } else {
                            $qu = "insert into faculty values($fid,'$fname',$con,'$deg','$email','$pass')";
                            $q = @mysqli_query($c, $qu);
                            if ($q) {
                                echo "<script>alert('Record Successfully inserted...!');</script>";
                            } else {
                                echo "<script>alert('Error while Inserting...!');</script>";
                            }
                        }
                    }
                }

                if (isset($_POST['btnsubmit'])) {
                    $fid = $_POST['fid'];
                    $fname = $_POST['fname'];
                    $con = $_POST['cno'];
                    $deg = $_POST['desig'];
                    $email = $_POST['email'];
                    $p = $_POST['password'];
                    $pass = password_hash($p, PASSWORD_DEFAULT);

                    $qu = "SELECT * FROM faculty WHERE fid = $fid or email = '$email' or contactnumber = $con";
                    $q = mysqli_query($c, $qu);

                    if (mysqli_num_rows($q) > 0) {
                        echo "<script>alert('Please check id, contact number or Email..!');</script>";
                    } else {
                        $qu = "insert into faculty values($fid,'$fname',$con,'$deg','$email','$pass')";
                        $q = @mysqli_query($c, $qu);
                        if ($q) {
                            echo "<script>alert('Record Successfully inserted...!');</script>";
                        } else {
                            echo "<script>alert('Error while Inserting...!');</script>";
                        }
                    }
                }

                $qui = "select *from faculty";
                $qi = mysqli_query($c, $qui);

                if(isset($_POST['delete'])) {
                    $id = $_POST['fid'];
                    $delete = "DELETE FROM faculty WHERE fid=$id";
                    $query = @mysqli_query($c, $delete);

                    if ($query) {
                        echo "<script>window.location.replace('AddFaculty.php');</script>";
                        echo "<script>alert('Deleted succesfully');</script>";
                        exit();
                    } else {
                        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
                    }
                }
                ?>
            </div>

            <div class="section" class="bulk">

                <div class="main-bulk3">
                    <form method="POST" enctype="multipart/form-data" align="center">
                        <table align="center" border="all" width="90%" align="center">
                            <tr>
                                <td align="center" colspan="6">
                                    <h1>Student Records</h1>
                                </td>
                            </tr>

                            <tr>
                                <th>Faculty Id</th>
                                <th>Faculty Name</th>
                                <th>Contact Number</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <?php while ($r = mysqli_fetch_assoc($qi)) { ?>
                                <tr>
                                    <td><?php echo $r['fid']; ?></td>
                                    <td><?php echo $r['fname']; ?></td>
                                    <td><?php echo $r['contactnumber']; ?></td>
                                    <td><?php echo $r['designation']; ?></td>
                                    <td><?php echo $r['email']; ?></td>
                                    <td>
                                        <form method="POST" action="AddFaculty.php" style="display:inline-block;">
                                            <input type="hidden" name="fid" value="<?php echo $r['fid']; ?>">
                                            <input type="submit" name="delete" value="Delete">
                                        </form>
                                        <form method="GET" action="update.php" style="display:inline-block;">
                                            <input type="hidden" name="fid" value="<?php echo $r['fid']; ?>">
                                            <input type="submit" value="Edit" style="width: 86px">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>

        </div>


    </body>
</html>