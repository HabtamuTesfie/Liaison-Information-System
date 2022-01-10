
<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('referral','*',' AND ref_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	
	$data	=	array(
					'dateReferral'=>$dateReferral,
					'type'=>$type,
					'way'=>$way,
					'reason'=>$reason,
					'sender'=>$sender,
					'diagnosis'=>$diagnosis,
					'treatment'=>$treatment,
					'appropriate'=>$appropriate,
					'feedback'=>$feedback,
					);
	$update	=	$db->update('referral',$data,array('ref_id'=>$editId));
	if($update){
		header('location: view referralin.php?msg=rus');
		exit;
	}else{
		header('location: view referralin.php?msg=rnu');
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
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> MRN is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Patient name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> age is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div><a href="view referralin.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>
			<div class="card-body">
				
			<div class="col-lg-12 ">
	          <div class="row">
					<form  method="post">
					<div class="col-sm-12">
						
				<div class="row">
							
							  <div class="col-sm-6 form-group">
								<label>Date of referral recieved </label>
								<input type="date" name="dateReferral" value="<?php echo $row[0]['dateReferral']; ?>"  class="form-control" required>
							</div>
							
				 </div>
						
		
					<div class="row">
							
					      <div class="col-sm-6 form-group">
								<label>Types of referral</label>
							  <select name="type" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['type'];?></b></option>
                            	<option value="Emergency case referral">Emergency case referral</option>
                                <option value="Cold case referral">Cold case referral </option>
                             </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label>Ways of referral</label>
							<select name="way" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['way'];?></b></option>
                            	 <option value="with communication">with communication</option>
                                <option value="without communication">without communication</option>
                                <option value="self referral">self referral</option>
                           </select>
							</div>
				  </div>	

				<div class="row">
							
					<div class="col-sm-6 form-group">
								<label>Reasons for referral</label>
							<select name="reason" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['reason'];?></b></option>
                            	 <option value="Gyn/basic obstetric">Gyn/basic obstetric</option>
                                <option value="Medical">Medical</option>
                                <option value="surgical">Surgical</option>
								 <option value="surgical">Trauma</option>
                           </select>
							</div>
                       <div class="col-sm-6 form-group">
								<label>Referred from(Name of health facility)</label>
								<input type="text" name="sender" id="Name" class="form-control"
								value="<?php echo $row[0]['sender']; ?>" required>
							</div>
				</div>	
						
	                
					<div class="form-group">
							<label>Diagnosis</label>
							<textarea name="diagnosis"  rows="3" class="form-control"><?php echo $row[0]['diagnosis']; ?></textarea>
				   </div>	 
						 
				 <div class="form-group">
							<label>Summary of treatment & Investigation provided</label>
							<textarea name="treatment"  rows="3" class="form-control"><?php echo $row[0]['treatment']; ?></textarea>
				 </div>	
					
				<div class="row">
							<div class="col-sm-6 form-group">
								<label>Appropriate referral?</label>
							<select name="appropriate" id="firstName" class="form-control" required="true">
                            	<option value=""><b><?php echo $row[0]['appropriate'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Feedback recieved/provided date</label>
								<input type="date" name="feedback"  class="form-control" value="<?php echo $row[0]['feedback']; ?>">
							</div>
				  </div>	
						 
					 
						 
						
						 
						
						
						<br>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update patient</button>
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
					