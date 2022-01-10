

                  <?php
				      session_start();
					  error_reporting(0);
						require_once('connect.php');
						$msg='';
						
						if(isset($_POST['save']))
						{
							$time=time()-30;
                         $ip_address=getIpAddr();
                   // Getting total count of hits on the basis of IP
                    $query=mysqli_query($server,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
                   $check_login_row=mysqli_fetch_assoc($query);
              $total_count=$check_login_row['total_count'];
               //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
          if($total_count==5){
            $msg="To many failed login attempts. Please login after 30 sec";
                   }
				   else
				   {
					        $uname=$_POST['uname'];
							$pword=md5($_POST['pword']);
							$role=$_POST['role'];
							
							if($uname=="")
							{ 
						echo'<script>alert("Please enter valid username")</script>';
						  //$error="<br><span class=error>Please enter a username</span><br><br>";
						}
							elseif($pword=="")
							{
							echo'<script>alert("Please enter correct password")</script>';	
							//$error="<br><span class=error>Please enter the password</span><br><br>";
							}
							elseif($role=="")
							{ 
							echo'<script>alert("Please enter defined role")</script>';
							//$error="<br><span class=error>Please enter the user role</span><br><br>"; 
							}
							else
							{
								$result=mysqli_query($server,"SELECT * FROM users WHERE uname='$uname' AND pword='$pword' AND role='$role'");
								if(mysqli_num_rows($result))
								{ 
									$row=mysqli_fetch_array($result);
									
									$_SESSION['user_id']=$row['user_id'];
									$_SESSION['name']=$row['name'];
									$_SESSION['uname']=$row['uname'];
									$_SESSION['pword']=$row['pword'];
									$_SESSION['role']=$row['role'];
									
									$id=$_SESSION['user_id'];
									if($_POST['role']=="Admin")
									{
									mysqli_query($server,"delete from loginlogs where IpAddress='$ip_address'");	
									mysqli_query($server,"INSERT INTO loginlogs (user_id)VALUES ('$id')");
									Redirect('AdminHome.php');
									} 
									if($_POST['role']=="Liaison officer")
									{
									mysqli_query($server,"delete from loginlogs where IpAddress='$ip_address'");
									mysqli_query($server,"INSERT INTO loginlogs (user_id)VALUES ('$id')");
                                    $user_id=$_SESSION['user_id'];
	                                $username=$_SESSION['uname'];
	                                $password=$_SESSION['pword'];
	                                $role=$_SESSION['role'];
	                               date_default_timezone_set("Africa/Addis_Ababa");
                                   $ldate=date( 'Y-m-d h:i:s A', time () );
	                                 $name=$_SESSION['name'];
									 $creationdate = date( 'Y-m-d');
	                              mysqli_query($server,"INSERT INTO userlog (user_id,username,name,password,role,loginTime,creationdate) 
	                              VALUES ('$user_id','$username','$name','$password','$role','$ldate','$creationdate')");									
									Redirect('dashboard.php');
									} 
									if($_POST['role']=="Physician")
									{
									mysqli_query($server,"delete from loginlogs where IpAddress='$ip_address'");
                                    mysqli_query($server,"INSERT INTO loginlogs (user_id)VALUES ('$id')");									
									$user_id=$_SESSION['user_id'];
	                                $username=$_SESSION['uname'];
	                                $password=$_SESSION['pword'];
	                                $role=$_SESSION['role'];
	                               //$loginDate=date("Y/m/d"); 
	                               //$loginTime=date("h:i:sa");
	                                $name=$_SESSION['name'];
	                                mysqli_query($server,"INSERT INTO userlog (user_id,username,name,password,role) 
	                                VALUES ('$user_id','$username','$name','$password','$role')");
									Redirect('physicianhomepage.php');
									} 
									if($_POST['role']=="HMIS focal person")
									{
									mysqli_query($server,"delete from loginlogs where IpAddress='$ip_address'");
									mysqli_query($server,"INSERT INTO loginlogs (user_id)VALUES ('$id')");
									$user_id=$_SESSION['user_id'];
	                                $username=$_SESSION['uname'];
	                                $password=$_SESSION['pword'];
	                                $role=$_SESSION['role'];
	                               //$loginDate=date("Y/m/d"); 
	                               //$loginTime=date("h:i:sa");
	                               $name=$_SESSION['name'];
	                               mysqli_query($server,"INSERT INTO userlog (user_id,username,name,password,role) 
	                        VALUES ('$user_id','$username','$name','$password','$role')");	
									Redirect('Report.php');
									} 
									
								}
								else{
            $total_count++;
            $rem_attm=5-$total_count;
             if($rem_attm==0){
          $msg="To many failed login attempts. Please login after 30 sec";

         }
		 else
		 {
        $msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
           }
          $try_time=time();
          mysqli_query($server,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
             }
							}
							
						}
						}
function getIpAddr(){
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
$ipAddr=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ipAddr=$_SERVER['REMOTE_ADDR'];
}
return $ipAddr;
}		
						
						
					?>




<html>
    <head>

<script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
</script>

	
	
	<title>LIAISON</title>
<link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
<link rel="stylesheet" href="styles.css">

<script src="include/login.js"></script>



		<style>
   

	
   
      
    .avatar {
        width: 15%;
        border-radius: 20%;
	
    }


	
    /*set styles for span and cancel button on small screens*/
    
	body {
  background-image: url('image/U2.JFIF');
   background-size: cover;
   background-color:black;
  
  
}

input[type=button], input[type=submit], input[type=reset] {
  background-color:green;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

form {
background-color :white;
color: black;
}

body {  
  border-color: black;  
  border-width: 10px;  
  border-style: inset;  
  }

  
.nav{
width:100%;
margin-top:0px;
}
/* Add a black background color to the top navigation */
.topnav {

  background-color: black;
  overflow: hidden;
   width:100%;
  margin-top:-3px;
  height:40px;
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
.background{
	margin-left:15px;
	
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
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   
         <a href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp     
         <a href="about us.php">DEVELOPERS</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		
		   
		 <a href="Help.php">HELP</a>&nbsp
        </div>    



<div class="background">

<br>
  
    <center>
                <div>
                <form method="post"  class="border shadow p-3 rounded"  style="width: 450px ;">
				
             <img src="image/key.jpg" alt="Avatar" class="avatar" style="width: 90px ;">
              
	               <p><label><b>Username:</b></label>
				   <input type="text" id="usrname" name="uname" class="text-long"  required/></p>
					<span id="numloc"></span>
                            <p><label><b>&nbsp; &nbsp; Password:</b></label>
							<input type="password" id="psw" name="pword"
						pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and 
						lowercase letter, and at least 8 or more characters"	
						class="text-long" required/>
						<input type="checkbox" onclick="myFunction()">
						</p>

							<center>
                            <p><label><b>Role:</b></label>&nbsp &nbsp &nbsp &nbsp
							<select name="role" id="pet-select">
                           <option value=""><b>--------select-------------</b></option>
                           <option value="Admin">Admin</option>
                           <option value="Physician">Physician</option>
						   <option value="Liaison officer">Liaison officer</option>
                           <option value="HMIS focal person">HMIS focal person</option>
						</select>
						 </p>
						 </center>
						 <div>
						      <button type="submit"  name="save" class="btn btn-lg btn-info" style="margin-left: 5%;"/>Login</button>
							  <button type="reset"   name="cancel" class="btn btn-lg btn-info" style="margin-left: 30%;"/>Cancel</button>
						 </div>
						 <div id="result"><?php echo $msg?></div>
						 <br>
						 
						 <a href="forgot-password.php">
								<h4>Forgot Password ?</h4>
							</a>
							<a href="#">
               			
			<div id="google_translate_element"></div>
			<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							
</a>
							
			<div id="message">
  <h3>Password must contain the following:</h3>
           <p id="letter" class="invalid">At least one <b>small</b> letter</p>
           <p id="capital" class="invalid">At least one <b>capital</b> letter</p>
           <p id="number" class="invalid">At least one <b>number</b>(0-9)</p>
           <p id="length" class="invalid">Minimum  of <b>8 characters</b></p>
           </div>		
							
                    </form>
					

					
					
                    </center>
                        <br /><br />

						</div>
                </div>
				
	

				
             				
               
                   
				</body>
           </html>
		   
<script>

function myFunction() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



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
