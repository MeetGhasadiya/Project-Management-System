<?php
include 'connection.php';

if (!isset($_SESSION['student'])) {
    header("Location:Login.php");
}
?>
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
            /* Styled Table */
            .styled-table {
                width: 90%; /* Responsive width */
                margin: 40px auto; /* Center the table horizontally */
                border-collapse: collapse; /* Clean table borders */
                background-color: #fff;
                border-radius: 10px;
                overflow: hidden; /* Rounded corners on all sides */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
                font-family: Arial, sans-serif;
            }

            .styled-table thead tr {
                background-color: #3498db; /* Header background color */
                color: #fff; /* Header text color */
                text-align: left; /* Left-aligned header text */
                font-weight: bold;
            }

            .styled-table th,
            .styled-table td {
                padding: 15px; /* Padding for cells */
                border-bottom: 1px solid #ddd; /* Border for rows */
            }

            .styled-table tbody tr:hover {
                background-color: #f2f2f2; /* Highlight row on hover */
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f9f9f9; /* Alternate row colors */
            }

            .styled-table tbody tr:last-of-type td {
                border-bottom: none; /* Remove bottom border for the last row */
            }

            /* Responsive Design */
            @media screen and (max-width: 768px) {
                .styled-table {
                    width: 100%; /* Full width on smaller screens */
                }

                .styled-table th,
                .styled-table td {
                    font-size: 14px; /* Adjust font size for smaller screens */
                }
            }

        </style>

    </head>
    <body>
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
                <p class="addsf">Panel Detail</p>
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
                <h1 style="margin:0px;padding: 0px;width: 200px;">Panel Allocation</h1>
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
            $panel = "SELECT * FROM panelallocation";
            $select = mysqli_query($c, $panel);
            ?>
            <div class="section">
                
                <form>
                    <table class="styled-table"> <!-- Replaced panel-table with styled-table -->
                        <thead>
                            <tr>
                                <th>Panel ID</th>
                                <th>Faculty 1</th>
                                <th>Faculty 2</th>
                                <th>Groups</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['panelid']); ?></td>
                                    <td><?php echo htmlspecialchars($row['Facultyname1']); ?></td>
                                    <td><?php echo htmlspecialchars($row['Facultyname2']); ?></td>
                                    <td><?php echo htmlspecialchars($row['No_of_groups']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>






        </div>



    </body>
</html>
