<h2> Sailors update </h2><br>

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
    $sname = $_POST['sname'];
    $rating = $_POST['rating'];
    $age = $_POST['age'];

    // Update data in the database
    $update_sql = "UPDATE sailors SET sname='$sname', rating='$rating', age= '$age' WHERE sid =$sid";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql ="SELECT * FROM sailors";
$result = $conn->query($sql);
?>

<table border="1", cellspacing="1", cellpadding="1">
    <tr>
        <th>sid</th>
        <th>sailor Name</th>
        <th>rating</th>
        <th>age</th>
        <th>Action</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td>
                    <!-- Add a form for updating data -->
                    <form method="post" action="">
                        <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                        <input type="text" name="sname" value="<?php echo $row['sname']; ?>">
                        <input type="text" name="rating" value="<?php echo $row['rating']; ?>">
                        <input type="text" name="age" value="<?php echo $row['age']; ?>">
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
<a href="http://localhost/labdata/homepage/SMenu.html">back</a>
<link rel="stylesheet" href="update.css">