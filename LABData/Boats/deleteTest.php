<h2> Boats Delete </h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Assuming '_bid' is the key for identifying the record to delete
$_bid_to_delete = $_POST['_bid'];

$sql = "DELETE FROM boats WHERE bid = '$_bid_to_delete'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br><br>
<a href="http://localhost/labdata/homepage/BMenu.html">back</a>
<link rel="stylesheet" href="delet.css">
