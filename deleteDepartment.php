

<?php 
include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('medical_specialty',array('id'=>$_REQUEST['delId']));
	header('location: categories.php?msg=rds');
	exit;
}
?>
