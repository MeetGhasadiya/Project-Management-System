<?php
include 'connection.php';
if (!isset($_SESSION['faculty'])) {
    header("Location:Login.php");
}

$lid = $_SESSION['id'];

$select = "select fname from faculty where fid='$lid'";
$sdata = mysqli_query($c, $select);

$r = mysqli_fetch_assoc($sdata);
$name = $r['fname'];

$guide = "select * from guideallocation where Guide='$name'";
$guidedata = mysqli_query($c, $guide);
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


            .group-detail-table {
                margin: 20px auto;
                width: 95%; /* Increased width */
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .group-detail-table .table-header {
                background-color: #2980b9;
                color: white;
                padding: 15px;
                text-align: center;
            }

            .group-detail-table .table-title {
                font-size: 24px;
                font-weight: bold;
                margin: 0;
            }

            .group-detail-table .table-heading-row {
                background-color: #2980b9;
                font-weight: bold;
                color: white;
            }

            .group-detail-table th,
            .group-detail-table td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .group-detail-table .table-data-row:hover {
                background-color: #f2f2f2; /* Row highlight on hover */
            }

            .group-detail-table .action-btn {
                padding: 5px 10px;
                background-color: #f39c12;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .group-detail-table .action-btn:hover {
                background-color: #e67e22; /* Darker shade on hover */
            }

            .group-detail-table .action-btn:active {
                background-color: #d35400; /* Even darker shade when clicked */
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


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <div class="sidebar">
            <a href="F-ViewGroups.php"><i class="fas fa-users"></i><p class="addsf">View Project Groups</p></a> <!-- Icon for groups -->
            <a href="F-ManageLog.php"><i class="fas fa-book"></i><p>Manage log</p></a> <!-- Icon for managing logs -->
            <a href="F-ViewSubmission.php"><i class="fas fa-file-alt"></i><p>View Submission</p></a> <!-- Icon for submissions -->
            <a href="F-AssignEMarks.php"><i class="fas fa-check-circle"></i><p>Assign Evaluation Mark</p></a> <!-- Icon for evaluation/marks -->
            <a href="F-ViewAnnouncement.php"><i class="fas fa-bullhorn"></i><p>View Announcement</p></a> <!-- Icon for evaluation/marks -->

        </div>

        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">Groups Details</h1>
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

            <div class="section">
                <table class="group-detail-table" align="center">

                    <tr class="table-data-row">
                        <td align="center" colspan="2">
                            <h1>Student Records</h1>

                        </td>
                        

                    </tr>
                    <tr class="table-heading-row">
                        <th>Group Id</th>
                        <th>Project Title</th>
                        <th>Guide</th>
                        <th>Actions</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($guidedata)) { ?>
                        <tr class="table-data-row">
                            <td><?php echo $row['groupid']; ?></td>
                            <td><?php echo $row['projectTitle']; ?></td>
                            <td><?php echo $row['Guide']; ?></td>
                            <td>
                                <form method="POST" action="V-StudentDetail.php" class="group-action-form" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['groupid']; ?>">
                                    <input type="submit" name="delete" value="Group Detail" class="action-btn">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
    </body>
</html>
