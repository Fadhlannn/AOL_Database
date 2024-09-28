<h2> Reserves Update </h2><br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted for update
if(isset($_POST['update'])){
    $sid = $_POST['sid'];
    $bid = $_POST['bid'];
    $days = $_POST['days'];

    // Update data in the database
    $update_sql = "UPDATE reserves SET days='$days' WHERE sid =$sid AND bid =$bid";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql ="SELECT * FROM reserves";
$result = $conn->query($sql);
?>

<table border="1", cellspacing="1", cellpadding="1">
    <tr>
        <th>sid</th>
        <th>bid</th>
        <th>days</th>
        <th>Action</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['bid']; ?></td>
                <td><?php echo $row['days']; ?></td>
                <td>
                    <!-- Add a form for updating data -->
                    <form method="post" action="">
                        <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                        <input type="text" name="days" value="<?php echo $row['days']; ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "0 result";
    }
    $conn->close();
    ?>
</table>

<br><br>
<a href="http://localhost/labdata/homepage/RMenu.html">back</a>
<link rel="stylesheet" href="update.css">
