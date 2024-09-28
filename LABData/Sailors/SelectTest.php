<h2> Sailors </h2><br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("connaction failed:". $conn->connect_error);
}

$sql ="select * from sailors";
$result = $conn->query($sql);
?>

<table border="1", cellspacing = "1" ,cellpaddin="1">
    <tr>
        <th>sid</th>
        <th> sname</th>
        <th> rating </th>
        <th> age </th>
    </tr>
<?php
if($result->num_rows > 0){
    while($row = $result ->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row ['sid']; ?> </td>
            <td><?php echo $row ['sname']; ?> </td>
            <td><?php echo $row ['rating']; ?> </td>
            <td><?php echo $row ['age']; ?> </td>
        </tr>
<?php
}
}else{
    echo"0 result";
}
$conn->close();
?>
</table>

<br><br>
<a href="http://localhost/labdata/homepage/SMenu.html">back</a>
<link rel="stylesheet" href="select.css">
