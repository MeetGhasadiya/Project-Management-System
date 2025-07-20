<?php
include 'connection.php';

// Get the group ID from POST request
$id = $_POST['id'];

if (empty($id)) {
    header("Location: AddStudent.php");
    exit();
} else {
    // Fetch enrollment numbers for the group
    $select = "SELECT enro1, enro2, enro3, enro4 FROM studentgroup WHERE groupid='$id'";
    $show = mysqli_query($c, $select);

    if ($show && mysqli_num_rows($show) > 0) {
        $r = mysqli_fetch_assoc($show);
        $en1 = $r['enro1'];
        $en2 = $r['enro2'];
        $en3 = $r['enro3'];
        $en4 = $r['enro4'];

        // Fetch student details for each enrollment number
        $students = [];
        foreach ([$en1, $en2, $en3, $en4] as $enro) {
            if (!empty($enro)) {
                $query = "SELECT * FROM student WHERE sid='$enro'";
                $result = mysqli_query($c, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $students[] = mysqli_fetch_assoc($result);
                } else {
                    $students[] = null; // Handle missing students
                }
            } else {
                $students[] = null; // Handle empty enrollment numbers
            }
        }
    } else {
        echo "No group found with ID: $id";
        exit();
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Details</title>
        <style>

            .styled-table {
                width: 90%; /* Table width for a responsive layout */
                margin: 40px auto; /* Center the table on the page */
                border-collapse: collapse; /* Merge borders for a clean look */
                background-color: #fff;
                border-radius: 10px; /* Rounded corners for the table */
                overflow: hidden; /* Hide overflowing content from corners */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
                font-family: Arial, sans-serif;
                text-align: left; /* Align text for better readability */
            }

            .styled-table th, .styled-table td {
                padding: 15px; /* Add padding for readability */
                border-bottom: 1px solid #ddd; /* Add a subtle border between rows */
            }

            .styled-table th {
                background-color: #3498db; /* Blue background for header */
                color: #fff; /* White text for contrast */
                font-weight: bold;
                text-transform: uppercase; /* Capitalize headers */
            }

            .styled-table tr:hover {
                background-color: #f2f2f2; /* Highlight row on hover */
            }

            .styled-table tbody tr:last-of-type td {
                border-bottom: none; /* Remove border for the last row */
            }

            /* Responsive Design */
            @media screen and (max-width: 768px) {
                .styled-table {
                    width: 100%; /* Full width on smaller screens */
                }
            }

            #btn {
                background-color: #2980b9;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
            #btn:hover {
                background-color: #3498db;
            }
           
        </style>
    </head>
    <body>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Enrollment No</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
            <form>
                <?php foreach ($students as $student): ?>
                    <?php if ($student): ?>
                        <tr>
                            <td><?php echo $student['sid']; ?></td>
                            <td><?php echo $student['fullName']; ?></td>
                            <td><?php echo $student['sem']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                            <td><?php echo $student['contactno']; ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No data available</td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">
                        <input type="submit" id="btn" name="Back" value="Back" formaction="F-ViewGroups.php">
                    </td>
                </tr>
                </tbody>
        </table>
    </form>
</body>
</html>
