<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming '_sid', '_bid', and '_days' are the keys for identifying the record to delete
$_sid_to_delete = $_POST['_sid'];
$_bid_to_delete = $_POST['_bid'];
$_days_to_delete = $_POST['_days'];

// Use prepared statement to prevent SQL injection
$sql = "DELETE FROM reserves WHERE sid = ? AND bid = ? AND days = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $_sid_to_delete, $_bid_to_delete, $_days_to_delete);

if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
<br><br>
<a href="http://localhost/labdata/homepage/RMenu.html">back</a>
<link rel="stylesheet" href="delet.css">
