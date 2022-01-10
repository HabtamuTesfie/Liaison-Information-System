
<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ 
	Redirect('index.php'); 
	}
	else
	{
		$error="";
		$msg="<br><span id=msg>Patient admitted Successfully.So please assign bed!!!</span><br><br>";
		//require_once('header.php');
	}
?>
              
<Html>  
<head> 

<style>

#cancel{
	margin-left:93%;
}
.row{
 
}
table{
border-collapse:separate;
border-spacing:0 30px;

}	
td{
	text-align:center;
	font-weight:bold;
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
<title>  
Registration Page  
</title> 

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
						
			               $MRN=trim($_POST['MRN']);
	    
						   $admissionDate=trim($_POST['admissionDate']);
						   $NCoD=trim($_POST['NCoD']);
						   $accident=trim($_POST['accident']);
						   $offer=trim($_POST['offer']);
						   $perform=trim($_POST['perform']);
						   $population=trim($_POST['population']);
						   $result=trim($_POST['result']);
						   $Screen=trim($_POST['Screen']);
						   $resultTB=trim($_POST['resultTB']);
						   $diagnosis=$_POST['diagnosis']; 
						   $screened=trim($_POST['screened']);
						   $remark=trim($_POST['remark']);
						   $age="";
						   $sex="";
						   $woreda="";
						   $user_id=$_SESSION['user_id'];
		$query =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
			while($row=mysqli_fetch_row($query))
						{
					$age=$row[3];
                    $sex=$row[4];	
                    $woreda=$row[5];		
					    }
			  $query =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
                 if (mysqli_num_rows($query) > 0) 
                {
			$query =mysqli_query($server,"SELECT * FROM admission WHERE MRN  = '". $MRN ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                {
					$error="<br><span class=error>Patient with this MRN is Already Admitted.</span><br><br>";	
				}
				elseif($age<1)
				{
			$error="<br><span class=error>Please enter a value greater than zero for age?????</span><br><br>";	
			  }
				
				
				else
				{
							
         $chk="";  
        foreach($diagnosis as $chk1)  
         {  
        $chk .= $chk1.",";  
         }  
							
$in_ch=mysqli_query($server,"INSERT INTO admission (MRN,user_id,age,sex,woreda,
	admissionDate,NCoD,accident,offer,perform,
	population,result,Screen,
	resultTB,diagnosis,screened,remark)
	VALUES ('$MRN','$user_id','$age','$sex','$woreda','$admissionDate',
	'$NCoD','$accident','$offer','$perform','$population',
	'$result','$Screen','$resultTB','($chk)','$screened','$remark')");
	
$b=mysqli_query($server,"UPDATE patients SET admit=1 WHERE MRN='$MRN'");
	 
 
      if($in_ch==1 && $b==1 )  
    {  
     echo $msg;
    }  
   else  
    {  
      echo $error;   
    }  
	
	
	//$result=mysqli_query($server,"SELECT MRN FROM patients ORDER BY pat_id DESC LIMIT 0,1");
	//$row=mysqli_fetch_array($result);
								
	//mysqli_query($server,"INSERT INTO pat_to_bed (pat_id,bed_id) VALUES ('$row[MRN]','none')");
							
							}
							
							
						
						if($error!="")
						{ echo $error; 
					}
					
					}
					else{
					 echo'<script>alert("Patient with this MRN is not registered")</script>';  	
					}
				
              }
				
					?>
	<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-secondary" id="refresh"><i class="fa fa-fw fa-sync"></i> Refresh</a>					
 <center><h1>Admission Form</h1></center>
	<div class="col-lg-12">
	<div class="row">	
                <form  method="post">
				<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>MRN <span class="text-danger" style="font-size:28px"> *</span></label>
						<input type="text"  name="MRN"  maxlength="6"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{6,}" required
					    id="MRN" 
                       class="form-control" value="" autofocus >
					   <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
					<div class="col-sm-6 form-group">
								<label>National classification of disease(NCoD) <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="text" name="NCoD"  class="form-control" pattern=".{2,}" required value="  ">
							</div>
                       </div>
				  
			
                     
                <div class="row">
							
					      <div class="col-sm-6 form-group">
								<label>Date of admission <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="date" name="admissionDate"  class="form-control" required>
						  </div>
						             <div class="col-sm-6 form-group">
						<label>Road traffic accident</label>
						<select name="accident" class="form-control">
                                <option selected hidden value="">Select</option>
                                <option value="Pedestrian">Pedestrian</option>
                                <option value="Motor cyclist">Motor cyclist</option>
                                <option value="Vehicle occupant">Vehicle occupant</option>
                        </select>
					</div>							
							
					</div>
					
					
			<center> <h2>PITC</h2> </center>
			
			  <div class="row">
							
							<div class="col-sm-6 form-group">
								<label>HIV test offered?</label>
							<select name="offer" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label>HIV test performed?</label>
							<select name="perform" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
				  </div>
			
			<div class="row">
							
							<div class="col-sm-6 form-group">
								<label>Targeted population category</label>
							<select name="population" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
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
								<label>HIV test result</label>
							<select name="result" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Postive">Postive</option>
                                <option value="Negative">Negative</option>
                           </select>
							</div>
				  </div>
			
			<center> <h2>TB Screening</h2> </center>
			
			<div class="row">
							
							<div class="col-sm-6 form-group">
								<label>Screened for TB?</label>
							<select name="Screen" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                         <div class="col-sm-6 form-group">
								<label>TB screening result</label>
							<select name="resultTB" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Postive">Postive</option>
                                <option value="Negative">Negative</option>
                           </select>
							</div>
				  </div>
			
			
			<div class="row">
							
							<div class="col-sm-6 form-group">
							<label>Types of diagnostic evaluation</label>
							<select id="multiselect" name="diagnosis[]" multiple="multiple" class="form-control">
                           <option value="Sputum smear microscopy">Sputum smear microscopy</option>
						  <option value="Sputum GeneXpert">Sputum GeneXpert</option>
						  <option value="X-ray/other imaging">X-ray/other imaging</option>
						  <option value="Histopathologic test">Histopathologic test</option>
						  <option value="Not done">Not done</option>
						  <option value="other">other</option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label>Result of TB screening</label>
							<select name="screened" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="TB">TB</option>
                                <option value="Not TB">Not TB</option>
								<option value="Not decided(ND)">Not decided(ND)</option>
                           </select>
							</div>
				  </div>
			
			    <div class="form-group">
							<label>Remark</label>
							<textarea name="remark" value="  " rows="3" class="form-control"></textarea>
				</div>
				<table border = 0 cellspacing= 30 cellpadding=0>
					<tr align="center">
                        <td align="center"><button type="submit" name="save" class="btn btn-lg btn-info">Submit</button></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td align="center"> <button type="reset" name="reset" class="btn btn-lg btn-info">Cancel</button></td>
					</tr>
			    </table>
			 
				
                    </form>
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
		<script src="include/formvalidation.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
			
	
			
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
