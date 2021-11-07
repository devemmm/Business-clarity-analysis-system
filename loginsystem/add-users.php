<?php
include_once 'db.php';

   $message  = '';

if(isset($_POST['submit']))
{    
     $username = $_POST['username'];
     $useremail = $_POST['useremail'];
     $userphone = $_POST['userphone'];
    // $dt = $_POST['dt'];
     $bcategory = $_POST['bcategory'];
     $location = $_POST['location'];
     $budget = $_POST['budget'];
     $who = $_POST['who'];
     $bdescription = $_POST['bdescription'];
    // $avail = $_POST['avail'];
    // $destination = $_POST['destination'];
    // $paytype = $_POST['paytype'];
     $sql = "INSERT INTO users (username,useremail,userphone,bcategory,location,budget,who,bdescription)
     VALUES ('$username','$useremail','$userphone','$bcategory','$location','$budget','$who','$bdescription')";
 
     if (mysqli_query($conn,$sql)) {

        $message ='data inserted successfully';
        //echo "New record has been added successfully !";
     }

      else {
        //echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
     

}
?>

<!doctype html>

<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>CRUD</title>

    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">






 </head>
<body >
<div class="container">
<div class="card">
<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Business</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Business</a></div>
		<div class="card-body">
		<div class="col-lm-4">
				

    </div></div>

				<div class="col-sm-6" style="">

					<h3 class="card-title"><b class="bg-warning">Fill <span class="text-light" >*All Required Record!</b></h3>

					<form method="post" action="" class="">
                           <div class="row">
						<div class="col-sm-6">

							<label>User Name <span class="text-danger">*</span></label>

							<input type="text" name="username" id="username" class="form-control" placeholder="Enter user name" required>

						</div>

						<div class="col-sm-6">

							<label>User Email <span class="text-danger">*</span></label>

							<input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter user email" required>

						</div>

						<div class="col-sm-6">

							<label>User Phone <span class="text-danger">*</span></label>

							<input type="tel"  title="Accept US Number format (888) 888-8888" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter user phone" required>

						</div>
<div class="col-sm-6">
<label>Business <span class="text-danger">*</span></label>

<select name="bcategory" class="form-control" aria-label="Default select example">

<option value="" selected hidden>Select Caegory</option>

<!-- <option value=""></option> -->
<?php 

$connn=mysqli_connect("localhost", "root", "","loginsystem") or die("cant connect");

$query = mysqli_query($connn, "SELECT DISTINCT bcategory FROM requirement");
$query_display = mysqli_query($connn,"SELECT * FROM requirement");
while ($row = mysqli_fetch_array($query)){
echo "<option value='" . $row['bcategory']."'> ". $row['bcategory'] . "</option>";
}
?>


</select>
</div>


<div class="col-sm-6">
<label>Location <span class="text-danger">*</span></label>

<select name="location" class="form-control" aria-label="Default select example">

<option value="" selected hidden>Select Country</option>

<!-- <option value=""></option> -->
<?php 

$connn=mysqli_connect("localhost", "root", "","loginsystem") or die("cant connect");

$query = mysqli_query($connn, "SELECT DISTINCT location FROM requirement");
$query_display = mysqli_query($connn,"SELECT * FROM requirement");
while ($row = mysqli_fetch_array($query)){
echo "<option value='" . $row['location']."'> ". $row['location'] . "</option>";
}
?>


</select>
</div>


<div class="col-sm-6">
<label>Budget <span class="text-danger">*</span></label>

<select name="budget" class="form-control" aria-label="Default select example">

<option value="" selected hidden>Select Budget</option>

<!-- <option value=""></option> -->
<?php 

$connn=mysqli_connect("localhost", "root", "","loginsystem") or die("cant connect");

$query = mysqli_query($connn, "SELECT DISTINCT budget FROM requirement");
$query_display = mysqli_query($connn,"SELECT * FROM requirement");
while ($row = mysqli_fetch_array($query)){
echo "<option value='" . $row['budget']."'> ". $row['budget'] . "</option>";
}
?>


</select>
</div>


<div class="col-sm-6">
<label>Business Owner <span class="text-danger">*</span></label>

<select name="who" class="form-control" aria-label="Default select example">

<option value="" selected hidden>Select Owner</option>

<!-- <option value=""></option> -->
<?php 

$connn=mysqli_connect("localhost", "root", "","loginsystem") or die("cant connect");

$query = mysqli_query($connn, "SELECT DISTINCT who FROM requirement");
$query_display = mysqli_query($connn,"SELECT * FROM requirement");
while ($row = mysqli_fetch_array($query)){
echo "<option value='" . $row['who']."'> ". $row['who'] . "</option>";
}
?>


</select>
</div>

        <div class="col-sm-6">
		<label>Business Description <span class="text-danger">*</span></label>

    	<input type="text" class="form-control" rows="5" id="comment" name="bdescription">

						</div>
					</div><br><br>
       <div class="form-group">
		<button type="submit"
		name="submit" value="submit" id="submit"
		class="btn btn-primary"
		onclick="return confirm('Are you sure?')">
		<i class="fa fa-fw fa-plus-circle"></i> Add Business</button>

						</div>
					</div>
					</form>
				</div>
			</div>
			
        </div>

    

	<div class="container my-4">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- demo left sidebar -->
	<ins class="adsbygoogle"

			 style="display:block"

			 data-ad-client="ca-pub-6724419004010752"

			 data-ad-slot="7706376079"

			 data-ad-format="auto"

			 data-full-width-responsive="true"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>


<script>document.write(new Date().getFullYear());</script>
</body>
</html>
