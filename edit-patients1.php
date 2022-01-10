

<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('patients','*',' AND MRN="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	
	$data	=	array(
					
					'name'=>$name,
					'age'=>$age,
					'sex'=>$sex,
					'woreda'=>$woreda,
					'phone'=>$phone,
					);
	$update	=	$db->update('patients',$data,array('MRN'=>$editId));
	if($update){
		header('location: patients.php?msg=rus');
		exit;
	}else{
		header('location: patients.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<htm>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

		<meta charset="UTF-8">
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

		  </style>
</head>

<body>
<div id="app">		
<?php include('include/sidebar1.php');?>
			<div class="app-content">
				
			<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
	<div class="main-content" >
					              

   	<div class="container">
<br><br>
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
			<div><a href="patients.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
				<div class="container">
					<form action="" method="post" name='registration' id="form-register" class="form-horizontal" role="form" >
					<center><h3>Edit Patient data</h3></center>	
						
				
						
			  <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Patient Name</b></label>
                    <div class="col-sm-9">
                       <input type="text" name="name" id="Name" 
                     
					   placeholder="" class="form-control" pattern=".{5,}" required value="<?php echo $row[0]['name']; ?>" >
                    </div>
               </div>
			
				 <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"><b>Age</b></label>
                    <div class="col-sm-9">
                        <input type="number" name="age" onkeyup="ageValidation()" id="age"
						
						placeholder="" class="form-control" value="<?php echo $row[0]['age'];?>" required />
                    </div>
                </div>	

				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"><b>Sex</b></label>
                    <div class="col-sm-9">
                        <select name="sex" id="sex" class="form-control" required="true" >
                            	<option value=""><b><?php echo $row[0]['sex'];?></b></option>
                            	<option value="Male"><b>Male</b></option>
                            	<option value="Female"><b>Female</h3></option>
                           </select>
                    </div>
              </div>
			
			<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Woreda/Sub city</b></label>
                    <div class="col-sm-9">
                       <input type="text" name="woreda" id="Adress"
					   class="form-control" pattern=".{2,}" required  value="<?php echo $row[0]['woreda']; ?>"  />
                    </div>
              </div>	
			
			
			<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label"><b>Phone Number</b></label>
                    <div class="col-sm-9">
                       <input type="text" name="phone" maxlength="13" 
					   id="phone" placeholder="" class="form-control"
					   onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
					   pattern=".{10,}" required value="<?php echo $row[0]['phone']; ?>"  />
					  <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
             </div>	
						<br>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update patient</button>
						</div>
					</form>
					</center>
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
			<br><br><br><br>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		
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
					