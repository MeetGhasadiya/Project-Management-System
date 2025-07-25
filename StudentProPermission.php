<?php
include 'connection.php';
if (!isset($_SESSION['student'])) {
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
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
        <script src=https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js""></script>

        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Admin Dashboard</title>

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



        /* Project Status Table */
        .project-status-form {
            margin-top: 20px;
        }

        .project-status-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
        }

        .project-status-table th, .project-status-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table-header {
            background-color: #2980b9;
            color: #fff;
            text-align: center;
        }

        .table-title {
            font-size: 24px;
            font-weight: bold;
        }

        .table-heading-row {
            background-color: #2980B9;
            color: #fff;
        }

        .table-heading-row th {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table-data-row {
            background-color: #ecf0f1;
        }

        .table-data-row:hover {
            background-color: #dfe6e9;
        }

        .project-status-table td {
            color: #2c3e50;
        }

        /* Button styling (if needed for additional features) */
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


    </style>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">

            <a href="StudentMakeGroup.php">
                <i class="fa fa-users"></i>
                <p>Making Group</p>
            </a>
            <a href="StudentProPermission.php">
                <i class="fa fa-check-circle"></i> <!-- Permission -->
                <p class="addsf">Project Permission</p>
            </a>
            <a href="StudentGuideDetail.php">
                <i class="fa fa-user-tie"></i> <!-- Guide -->
                <p>Guide Detail</p>
            </a>
            <a href="StudentLogBook.php">
                <i class="fa fa-book-open"></i> <!-- Log Book -->
                <p>View Log Book</p>
            </a>
            <a href="SudentTask.php">
                <i class="fa fa-tasks"></i> <!-- Task Submission -->
                <p>Submission</p>
            </a>
            <a href="SudentPanelDetail.php">
                <i class="fa fa-users-cog"></i> <!-- Panel Details -->
                <p>Panel Detail</p>
            </a>
            <a href="StudentEvaluationMark.php">
                <i class="fa fa-star"></i> <!-- Evaluation Marks -->
                <p>Evaluation Marks</p>
            </a>
            <a href="StudentViewAnnouncement.php">
                <i class="fas fa-bullhorn"></i>
                <p>View Announcement</p>
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">Project Status</h1>
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
            <?php
            $qui = "select *from studentgroup";
            $qi = mysqli_query($c, $qui);
            ?>
            <div class="section" class="bulk">
                <div class="main-bulk3">
                    <form method="POST" enctype="multipart/form-data" class="project-status-form">
                        <table class="project-status-table" id="example">
                            <thead>                               
                                <tr class="table-heading-row">
                                    <th>Group Id</th>
                                    <th>Enrollment No 1</th>
                                    <th>Enrollment No 2</th>
                                    <th>Enrollment No 3</th>
                                    <th>Enrollment No 4</th>
                                    <th>Project Title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($qi)) { ?>
                                    <tr class="table-data-row">
                                        <td><?php echo $row['groupid']; ?></td>
                                        <td><?php echo $row['enro1']; ?></td>
                                        <td><?php echo $row['enro2']; ?></td>
                                        <td><?php echo $row['enro3']; ?></td>
                                        <td><?php echo $row['enro4']; ?></td>
                                        <td><?php echo $row['projectTitle']; ?></td>
                                        <td><?php echo $row['Status']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>  
            </div>
            <script>
                new DataTable('#example', {
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    }
                });
            </script>
        </div>
    </div>

</body>
</html>
