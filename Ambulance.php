
<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg>Bed Added Successfully</span><br><br>";
		
	}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
          <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
		  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/fontawesome.min.css">


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


 



<title>add patient</title>
<style>
body {
 
}

*[role="form"] {
    max-width: 670px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.5em;
  
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}
::-webkit-input-placeholder {
   font-size: 15px;
}
h1,.col,.row{
	
}
</style>



</head>
<body>
 <div id="app">		
    <?php include('include/sidebar1.php');?>
			<div class="app-content">
				
			<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					
                <?php
						if(isset($_POST['save']))
						{
						
							$slidenum=$_POST['slidenum'];
							
							
				$query =mysqli_query($server,"SELECT * FROM ambulance WHERE slidenum  = '". $slidenum ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                {
					 echo'<script>alert(" Ambulance with this side number is Already registered.")</script>'; 
       
                }
				else{			

				$in_ch=mysqli_query($server,"INSERT INTO ambulance (slidenum)
				VALUES ('$slidenum')");
							if($in_ch==1)  
                                 {  
                            echo'<script>alert("Ambulance registered Successfully")</script>';  
                             }  
                             else  
                                 {  
                          echo'<script>alert("Failed To registered")</script>';  
                             }  
	
							
							
							if($error!=""){ echo $error; }
						}
						}
					?>
					
	<div class="container">
  <a href="view ambulance.php" 
					class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>
          <br>					
				<form method="post" class="form-horizontal" role="form">
					<center><h3>Register Ambulance</h3></center>		
					
									
			<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Ambulance side number:</b></label>
                    <div class="col-sm-9">
                     <input type="number" name="slidenum" id="remark"  class="form-control" value="  ">
                    </div>
           </div>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<button type="submit"  name="save" class="btn btn-primary"><h4>Save</h4></button>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset"  name="reset" class="btn btn-primary"><h4>Cancel</h4></button>

                    </form>
				
					
			   </div> <!-- ./container -->
                            
               
     
				</body>
				</html>
				
                     </div>
			
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

