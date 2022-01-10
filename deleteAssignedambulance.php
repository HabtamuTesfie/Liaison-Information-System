

<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('ambula',array('amb_id'=>$_REQUEST['delId']));
	header('location: Unassign-Ambulance.php?msg=rds');
	exit;
}
?>
