<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('dischargenotification',array('comment_id'=>$_REQUEST['delId']));
	header('location: Notify.php?msg=rds');
	exit;
}
?>