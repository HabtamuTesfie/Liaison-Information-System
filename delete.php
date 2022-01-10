

<?php 
include_once('config.php');
require_once('connect.php');
error_reporting(0);
$user_id=$_REQUEST['delId'];
$query =mysqli_query($server,"SELECT * FROM patients WHERE user_id  = '". $user_id ."'"); 
                 if (mysqli_num_rows($query)>0) 
                {
echo'<script>alert("You can not delete users that have records on other page!!!")</script>'; 		
              
				}
				else{
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('users',array('user_id'=>$_REQUEST['delId']));
	header('location: Admin.php?msg=rds');
	exit;
	
	}
	}
				
		
				
?>
