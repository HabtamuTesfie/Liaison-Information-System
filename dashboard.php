<?php
	session_start();
	error_reporting(0);
	date_default_timezone_set("Africa/Addis_Ababa");
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
	
	}
?>

<?php
$date=date("y-m-d") ; 
				  	$result=mysqli_query($server,"SELECT COUNT(MRN) FROM patients where creationdate='$date' ");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(dis_id) FROM discharge where creationdate='$date'");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(pat_id) FROM admission where creationdate='$date'");
					$row3=mysqli_fetch_row($result3);
					
					 $result4=mysqli_query($server,"SELECT COUNT(ref_id) FROM referral where creationdate='$date'");
					 $row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(refout_id) FROM referralout where creationdate='$date' ");
					$row5=mysqli_fetch_row($result5);
					
				
				$result6=mysqli_query($server,"SELECT COUNT(totalBed) FROM beds");
					$row6=mysqli_fetch_row($result6);
			   $result7=mysqli_query($server,"SELECT COUNT(totalBed) FROM pat_to_bed WHERE totalBed>0 AND Assigned=1");
					 $row7=mysqli_fetch_row($result7);
					$row9[0]= $row6[0]- $row7[0];
					
					
						$result10=mysqli_query($server,"SELECT COUNT(slidenum) FROM ambulance");
					$row10=mysqli_fetch_row($result10);
					$today=date("Y-m-d");
			        $result11=mysqli_query($server,"SELECT COUNT(amb_id) FROM ambula where request=1  AND edate<'$today' AND passengers>0");
					 $row11=mysqli_fetch_row($result11);
					$row12[0]= $row10[0]- $row11[0];
					
				$result13=mysqli_query($server,"SELECT COUNT(App_id) FROM Appointment where Appdate='$date' ");
				$row13=mysqli_fetch_row($result13);
					 
?>


<!DOCTYPE html>
<html lang="en">

<head>
 <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

<link href="bootstrap-3.2.0/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
.hero {
  
}
body{

background-color:;
	
}
h3{
	 font-family: Arial, Helvetica, sans-serif;
}
.admin{
	margin-left:3px;
}
#but{
	background-color:danger;
	color:white;
	text-decoration: none;
}
h2,h5{
	color:green;
}
h5{
	color:black;
	font-size:18px;
}
table{
	
}
.admin{
color:black;
font-size:25px;	
}
img{}
</style>
</head>

<body>
<div id="app">		
<?php include('include/sidebar1.php');?>
			<div class="app-content">
				
			<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >             		

    <section id="hero">
      <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
           <div class="carousel-item active" style=" background-repeat: no-repeat;  background-size: 100% 100%;">
            <div class="carousel-container">
			<div class="admin">
<img src="image/bed.jpg" alt="Admistrator" width="350" height="250">			

<?php

echo "Today is " . date("Y/m/d");
echo ":";
echo  date("h:i:sa") ;
echo ":";
echo  date("l");
?>
  
<img src="image/A.JPG" alt="Admistrator" width="350" height="250">
</div>
            <center> <h2>24 HOURS STATISTICS!!!</h2>  </center>

 <table border=0 cellspacing= 30 cellpadding=0 align="center">
					 <tr>
                       <td><b><h5>Total registered patient:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					   &nbsp &nbsp &nbsp &nbsp 
					   <button type="button" class="btn btn-danger btn-lg"><a href="patients.php" id="but"><?php echo $row[0]; ?></a></button></h5></b></td>
                    <td><b><h5>&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
	&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 	Total admitted patient:&nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp
						<button type="button" class="btn btn-danger btn-lg"><a href="admission.php" id="but"><?php echo $row3[0]; ?></a> </button></h5></b></td>
			         
				     </tr>
   				
             <tr>
			  <td><b><h5>Total discharged patient:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp
			  &nbsp &nbsp &nbsp <button type="button" class="btn btn-danger btn-lg"><a href="view discharge.php" id="but"><?php echo $row2[0]; ?> </a></button></h5></b></td>
				 <td><b><h5>&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
				 &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Total number of referred In patients:
				 &nbsp &nbsp &nbsp <button type="button" class="btn btn-danger btn-lg"><a href="view referralin.php" id="but"><?php echo $row4[0]; ?> </a></button></h5></b></td>
			  
			  </tr>
				<br><br>
			    <tr>
				<td><b><h5>Total number of referred Out patients:
				&nbsp &nbsp &nbsp <button type="button" class="btn btn-danger btn-lg"><a href="view referralout.php" id="but"><?php echo $row5[0]; ?></a> </button></h5></b></td>
					<td><b><h5>&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
					&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Total number of available beds:&nbsp &nbsp &nbsp &nbsp
				&nbsp &nbsp &nbsp <button type="button" class="btn btn-danger btn-lg"><a href="beds.php" id="but"><?php echo $row9[0]; ?></a> </button></h5></b></td>
				</tr>
                
				 
				 <tr>
                  <td><b><h5>Total number of available ambulances:
				 &nbsp &nbsp  <button type="button" class="btn btn-danger btn-lg"><a href="view ambulance.php" id="but"><?php echo $row12[0]; ?></a> </button></h5></b></td>
				   <td><b><h5>&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
          &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Number of patients appointed today:
				&nbsp &nbsp &nbsp  <button type="button" class="btn btn-danger btn-lg"><a href="viewappointmentoficer.php" id="but"><?php echo $row13[0]; ?></a> </button></h5></b></td>
                 </tr>
					
		 </table>


 
             
            </div>
            </div>
           </div>
            </div>

</body>

</html>

 </div>
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
					</div>
					
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
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
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

