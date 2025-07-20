<?php
include 'connection.php';
if(!isset($_SESSION['student'])){
    header("Location:Login.php");
}
$lid = $_SESSION['id'];

$select = "select * from student where sid='$lid'";
$sdata = mysqli_query($c, $select);

$r = mysqli_fetch_assoc($sdata);

$hash = $r['password'];
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

        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Student Dashboard</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
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

        .sidebar p{
            margin: 0px;
            padding: 0px;
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
        th{
            text-align: center;
        }

        form {
            padding: 20px;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;

            margin: auto; /* Center the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow */
            animation: fadeIn 1s ease-in-out;
            background-color: #fff; /* Ensure background is white */
        }

        .h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-spacing: 10px;
            margin: auto; /* Center the table */
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        input[type="number"], input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #5c67f2;
            box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
        }

        button {
            width: 20%;
            padding: 12px;
            background-color: #3498DB;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
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
        
        
    </style>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
           
            <a href="StudentMakeGroup.php">
                <i class="fa fa-users"></i>
                <p>Making Group</p>
            </a>
            <a href="SudentTask.php">
                <i class="fa fa-tasks"></i>
                <p>Update the Task</p>
            </a>
            <a href="StudentProPermission.php">
                <i class="fa fa-users-cog"></i>
                <p>Project Permission</p>
            </a>
            <a href="StudentEvaluationMark.php">
                <i class="fa fa-file-alt"></i>
                <p>Evaluation Marks</p>
            </a>
            <a href="StudentLogBook.php">
                <i class="fa fa-book"></i>
                <p>View Log Book</p>
            </a>

        </div>

        <!-- Main Content -->
        <div class="main-content">
            
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 150px;">Student Profile</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        <button class="profile-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Profile <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="StudentProfileEdit.php"><i class="fas fa-edit"></i> Edit Profile</a></li>
                            <li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="section">
                <form method="POST" id="frmsubmit">
                    <table>
                        <tr>
                            <td colspan="4"><h1 class="h1">Edit Student Profile</h1></td>
                        </tr>
                        <tr>
                            <td><p>ID:</p></td>
                            <td colspan="3"><?php echo $r['sid'] ?></td>
                        </tr>
                        <tr>
                            <td><p>Name:</p></td>
                            <td colspan="3"><input type="text" id="name" name="name" value="<?php echo $r['fullName'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><p>Semester:</p></td>
                            <td colspan="3"><?php echo $r['sem'] ?></td>
                        </tr>
                        <tr>
                            <td><p>Email:</p></td>
                            <td colspan="3"><input type="email" id="email" name="email" value="<?php echo $r['email'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><p>Contact No:</p></td>
                            <td colspan="3"><input type="number" id="contact" name="contact" value="<?php echo $r['contactno'] ?>" required></td>
                        </tr>
                        <tr>
                            <td><p>Old Password:</p></td>
                            <td colspan="3"><input type="password" id="old_password" name="old_password" required></td>
                        </tr>
                        <tr>
                            <td><p>New Password:</p></td>
                            <td colspan="3"><input type="password" id="new_password" name="new_password" required></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <button type="submit" name="submit" value="submit" id="btnSubmit">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
   

</body>
</html>






<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);

    if (password_verify($old_password, $hash)) {
        $qu = "UPDATE student SET fullName='$name', email='$email', contactno='$contact', password='$hash_password' where sid=$lid";
        $q = mysqli_query($c, $qu);
        echo "<script>alert('Profile changed');</script>";
        echo '<script>window.location.replace("http://localhost/pms2/StudentDashboard.php");</script>';
    } else {
        echo "<script>alert('Password is Wrong');</script>";
    }
}
?>
