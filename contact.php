<?php
	
	require_once('connect.php');
	
		$error="";
		$msg="<br><span id=msg>Message sent Successfully!!!</span><br><br>";
		//require_once('header.php');
	
	
?>


<html>
    <head>
	<title>LIAISON</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
<link rel="stylesheet" href="include/style.css">





		<style>
   

	.imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }
    /*set image properties*/
      
    img.avatar {
        width: 20%;
        border-radius: 30%;
    }


	.psw {
        float: right;
       
    }
    /*set styles for span and cancel button on small screens*/
      
    @media screen and (max-width: 300px) {
        .psw {
            display: block;
            
			
          
        }
        .cancelbtn {
            float: left;
        }

        .cancelbtn {
			display: block;
           
			
		 }
    }
	body {
  
}

input[type=button], input[type=submit], input[type=reset] {
  background-color:black;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

form {
background-color : silver;

}

body {  
  border-color: black;  
  border-width: 10px;  
  border-style: inset; 
 background-color: white;   
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
.hab{

color:black;
} 
.no{

	color:black;
} 


</style>

</head>
<body>
      <div class="topnav">
       <a  href="index.php">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp
        <a href="#"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
		<a href="services.php">ABOUT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp 
         <a class="active" href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp 
         <a href="about us.php">DEVELOPERS</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp 
		 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		 <a href="Help.php">HELP</a>
		 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		
       </div>



<?php
						if(isset($_POST['save']))
						{
							//$MRN=trim($_POST['MRN']);
							$name=trim($_POST['name']);
							$useremail=trim($_POST['useremail']);
							$userphone=$_POST['userphone'];
							$role=trim($_POST['role']);
							
				
				$in_ch=mysqli_query($server,"INSERT INTO contact (name,useremail,userphone,role) 
				VALUES ('$name','$useremail','$userphone','$role')");
				
				
				
							
	if($in_ch==1)  
    {  
      echo $msg;  
    }  
   else  
    {  
     echo $error;  
    }  
	} 
					?>
<div id="container">
<br><br><br><br>

<div id="wrapper">

<div id="contact_form_div">
 <p id="contact_label">CONTACT  FORM</p>
 <form method="post" action="">
  <p><input type="text" name="name" placeholder="Enter Name"></p>
  <p><input type="text" name="useremail" placeholder="Enter Email"></p>
  <p><input type="text" name="userphone" placeholder="Enter Contact No"></p>
  <p><textarea name="role" placeholder="Enter Message"></textarea></p>
  <p><input type="submit" name="save" value="SUBMIT"></p>
 </form>
</div>

</div> 
                  </div>	
				</body>
</html>
