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

            .sidebar p{
                margin: 0px;
                padding: 0px;
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

        </style>
        <style>
            .styled-table {
                width: 100%;
                border-collapse: collapse;
                background-color: #fff;
                margin: 20px auto;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                font-family: Arial, sans-serif;
            }

            .styled-table thead tr {
                background-color: #3498db;
                color: #fff;
                text-align: left;
                font-weight: bold;
            }

            .styled-table th,
            .styled-table td {
                padding: 15px;
                border-bottom: 1px solid #ddd;
                text-align: center;
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f9f9f9;
            }

            .styled-table tbody tr:nth-of-type(odd) {
                background-color: #ffffff;
            }

            .styled-table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .styled-table td {
                color: #333;
                font-size: 16px;
            }

            /* Responsive Table */
            @media screen and (max-width: 768px) {
                .styled-table th,
                .styled-table td {
                    padding: 10px;
                    font-size: 14px;
                }
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
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p class="addsf">Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-bullhorn"></i><p>Announcement</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Manage LogBook</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">

                        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>

                    </div>
                </div>
            </div>
            <!-- Sections for different sidebar links -->


            <div class="section" id="logbook">
                
                <table class="styled-table" align="center">
                    <thead>
                        <tr class="table-heading-row">
                            <th>Group Id</th>
                            <th>Date</th>
                            <th>Work Completed</th>
                            <th>Next Task</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qu = "SELECT * FROM LogBook";
                        $q = mysqli_query($c, $qu);

                        while ($row = mysqli_fetch_assoc($q)) {
                            ?>
                            <tr class="table-data-row">
                                <td><?php echo htmlspecialchars($row['groupid']); ?></td>
                                <td><?php echo htmlspecialchars($row['Date']); ?></td>
                                <td><?php echo htmlspecialchars($row['WorkComplated']); ?></td>
                                <td><?php echo htmlspecialchars($row['NextTask']); ?></td>   
                                <td><?php echo htmlspecialchars($row['Status']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</div>

<!-- JavaScript to control which section is visible -->
<script>


</script>

</body>
</html>
