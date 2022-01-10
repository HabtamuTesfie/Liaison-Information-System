<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('appointment',array('App_id'=>$_REQUEST['delId']));
	header('location: viewappointment.php?msg=rds');
	exit;
}
?>