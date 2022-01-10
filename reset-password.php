<?php
session_start();
error_reporting(0);
require_once('connect.php');
if(isset($_POST['change']))
{
$cno=$_SESSION['userphone'];
$email=$_SESSION['useremail'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($server,"update users set pword='$newpassword' where userphone='$cno' and useremail='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='home.php'</script>";
}

}


?>


<html>
    <head>
	<title>LIAISON</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/styles.css">

<script type="text/javascript">
function valid()
{
 if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordreset.password_again.focus();
return false;
}
return true;
}
</script>
		
		
<style>

body {  
  border-color: black;  
  border-width: 10px;  
  border-style: inset; 
background-image: url('image/U2.JFIF');
  background-size: cover; 
  }
  form {
background-color : black;
color: white;
}
.topnav {

  background-color: black;
  overflow: hidden;
  margin-top:0;
}
.topnav a {
  float: top;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
 
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}  

</style>

</head>
<body>
     
<div class="topnav">
       <a class="active" href="index.php">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp
        <a href="#"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp   
		<a href="services.php">SERVICES</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
         <a href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  		  
         <a href="about us.php">ABOUT US</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  
		 <a href="#">HELP</a>&nbsp
		  
		  
        </div> 
	 
	 
	 
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2>Liaison Information System</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								User Reset Password
							</legend>
							<p>
								Please set your new password.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>

<div class="form-group">
<label><b>Enter New Password</b></label>
<span class="input-icon">
<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
<i class="fa fa-lock"></i> </span>
</div>
	

<div class="form-group">
<label><b>Confirm Password</b></label>
<span class="input-icon">
<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
<i class="fa fa-lock"></i> </span>
</div>
							

							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="change">
									Change <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Already have an account? 
								<a href="home.php">
									Log-in
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>
			
				</div>

			</div>
		</div>
		
		</body>
	<!-- end: BODY -->
</html>