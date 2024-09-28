<h2> Boats Input</h2>

<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "part";

 $conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error){
     die("connaction failed:". $conn->connect_error);
 }
 $_bid = $_POST['_bid'];
 $_bname = $_POST['_bname'];
 $_color = $_POST['_color'];
 $sql = "insert into boats set bid ='$_bid', bname='$_bname', color='$_color'";
if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else {
    echo "error:" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<br><br>
<a href="http://localhost/labdata/homepage/BMenu.html">back</a>
<link rel="stylesheet" href="insert.css">