<?php
include 'connection.php';

if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch search query, if any
$id = $_GET['sid'];

// SQL query to search for suppliers based on name or ID
if ($id != '') {
    $query = "SELECT * FROM student WHERE sid LIKE '$id%' OR fullName LIKE '$id%' OR sem LIKE '$id%'";
} else {
    $query = "SELECT * FROM student"; // Display all if no search query
}

$result = mysqli_query($c, $query);

// Generate the table rows dynamically based on the query results
?>



<form method="POST" enctype="multipart/form-data" align="center">
    <table>
        
        <tr>
            <th>Enrollment No</th>
            <th>Name</th>
            <th>Semester</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['fullName']; ?></td>
                <td><?php echo $row['sem']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['contactno']; ?></td>
                <td>
                    <form method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?php echo $row['sid']; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                    <form method="GET" action="update.php" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?php echo $row['sid']; ?>">
                        <input type="submit" value="Edit" style="width: 86px">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>