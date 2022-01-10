
<?php
session_start();
$id=$_SESSION['user_id'];
include_once('connect.php');
date_default_timezone_set("Africa/Addis_Ababa");
$ldate=date( 'Y-m-d h:i:s A', time () );
mysqli_query($server,"UPDATE userlog  SET 
logoutTime = '$ldate' WHERE user_id = '".$_SESSION['user_id']."' ORDER BY id DESC LIMIT 1");

unset($_SESSION['user_id']);
unset($_SESSION['name']);

Redirect('index.php');
?>