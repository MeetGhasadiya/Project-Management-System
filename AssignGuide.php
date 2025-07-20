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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
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
            .section {
                background-color: #ecf0f1; /* Light background color for sections */
                padding: 20px; /* Padding for sections */
                margin-bottom: 20px; /* Space between sections */
                border-radius: 8px; /* Rounded corners */

            }

            h2 {
                color: #34495e; /* Dark color for section titles */
                font-size: 24px; /* Increased font size for section titles */
                margin-bottom: 20px; /* Space below section titles */
            }

            table {
                width: 100%; /* Full width for tables */
                border-collapse: collapse; /* Merge borders */
                margin-top: 20px; /* Space above the table */
            }

            th, td {
                padding: 12px; /* Adequate padding for cells */
                text-align: left; /* Align text to the left */
                border-bottom: 1px solid #ddd; /* Light border */
            }

            th {
                background-color: #2980b9; /* Header background color */
                color: white; /* Header text color */
            }

            tr:hover {
                background-color: #f2f2f2; /* Light gray on row hover */
            }

            /* Button styles */
            /* Button styles */



            .main-bulk3 {
                margin: 20px auto;
                max-width: 95%;
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

    </head>
    <body>
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p>Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p>Add Faculty</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p class="addsf">Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p>Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-bullhorn"></i><p>Announcement</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Guide Allocation</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">
                        
                        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        
                    </div>
                </div>
            </div>
            <div class="section" id="assign-guard">
                <div class="section">
                    <div class="main-bulk3">
                        <form method="POST" enctype="multipart/form-data" align="center">
                            <table align="center">
                                <tr>
                                    <td align="center" colspan="8">
                                        <h1>Guide Allocation</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Group Id</th>
                                    <th>Project Title</th>
                                    <th>Guide</th>
                                    <th>Action</th>
                                </tr>

                                <?php
                                $qui = "SELECT groupid, projectTitle FROM studentgroup WHERE Status = 'Approved'";
                                $qi = mysqli_query($c, $qui);
                                if (mysqli_num_rows($qi) > 0) {
                                    while ($row = mysqli_fetch_assoc($qi)) {
                                        $groupid = $row['groupid'];
                                        $prname = $row['projectTitle'];

                                        $guide_query = "SELECT * FROM guideallocation WHERE groupid = '$groupid'";
                                        $guide_result = mysqli_query($c, $guide_query);
                                        $guide_row = mysqli_fetch_assoc($guide_result);

                                        $guide_name = $guide_row ? $guide_row['Guide'] : 'Not Assigned';
                                        ?>

                                        <tr>
                                            <td><?php echo $groupid; ?></td>
                                            <td><?php echo $prname; ?></td>
                                            <td><?php echo $guide_name; ?></td>
                                            <td>
                                                <!-- Update form for each row -->
                                                <form method="GET" action="updateguide.php" style="display:inline-block;">
                                                    <input type="hidden" name="id" value="<?php echo $groupid; ?>">  <!-- Correct input type is hidden -->
                                                    <input type="submit" name="update" value="Edit" class="btn btn-warning">
                                                </form>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="4" align="center">
                                        <form method="POST">
                                            <input type="submit" name="AssignGuard" value="Assign Guard" class="btn btn-primary" style="margin-top: 20px; width: 150px;background-color: #2980B9;height: 40px;">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </form>



                        <?php
                        if (isset($_POST['AssignGuard'])) {
                            $qi = mysqli_query($c, $qui);

                            while ($row = mysqli_fetch_assoc($qi)) {
                                $groupid = $row['groupid'];
                                $prname = $row['projectTitle'];

                                $fac_query = "SELECT fname FROM faculty ORDER BY RAND() LIMIT 1";
                                $fac_result = mysqli_query($c, $fac_query);
                                $fac_row = mysqli_fetch_assoc($fac_result);
                                $guide_name = $fac_row['fname'];

                                $qu = "SELECT * FROM guideallocation WHERE groupid = $groupid";
                                $q = mysqli_query($c, $qu);

                                if (mysqli_num_rows($q) > 0) {
//                                    echo "<script>alert('Guide already assigned to that group!');</script>";
                                } else {
                                    $update_query = "INSERT INTO guideallocation (groupid, projectTitle, Guide) VALUES ($groupid,'$prname','$guide_name') ON DUPLICATE KEY UPDATE Guide = VALUES(Guide)";
                                    $qinsert = mysqli_query($c, $update_query);
                                    if (!$qinsert) {
                                        echo "<script>alert('Error while assigning guide!');</script>";
                                    }
                                }
                            }
                            echo "<script>window.location.replace('AssignGuide.php');</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
