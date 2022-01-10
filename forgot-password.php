<?php
session_start();
require_once('connect.php');
if(isset($_POST['submit'])){
$contactno=$_POST['userphone'];
$email=$_POST['useremail'];
$query=mysqli_query($server,"select user_id from  users where userphone='$contactno' and useremail='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['userphone']=$contactno;
$_SESSION['useremail']=$email;
header('location:enter_email.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


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
   width:100%;
  margin-top:-3px;
  height:40px;
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
		<a href="services.php">ABOUT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
         <a href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  		  
         <a href="about us.php">DEVELOPERS</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		 &nbsp &nbsp 
		  
		 <a href="#">HELP</a>&nbsp
		  
		  
        </div>    

      

<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								User Password Recovery
							</legend>
							<p>
								Please enter your  Contact number and Email to recover your password.<br />
					
							</p>

							<div class="form-group form-actions">
							<label><b>Phone Number:</b></label>
								<span class="input-icon">
									<input type="text" class="form-control" name="userphone" placeholder="Registred Contact Number">
									<i class="fa fa-lock"></i>
									 </span>
							</div>
                          <label><b>Email Adress:</b></label>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="useremail" placeholder="Registred Email">
									<i class="fa fa-user"></i> </span>
							</div>

							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Reset <i class="fa fa-arrow-circle-right"></i>
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
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Liaison</span>. <span>All rights reserved</span>
					</div>
			
				</div>

			</div>
		</div>
				
				
				
				 
				</body>
</html>