 
 <?php
	session_start();
	error_reporting(0);
	include_once('config.php');
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>

 <?php 


if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	$role=trim($_REQUEST['role']);
	$uname=trim($_REQUEST['uname']);
	$username="";
	$admin="";
	$query =mysqli_query($server,"SELECT * FROM users WHERE role  = 'Admin'"); 
			while($row=mysqli_fetch_row($query))
						{
					$admin=$row[4];
					
		                }
		$query1 =mysqli_query($server,"SELECT * FROM users WHERE uname  = '$uname'"); 
			while($row=mysqli_fetch_row($query1))
						{
					$username=$row[2];
		                }				
						
	if($role==$admin)
	{
	echo'<script>alert(" You can not create more than one system adminstrator in this sytem!!!")</script>'; 	
	}
  elseif($uname==$username)
	{
	echo'<script>alert(" Account with this username already registered!!!")</script>'; 	
	}		
	else
	{
	
	if($uname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}if($name==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}
	
	elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	elseif($pword==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	elseif($role==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('users','user_id');
		$data	=	array(
						'uname'=>$uname,
						'name'=>$name,
						'useremail'=>$useremail,
						'userphone'=>$userphone,
						'pword'=>md5($pword),
						'role'=>$role,
						'SID'=>rand(1000,9999),
					);
					
		$insert	=	$db->insert('users',$data);
		if($insert){
			
			header('location:Admin.php?msg=ras');
			exit;
		}else{
			header('location:Admin.php?msg=rna');
			exit;
		}
	}
}}
?>

<!doctype html>

<html lang="en-U">

<head>
<title>add user</title>
	       <meta charset="UTF-8">

	      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
          <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
		  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/fontawesome.min.css">
		  
		  
		  
		  <style>
 .vertical-nav {
  min-width: 17rem;
  width: 17rem;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;

}

.page-content {
  width: calc(100% - 17rem);
  margin-left: 17rem;
  transition: all 0.4s;
}

/* for toggle behavior */

#sidebar.active {
  margin-left: -17rem;
}

#content.active {
  width: 100%;
  margin: 0;
}

@media (max-width: 768px) {
  #sidebar {
    margin-left: -17rem;

	
  }
  #sidebar.active {
    margin-left: 0;
  }
  #content {
    width: 100%;
    margin: 0;
  }
  #content.active {
    margin-left: 17rem;
    width: calc(100% - 17rem);
  }
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
 
  min-height: 100vh;
  overflow-x: hidden;
  background-color:#F0FFFF;
}

.separator {
  margin: 3rem 0;
  border-bottom: 1px dashed #fff;
}

.text-uppercase {
  letter-spacing: 0.1em;
}

.text-gray {
  color: #aaa;
}





.nav{
width:100%;
margin-top:0px;


}
/* Add a black background color to the top navigation */
.topnav {
  background-color: black;
  color:white;
  overflow: hidden;
  margin-left:90px;
   position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%;
 
}

/* Style the links inside the navigation bar */
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
.card{
	margin-left:163px;
	 background-color:#F0FFFF;
	 color:black;
	
}
::placeholder {
  color: black;
  font-size: 1em;
}



#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}



input {
color: #900;
text-decoration: none;
}

input:hover {
color: red;
position: relative;
}

input[title]:hover:after {
content: attr(title);
padding: 4px 8px;
color: red;
position: absolute;
left: 0;
top: 100%;
white-space: nowrap;
z-index: 20px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-box-shadow: 0px 0px 4px #222;
-webkit-box-shadow: 0px 0px 4px #222;
box-shadow: 0px 0px 4px #222;
background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #eeeeee),color-stop(1, #cccccc));
background-image: -webkit-linear-gradient(top, #eeeeee, #cccccc);
background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
background-image: -ms-linear-gradient(top, #eeeeee, #cccccc);
background-image: -o-linear-gradient(top, #eeeeee, #cccccc);
}
	
	
.title-message{
  visibility: hidden;
  padding: 10px;
  border: solid 1px #f9f9f9;
  box-shadow: 3px 3px 3px #1a1a1a;
}
	
	</style>

</head>



<body>

<div class="topnav">
     <center><span><h5><b>You Are Logged As <?php echo $_SESSION['role']; ?>!!!</b></h5></span></center>
 </div>



<div class="habt"> 
<div class="vertical-nav bg-light" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="image/ma.JFIF" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">ADMIN</h4>
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>

  <ul class="nav flex-column bg-light mb-0">
    <li class="nav-item">
      <a href="AdminHome.php" class="nav-link text-dark font-italic">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
				
               <b>HOME</b>
            </a>
    </li>
  
  
    <li class="nav-item">
      <a href="Admin.php" class="nav-link text-dark font-italic">
                <i class="fa fa-user mr-3 text-secondary fa-fw"></i>
				
               <b> MANAGE USER</b>
            </a>
    </li>
	
	<li class="nav-item">
      <a href="categories.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book-medical mr-3 text-primary fa-fw"></i>
				
               <b>DEPARTMENTS</b>
            </a>
    </li>
	
	
    <li class="nav-item">
      <a href="user-logs.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                <b>USER LOGS</b>
            </a>
      </li>
    </ul>

  <br><br><br><br><br><br><br>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">
  <a href="logout.php" class="nav-link text-dark font-italic"> <i class="fa fa-power-off"></i>  <b>Logout</b> </a></p>

  <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  
  
  </div>
</div>
<!-- End vertical navbar -->

	

	
	
	
   	
	<div class="container">

		 <center><h3 align="center" >User Registration Form</h3></center>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-header"> 
			<a href="Admin.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>
		  </div>

			<div class="card-body">

	

				<div class="col-sm-6">
          <div class="hab">
					  <form method="post" name='registration' id="form-register" class="form-horizontal" role="form">
								
						
			<div class="row">
							<div class="col-sm-6 form-group">
								<big><label style="color:black;">Username<span class="text-danger">*</span></label></big>
								<input type="text" name="uname" id="Name" class="form-control" 
				                title="Username must only contain alphabets" required>
							</div>
							<div class="col-sm-6 form-group">
								<big><label style="color:black;"> Full Name<span class="text-danger">*</span></label></big>
								<input type="text" name="name" id="Name"
                               maxlength="85" title="Name must only contain alphabets" minlength="3"
								class="form-control"  required>
							</div>
				</div>	
				<br>
				
				<div class="row">
							<div class="col-sm-6 form-group">
								<big><label style="color:black;">User Email Account <span class="text-danger">*</span></label></big>
								<input type="email" name="useremail" id="useremail"
						     pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
							class="form-control"  required>
							</div>
							<div class="col-sm-6 form-group">
								<big><label style="color:black;">User Phone Number<span class="text-danger">*</span></label></big>
								<input type="tel" title="User phone must have 10 or 13 character length" class="tel form-control"
								name="userphone"  maxlength="13" id="phone" onkeypress="return IsNumeric(event);"
                                ondrop="return false;" onpaste="return false; "pattern=".{10,}" required value="+251"  />
					  <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
						   </div>
				</div>	
				<br>
				
				
				
				<div class="row">
							<div class="col-sm-6 form-group">
								 <big><label style="color:black;">Password<span class="text-danger">*</span></label></big>
								<input type="password"  class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and 
						lowercase letter, and at least 8 or more characters"
						name="pword" id="psw"  ondrop="return false;" onpaste="return false;" required>
							<input type="checkbox" onclick="myFunction()">Show Password
							</div>
							<div class="col-sm-6 form-group">
								<big><label style="color:black;">Confirm Password<span class="text-danger">*</span></label></big>
								<input type="password" 
                                 class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and 
						lowercase letter, and at least 8 or more characters"
								id="confirm_password"  ondrop="return false;" onpaste="return false;" required>
							
							</div>
				</div>	
				<br>
				
				
				<div id="message">
        <h3>Password must contain the following:</h3>
           <p id="letter" class="invalid">At least one <b>small</b> letter</p>
           <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
           <p id="number" class="invalid">At least one <b>number</b>(between 0-9)</p>
           <p id="length" class="invalid">Minimum  of <b>8 characters</b></p>
           </div>
				
				
				
				
				
				
				
			<div class="form-group">

							<big><label style="color:black;">Role<span class="text-danger">*</span></label></big>

						<select name="role" id="pet-select" class="form-control" required="true">
                           <option  value=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select</b></option>
						   <option value="Physician">Physician</option>
						   <option value="Liaison officer">Liaison officer</option>
                           <option value="HMIS focal person">HMIS focal person</option>
						</select>

			</div>
				
				
						
            <center>
			
			
			
			
				<br>
						
                   <br> 
						<div class="form-group">

						<button type="submit" name="submit" value="submit" id="submit" 
						class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>

						</div>
						</center>
                   
				   
				   
				   
				   
					</form>
                </div>
				</div>

			</div>

		</div>

	</div>

</body>

</html>
        <script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script src="include/formvalidation.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script>




function myFunction() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



$(document).ready(function(){
  var old_title;
  $('.title-styled').on('mouseover', function(){
    old_title = $(this).attr('title');
    $('.title-message').html($(this).attr('title')).css('visibility', 'visible');
    
    $(this).attr('title', '');
  });
  
  $('.title-styled').on('mouseleave', function(){
    $(this).attr('title', old_title);
    $('.title-message').html('').css('visibility', 'hidden');
  });
  
});








function formValidation()
{
var MRN = document.registration.MRN;
var phone = document.registration.phone;

if(MRN_validation(MRN,5,7))
{
if(allLetter(name))
{
if(phone_validation(phone,10,14))
{
}
} 
}

return false;
}
 
function phone_validation(phone,mx,my)
{
var phone_len = phone.value.length;
if (phone_len == 0 || phone_len >= my || phone_len < mx)
{
alert("Phone number  should not be empty / length be between "+mx+" to "+my);
phone.focus();
return false;
}
return true;
}

function MRN_validation(MRN,mx,my)
{
var MRN_len = MRN.value.length;
if (MRN_len == 0 || MRN_len >= my || MRN_len < mx)
{
alert("MRN  should not be empty / length be between "+mx+" to "+my);
MRN.focus();
return false;
}
return true;
}


function ageValidation() 
{
     var x = document.getElementById("age").value;
     if (x < 1 || x > 100)
     {
            alert("You inserted an extreme or invalid age value.Are you sure this the correct age?")
     }
}


$(document).on('keypress', '#Name', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});



var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }








var myInput = document.getElementById("confirm_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>	
	
	
<script>
var password = document.getElementById("psw")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(psw.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

psw.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>












	
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
