<?php session_start();
//include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard | Registration and Login System </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>


    
    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
    <body class="sb-nav-fixed" >

<?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
<?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">

<?php include_once('../config.php');?>




</head>

<body>

    
    <?php
    $condition  =   '';
    if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
        $condition  .=  ' AND username LIKE "%'.$_REQUEST['username'].'%" ';
    }
    if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
        $condition  .=  ' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
    }
    if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
        $condition  .=  ' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
    }
    if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

        $condition  .=  ' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

    }
    if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

        $condition  .=  ' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

    }
    if(isset($_REQUEST['bcategory']) and $_REQUEST['bcategory']!=""){
        $condition  .=  ' AND bcategory LIKE "%'.$_REQUEST['bcategory'].'%" ';
    }
    if(isset($_REQUEST['location']) and $_REQUEST['location']!=""){
        $condition  .=  ' AND location LIKE "%'.$_REQUEST['location'].'%" ';
    }
    if(isset($_REQUEST['budget']) and $_REQUEST['budget']!=""){
        $condition  .=  ' AND budget LIKE "%'.$_REQUEST['budget'].'%" ';
    }
    if(isset($_REQUEST['who']) and $_REQUEST['who']!=""){
        $condition  .=  ' AND who LIKE "%'.$_REQUEST['who'].'%" ';
    }
    if(isset($_REQUEST['bdescription']) and $_REQUEST['bdescription']!=""){
        $condition  .=  ' AND bdescription LIKE "%'.$_REQUEST['bdescription'].'%" ';
    }
    if(isset($_REQUEST['status']) and $_REQUEST['status']!=""){
        $condition  .=  ' AND status LIKE "%'.$_REQUEST['status'].'%" ';
    }
    
    $userData   =   $db->getAllRecords('users','*',$condition,'ORDER BY id DESC');
    ?>
    <div class="container">

        <!-- <h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">PHP CRUD in Bootstrap with search and pagination</a></h1> -->

        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Business</strong> <a href="add-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Business</a></div>
            <div class="card-body">
                <?php
                if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
                    echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
                }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
                    echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
                }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
                    echo    '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
                }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
                    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
                }
                ?>
                <div class="col-sm-12">
                    <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Business</h5>
                    <form method="get">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter user name">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_REQUEST['useremail'])?$_REQUEST['useremail']:''?>" placeholder="Enter user email">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>User Phone</label>
                                    <input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Enter user phone">
                                </div>
                            </div>
                            <!-- <div class="col-sm-4">

                                <div class="form-group" hidden>

                                    <label>Date</label>
                                    <div class="input-group">
                                        <input type="text" class="fromDate form-control hasDatepicker" name="df" id="df" value="" placeholder="Enter from date">
                                        <div class="input-group-prepend"><span class="input-group-text">-</span></div>
                                        <input type="text" class="toDate form-control hasDatepicker" name="dt" id="dt" value="" placeholder="Enter to date">
                                        <div class="input-group-append"><span class="input-group-text"><a href="javascript:;" onclick="$('#df,#dt').val('');"><i class="fa fa-fw fa-sync"></i></a></span></div>
                                    </div>

                                </div>

                            </div> -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div>
                                        <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                                        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        
        <div>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr class="bg-primary text-white">
                        <th hidden>Sr#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Budget</th>
                        <th>Ownership</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($userData)>0){
                        $s  =   '';
                        foreach($userData as $val){
                            $s++;
                    ?>
                    <tr>
                        <td hidden><?php echo $s;?></td>
                        <td><?php echo $val['username'];?></td>
                        <td><?php echo $val['useremail'];?></td>
                        <td><?php echo $val['userphone'];?></td>
                        <td align="center"><?php echo date('Y-m-d',strtotime($val['dt']));?></td>
                        <td><?php echo $val['bcategory'];?></td>
                        <td><?php echo $val['location'];?></td>
                        <td><?php echo $val['budget'];?></td>
                        <td><?php echo $val['who'];?></td>
                        <td><?php echo $val['bdescription'];?></td>
                        <td><?php echo $val['status'];?></td>
                        <td align="">
                            <a href="edit-usersadmin.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i></a> | 
                            <a href="deleteadmin.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i></a>
                  
                  <!--  Aprovin/declining -->


                    </tr>
                    <?php 
                        }
                    }else{
                    ?>
                    <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
                    <?php } ?>
        </tbody>
        </table>
        </div> <!--/.col-sm-12-->
        </div>
<?php  

// $con=mysqli_connect("localhost", "root", "","crud") or die("cant connect");
// @$i=$_POST['id'];

// @$a=$_POST['username'];
// @$b=$_POST['useremail'];
// @$c=$_POST['userphone'];
// @$d=$_POST['bcategory'];
// @$e=$_POST['bdescription'];  
// @$f=$_POST['status'];  

// if(@$_POST['submit'])  
// {  
// echo"INSERT INTO users(id,username,usermail,userphone,bcategory,bdescription,status) VALUES('','','','','','$f') WHERE ";  
// echo "Your Data Inserted";  
// //mysql_query($s);  
// }  
?>

<!-- <form method="post">

    <input type="text" name="username" hidden/>
    <input type="text" name="useremail" hidden/>
    <input type="text" name="userphone" hidden/>
    <input type="text" name="bcategory" hidden/>
    <input type="text" name="bdescription" hidden/>

    <input type="radio" name="status" value="aproved"/>APROVE
    <input type="radio" name="status" value="rejected"/>REJECT
    <input type="submit" name="submit" value="Submit"/>
</form> -->






    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
    <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
    <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            jQuery(function($){
                  var input = $('[type=tel]')
                  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
                  input.bind('country.mobilePhoneNumber', function(e, country) {
                    $('.country').text(country || '')
                  })
             });
             
             //From, To date range start
            var dateFormat  =   "yy-mm-dd";
            fromDate    =   $(".fromDate").datepicker({
                changeMonth: true,
                dateFormat:'yy-mm-dd',
                numberOfMonths:2
            })
            .on("change", function(){
                toDate.datepicker("option", "minDate", getDate(this));
            }),
            toDate  =   $(".toDate").datepicker({
                changeMonth: true,
                dateFormat:'yy-mm-dd',
                numberOfMonths:2
            })
            .on("change", function() {
                fromDate.datepicker("option", "maxDate", getDate(this));
            });
            
            
            function getDate(element){
                var date;
                try{
                    date = $.datepicker.parseDate(dateFormat,element.value);
                }catch(error){
                    date = null;
                }
                return date;
            }
            //From, To date range End here  
            
        });
    </script>
</body>
</html>








</main>
             <?php include_once('../includes/footer.php'); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
