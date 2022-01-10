
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
		$msg="<br><span id=msg>Patient Data Successfully Recorded!!!</span><br><br>";
		//require_once('header.php');
	}
?>
        
		  
                   
         
               
              
               
 <Html>  
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
<title>  
Registration Page  
</title> 
<style>

#cancel{
	margin-left:93%;
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
						   $dateReferral=trim($_POST['dateReferral']);
						   $type=trim($_POST['type']);
						   $way=$_POST['way'];
						   $reason=$_POST['reason'];
						   $sender=$_POST['sender'];
						   $diagnosis=$_POST['diagnosis'];
						   $treatment=$_POST['treatment'];
						   $appropriate=$_POST['appropriate'];
						   $feedback=$_POST['feedback'];
						  
						  $pname="";
						   $age="";
						   $sex="";
						   $woreda="";
						   $fed_id="";
						   $user_id=$_SESSION['user_id'];
						   
			$query1 =mysqli_query($server,"SELECT * FROM requestreferral WHERE MRN  = '". $MRN ."'"); 
			while($row=mysqli_fetch_row($query1))
						{
					$fed_id=$row[0];		
						}
					if (mysqli_num_rows($query1) < 0) 
                      {
		$error="<br><span class=error>This referral is not decided by physician!!!</span><br><br>";	 					  
					 }   
					  else
				   {
		$query2 =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
			while($row=mysqli_fetch_row($query2))
						{
					$pname=$row[2];		
					$age=$row[3];
                    $sex=$row[4];	
                    $woreda=$row[5];		
					    }
						  
						  
						  
						  
                 $query =mysqli_query($server,"SELECT * FROM referral WHERE MRN  = '". $MRN ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) < 0) 
                {
			$error="<br><span class=error>Patient referral data with this MRN is Already registered!!!</span><br><br>";			 
			   }       

				else
				{
							
 
							
$in_ch=mysqli_query($server,"INSERT INTO referralOut (MRN,fed_id,user_id,pname,age,sex,woreda,
	dateReferral,type,way,reason,sender,
	diagnosis,treatment,appropriate,
	feedback)
	VALUES ('$MRN','$fed_id','$user_id','$pname','$age','$sex','$woreda','$dateReferral',
	'$type','$way','$reason','$sender','$diagnosis',
	'$treatment','$appropriate','$feedback')");
	

	 
 
if($in_ch==1)  
   {  
    echo $msg;
   }  
else  
   {  
  $error="<br><span class=error>This referral is not decided by physician!!!</span><br><br>";	 	 
   }  
	
	
	//$result=mysqli_query($server,"SELECT pat_id FROM patients ORDER BY pat_id DESC LIMIT 0,1");
	//$row=mysqli_fetch_array($result);
								
								//mysqli_query($server,"INSERT INTO pat_to_bed (pat_id,bed_id) VALUES ('$row[pat_id]','none')");
							
							}
						}
						 }	
						
					if($error!="")
						{ 
					echo $error; 
					    }
				       

				
					?>
	<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-secondary" id="refresh"><i class="fa fa-fw fa-sync"></i> Refresh</a>					
                <center><h1>Referral-OUT Form</h1> </center>
	        <div class="col-lg-12">
	          <div class="row">
				 <form   method="post">
					<div class="col-sm-12">
					
					<div class="row">
							<div class="col-sm-6 form-group">
								<label>MRN <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="number" name="MRN"  maxlength="7"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{5,}" required
					    id="MRN"  class="form-control" value="" required>
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
							</div>
							
						<div class="col-sm-6 form-group">
								<label>Date of referral made <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="date" name="dateReferral"  class="form-control" required>
						</div>	
							
				  </div>
				<div class="row">
							
					<div class="col-sm-6 form-group">
								<label>Types of referral <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="type" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	<option value="Emergency case referral">Emergency case referral</option>
                                <option value="Cold case referral">Cold case referral </option>
                           </select>
							</div>
                        <div class="col-sm-6 form-group">
								<label>Ways of referral <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="way" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	 <option value="with communication">with communication</option>
                                <option value="without communication">without communication</option>
                                <option value="self referral">self referral</option>
                           </select>
							</div>
				  </div>
				  <div class="row">
							
					<div class="col-sm-6 form-group">
								<label>Reasons for referral <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="reason" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	 <option value="Gyn/basic obstetric">Gyn/basic obstetric</option>
                                <option value="Medical">Medical</option>
                                <option value="surgical">Surgical</option>
								 <option value="surgical">Trauma</option>
                           </select>
							</div>
                       <div class="col-sm-6 form-group">
								<label>Referred To(Name of health facility)<span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="text" name="sender" id="Name" class="form-control" value="" required>
							</div>
				  </div>
				   <div class="row">
				   <div class="col-sm-6 form-group">
							<label>Diagnosis</label>
							<textarea name="diagnosis" value="  " rows="3" class="form-control"></textarea>
				   </div>
					
				   <div class="col-sm-6 form-group">
							<label>Summary of treatment & Investigation provided</label>
							<textarea name="treatment" value="  " rows="3" class="form-control"></textarea>
				   </div>
				  </div>
				   
				      
				   
				<div class="row">
							<div class="col-sm-6 form-group">
								<label>Appropriate referral? <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="appropriate" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Feedback recieved/provided date</label>
								<input type="date" name="feedback" placeholder="Enter Patient Full Name Here.." class="form-control" value="">
							</div>
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
