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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="style.css" rel="stylesheet" type="text/css"/>
        <style>
            .form-container {
                padding: 20px;
                border-radius: 12px;
                max-width: 1000px;
                width: 100%;
                animation: fadeIn 1s ease-in-out;
            }

            .header-title {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
                font-weight: 600;
            }

            .form-table {
                width: 100%;
                border-spacing: 10px;
            }

            .form-table td {
                padding: 10px;
                vertical-align: middle;
            }

            .form-input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                outline: none;
                font-size: 15px;
                transition: all 0.3s ease;
            }

            .form-input:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }

            .form-button {
                width: 20%;
                padding: 12px;
                background-color: #3498DB;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .form-button:hover {
                background-color: #4955d4;
                transform: translateY(-2px);
            }

            .form-button:active {
                transform: translateY(1px);
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>
    <body>

        <!-- Sidebar -->
        <div class="sidebar">
            <a href="StudentMakeGroup.php">
                <i class="fa fa-users"></i>
                <p class="addsf">Making Group</p>
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
                <h1 style="margin:0px;padding: 0px;width: 200px;">Make Groups</h1>
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
                <form method="POST" id="frmsubmit" class="form-container">
                    <table class="form-table">
                        <tr>
                            <td colspan="4"><h1 class="header-title">Project Group Form</h1></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 1:</p></td>
                            <td><input type="text" id="num1" pattern="^[0-9]*$" maxlength="15" name="num1" class="form-input" required></td>
                            <td><p>Group Member Name 1:</p></td>
                            <td><input type="text" id="name1" name="name1" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 2:</p></td>
                            <td><input type="text" id="num2" pattern="^[0-9]*$" maxlength="15" name="num2" class="form-input" required></td>
                            <td><p>Group Member Name 2:</p></td>
                            <td><input type="text" id="name2" name="name2" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 3:</p></td>
                            <td><input type="text" id="num3" pattern="^[0-9]*$" maxlength="15" name="num3" class="form-input" required></td>
                            <td><p>Group Member Name 3:</p></td>
                            <td><input type="text" id="name3" name="name3" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 4:</p></td>
                            <td><input type="text" id="num4" pattern="^[0-9]*$" maxlength="15" name="num4" class="form-input" required></td>
                            <td><p>Group Member Name 4:</p></td>
                            <td><input type="text" id="name4" name="name4" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td><p>Project Name:</p></td>
                            <td colspan="3"><input type="text" id="prname" name="prname" class="form-input" required></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <button type="submit" name="submit" value="submit" id="btnSubmit" class="form-button">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $num3 = $_POST['num3'];
                $num4 = $_POST['num4'];
                $name1 = $_POST['name1'];
                $name2 = $_POST['name2'];
                $name3 = $_POST['name3'];
                $name4 = $_POST['name4'];
                $prname = $_POST['prname'];
                $status = 'pending';

                $validateQuery = "SELECT sid FROM student WHERE sid IN ($num1, $num2, $num3, $num4)";
                $validateResult = mysqli_query($c, $validateQuery);

                if (mysqli_num_rows($validateResult) == 4) {
                    $qu = "SELECT * FROM studentgroup WHERE $num1 IN (enro1, enro2, enro3, enro4) OR $num2 IN (enro1, enro2, enro3, enro4) OR $num3 IN (enro1, enro2, enro3, enro4) OR $num4 IN (enro1, enro2, enro3, enro4)";
                    $q = mysqli_query($c, $qu);

                    if (mysqli_num_rows($q) > 0) {
                        echo "<script>alert('Enrollment already exists...!');</script>";
                    } else {
                        $qu = "insert into studentgroup(enro1,enro2,enro3,enro4,name1,name2,name3,name4,projectTitle,Status) values($num1,$num2,$num3,$num4,'$name1','$name2','$name3','$name4','$prname','$status')";
                        $q = @mysqli_query($c, $qu);
                        if ($q) {
//                            echo "<script>alert('Record Successfully inserted...!');</script>";
                        } else {
//                            echo "<script>alert('Error while Inserting...!');</script>";
                        }
                    }
                }
                else{
                    echo "<script>alert('this enrollment no is not exists...!');</script>";
                }
            }
            ?>
        </div>
    </body>
</html>
