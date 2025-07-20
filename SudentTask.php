<?php
include 'connection.php';
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
        <style>
           

            .section h3 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 8px;
                color: #555;
            }

            .form-group input[type="number"],
            .form-group input[type="file"] {
                width: 100%;
                padding: 12px;
                font-size: 16px;
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f9f9f9;
                transition: border-color 0.3s ease;
            }

            .form-group input[type="number"]:focus,
            .form-group input[type="file"]:focus {
                border-color: #3498db;
                outline: none;
            }

            .form-group input[type="submit"] {
                width: 10%;
                padding: 12px;
                background-color: #3498db;
                color: white;
                font-size: 16px;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .form-group input[type="submit"]:hover {
                background-color: #2980b9;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                <p class="addsf">Submission</p>
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
                <h1 style="margin:0px;padding: 0px;width: 200px;">Submit Daily task</h1>
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
                <h3>Upload Document (Accept only PDF or DOCX)</h3>
                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="group">Group ID:</label>
                        <input type="number" id="group" name="group" placeholder="Enter your group ID" required>
                    </div>

                    <div class="form-group">
                        <label for="fileInput">Select File:</label>
                        <input type="file" id="fileInput" name="file" accept=".pdf, .doc, .docx" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="upload" value="Upload">
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['upload'])) {
                $groupid = $_POST['group'];
                $current_date = date('Y-m-d');

                if (isset($_FILES['file'])) {
                    $filename = $_FILES["file"]["name"];
                    $tmp_name = $_FILES["file"]["tmp_name"];
                    $path = "uploads/" . $filename;
                    $date = "select * from announcement order by id desc limit 1";
                    $d = mysqli_query($c, $date);
                    $r = mysqli_fetch_assoc($d);
                    $dueDate = $r['date'];
                    echo "<script>alert('$dueDate');</script>";
                    if ($current_date <= $dueDate) {
                        if (move_uploaded_file($tmp_name, $path)) {
                            $insertQuery = "INSERT INTO submission (groupid, dueDate, filename, filepath) VALUES ('$groupid', '$current_date', '$filename', '$path')";
                            $insertResult = mysqli_query($c, $insertQuery);

                            if ($insertResult) {
//                                echo "<script>alert('File uploaded successfully!');</script>";
                            } else {
                                echo "<script>alert('Failed to insert submission record.');</script>";
                            }
                        } else {
//                            echo "<script>alert('Failed to move uploaded file.');</script>";
                        }
                    } else {
                        echo "<script>alert('Deadline is over. Please contact your guide.');</script>";
                    }
                }
            }
            ?>
        </div>
        <script>
            document.getElementById('uploadForm').addEventListener('submit', function (event) {
                // Get the file input element
                const fileInput = document.getElementById('fileInput');
                const file = fileInput.files[0];

                // Check if a file is selected
                if (!file) {
                    alert('Please select a file.');
                    event.preventDefault();
                    return;
                }

                // Get the file extension
                const allowedExtensions = ['pdf', 'doc', 'docx'];
                const fileName = file.name;
                const fileExtension = fileName.split('.').pop().toLowerCase();

                // Validate the file extension
                if (!allowedExtensions.includes(fileExtension)) {
                    alert('Invalid file type. Only PDF, DOC, and DOCX files are allowed.');
                    event.preventDefault(); // Stop form submission
                }
            });
        </script>

    </body>
</html>
