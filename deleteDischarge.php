<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('discharge',array('dis_id'=>$_REQUEST['delId']));
	header('location: view discharge.php?msg=rds');
	exit;
}
?>