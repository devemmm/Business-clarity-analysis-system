<?php session_start();
include_once('includes/bro.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $userphone=$_POST['userphone'];
    $bcategory=$_POST['bcategory'];
    $location=$_POST['location'];
    $budget=$_POST['budget'];
    $who=$_POST['who'];
    $bdescription=$_POST['bdescription'];
    $status=$_POST['status'];
$userid=$_SESSION['id'];
    $msg=mysqli_query($con,"update users set username='$username',useremail='$useremail',userphone='$userphone',bcategory='$bcategory',location='$location',budget='$budget',who='$who',bdescription='$bdescription',status='$status' where id='$userid'");

if($msg)
{
    echo "<script>alert('RECORD updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";
}
}


    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><i class="fa fa-tasks" aria-hidden="true"></i>
<?php echo $result['username'];?><b style="color:orange"> 'Update-Business</b></h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>username</th>
                                       <td><input class="form-control" id="" name="username" type="text" value="<?php echo $result['username'];?>"></td>
                                   </tr>
                                   <tr>
                                       <th>useremail</th>
                                       <td><input class="form-control" id="" name="useremail" type="text" value="<?php echo $result['useremail'];?>"></td>
                                   </tr>
                                         <tr>
                                       <th>userphone.</th>
                                       <td colspan="3"><input class="form-control" id="" name="userphone" type="text" value="<?php echo $result['userphone'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10"></td>
                                   </tr>
                                   <tr>
                                       <th>bcategory.</th>
                                       <td colspan="3"><input class="form-control" id="" name="bcategory" type="text" value="<?php echo $result['bcategory'];?>"></td>
                                   </tr>
                                   <tr>
                                       <th>location</th>
                                       <td colspan="3"><input class="form-control" id="" name="location" type="text" value="<?php echo $result['location'];?>"></td>
                                   </tr>
                                   <tr>
                                       <th>budget</th>
                                       <td colspan="3"><input class="form-control" id="" name="budget" type="text" value="<?php echo $result['budget'];?>"></td>
                                   </tr>
                                   <tr>
                                       <th>who.</th>
                                       <td colspan="3"><input class="form-control" id="" name="who" type="text" value="<?php echo $result['who'];?>"></td>
                                   </tr>
                                   <tr>
                                       <th>bdescription.</th>
                                       <td colspan="3"><input class="form-control" id="" name="bdescription" type="text" value="<?php echo $result['bdescription'];?>"></td>
                                   </tr>
                                   <tr hidden>
                                       <th>status.</th>
                                       <td colspan="3"><input class="form-control" id="" name="status" type="text" value="<?php echo $result['status'];?>"></td>
                                   </tr>
                                   <br><br>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;">
                                        <button type="submit" class="btn btn-warning btn-block" name="update">
                                            <i class="fa fa-fw fa-edit"></i>Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
