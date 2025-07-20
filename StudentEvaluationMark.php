<?php
include 'connection.php';

if (!isset($_SESSION['student'])) {
    header("Location:Login.php");
}
$lid = $_SESSION['id'];
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
        <title>Admin Dashboard</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <p class="addsf">Evaluation Marks</p>
            </a>
            <a href="StudentViewAnnouncement.php">
                <i class="fas fa-bullhorn"></i>
                <p>View Announcement</p>
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">View Evaluation marks</h1>
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
                <?php
                $marks = "SELECT studentmarks.groupid, studentmarks.enrollment, studentmarks.projectTitle, 
                     evaluation.name AS EvaluationName, criteria.name AS criteriaName,criteria.MarksofCriteria,
                     studentmarks.obtainMarks 
              FROM studentmarks 
              JOIN evaluation ON studentmarks.Eid = evaluation.id 
              JOIN criteria ON studentmarks.Cid = criteria.Id 
              WHERE studentmarks.enrollment = '$lid'";

                $data = mysqli_query($c, $marks);

                if (mysqli_num_rows($data) > 0) {
                    echo "<table class='styled-table' align='center' >
                        
                <thead>
                    
                    <tr class='table-heading-row'>
                        <th>Group ID</th>
                        <th>Enrollment</th>
                        <th>Project Title</th>
                        <th>Evaluation Name</th>
                        <th>Criteria Name</th>
                        <th>Out of Marks</th>
                        <th>Obtained Marks</th>
                    </tr>
                </thead>
                <tbody>";

                    // Fetch and display each row of data
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo "<tr class='table-data-row'>
                    <td>" . htmlspecialchars($row['groupid']) . "</td>
                    <td>" . htmlspecialchars($row['enrollment']) . "</td>
                    <td>" . htmlspecialchars($row['projectTitle']) . "</td>
                    <td>" . htmlspecialchars($row['EvaluationName']) . "</td>
                    <td>" . htmlspecialchars($row['criteriaName']) . "</td>
                    <td>" . htmlspecialchars($row['MarksofCriteria']) . "</td>
                    <td>" . htmlspecialchars($row['obtainMarks']) . "</td>
                  </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p style='text-align:center; font-size: 18px;'>No data available.</p>";
                }
                ?>
            </div>
        </div>


    </body>
</html>