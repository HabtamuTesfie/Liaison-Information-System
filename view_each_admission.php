
<?php include_once('config.php');
require_once('connect.php');
error_reporting(0);
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('admission','*',' AND pat_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	
	$data	=	array(
                   
					'admissionDate'=>$admissionDate,
					'NCoD'=>$NCoD,
					'accident'=>$accident,
					'offer'=>$offer,
					'perform'=>$perform,
					'population'=>$population,
					'result'=>$result,
					'Screen'=>$Screen,
					'resultTB'=>$resultTB,
					'screened'=>$screened,
					'remark'=>$remark,
					);
	$update	=	$db->update('admission',$data,array('pat_id'=>$editId));
	if($update){
		header('location: admission.php?msg=rus');
		exit;
	}else{
		header('location: admission.php?msg=rnu');
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
			<div class="card-header"><a href="view_all_admission.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>
			<div class="card-body">
			
			  <div class="col-lg-12">
	           <div class="row">
					<form method="post">
					 <div class="col-sm-12">
				<div class="row">
							
					      <div class="col-sm-6 form-group">
								<label><b>Date of admission</b></label>
								<input type="date" name="admissionDate" id="admissionDate" 
							class="form-control" value="<?php echo $row[0]['admissionDate']; ?>" placeholder="Enter admission date">
						  </div>
							
							<div class="col-sm-6 form-group">
								<label><b>National classification of disease(NCoD)</b></label>
								<input type="text" name="NCoD"  class="form-control"
								pattern=".{2,}" required value="<?php echo $row[0]['NCoD']; ?>">
							</div>
				</div>	 
					
                <div class="form-group">
						<label><b>Road traffic accident</b></label>
						<select name="accident" class="form-control">
                                <option value=""><?php echo $row[0]['accident'];?></option>
                                <option value="Pedestrian">Pedestrian</option>
                                <option value="Motor cyclist">Motor cyclist</option>
                                <option value="Vehicle occupant">Vehicle occupant</option>
                        </select>
				      </div>						
				 <center> <h2><b>PITC</b></h2> </center>
					 
					   <div class="row">
							
							<div class="col-sm-6 form-group">
								<label><b>HIV test offered?</b></label>
							<select name="offer" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['offer'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label><b>HIV test performed?</b></label>
							<select name="perform" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['perform'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
				  </div>
					 
				<div class="row">
							
							<div class="col-sm-6 form-group">
								<label><b>Targeted population category</b></label>
							<select name="population" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['population'];?></b></option>
                            	<option value="Female Commercial Sex Workers">Female Commercial Sex Workers</option>
                                <option value="Long Distance Driver">Long Distance Driver</option>
                                <option value="Mobile Daily Laborers">Mobile Daily Laborers</option>
                                <option value="Prisoned">Prisoned</option>
                                <option value="OVC">OVC</option>
                                <option value="Children of PLHIV">Children of PLHIV</option>
                                <option value="Partens of PLHIV">Partens of PLHIV</option>
                                <option value="Other MARPS"> Other MARPS </option>
                                <option value="General population">General population</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label><b>HIV test result</b></label>
							<select name="result" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['result'];?></b></option>
                            	<option value="Postive">Postive</option>
                                <option value="Negative">Negative</option>
                           </select>
							</div>
				  </div>
						
				<center> <h2><b>TB Screening</b></h2> </center>
			
			<div class="row">
							
							<div class="col-sm-6 form-group">
								<label><b>Screened for TB?</b></label>
							<select name="Screen" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['Screen'];?></b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                         <div class="col-sm-6 form-group">
								<label><b>TB screening result</b></label>
							<select name="resultTB" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['resultTB'];?></b></option>
                            	<option value="Postive">Postive</option>
                                <option value="Negative">Negative</option>
                           </select>
							</div>
				  </div>
			
					
			<div class="row">
							
							<div class="col-sm-6 form-group">
							<label><b>Types of diagnostic evaluation</b></label>
							<select id="multiselect" name="diagnosis[]" multiple="multiple" class="form-control">
                           <option value=""><b><?php echo $row[0]['diagnosis[]'];?></b></option>
						   <option value="Sputum smear microscopy">Sputum smear microscopy</option>
						  <option value="Sputum GeneXpert">Sputum GeneXpert</option>
						  <option value="X-ray/other imaging">X-ray/other imaging</option>
						  <option value="Histopathologic test">Histopathologic test</option>
						  <option value="Not done">Not done</option>
						  <option value="other">other</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label><b>Result of TB screening</b></label>
							<select name="screened" id="firstName" class="form-control">
                            	<option value=""><b><?php echo $row[0]['screened'];?></b></option>
                            	<option value="TB">TB</option>
                                <option value="Not TB">Not TB</option>
								<option value="Not decided(ND)">Not decided(ND)</option>
                           </select>
							</div>
				  </div>
					
			 <div class="form-group">
							<label><b>Remark</b></label>
							<textarea name="remark"  rows="3" class="form-control"><?php echo $row[0]['remark']; ?></textarea>
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
					