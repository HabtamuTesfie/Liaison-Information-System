<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('admission',array('pat_id'=>$_REQUEST['delId']));
	header('location: admission.php?msg=rds');
	exit;
}
?>