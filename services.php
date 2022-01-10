<html>
    <head>
	<title>LIAISON</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="include/dist/css/bootstrap.min.css" />


<link href="boot/HOMEanimate.min.css" rel="stylesheet">
  <link href="boot/HOMEbootstrap.min.css" rel="stylesheet">
  <link href="boot/HOMEbootstrap-icons.css" rel="stylesheet">
  <link href="boot/HOMEboxicons.min.css" rel="stylesheet">
  <link href="boot/HOMEglightbox.min.css" rel="stylesheet">
  <link href="boot/HOMEswiper-bundle.min.css" rel="stylesheet">

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

body {  
  border-color: black;  
  border-width: 10px;  
  border-style: inset; 
     
  }

  
.nav{
width:100%;
margin-top:0px;
}

.hab{

color:black;
} 
.no{

	color:black;
} 
nav{
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
	margin-left:10px;
}
h3{
	color:red;
}
p,ol,li {
  font-size: 18px;
}
ol{
	margin-left:600px;
}
img{
width:25%;
height:100%;
margin-top:-50px;
	
}

</style>

</head>
<body>
  <div class="topnav">
        &nbsp 
       <a  href="index.php">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp
        <a href="#"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<a class="active" href="services.php" class="visit">ABOUT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
         <a href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
         <a href="about us.php">DEVELOPERS</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		 <a href="Help.php">HELP</a>&nbsp
 </div>  

<?php
	require_once('connect.php');
	$error="";
	?> 
<div class="left">
<br><br><br>
<center>
<h3>Web-Based Liaison Information System.  </h3></center>
<p style="width: 2000px;">
 <img src="image/AB.jpg" alt="AB" style="float: left;"> 
Liaison Information System is a web application for the hospital which manages
 different services and patients.<br>
The system functional performs the following activities.</P>
<ol>
   <li>Patient registration. </li>
   <li>Patient admission.</li>
   <li>Patient discharge.</li>
   <li>Patient bed assignation</li>
   <li>Patient referral in and out</li>
   <li>Patient ambulance assignation</li>
   <li>Patient appointment</li>
   <li>HMIS report generation </li>
 </ol>
 </div>

 
                  	
				</body>
</html>
