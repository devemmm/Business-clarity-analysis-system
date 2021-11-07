<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>CRUD</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
                alert("value in js "+inputValue);

                //Ajax for calling php function
                $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });
        });
        </script>

<!-- <style type="text/css">
.bs-example{
margin: 20px;
}
</style> -->
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>



</head>
<body>
	
   	<div class="container">
		<!-- <h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">PHP CRUD in Bootstrap 4 with search functionality</a></h1> -->
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>SET Requirements</strong>
			<a href="dashboard.php" class="float-right btn btn-dark btn-sm" style="color:yellow;">
			<i class="fa fa-home"></i> Back Home</a></div>
			<div class="card-body">

				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post" action="insert.php">
					

					<div class="form-group">
					<label>Business Category <span class="text-danger">*</span></label>
					<input type="text" 
					name="bcategory" 
					id="bcategory" 
					class="form-control" 
					placeholder="Enter Business Category" required>
					</div>

					<div class="form-group">
					<label>Business Location <span class="text-danger">*</span></label>
					<select id="myDropDown" class="form-control" name="location">
        <option value='' disabled selected>Select Location</option>
        <option value='Kigali'>Kigali</option>
        <option value='North'>Northern Province</option>
        <option value='South'>Southern Province</option>
        <option value='East'>Eastern Province</option>
        <option value='West'>Western Province</option>
               </select>
					</div>

					<div class="form-group">
					<label>Business Budget <span class="text-danger">*</span></label>
					<select id="myDropDown" class="form-control" name="budget">
        <option value='' disabled selected>Select Budget</option>
        <option value='1.000.000 rwf'>1.000.000 rwf</option>
        <option value='800.000 rwf'>800.000 rwf</option>
        <option value='600.000 rwf'>600.000 rwf</option>
        <option value='400.000 rwf'>400.000 rwf</option>
        <option value='100.000 rwf'>100.000 rwf</option>
               </select>
					</div>

					<div class="form-group">
					<label>Business Ownership <span class="text-danger">*</span></label>
					<select id="myDropDown" class="form-control" name="who">
        <option value='' disabled selected>Select Ownership</option>
        <option value='Owner'>Personal Ownership</option>
        <option value='joint-ownership'>joint-ownership</option>
        <option value='monopsony'>monopsony</option>
        <option value='sharing'>sharing</option>
        
               </select>
					</div>
        


				<div class="form-group">
				<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">
					<i class="fa fa-fw fa-plus-circle"></i> Set Requirements</button>
				</div>


    









	</form>
	</div>
    </div>
    </div>
	</div>



<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">REQUIREMENTS</h2>
</div>
<?php
include_once 'db.php';
$result = mysqli_query($conn,"SELECT * FROM requirement");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<td>Bcategory</td>
<td>Location</td>
<td>Budget</td>
<td>Ownership</td>
<td>Action</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["bcategory"]; ?></td>
<td><?php echo $row["location"]; ?></td>
<td><?php echo $row["budget"]; ?></td>
<td><?php echo $row["who"]; ?></td>

<td>
	<a class="btn btn-primary" href="update-action.php?userid=<?php echo $row["id"]; ?>">Update</a>
   <a class="btn btn-danger" href="delete-action.php?userid=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}
?>
</div>
</div>        
</div>
</div>







   </body>
</html>
