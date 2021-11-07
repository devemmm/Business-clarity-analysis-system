<?php
include_once 'db.php';

   $message  = '';

if(isset($_POST['submit']))
{    
     $bcategory = $_POST['bcategory'];
     $location = $_POST['location'];
     $budget = $_POST['budget'];
     $who = $_POST['who'];
    // $bcategory = $_POST['bcategory'];
    // $bdescription = $_POST['bdescription'];
    // $avail = $_POST['avail'];
    // $destination = $_POST['destination'];
    // $paytype = $_POST['paytype'];
     $sql = "INSERT INTO requirement (bcategory,location,budget,who)
     VALUES ('$bcategory','$location','$budget','$who')";
 
     if (mysqli_query($conn,$sql)) {

        $message ='data inserted successfully';
        //echo "New record has been added successfully !";

      header("Location:set.php");  die();
     }

      else {
        //echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
     

}
?>