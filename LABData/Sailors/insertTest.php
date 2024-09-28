<h2> Sailors Input </h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validasi dan sanitasi input
$_sid = $_POST['_sid'];
$_sname = $_POST['_sname'];
$_rating = $_POST['_rating'];

if (isset($_POST['_age'])) {
    // Gunakan fungsi floatval untuk mendapatkan nilai float dari string
    $_age = floatval($_POST['_age']);

    // Gunakan prepared statements untuk melindungi dari SQL injection
    $sql = $conn->prepare("INSERT INTO sailors (sid, sname, rating, age) VALUES (?, ?, ?, ?)");
    $sql->bind_param("sssd", $_sid, $_sname, $_rating, $_age);

    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
} else {
    echo "Invalid age format. Please enter a valid number.";
}

$conn->close();
?>
<br><br>
<a href="http://localhost/labdata/homepage/SMenu.html">back</a>
<link rel="stylesheet" href="insert.css">
