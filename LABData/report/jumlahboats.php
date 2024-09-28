<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "part";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Jumlah boats
$result = $conn->query("SELECT COUNT(*) AS jumlah_boats FROM boats");
$row = $result->fetch_assoc();
$jumlahBoats = $row['jumlah_boats'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Report Section -->
    <h2>Report</h2>

    <table>
        <tr>
            <th>Jumlah Boats</th>
            <td><?php echo $jumlahBoats; ?></td>
        </tr>
    </table>
    <br><br>
    <a href="http://localhost/labdata/homepage/Report.html">back</a>
    <link rel="stylesheet" href="style.css">
</body>
</html>
