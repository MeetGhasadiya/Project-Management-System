<?php
include 'connection.php';
if (!isset($_SESSION['faculty'])) {
    header("Location: Login.php");
}

// Fetch Evaluation List
$evaluationQuery = "SELECT * FROM evaluation";
$evaluationResult = mysqli_query($c, $evaluationQuery);

// Fetch Student Groups
$groupQuery = "SELECT * FROM studentGroup";
$groupResult = mysqli_query($c, $groupQuery);

// Handle Form Submission
if (isset($_POST['btnsubmitmarks'])) {
    $evaluationId = $_POST['evaluation_id'];

    foreach ($_POST['marks'] as $groupId => $studentsMarks) {
        foreach ($studentsMarks as $enrollment => $criteriaMarks) {
            foreach ($criteriaMarks as $criteriaId => $obtainedMarks) {
                
                // Fetch project title for the current group
                $projectQuery = "SELECT projectTitle FROM studentGroup WHERE groupid = '$groupId'";
                $projectResult = mysqli_query($c, $projectQuery);
                $projectRow = mysqli_fetch_assoc($projectResult);
                $projectTitle = mysqli_real_escape_string($c, $projectRow['projectTitle']); // Sanitize project title
                
                // Insert marks along with project title
                $insertMarksQuery = "INSERT INTO studentMarks (groupid, enrollment, projectTitle, Eid, Cid, obtainMarks) 
                                     VALUES ('$groupId', '$enrollment', '$projectTitle', '$evaluationId', '$criteriaId', '$obtainedMarks')";
                mysqli_query($c, $insertMarksQuery);
            }
        }
    }
    echo "<script>alert('Marks submitted successfully!');</script>";
}?>
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

        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
            <a href="F-ViewGroups.php"><i class="fas fa-users"></i><p>View Project Groups</p></a> <!-- Icon for groups -->
            <a href="F-ManageLog.php"><i class="fas fa-book"></i><p>Manage log</p></a> <!-- Icon for managing logs -->
            <a href="F-ViewSubmission.php"><i class="fas fa-file-alt"></i><p>View Submission</p></a> <!-- Icon for submissions -->
            <a href="F-AssignEMarks.php"><i class="fas fa-check-circle"></i><p class="addsf">Assign Evaluation Mark</p></a> <!-- Icon for evaluation/marks -->
            <a href="F-ViewAnnouncement.php"><i class="fas fa-bullhorn"></i><p>View Announcement</p></a> <!-- Icon for evaluation/marks -->
        </div>


        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 200px;">Assign Marks</h1>
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
            <!-- Sections for different sidebar links -->
            <div class="section">
                <h2>Assign Marks to Individual Students</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="evaluation_id">Select Evaluation:</label>
                        <select name="evaluation_id" id="evaluation_id" class="form-control" required>
                            <option value="">Select Evaluation</option>
                            <?php
                            while ($evaluation = mysqli_fetch_assoc($evaluationResult)) {
                                $selected = (isset($_POST['evaluation_id']) && $_POST['evaluation_id'] == $evaluation['id']) ? 'selected' : '';
                                echo "<option value='{$evaluation['id']}' $selected>{$evaluation['name']} ({$evaluation['Date']})</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <div id="criteria-marks-section">
                        <?php
                        while ($group = mysqli_fetch_assoc($groupResult)) {
                            $groupId = $group['groupid'];
                            echo "<h3>Group ID: {$groupId} - {$group['projectTitle']}</h3>";

                            $students = [
                                $group['enro1'] => $group['name1'],
                                $group['enro2'] => $group['name2'],
                                $group['enro3'] => $group['name3'],
                                $group['enro4'] => $group['name4']
                            ];

                            // Fetch Criteria for Selected Evaluation
                            if (isset($_POST['evaluation_id']) && $_POST['evaluation_id'] != '') {
                                $evaluationId = $_POST['evaluation_id'];

                                $criteriaQuery = "SELECT * FROM criteria WHERE evaluationId = $evaluationId";
                                $criteriaResult = mysqli_query($c, $criteriaQuery);

                                if (mysqli_num_rows($criteriaResult) > 0) {
                                    echo "<table class='table table-bordered'>";
                                    echo "<thead><tr><th>Student</th><th>Criteria</th><th>Max Marks</th><th>Obtained Marks</th></tr></thead><tbody>";

                                    foreach ($students as $enrollment => $studentName) {
                                        if ($enrollment) {
                                            // Loop through criteria for each student
                                            while ($criteria = mysqli_fetch_assoc($criteriaResult)) {
                                                echo "<tr>
                                <td>{$studentName} (Enrollment: {$enrollment})</td>
                                <td>{$criteria['name']}</td>
                                <td>{$criteria['MarksofCriteria']}</td>
                                <td>
                                    <input type='number' 
                                           name='marks[$groupId][$enrollment][{$criteria['Id']}]' 
                                           max='{$criteria['MarksofCriteria']}' 
                                           class='form-control' 
                                           >
                                </td>
                            </tr>";
                                            }
                                            // Reset criteria result pointer for next student
                                            mysqli_data_seek($criteriaResult, 0);
                                        }
                                    }

                                    echo "</tbody></table>";

                                    // Submit button for each group
                                    echo "<button type='submit' name='btnsubmitmarks' value='{$groupId}' class='btn btn-success'>Submit Marks for Group {$groupId}</button><br><br>";
                                } else {
                                    echo "<p>No criteria found for this evaluation.</p>";
                                }
                            }
                        }
                        ?>
                    </div>



                </form>
            </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            // Fetch Criteria dynamically on Evaluation selection
            $('#evaluation_id').on('change', function () {
                this.form.submit();
            });
        </script>
    </body>
</html>
