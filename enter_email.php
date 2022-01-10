
<!DOCTYPE html>

<?php
session_start();
require_once('connect.php');
if(isset($_POST['submit'])){
$cno=$_SESSION['userphone'];
$email=$_SESSION['useremail'];
$SID=$_POST['SID'];
$query=mysqli_query($server,"select * from  users where SID='$SID' 
AND useremail='$email' AND userphone='$cno'");
$row=mysqli_num_rows($query);
if($row>0){
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid security Id. Please try with valid security Id');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="include/main.css">
</head>
<body>
	<form class="login-form" action="enter_email.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<?php// include('messages.php'); ?>
		<div class="form-group">
			<label>Your Security Id</label>
			<input type="number" name="SID">
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="login-btn">Submit</button>
		</div>
	</form>
</body>
</html>