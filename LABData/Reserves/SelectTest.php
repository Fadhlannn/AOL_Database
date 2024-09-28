<h2> Reserves </h2><br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "part";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("connaction failed:". $conn->connect_error);
}

$sql ="select * from reserves";
$result = $conn->query($sql);
?>

<table border="1", cellspacing = "1" ,cellpaddin="1">
    <tr>
        <th>sid</th>
        <th> bid</th>
        <th> days </th>
    </tr>
<?php
if($result->num_rows > 0){
    while($row = $result ->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row ['sid']; ?> </td>
            <td><?php echo $row ['bid']; ?> </td>
            <td><?php echo $row ['days']; ?> </td>
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
<a href="http://localhost/labdata/homepage/RMenu.html">back</a>
<link rel="stylesheet" href="select.css">