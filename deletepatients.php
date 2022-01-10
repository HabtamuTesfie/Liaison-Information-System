<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('patients',array('MRN'=>$_REQUEST['delId']));
	header('location: patients.php?msg=rds');
	exit;
}
?>