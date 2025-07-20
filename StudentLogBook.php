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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title></title>
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <script>
            $(document).ready(function () {
                $(".bulk-toggle").click(function () {
                    $(".form-container").slideToggle();
                });
            });
        </script>
        <style>
            .form-container {
                max-width: 600px; /* Adjusted for better responsiveness */
                margin: 40px auto; /* Centered form */
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                font-family: Arial, sans-serif;
            }

            .form-container h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
                font-size: 24px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
                color: #555;
            }

            .form-container{
                display: none;
            }

            .form-group input[type="text"],
            .form-group input[type="date"],
            .form-group textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 16px;
                color: #333;
                background-color: #f9f9f9;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            .form-group input:focus,
            .form-group textarea:focus {
                border-color: #3498db;
                box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
                outline: none;
            }

            textarea {
                resize: vertical; /* Allows resizing only vertically */
            }

            button[type="submit"] {
                width: 100%;
                padding: 12px;
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            button[type="submit"]:hover {
                background-color: #2980b9;
                transform: translateY(-2px);
            }

            button[type="submit"]:active {
                transform: translateY(1px);
            }

            /* Responsive Design */
            @media screen and (max-width: 768px) {
                .form-container {
                    width: 90%; /* Full width on smaller screens */
                    padding: 15px;
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
            }

        </style>
    </head>
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
                <p>Project Permission</p>
            </a>
            <a href="StudentGuideDetail.php">
                <i class="fa fa-user-tie"></i> <!-- Guide -->
                <p>Guide Detail</p>
            </a>
            <a href="StudentLogBook.php">
                <i class="fa fa-book-open"></i> <!-- Log Book -->
                <p class="addsf">View Log Book</p>
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
                <h1 style="margin:0px;padding: 0px;width: 200px;">LogBook</h1>
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
                <button class="bulk-toggle">Log Book</button>
                <div class="form-container">
                    <h2>Log Book</h2>
                    <form method="POST">

                        <div class="form-group">
                            <label for="groupid">Group ID:</label>
                            <input type="text" id="groupid" name="groupid" placeholder="Enter Group ID">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="workcompleted">Work Completed:</label>
                            <textarea id="workcompleted" name="workcompleted" rows="4" placeholder="Describe the work completed"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nexttask">Next Task:</label>
                            <textarea id="nexttask" name="nexttask" rows="4" placeholder="Describe the next task"></textarea>
                        </div>
                        <button type="submit" name="submit" value='submit'>Submit</button>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $groupid = $_POST['groupid'];
                $date = $_POST['date'];
                $work = $_POST['workcompleted'];
                $next = $_POST['nexttask'];
                $status = "Pending";

                $log1 = "select *from logbook where groupid=$groupid";
                $data = mysqli_query($c, $log1);

                if (mysqli_num_rows($data) == 0) {
                    echo "<script>alert('Group is not found..!');</script>";
                } else {

                    $qu = "insert into LogBook (groupid,Date,WorkComplated,NextTask,Status) values($groupid,'$date','$work','$next','$status')";
                    $q = mysqli_query($c, $qu);

                    if ($q) {
                        echo "<script>alert('submit succesfully');</script>";
                    }
                }
            }
            ?>

            <?php
            $lid = $_SESSION['id'];

            $select = "select groupid from studentgroup where enro1='$lid' or enro2='$lid' or enro3='$lid' or enro4='$lid'";
            $sdata = mysqli_query($c, $select);

            $r = mysqli_fetch_assoc($sdata);
            $groupid = $r['groupid'];
            $log = "select * from LogBook where groupid='$groupid'";
            $logbook = mysqli_query($c, $log);
            ?>
            <div class="section">
                <table class="styled-table" align="center">
                    <thead>
                        <tr class="table-heading-row">
                            <th>Log Id</th>
                            <th>Group Id</th>
                            <th>Date</th>
                            <th>Work Completed</th>
                            <th>Next Task</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($logbook)) {
                            ?>
                            <tr class="table-data-row">
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
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

            <?php
//                if(isset($_POST['Approve']))
//                {
//                    echo "<form method='POST' style='display:inline-block;'>";
//                    echo "<textarea name='responce'></textarea>"; 
//                }
            ?>
        </div>
    </div>
</div>
</body>
</html>

