
<?php
	session_start();
	error_reporting(0);
	date_default_timezone_set("Africa/Addis_Ababa");
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
<title>  
Registration Page  
</title> 
<style>

#cancel{
	margin-left:93%;
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
							$MRN=$_POST['MRN'];
							$slidenum=$_POST['slidenum'];
							$sdate=$_POST['sdate'];
							$edate=$_POST['edate'];
							$stime=$_POST['stime'];
							$etime=$_POST['etime'];
							$distance=$_POST['distance'];
							$reciever=$_POST['reciever'];
							$reason=$_POST['reason'];
							$passengers=$_POST['passengers'];
							$submitter=$_SESSION['name'];
				 $today = date( 'Y-m-d');
				 $time=date("h:i:sa");
							
							
				if($sdate<$today)
				{
				echo'<script>alert("Invalid start date!!!")</script>';	
				}					
				elseif($edate<$today)
				{
				echo'<script>alert("Invalid end date!!!")</script>';	
				}
				elseif($edate<$sdate)
				{
				echo'<script>alert(" end date can not be less than start date!!!")</script>';	
				}
				
               else
			   {



				
				$query =mysqli_query($server,"SELECT * FROM ambula WHERE MRN  = '". $MRN ."' AND request=1"); 
                $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                     {
					 echo'<script>alert("Patient with this MRN is already assigned to ambulance!!!")</script>';
					 }
					else
					{ 
		         
				  $eetime="";
		          $eedate="";
		         $query =mysqli_query($server,"SELECT * FROM ambula WHERE slidenum  = '". $slidenum ."'"); 
             while($row=mysqli_fetch_row($query))
						{
                    $eedate=$row[4];
					$eetime=$row[6];
						}
					if ($eedate>$today) 
                         {
				
                	mysqli_query($server,"INSERT INTO ambula (MRN,slidenum,edate,request)
						VALUES ('$MRN','$slidenum','$eedate','0')");			
					 
					 echo'<script>alert("Ambulance with slide number is not comeback yet!!!")</script>';
					  //exit();	
					  }

					else
					{					  
				$query =mysqli_query($server,"SELECT * FROM ambulance WHERE slidenum  = '". $slidenum ."'"); 
                $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                     {
                 
					$in_ch=mysqli_query($server,"INSERT INTO ambula (MRN,slidenum,sdate,edate,stime,
						etime,distance,reciever,reason,passengers,submitter)
						VALUES ('$MRN','$slidenum','$sdate','$edate','$stime','$etime','$distance',
						'$reciever','$reason','$passengers','$submitter')");
					if($in_ch==1)  
                                 {  
                       echo'<script>alert("Ambulance ordered Registered Successfully")</script>';  
                          }  
                          else  
                                 {  
                          echo'<script>alert("Failed To Insert")</script>';  
                             }  
	
							}
							else{
							mysqli_query($server,"INSERT INTO ambula (MRN,slidenum,request)
						VALUES ('$MRN','$slidenum','0')");	
							echo'<script>alert(" Ambulance with this slide number is not exist.")</script>';	
							}
							if($error!="")
							{ 
						  echo $error;
						     }
							}
							
							
						
						}
						}	
						}
					?>
		<div><a href="view ambulance.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>		
			<center><h1>Ambualance Assignation Form</h1> </center>
	         <div class="col-lg-12">
	          <div class="row">	
				<form method="post">
				<div class="col-sm-12">
				
				
				<div class="form-group">
						<label>Patient MRN <span class="text-danger" style="font-size:28px"> *</span></label>
						<input type="text"  name="MRN"  maxlength="7"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{5,}" required
					    id="MRN"  class="form-control" value="" title="MRN have length between 5 and 6" />
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
				</div>
				<div class="form-group">
							<label>Slide number:<span class="text-danger" style="font-size:28px"> *</span></label>
						<input type="number" name="slidenum" placeholder="Enter slide number Here.." class="form-control" value="" required>
				</div>
				
				
				<div class="row">
							<div class="col-sm-6 form-group">
								<label>Start date:<span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="date" name="sdate" placeholder="Enter Start date Here.." class="form-control" value="" required>
							</div>
							<div class="col-sm-6 form-group">
								<label> End date: <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="date" name="edate" placeholder="Enter  end date  Here.." class="form-control" value="" required>
							</div>
				  </div>
				
				<div class="row">
							<div class="col-sm-6 form-group">
								<label>Start time: <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="time" name="stime" placeholder="Enter Start time Here.." class="form-control" value="" required>
							</div>
							<div class="col-sm-6 form-group">
								<label> End time:<span class="text-danger" style="font-size:28px"> *</span> </label>
								<input type="time" name="etime" placeholder="Enter  end time  Here.." class="form-control" value="" required>
							</div>
				  </div>
				  
				  <div class="row">
							<div class="col-sm-6 form-group">
								<label>Recieving health facility:<span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="text" name="reciever" placeholder="Enter Here.." class="form-control" value="" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Distance in KM: <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="number" name="distance" placeholder="Enter Here.." class="form-control" value="" required>
							</div>
				  </div>
				
                    <div class="row">
							<div class="col-sm-6 form-group">
								<label>Reason:<span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="text" name="reason" placeholder="Enter Here.." class="form-control" value="" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Number of passengers: <span class="text-danger" style="font-size:28px"> *</span></label>
								<input type="number" name="passengers" placeholder="Enter Here.." class="form-control" value="" required>
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
