<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('referral',array('ref_id'=>$_REQUEST['delId']));
	header('location: view referralin.php?msg=rds');
	exit;
}
?>