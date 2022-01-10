
<?php
	session_start();
	require_once('connect.php');
	error_reporting(0);
	if(!isset($_SESSION['user_id'])){ 
	Redirect('index.php'); 
	}
else
	{
		$error="";
		$msg="<br><span id=msg>Patient discharged Successfully.So please unassign the bed!!!</span><br><br>";
		//require_once('header.php');
	}
?>
        
		  
                   
         
               
              
               
<Html>  
<head> 

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
				
<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-secondary" id="refresh"><i class="fa fa-fw fa-sync"></i> Refresh</a>	
					
                    <?php
						if(isset($_POST['save']))
						{
						
			               $MRN=trim($_POST['MRN']);
						   $admissionDate=trim($_POST['admissionDate']);
						   $length=trim($_POST['length']);
						   $condtion=trim($_POST['condtion']);
						   $offer=trim($_POST['offer']);
						   $perform=trim($_POST['perform']);
						   $Screen=trim($_POST['Screen']);
						   $resultTB=trim($_POST['resultTB']);
						   $charged=trim($_POST['charged']);
						   $paid=trim($_POST['paid']);
						   $vochur=trim($_POST['vochur']);
						   $remark=trim($_POST['remark']);
					       $age="";	   
		                   $sex=""; 
					       $woreda="";
						   $user_id=$_SESSION['user_id'];
		$query =mysqli_query($server,"SELECT * FROM admission WHERE MRN  = '". $MRN ."'"); 		   
				while($row=mysqli_fetch_row($query))
						{
					$age=$row[3];
                    $sex=$row[4];	
                    $woreda=$row[5];
						}	   
						   
					
			  $query =mysqli_query($server,"SELECT * FROM admission WHERE MRN  = '". $MRN ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0)					 
                {
					
                 $query =mysqli_query($server,"SELECT * FROM discharge WHERE MRN  = '". $MRN ."'"); 
                   $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                {
				$error="<br><span class=error>Patient with this MRN is Already discharged.</span><br><br>";	 	 
				}
				elseif($age<1)
			   {
			$error="<br><span class=error>Please enter a value greater than zero for age.</span><br><br>";		
			    }
			elseif($charged<0)
			   {
			$error="<br><span class=error>Please enter a value greater than zero for Amount charged.</span><br><br>";		
			    }
          elseif($paid<0)
			   {
			$error="<br><span class=error>Please enter a value greater than zero for Amount paid.</span><br><br>";		
			    }
          elseif($vochur<0)
			   {
			$error="<br><span class=error>Please enter valid voucher number.</span><br><br>";		
			    }				
			elseif($paid>$charged)
			   {
			$error="<br><span class=error>Amout paid not greater than amount discharged!!!</span><br><br>";		
			    }	
				else
				{
					
$in_ch=mysqli_query($server,"INSERT INTO discharge (MRN,user_id,age,sex,woreda,
	admissionDate,length,condtion,offer,perform,Screen,
	resultTB,charged,
	paid,vochur,remark)
	VALUES ('$MRN','$user_id','$age','$sex','$woreda','$admissionDate','$length','$condtion',
	'$offer','$perform','$Screen','$resultTB',
	'$charged','$paid','$vochur','$remark')");

	
	$a=mysqli_query($server,"INSERT INTO dischargenotification (MRN,comment_text,admissionDate,
	length,condtion,result,Screen,resultTB,diagnosis,screened)
	VALUES ('$MRN','$woreda','$admissionDate','$length','$condtion',
	'$result','$Screen','$resultTB','$chk','$screened')");
	$b=mysqli_query($server,"UPDATE patients SET status=0 WHERE MRN='$MRN'");			
    $c=mysqli_query($server,"UPDATE admission SET active=0 WHERE MRN='$MRN'");
	 
 
      if($in_ch==1 && $a==1 && $b==1 && $c==1)  
    {  
     echo $msg;
    }  
   else  
    {  
     echo $error;  
    }  
		}
							
							
						}
						else
                        {
						$error="<br><span class=error>Patient with this MRN is not Admitted.</span><br><br>";			
					
                          } 
						if($error!="")
						{ 
					echo $error; 
					   }
						}

				
					?>
		<center><h1>Discharge Form</h1> </center>
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
					    id="MRN"  class="form-control" value="" title="MRN have length between 5 and 6" />
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
					<div class="col-sm-6 form-group">
								<label>Date of discharge <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="date" name="admissionDate"  class="form-control" required>
							</div>		
				     </div>
				  
			
				
				 <div class="row">
							
					      <div class="col-sm-6 form-group">
								<label>Is this discharge physician approved? <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="perform" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
							
							<div class="col-sm-6 form-group">
								<label>Length of stay(days) <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="number" name="length"  class="form-control" value="  " required>
							</div>
				</div>
				
				
				
				 <div class="row">
							
					<div class="col-sm-6 form-group">
								<label>Condtion at discharge <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="condtion" id="condtion" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
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
							<label>Please describe the treatment taken</label>
							<textarea name="offer" value="  " rows="3" class="form-control"></textarea>
				   </div>
				  </div>
				  
				  
				   
			
				
				<div class="row">
							
							<div class="col-sm-6 form-group">
								<label>Is future treatment needed?</label>
							<select name="Screen" id="firstName" class="form-control">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
                         <div class="col-sm-6 form-group">
								<label>Was patient prescribed medication? <span class="text-danger" style="font-size:28px"> *</span></label>
							<select name="resultTB" id="firstName" class="form-control" required="true">
                            	<option value=""><b>SELECT</b></option>
                            	<option value="Yes">Yes</option>
                                <option value="No">No</option>
                           </select>
							</div>
				  </div>
				
					<center> <h2>Finance</h2> </center>
					
					
					<div class="row">
							
						<div class="col-sm-6 form-group">
								<label>Amount charged(birr)</label>
								<input type="number" name="charged"  class="form-control" value="0">
							</div>
                         <div class="col-sm-6 form-group">
								<label>Amount paid(birr of free)</label>
								<input type="number" name="paid"  class="form-control" value="0" >
							</div>
					<div class="col-sm-6 form-group">
								<label>Vochur Number</label>
								<input type="number" name="vochur"  class="form-control" value="0">
						</div>
						<div class="col-sm-6 form-group">
							<label>Discharged By(Dr.Name)</label>
							<input type="text" name="remark" value="  "  class="form-control">
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
