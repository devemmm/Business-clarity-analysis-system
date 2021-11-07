<?php

//include_once('../include/Database.php');

$conn=mysqli_connect("localhost", "root", "","crud") or die("cant connect");
//$aprove = $_POST['status'];
//$reject = $_POST['status'];

if(isset($_POST['aprove'])) 
  $q = "UPDATE users SET status='APPROVED' WHERE bcategory='{$r['bcategory']}'";
elseif(isset($_POST['reject']))
  $q = "UPDATE users SET status='REJECTED' where bcategory='{$r['bcategory']}'";

//$res = mysqli_query($q);






?>

