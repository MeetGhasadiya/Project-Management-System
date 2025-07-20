<?php
include 'connection.php';
if (!isset($_SESSION['faculty'])) {
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
            .announcement-section {
                margin-top: 20px;
                padding: 20px;
                background-color: #ecf0f1;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                max-width: 800px;
                margin-left: auto;
                margin-right: auto;
            }

            .announcement {
                background-color: #ffffff;
                padding: 15px;
                margin-bottom: 15px;
                border-left: 6px solid #2980b9;
                border-radius: 5px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .announcement-id {
                font-size: 14px;
                color: #555;
                font-weight: bold;
                margin-bottom: 8px;
            }

            .announcement-message {
                font-size: 16px;
                color: #333;
                line-height: 1.5;
            }
            .announcement-date {
                font-size: 12px;
                color: #888;
                margin-bottom: 8px;
            }

            /* Hover effect for announcements */
            .announcement:hover {
                background-color: #f9f9f9;
                border-left: 6px solid #3498db;
            }

            /* Responsive Design */
            @media screen and (max-width: 768px) {
                .announcement-section {
                    width: 90%;
                }
            }
        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->

        <div class="sidebar">
            <a href="F-ViewGroups.php"><i class="fas fa-users"></i><p>View Project Groups</p></a> <!-- Icon for groups -->
            <a href="F-ManageLog.php"><i class="fas fa-book"></i><p>Manage log</p></a> <!-- Icon for managing logs -->
            <a href="F-ViewSubmission.php"><i class="fas fa-file-alt"></i><p >View Submission</p></a> <!-- Icon for submissions -->
            <a href="F-AssignEMarks.php"><i class="fas fa-check-circle"></i><p>Assign Evaluation Mark</p></a> <!-- Icon for evaluation/marks -->
            <a href="F-ViewAnnouncement.php"><i class="fas fa-bullhorn"></i><p class="addsf">View Announcement</p></a> <!-- Icon for evaluation/marks -->
        </div>


        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">View Submission</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        <button class="profile-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Profile <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="F-ProfileEdit.php"><i class="fas fa-edit"></i> Edit Profile</a></li>
                            <li><a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sections for different sidebar links -->
            <?php
            $select = "SELECT * FROM announcement ORDER BY date DESC";
            $selectq = mysqli_query($c, $select);
            ?>

            <div class="section">
                <?php while ($row = mysqli_fetch_assoc($selectq)) { ?>
                    <div class="announcement">
                        <p class="announcement-id">Announcement ID: <?php echo $row['id']; ?></p>
                        <p class="announcement-date">Due Date: <?php echo $row['date']; ?></p>
                        <p class="announcement-message"><?php echo $row['Message']; ?></p>
                    </div>
                <?php } ?>
            </div>


        </div>
    </body>
</html>
