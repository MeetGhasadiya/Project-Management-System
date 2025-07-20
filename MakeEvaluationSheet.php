<?php
include 'connection.php';
if (!isset($_SESSION['admin'])) {
    header("Location:Login.php");
}
$showCriteriaFields = false; // Initially, don't show criteria fields

if (isset($_POST['btninsert'])) {
    $evaluationName = $_POST['evaluation_name'];
    $evaluationDate = $_POST['evaluation_date'];

    $evaluationDescription = $_POST['evaluation_description'];
    $criteriaCount = $_POST['criteria_count']; // Get number of criteria entered by user

    $query = "INSERT INTO evaluation (name, Date, description) 
              VALUES ('$evaluationName', '$evaluationDate', '$evaluationDescription')";
    mysqli_query($c, $query);

    $evaluationId = mysqli_insert_id($c);

    for ($i = 1; $i <= $criteriaCount; $i++) {
        $criteriaName = $_POST["criteria_name_$i"];
        $criteriaMarks = $_POST["criteria_marks_$i"];

        $criteriaQuery = "INSERT INTO criteria (name, MarksofCriteria, evaluationId ) 
                          VALUES ('$criteriaName', '$criteriaMarks','$evaluationId')";
        mysqli_query($c, $criteriaQuery);
    }
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
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
        <script src=https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js""></script>
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>

        <!-- Horizontal Navbar -->


        <!-- Sidebar -->
        <div class="sidebar">
            <a href="AddStudent.php"><i class="fas fa-user-plus"></i><p>Add Student</p></a>
            <a href="AddFaculty.php"><i class="fas fa-user-plus"></i><p>Add Faculty</p></a>
            <a href="ManageProject.php"><i class="fas fa-tasks"></i><p>Manage Project</p></a>
            <a href="AssignGuide.php"><i class="fas fa-shield-alt"></i><p>Assign Guide</p></a>
            <a href="AssignPanel.php"><i class="fas fa-chalkboard-teacher"></i><p>Assign Panel</p></a>
            <a href="MakeEvaluationSheet.php"><i class="fas fa-clipboard"></i><p  class="addsf">Make Evaluation Sheet</p></a>
            <a href="ManageLogBook.php"><i class="fas fa-book"></i><p>Manage Logbook</p></a>
            <a href="Announcement.php"><i class="fas fa-bullhorn"></i><p>Announcement</p></a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="navbar">
                <h1 style="margin:0px;padding: 0px;width: 250px;">Make Evaluation sheet</h1>
                <div style="width: 70%"></div>
                <div class="nav-links">
                    <div class="dropdown">

                        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>

                    </div>
                </div>
            </div>
            <!-- Sections for different sidebar links -->
            <div class="section">
                <h2>Make Evaluation Sheet</h2>

                <!-- Evaluation Form -->
                <form method="POST" action="">
                    <!-- Basic Evaluation Information -->
                    <div class="form-group">
                        <label for="evaluation-name">Evaluation Name:</label>
                        <input type="text" id="evaluation-name" name="evaluation_name" class="form-control" <?php if (isset($_POST['evaluation_name'])) echo 'value="' . htmlspecialchars($_POST['evaluation_name']) . '"'; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="evaluation-date">Date:</label>
                        <input type="date" id="evaluation-date" name="evaluation_date" class="form-control" <?php if (isset($_POST['evaluation_date'])) echo 'value="' . htmlspecialchars($_POST['evaluation_date']) . '"'; ?> required>
                    </div>


                    <div class="form-group">
                        <label for="evaluation-description">Description:</label>
                        <input id="evaluation-description" name="evaluation_description" class="form-control" rows="4" <?php if (isset($_POST['evaluation_description'])) echo 'value="' . htmlspecialchars($_POST['evaluation_description']) . '"'; ?> required>
                    </div>

                    <!-- Number of Criteria Input -->
                    <div class="form-group">
                        <label for="criteria-count">How many criteria do you want?</label>
                        <input type="number" id="criteria-count" name="criteria_count" class="form-control" min="1" <?php if (isset($_POST['criteria_count'])) echo 'value="' . htmlspecialchars($_POST['criteria_count']) . '"'; ?> required>
                    </div>
                    <button id="btngenerate" name="btngenerate" class="btn btn-primary">Generate criteria</button>
                    <!-- Dynamic Criteria Fields -->

                    <?php
                    if (isset($_POST['btngenerate'])) {
                        $criteriaCount = $_POST['criteria_count'];
                        for ($i = 1; $i <= $criteriaCount; $i++) {
                            $criteriaName = isset($_POST["criteria_name_$i"]) ? $_POST["criteria_name_$i"] : '';
                            $criteriaMarks = isset($_POST["criteria_marks_$i"]) ? $_POST["criteria_marks_$i"] : '';
                            ?>
                            <div class="form-group">
                                <label for="criteria-name-<?php echo $i; ?>">Criteria <?php echo $i; ?> Name:</label>
                                <input type="text" id="criteria-name-<?php echo $i; ?>" name="criteria_name_<?php echo $i; ?>" class="form-control" value="<?php echo $criteriaName; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="criteria-marks-<?php echo $i; ?>">Criteria <?php echo $i; ?> Marks:</label>
                                <input type="number" id="criteria-marks-<?php echo $i; ?>" name="criteria_marks_<?php echo $i; ?>" class="form-control" value="<?php echo $criteriaMarks; ?>" required>
                            </div>
                            <?php
                        }
                    }
                    ?>



                    <button type="submit" name="btninsert" class="btn btn-primary">Create Evaluation Sheet</button>
                </form>
            </div>
            <div class="section">
                <h2 style="text-align: center;"><b>Student Evaluation Marks</b></h2>
                <?php
                $marks = "SELECT studentmarks.groupid, studentmarks.enrollment, studentmarks.projectTitle, 
                     evaluation.name AS EvaluationName, criteria.name AS criteriaName,criteria.MarksofCriteria,
                     studentmarks.obtainMarks 
              FROM studentmarks 
              JOIN evaluation ON studentmarks.Eid = evaluation.id 
              JOIN criteria ON studentmarks.Cid = criteria.Id ";

                $data = mysqli_query($c, $marks);

                if (mysqli_num_rows($data) > 0) {
                    echo "<table class='styled-table' align='center' id='example'>
                        
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
            <script>
                new DataTable('#example', {
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    }
                });
            </script>

        </div>
    </body>
</html>
