<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('userlog',array('id'=>$_REQUEST['delId']));
	header('location: user-logs.php?msg=rds');
	exit;
}
?>