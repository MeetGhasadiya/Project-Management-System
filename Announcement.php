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
        <title>Admin Dashboard</title>
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
                display: block;
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
            i {
                font-size: 18px;
            }
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
            .profile-btn {
                background-color: transparent;
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
            .sidebar p{
                margin: 0px;
                padding: 0px;
            }
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
            .caret {
                border-top: 4px solid white;
                margin-left: 5px;
            }
            @media screen and (max-width: 768px) {
                .profile-btn {
                    width: 100%;
                    text-align: left;
                }
            }
            form table {
                width: 100%;
                max-width: 600px;
                margin: 20px auto;
                border-collapse: collapse;
                background-color: #ecf0f1;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            form table tr td {
                padding: 12px;
                font-size: 16px;
                color: #333;
            }
            form table tr td:first-child {
                text-align: right;
                font-weight: bold;
                vertical-align: top;
            }
            form table textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                resize: vertical;
            }
            form table input[type="submit"] {
                background-color: #2980b9;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
            form table input[type="submit"]:hover {
                background-color: #3498db;
            }
            @media screen and (max-width: 768px) {
                form table {
                    width: 100%;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p>Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p>Add Faculty</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-book"></i><p class="addsf">Announcement</p></a>
        </div>
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Announcement</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
            <div class="section">
                <form method="post">
                    <table>
                        <tr>
                            <td>Make Announcement:</td>
                            <td><textarea name="txtan" rows="5" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" name="announcement_date" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: center;">
                                <input type="submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php 
        if(isset($_POST['submit']))
        {
            $msg = $_POST['txtan'];
            $date = $_POST['announcement_date'];
            $qu = "insert into announcement (Message, Date) values ('$msg', '$date')";
            $q = mysqli_query($c, $qu);
            if($q)
            {
//                echo "<script>alert('Announcement successfully submitted');</script>";
            }
        }
        ?>
    </body>
</
