<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('beds',array('totalBed'=>$_REQUEST['delId']));
	header('location: beds.php?msg=rds');
	exit;
}
?>