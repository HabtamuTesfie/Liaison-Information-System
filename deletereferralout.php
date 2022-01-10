<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('referralOut',array('refout_id'=>$_REQUEST['delId']));
	header('location: view referralout.php?msg=rds');
	exit;
}
?>