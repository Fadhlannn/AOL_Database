<h2> Boats Update </h2><br>

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
    $bid = $_POST['bid'];
    $bname = $_POST['bname'];
    $color = $_POST['color'];

    // Update data in the database
    $update_sql = "UPDATE boats SET bname='$bname', color='$color' WHERE bid=$bid";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql ="SELECT * FROM boats";
$result = $conn->query($sql);
?>

<table border="1", cellspacing="1", cellpadding="1">
    <tr>
        <th>Bid</th>
        <th>Boat Name</th>
        <th>Color</th>
        <th>Action</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['bid']; ?></td>
                <td><?php echo $row['bname']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td>
                    <!-- Add a form for updating data -->
                    <form method="post" action="">
                        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                        <input type="text" name="bname" value="<?php echo $row['bname']; ?>">
                        <input type="text" name="color" value="<?php echo $row['color']; ?>">
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
<a href="http://localhost/labdata/homepage/BMenu.html">back</a>
<link rel="stylesheet" href="update.css">
