
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
            .announcement-date {
                font-size: 12px;
                color: #888;
                margin-bottom: 8px;
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
                <p>Evaluation Marks</p>
            </a>
            <a href="StudentViewAnnouncement.php">
                <i class="fas fa-bullhorn"></i>
                <p class="addsf">View Announcement</p>
            </a> <!-- Icon for evaluation/marks -->
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">Submit task</h1>
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
