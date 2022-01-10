<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	require_once('db_connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$error2="";
		$msg="<br><span class=msg>Bed Assigned Successfully</span><br><br>";
		$msg2="<br><span class=msg>Bed Has Been Unssigned Successfully</span><br><br>";
		
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
						if(isset($_POST['assign']))
						{
							$MRN=$_POST['MRN'];
							$bed=$_POST['bed'];
				            $type=$_POST['type'];
						    $pat_id="";
							
							
							
				$query =mysqli_query($server,"SELECT * FROM admission WHERE MRN  = '". $MRN ."'"); 
			    while($row=mysqli_fetch_row($query))
						{
					$pat_id=$row[0];
                    		
					    }	
							if($MRN=="none")
							{ 
						$error="<br><span class=error>Please select a patient</span><br><br>";
						     }
							if($bed=="none")
							{ 
							$error="<br><span class=error>Please select a bed</span><br><br>";
							}
			 $query =mysqli_query($server,"SELECT * FROM admission WHERE MRN  = '". $MRN ."'"); 
                $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                        {
			$query1 =mysqli_query($server,"SELECT * FROM pat_to_bed WHERE mrnn  = '". $MRN ."' "); 
                 if ($row3=mysqli_num_rows($query1)>0) 
                        {		
                        echo'<script>alert("The patient is already assigned!!!")</script>'; 
						}						 
					       else
						   {	 
							$result4=mysqli_query($server,"SELECT * FROM pat_to_bed WHERE bedNum='$bed'");
							if($row4=mysqli_num_rows($result4)>0)
							{ 
						$error="<br><span class=error><font color=red>Bed $bed has already been assigned to a patient</font></span><br><br>";
						      }
								else
								{
								    $a=mysqli_query($server,"INSERT INTO pat_to_bed (MRN,pat_id,mrnn,totalBed,bedNum,type)VALUES ('$MRN','$pat_id','$MRN','$bed','$bed','$type')");
									$b=mysqli_query($server,"UPDATE admission SET state=0 WHERE MRN='$MRN'");
									$c=mysqli_query($server,"UPDATE beds SET Assigned=1 WHERE totalBed='$bed'");
									
									
									
								if($a==1 && $b==1 && $c==1)  
                               {  
                              echo'<script>alert("Patient Assigned Successfully")</script>';  
                               }  
                            else  
                             {  
                            echo'<script>alert("Failed To Assigned")</script>';  
                              }  
									
									
								}	
						 }
                             
                               
						  }
                      	 else  
                             {  
                            echo'<script>alert("First please register admission data!!!")</script>';  
                              } 					
							
							
							if($error!=""){ echo $error; }
						}
					?>
		<div class="container">
           <a href="beds.php" 
       class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>
               <br>				
               <form method="post"  name="frm1" class="form-horizontal" role="form">
					<center><h3>Assign Beds</h3></center>
				<div class="form-group">
                    <label for="Bed Type" class="col-sm-3 control-label"><b>Patient MRN</b></label>
                    <div class="col-sm-9">
                       <input type="text"  name="MRN"  maxlength="6"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{6,}" required
					    id="MRN"  class="form-control" value="" title="MRN have length between 5 and 6" />
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
                </div>
				
			
				
				<div class="form-group">
                    <label for="Bed Type" class="col-sm-3 control-label"><b>Bed Number</b></label>
                    <div class="col-sm-9">
                        <select name="bed" id="type" class="form-control" required>
                            	<option value="none"><b>SELECT</b></option>
                            	<?php
									$result2=mysqli_query($server,"SELECT * FROM beds WHERE Assigned=0 ORDER BY totalBed DESC");
									while($row2=mysqli_fetch_assoc($result2))
									{
										echo"<option value=$row2[totalBed]>Bed No $row2[totalBed]</option>";
									}
								?>
                           </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="Bed Type" class="col-sm-3 control-label"><b>Admission type</b></label>
                    <div class="col-sm-9">
                        <select name="type" id="type" class="form-control" required="true">
                            	<option value="none"><b>SELECT</b></option>
                            	<option value="Elective">Elective</option>
                            	<option value="Emergency">Emergency</option>
                           </select>
                    </div>
                </div>
			<center><button type="submit"  name="assign" class="btn btn-primary"><h4>Assign</h4></button></center>
			</form>
         </div> <!-- ./container -->                  
		  <br><br>
					<center><h3> Bed Statistics</h3></center>
               	  <table class="table  table-bordered">
                  <?php
				  	
					$result2=mysqli_query($server,"SELECT COUNT(totalBed) FROM beds");
					$row2=mysqli_fetch_row($result2);
					
					
					 $result4=mysqli_query($server,"SELECT COUNT(totalBed) FROM pat_to_bed WHERE Assigned=1");
					 $row4=mysqli_fetch_row($result4);
			
					 $row6[0] = $row2[0] - $row4[0];
					 echo"<tr>
    							<td align=center valign=middle>Total - $row2[0]</td>
								<td align=center valign=middle>Occupied - $row4[0]</td>
								<td align=center valign=middle>Free - $row6[0]</td>
							</tr>
  					";
					?>
				  </table>
				  
				  
				  
                   
                    
				  
				 
               	
				
				
 <?php
	require_once('footer.php');
?> 
 
</body>    
</html> 
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

                     