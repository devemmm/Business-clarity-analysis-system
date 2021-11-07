<?php include_once('../config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit1']) and $_REQUEST['submit1']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($bcategory==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($bdescription==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($status==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'username'=>$username,
					'useremail'=>$useremail,
					'userphone'=>$userphone,
					//'dt'=>$dt,
					'location'=>$location,
					'budget'=>$budget,
					'who'=>$who,
					'bdescription'=>$bdescription,
					'status'=>$status,
					);
	$update	=	$db->update('users',$data,array('id'=>$editId));
	if($update){
		header('location: dashboard.php?msg=rus');
		exit;
	}else{
		header('location: allbusi.php?msg=rnu');
		exit;
	}
}
?>



<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP CRUD in Bootstrap with search and pagination</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
<!-- script for hidding form-->


<script type="text/javascript">
        function toggleVisibility(controlId) 
       {
            var control = document.getElementById(controlId);
            if(control.style.visibility == "visible" || control.style.visibility == "")
                control.style.visibility = "hidden";
            else
                 control.style.visibility = "visible";
         }
    </script>

    <script type="text/javascript">
    function toggleTable(button)
    {
       if(button.value == "Show")
        {
            button.value = "Hide";
            document.getElementById("table1").style.visibility = "visible";
       }
       else
       {
            button.value = "Show";
            document.getElementById("table1").style.visibility = "hidden";
       }
    }
</script>




<!-- ending the script-->



</head>

<body style="background-color:steelblue;">
	
	
   	<div class="container">
		


		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Update || Aprove</strong> <a href="browse-usersadmin.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Business</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
				<!--div for the chart pie-->
					<div id="chart_div" class="bg-dark"></div>

					<!-- <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5> -->
					<br><br>
					<input type="button" class="btn btn-primary" name="btnShowHide" value="Result/Response" onclick="toggleVisibility('TextBox1');"/>




                      
					<form method="post" id="TextBox1">
						<div class="form-group">
							<label>User Name <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" required />
						</div>
						<div class="form-group">
							<label>User Email <span class="text-danger">*</span></label>
							<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['useremail']; ?>" required />
						</div>
						<div class="form-group">
							<label>User Phone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" maxlength="12" class="form-control" value="<?php echo $row[0]['userphone']; ?>" required />
						</div>
                     
                     <div class="form-group">
							<label>Business Category <span class="text-danger">*</span></label>
							<input type="tel" name="bcategory" id="bcategory" maxlength="12" class="form-control" value="<?php echo $row[0]['bcategory']; ?>" required />
						</div>

						<div class="form-group">
							<label>Location <span class="text-danger">*</span></label>
							<input type="tel" name="location" id="location" maxlength="12" class="form-control" value="<?php echo $row[0]['location']; ?>" required />
						</div>

						<div class="form-group">
							<label>Budget <span class="text-danger">*</span></label>
							<input type="tel" name="budget" id="budget" maxlength="12" class="form-control" value="<?php echo $row[0]['budget']; ?>" required />
						</div>



						<div class="form-group">
							<label>Business Description</label>
							<input type="text" name="bdescription"  id="bdescription" class="form-control" value="<?php echo $row[0]['bdescription']; ?>" required />
							
						</div>

                     <!-- <div class="form-group">
							<input type="hidden" name="editId" id="editId" value=">">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update info</button>
						</div> -->



<div class="form-group">

<label>Choose <span class="text-danger">*</span></label>

<input type="text"  name="status" maxlength="12" class="form-control" value="<?php echo $row[0]['status']; ?> ">
</div>
<br><br>


						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit1" value="submit1" id="submit1" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update info</button>
						</div>

		</form>



<!-- about the chart -->


<?Php
require "configp.php";// Database connection

if($stmt = $connection->query("SELECT location, budget  FROM requirement")){

  //echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table hidden>
<tr> <th>location</th><th>budget</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>

<!-- 

<br><br>

<a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'location');
        data.addColumn('number', 'budget');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Analysis Results',
                      'width':500,
                       'height':200,
                       legend:'left',
                       backgroundColor:'steelblue',
			   is3D:true,};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>






<!-- end of the chart -->










    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>
