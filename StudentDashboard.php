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
            .welcome-message {
                font-size: 36px;
                font-weight: bold;
                text-align: center;
                padding: 20px;
                color: black;
                animation: welcomeAnimation 3s ease-out;
                margin-top: 50px;
            }

            /* Keyframe animation for heavy effect */
            @keyframes welcomeAnimation {
                0% {
                    transform: scale(0);
                    opacity: 0;
                }
                50% {
                    transform: scale(1.2);
                    opacity: 1;
                }
                75% {
                    transform: scale(1.1);
                }
                100% {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            /* Text glow animation */
            .glow {
                animation: textGlow 1.5s ease-in-out infinite alternate;
            }

            @keyframes textGlow {
                0% {
                    text-shadow: 0 0 5px #3498db, 0 0 10px #3498db, 0 0 15px #3498db;
                }
                100% {
                    text-shadow: 0 0 20px #3498db, 0 0 30px #3498db, 0 0 40px #3498db;
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
                <h1 style="margin:0px;padding: 0px;width: 200px;">Student Dashboard</h1>
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
                <div class="welcome-message glow" id="welcomeMessage">
                    Welcome to the Student Dashboard!
                </div>
            </div>
        </div>



    </body>
</html>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
