<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('requestreferral',array('fed_id '=>$_REQUEST['delId']));
	header('location: viewRequestReferral.php?msg=rds');
	exit;
}
?>