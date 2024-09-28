<h2> Reserves Input  </h2>

<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "part";

 $conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error){
     die("connaction failed:". $conn->connect_error);
 }
 $_sid = $_POST['_sid'];
 $_bid = $_POST['_bid'];
 $_days = $_POST['_days'];
 $sql = "insert into Reserves set sid ='$_sid', bid='$_bid', days='$_days'";
if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else {
    echo "error:" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<br><br>
<a href="http://localhost/labdata/homepage/RMenu.html">back</a>
<link rel="stylesheet" href="insert.css">