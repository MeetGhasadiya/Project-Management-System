<?php
include 'connection.php';
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch search query, if any
$id = $_GET['sid'];

// SQL query to search for suppliers based on name or ID
if ($id != '') {
    $query = "SELECT * FROM faculty WHERE fid LIKE '$id%' OR fname LIKE '$id%'";
} else {
    $query = "SELECT * FROM faculty"; // Display all if no search query
}

$result = mysqli_query($c, $query);

// Generate the table rows dynamically based on the query results
?>



<form method="POST" enctype="multipart/form-data" align="center">
    <table>

        <tr>
            <th>Faculty Id</th>
            <th>Faculty Name</th>
            <th>Contact Number</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($r = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $r['fid']; ?></td>
                <td><?php echo $r['fname']; ?></td>
                <td><?php echo $r['contactnumber']; ?></td>
                <td><?php echo $r['designation']; ?></td>
                <td><?php echo $r['email']; ?></td>
                <td>
                    <form method="POST" action="AddFaculty.php" style="display: inline-block;">
                        <input type="hidden" name="fid" value="<?php echo $r['fid']; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                    <form method="GET" action="facultyupdate.php" style="display: inline-block;">
                        <input type="hidden" name="fid" value="<?php echo $r['fid']; ?>">
                        <input type="submit" value="Edit" style="width: 86px">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>