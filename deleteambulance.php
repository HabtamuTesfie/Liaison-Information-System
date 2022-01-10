<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('ambulance',array('slidenum'=>$_REQUEST['delId']));
	header('location: view ambulance.php?msg=rds');
	exit;
}
?>