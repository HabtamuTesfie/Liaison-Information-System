

<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	if(!isset($_SESSION['user_id']))
	{ 
Redirect('index.php');
    }
	else
	{
		$error="";
		$msg="<br><span id=msg>Patient Registered Successfully!!!</span><br><br>";
		//require_once('header.php');
	}
	
?>



<html>
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


 



<title>add patient</title>
<style>
body {
   position:fixed;
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
#msg{
	
	color:green;
}
.error{
	
	color:red;
}
#refresh{
	margin-left:1086px;
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
							//$MRN=trim($_POST['MRN']);
							$name=trim($_POST['name']);
							$age=trim($_POST['age']);
							$sex=$_POST['sex'];
							$woreda=trim($_POST['woreda']);
							$phone=trim($_POST['phone']);
							$user_id=$_SESSION['user_id'];
				//$query =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
                //$MRNduplicate = null;
                 //if (mysqli_num_rows($query) > 0) 
                //{
				//$error="<br><span class=error>Patient with this MRN is Already registered.</span><br><br>";	 
				//}
				if($age<1)
				{
			$error="<br><span class=error>Please enter a value greater than zero for age!!</span><br><br>";	 	
			    }
				else
				{
				$in_ch=mysqli_query($server,"INSERT INTO patients (user_id,name,age,sex,woreda,phone) 
				VALUES ('$user_id','$name','$age','$sex','$woreda','$phone')");
				
				
				}
							
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
			<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-secondary" id="refresh"><i class="fa fa-fw fa-sync"></i> Refresh</a>			
			<div class="container">
			<form  action="" method="post" name='registration' id="form-register" class="form-horizontal" role="form" >
					<center><h3>Register Patient</h3></center>
				
				<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Patient Name</b><span class="text-danger" style="font-size:28px"> *</span></label>
                    <div class="col-sm-9">
                       <input type="text" name="name" id="Name" 
                     
					   placeholder="" class="form-control" pattern=".{5,}" required value="  " />
                    </div>
                </div>
			 <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"><b>Age</b><span class="text-danger" style="font-size:28px"> *</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="age" onkeyup="ageValidation()" id="age"
						
						placeholder="" class="form-control" value="  " required />
                    </div>
                </div>
			<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"><b>Sex</b><span class="text-danger" style="font-size:28px"> *</span></label>
                    <div class="col-sm-9">
                        <select name="sex" id="sex" class="form-control" required="true" >
                            	<option value=""><b>SELECT</b></option>
                            	<option value="Male"><b>Male</b></option>
                            	<option value="Female"><b>Female</h3></option>
                           </select>
                    </div>
              </div>
			<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Woreda/Sub city</b><span class="text-danger" style="font-size:28px"> *</span></label>
                    <div class="col-sm-9">
                       <input type="text" name="woreda" id="Adress"
					   class="form-control" pattern=".{5,}" required  value="  "  />
                    </div>
              </div>	

			<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Phone Number</b><span class="text-danger" style="font-size:28px"> *</span></label>
                    <div class="col-sm-9">
                       <input type="text" name="phone" maxlength="13" minlength="13"
					   id="phone" placeholder="" class="form-control"
					   onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
					   pattern=".{13,}" required value="+251"  />
					  <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
              </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<button type="submit"  name="save" class="btn btn-primary"><h4>&nbsp;Save&nbsp;&nbsp;</h4></button>

	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
<button type="reset"  name="reset" class="btn btn-primary"><h4>Cancel</h4></button>

                    </form>
			      </div> <!-- ./container -->
                            
               
     
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
		<script src="include/formvalidation.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
