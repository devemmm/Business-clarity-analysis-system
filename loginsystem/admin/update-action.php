<?php
// Include database connection file
require_once "db.php";
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE requirement set  bcategory='" . $_POST['bcategory'] . "', location='" . $_POST['location'] . "', budget='" . $_POST['budget'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
header('location: set.php?msg=rds');
}
$result = mysqli_query($conn,"SELECT * FROM requirement WHERE id='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Update The Requirements</h2>
</div>
<p>Please edit the input values and submit to update the record.</p>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<div class="form-group">
<label>Bcategory</label>
<input type="text" name="bcategory" class="form-control" value="<?php echo $row["bcategory"]; ?>">
</div>
<div class="form-group ">
<label>Location</label>
<input type="text" name="location" class="form-control" value="<?php echo $row["location"]; ?>">
</div>
<div class="form-group ">
<label>Budget</label>
<input type="text" name="budget" class="form-control" value="<?php echo $row["budget"]; ?>">
</div>
<div class="form-group ">
<label>Ownership</label>
<input type="text" name="who" class="form-control" value="<?php echo $row["who"]; ?>">
</div>

<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
<input type="submit" class="btn btn-primary" value="Submit">
<a href="set.php" class="btn btn-default">Cancel</a>
</form>
</div>
</div>        
</div>
</div>
</body>
</html>