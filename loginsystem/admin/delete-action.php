<?php 
include_once('db.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('requirement',array('id'=>$_REQUEST['delId']));
	header('location: set.php?msg=rds');
	exit;
}
?>