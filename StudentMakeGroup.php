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
        <title>Admin Dashboard</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <style>

            form {
                
                padding: 20px;
                border-radius: 12px;
                
                max-width: 1000px;
                width: 100%;
                animation: fadeIn 1s ease-in-out;
            }

            .h1 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
                font-weight: 600;
            }

            table {
                width: 100%;
                border-spacing: 10px;
            }

            td {
                padding: 10px;
                vertical-align: middle;
            }

            input[type="number"], input[type="text"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                outline: none;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            input[type="number"]:focus, input[type="text"]:focus {
                border-color: #5c67f2;
                box-shadow: 0 0 8px rgba(92, 103, 242, 0.2);
            }

            button {
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

            button:hover {
                background-color: #4955d4;
                transform: translateY(-2px);
            }

            button:active {
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
            <a href="StudentProfile.php">
                <i class="fa fa-user-plus"></i>
                <p>Profile</p>
            </a>
            <a href="StudentMakeGroup.php">
                <i class="fa fa-users"></i>
                <p class="addsf">Making Group</p>
            </a>
            <a href="SudentTask.php">
                <i class="fa fa-tasks"></i>
                <p>Update the Task</p>
            </a>
            <a href="StudentProPermission.php">
                <i class="fa fa-users-cog"></i>
                <p>Project Permission</p>
            </a>
            <a href="StudentEvaluationMark.php">
                <i class="fa fa-file-alt"></i>
                <p>Evaluation Marks</p>
            </a>
            <a href="StudentLogBook.php">
                <i class="fa fa-book"></i>
                <p>View Log Book</p>
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin: 0; padding: 0;">Student Dashboard</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </div>
            </div>

            <div class="section">
                <form method="POST" id="frmsubmit">
                    <table>
                        <tr>
                            <td colspan="4"><h1 class="h1">Project Group Form</h1></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 1:</p></td>
                            <td><input type="number" id="num1" name="num1" required></td>
                            <td><p>Group Member Name 1:</p></td>
                            <td><input type="text" id="name1" name="name1" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 2:</p></td>
                            <td><input type="number" id="num2" name="num2" required></td>
                            <td><p>Group Member Name 2:</p></td>
                            <td><input type="text" id="name2" name="name2" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 3:</p></td>
                            <td><input type="number" id="num3" name="num3" required></td>
                            <td><p>Group Member Name 3:</p></td>
                            <td><input type="text" id="name3" name="name3" required></td>
                        </tr>
                        <tr>
                            <td><p>Enrollment No 4:</p></td>
                            <td><input type="number" id="num4" name="num4" required></td>
                            <td><p>Group Member Name 4:</p></td>
                            <td><input type="text" id="name4" name="name4" required></td>
                        </tr>
                        <tr>
                            <td><p>Project Name:</p></td>
                            <td colspan="3"><input type="text" id="prname" name="prname" required></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                <button type="submit" id="btnSubmit">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </body>
</html>
