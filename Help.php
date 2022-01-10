

                  <?php
				      session_start();
						require_once('connect.php');
				  ?>




<html>
    <head>



	
	
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
  
  
  
}



body {
  border-right: 10px solid black;	
  border-left: 10px solid black;
  border-style: inset;
  margin-top:0px; 
  background-color: #9FE2BF;  
  }

  
.nav{
width:100%;
margin-top:0px;

}
/* Add a black background color to the top navigation */
.topnav {

  background-color: black;
  overflow: hidden;
  position:fixed;
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
.left{
	margin-left:120px;
}
h3{
	color:red;
}
p,ol,li {
  font-size: 25px;
}
</style>

</head>
<body>
      <div class="topnav">
       <a  href="index.php">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
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
		
		   
		 <a class="active" href="Help.php">HELP</a>&nbsp
        </div>  
<br><br><br>		
<div class="left">
<h3><u>Homepage and Login page Details</u></h3>
<p>1)Open the system and click login.</p>
<img src="image/hom.png" style=" width="600px" height="400px" alt="alt text"> 
<p>2)After click login the following login form will be disply.This is the main system 
login form for to access the system.<br>Enter your login details that provided by system adminstrator
and select your role.</p> 
<p> 
  <ol>
   <li>If you have not system login account,please contact system admin.<br></li>
   <li>If you forget  password,click the forget password link and change your password.<br></li> 
   <li>If you have system login account,Insert right login details and select your role.</li>
   </ol>
   </p>
<img src="image/log.png" style=" width="600px" height="400px" alt="alt text">
<br><br>
<h3><u>User Role</u></h3>
<h4>A) Admistrator(admin):-</h4><p>The admin has full control over the system. 
An admin has the right to register,update,delete and Inactivate a user’s account and
add and delete departments or medical speciality. 
For this, the admin has to set the physicians’s account under various hospital 
departments too.Also he/she has the right to view user logs which is that when users logged into the system and when they logout.
<br>So if you select the role Admin and click login you get the following page.
</p>
<img src="image/Admin.png" style=" width="600px" height="400px" alt="alt text">


<h4>B) Liaison Officer:-</h4><p>The liaison officer has the responsibility to 
register,update,search,view and delete,
admit,add bed,assign bed,unassign bed,add ambulance,assign ambulance,register referral
 in and out,discharge and view appointment of patients. 
<br>So if you select the role Liaison Officer and click login you get the following page.</p>
<img src="image/LO.png" style=" width="600px" height="400px" alt="alt text">
<h4>C) Physician:-</h4><p>The physician has the responsibilty add,update,view,search,
delete request referral,make appointment and response referral feedback. 
<br>So if you select the role Physician and click login you get the following page.</p>
<img src="image/phy.png" style=" width="600px" height="400px" alt="alt text">
<h4>D) HMIS Focal Person:-</h4><p>The HMIS focal person has the responsibility to generate different types of 
reports like service reports and diseases reports.
<br>So if you select the role HMIS Focal Person and click login you get the following page.
 </p>
 </div>                   
</body>
           </html>
		   
<script>

