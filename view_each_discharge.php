
<?php include_once('config.php');
error_reporting(0);
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('discharge','*',' AND dis_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	
	$data	=	array(
					'admissionDate'=>$admissionDate,
					'condtion'=>$condtion,
					'length'=>$length,
					'offer'=>$offer,
					'perform'=>$perform,
					'Screen'=>$Screen,
					'resultTB'=>$resultTB,
					'remark'=>$remark,
					'charged'=>$charged,
					'paid'=>$paid,
					'vochur'=>$vochur,
					
					
					);
	$update	=	$db->update('discharge',$data,array('dis_id'=>$editId));
	if($update){
		header('location: view discharge.php?msg=rus');
		exit;
	}else{
		header('location: view discharge.php?msg=rnu');
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
			<div><a href="view_all_discharge.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>
			<div class="card-body">
			 <div class="col-lg-12">
	            <div class="row">
				<form method="post">
					<div class="col-sm-12">
					
					
				
					
					
					<div class="row">
							
					      <div class="col-sm-6 form-group">
								<label><b>Date of discharge</b></label>
								<input type="date" name="admissionDate" id="admissionDate" 
							class="form-control" value="<?php echo $row[0]['admissionDate']; ?>" placeholder="Enter admission date">
							</div>
							
							<div class="col-sm-6 form-group">
								<label><b>Length of stay(days)</b></label>
								<input type="number" name="length"  class="form-control" value="<?php echo $row[0]['length']; ?>" required>
							</div>
				  </div>
					
				<div class="row">
							
					<div class="col-sm-6 form-group">
								<label><b>Condtion at discharge</b></label>
							<select name="condtion" id="condtion" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['condtion'];?></b></option>
                            	<option value="Improved">Improved</option>
                                <option value="Same">Same</option>
                                <option value="Deteriorated">Deteriorated</option>
								 <option value="Left against medical">Left against medical</option>
                                <option value="Died">Died</option>
                                <option value="Referred to higher">Referred to higher</option>
                               <option value="Absconded">Absconded</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label><b>Is this discharge physician approved?</b></label>
							<select name="perform" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['perform'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
				 </div>
					
					 <div class="form-group">
							<label><b>Please describe the treatment taken</b></label>
							<textarea name="offer"  rows="3" class="form-control"><?php echo $row[0]['offer']; ?></textarea>
				   </div>
					
					<div class="row">
							
							<div class="col-sm-6 form-group">
								<label><b>Is future treatment needed?</b></label>
							<select name="Screen" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['Screen'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                         <div class="col-sm-6 form-group">
								<label><b>Was patient prescribed medication?</b></label>
							<select name="resultTB" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['resultTB'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
				  </div>
					
						<center> <h2><b>Finance</b></h2> </center>
					<br>
					
					<div class="row">
							
						<div class="col-sm-6 form-group">
								<label><b>Amount charged(birr)</b></label>
								<input type="number" name="charged"  class="form-control" value="<?php echo $row[0]['charged']; ?>">
							</div>
                         <div class="col-sm-6 form-group">
								<label><b>Amount paid(birr of free)</b></label>
								<input type="number" name="paid"  class="form-control" value="<?php echo $row[0]['paid']; ?>" >
							</div>
					<div class="col-sm-6 form-group">
								<label><b>Vochur Number</b></label>
								<input type="number" name="vochur"  class="form-control" value="<?php echo $row[0]['vochur']; ?>">
							</div>
				  </div>
					
					<div class="form-group">
							<label><b>Discharging Physician Name</b></label>
							<input type="text" name="remark" value="<?php echo $row[0]['remark']; ?>"  class="form-control">
				   </div>
					
						
					</form>
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
					