
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

  <!-- Template Main CSS File -->
  <link href="boot/HOMEstyle.css" rel="stylesheet">



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
  position:fixed;
  width:100%;  
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
.topnav a:visited {
  background: yellow;

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
p {
  color: green;
} 

</style>

</head>
<body>
<div class="topnav">
      &nbsp 
       <a class="active" href="index.php">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp
        <a href="#"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<a href="services.php">ABOUT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp
         <a href="contact.php">CONTACT</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
         <a href="about us.php">DEVELOPERS</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		 <a href="Help.php">HELP</a>&nbsp
        </div>    

<?php
	require_once('connect.php');
	$error="";
	?> 
 <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(image/go.jpg); background-repeat: no-repeat;background-color:black;  background-size: 100% 100%;"">
            <div class="carousel-container">
              <div class="carousel-content">
		<!--<center><img src="image/logo.png" alt="UoG logo"></center> -->
                <h2 class="animate__animated animate__fadeInDown"> WELL COME TO UNIVERSITY OF GONDAR COMPREHENSIVE SPECIALIZED HOSPITAL
	LIAISON INFORMATION SYSTEM</h2>
              <h4 style="color:white;">HELLO USERS THIS IS THE
				SOFTWARE HOMEPAGE; PLEASE CLICK LOGIN TO LOGGED INTO THE SYSTEM.</h4>
               <br>
<center><a href="home.php" class="float-right btn btn-success">
<h3 style="color:white;">LOGIN</h3></a> </center>

<a href="#">
               			
			<div id="google_translate_element"></div>
			<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							
</a>

              </div>
            </div>
          </div>
		  </div>
          </div>
</section>


				</body>
</html>
