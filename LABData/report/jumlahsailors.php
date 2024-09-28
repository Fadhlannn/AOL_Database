<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "part";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Jumlah sailors
$result = $conn->query("SELECT COUNT(*) AS jumlah_sailors FROM sailors");
$row = $result->fetch_assoc();
$jumlahSailors = $row['jumlah_sailors'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Report Section -->
    <h2>Reports</h2>

    <table>
        <tr>
            <th>Jumlah Sailors</th>
            <td><?php echo $jumlahSailors; ?></td>
        </tr>
    </table>
    <br><br>
    <a href="http://localhost/labdata/homepage/Report.html">back</a>
    <link rel="stylesheet" href="style.css">
</body>
</html>
