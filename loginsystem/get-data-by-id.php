<?php


include 'mydbCon.php';

$sql = "SELECT * FROM users WHERE id='" . $_GET["id"] . "'"; // Fetch data from the table customers using id

$result=mysqli_query($dbCon,$sql);

$singleRow = mysqli_fetch_assoc($result);


?>