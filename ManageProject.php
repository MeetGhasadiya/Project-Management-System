<?php
include 'connection.php';
if(!isset($_SESSION['admin'])){
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


            .main-bulk3 {
                margin: 20px auto;
                max-width: 90%;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            /* Table Styles */
            .main-bulk3 table {
                    width: 100%;
                border-collapse: collapse;
            }

            .main-bulk3 th,
            .main-bulk3 td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .main-bulk3 th {
                background-color: #2980b9;
                color: white;
            }

            .main-bulk3 tr:hover {
                background-color: #f2f2f2;
            }

            .main-bulk3 input[type="submit"] {
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                background-color: #f39c12;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .main-bulk3 input[type="submit"]:hover {
                background-color: #e67e22; /* Darker shade on hover */
            }
        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p>Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p>Add Faculty</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p class="addsf">Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-bullhorn"></i><p>Announcement</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Manage Project</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        
                       <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        
                    </div>
                </div>
            </div>

            <?php
            $qui = "select *from studentgroup";
            $qi = mysqli_query($c, $qui);
            $status = "pending";

            if (isset($_POST['Approve'])) {
                $id = $_POST['groupid'];
                $status = 'Approved';
                $qu = "update studentgroup set Status='$status' where groupid=$id";
                $q = mysqli_query($c, $qu);

                if ($q) {
//                    echo "<script>alert('Approved Project...!');</script>";
                    echo "<script>window.location.replace('ManageProject.php');</script>";
                }
            }
            if (isset($_POST['Reject'])) {
                $id = $_POST['groupid'];
                $status = 'Rejected';
                $qu = "update studentgroup set Status='$status' where groupid=$id";
                $q = mysqli_query($c, $qu);

                if ($q) {
//                    echo "<script>alert('Rejected Project...!');</script>";
                    echo "<script>window.location.replace('ManageProject.php');</script>";
                }
            }
            ?>
            <div class="section" class="bulk">
                <div class="main-bulk3">
                    <form method="POST" enctype="multipart/form-data" align="center">
                        <table>
                            <tr>
                                <td align="center" colspan="8">
                                    <h1>Project list</h1>
                                </td>
                            </tr>
                            <tr>
                                <th>Group Id</th>
                                <th>Enrollment no 1</th>
                                <th>Enrollment no 2</th>
                                <th>Enrollment no 3</th>
                                <th>Enrollment no 4</th>
                                <th>Project Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($qi)) { ?>
                                <tr>
                                    <td><?php echo $row['groupid']; ?></td>
                                    <td><?php echo $row['enro1']; ?></td>
                                    <td><?php echo $row['enro2']; ?></td>
                                    <td><?php echo $row['enro3']; ?></td>
                                    <td><?php echo $row['enro4']; ?></td>
                                    <td><?php echo $row['projectTitle']; ?></td>
                                    <td><?php echo $row['Status']; ?></td>
                                    <td width="250px">
                                        <form method="POST" style="display:inline-block;">
                                            <input type="hidden" name="groupid" value="<?php echo $row['groupid']; ?>">
                                            <input type="submit" name="Approve" value="Approve" class="btn btn-success" style="width: 86px">
                                        </form>
                                        <div style="padding: 5px;"></div>
                                        <form method="POST" style="display:inline-block;">
                                            <input type="hidden" name="groupid" value="<?php echo $row['groupid']; ?>">
                                            <input type="submit" name="Reject" value="Reject" class="btn btn-danger" style="width: 86px">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                </div>

            </div>
        </div>
        <?php ?>
    </body>
</html>
