<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('feedback',array('fed_id'=>$_REQUEST['delId']));
	header('location: viewSentFeedback.php?msg=rds');
	exit;
}
?>