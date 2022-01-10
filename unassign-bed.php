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
h1,.col,.row{

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
						if(isset($_POST['unassign']))
						{
							 $ptb=trim($_POST['ptb']);
							 $MRN=$_POST['MRN'];
				             $bed=$_POST['bed'];
							if($ptb=="none")
							{ 
						$error2="<br><span class=error>Please select a relationship</span><br><br>"; 
							}
					 $query =mysqli_query($server,"SELECT * FROM discharge WHERE MRN  = '". $MRN ."'");
					 $MRNduplicate = null;
							if(mysqli_num_rows($query)>0) 
                            {
						    $a=mysqli_query($server,"UPDATE pat_to_bed SET bedNum=0 WHERE MRN='$MRN'");
							$d=mysqli_query($server,"UPDATE pat_to_bed SET 	Assigned=0 WHERE MRN='$MRN'");
							$b=mysqli_query($server,"UPDATE discharge SET state=0 WHERE MRN='$MRN'");
							$e=mysqli_query($server,"UPDATE beds SET Assigned=0 WHERE totalBed='$bed'");
							$f=mysqli_query($server,"UPDATE pat_to_bed SET 	mrnn=0 WHERE MRN='$MRN'");
							if($a==1&& $b==1 && $d==1 && $e==1)  
                               {  
                              echo'<script>alert("Patient Unssigned Successfully")</script>';  
                               }  
                            else  
                             {  
                            echo'<script>alert("Failed To Unassigned")</script>';  
                              }  
						}
						else  
                             {  
                            echo'<script>alert("First please register discharge data!!!")</script>';  
                              }  
							
						if($error2!="")
							 { 
						 echo $error2;
						      }
						
						}
					?>
               
<div class="container">
           <a href="beds.php" 
class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>
               <br>				
               <form method="post"  name="frm2" class="form-horizontal" role="form">
					<center><h3>Unssign Beds</h3></center>
				<div class="form-group">
                   <label for="Bed Type" class="col-sm-3 control-label"><b>Patient with Bed-number:</b></label>
                    <div class="col-sm-9">
                        <select name="ptb" id="type" class="form-control" required>
                            	<option value="none"><b>SELECT</b></option>
                            	<?php
                                $result3=mysqli_query($server,"SELECT * FROM  pat_to_bed  WHERE Assigned=1 ORDER BY id DESC");
									while($row3=mysqli_fetch_row($result3))
									{
										$rn=$row3[1];
					 					if(strlen($rn)==1)
										{
					 					$rn="00000".$rn;
										}
					 					elseif(strlen($rn)==2)
										{
					 					$rn="0000".$rn;
										}
					 					elseif(strlen($rn)==3)
										{
					 					$rn="000".$rn;
										}
										elseif(strlen($rn)==4)
										{
					 					$rn="00".$rn;
										}
										elseif(strlen($rn)==5)
										{
					 					$rn="0".$rn;
										}
					 					elseif(strlen($rn)>5)
										{
					 					$rn=$rn;
										}
										$a=$row3[4];
										echo"<option value=$row3[0]>Bed $a to $rn</option>";
									}
									?>
                           </select>
                    </div>
                </div>
				
			<div class="form-group">
                    <label for="Bed Type" class="col-sm-3 control-label"><b>MRN</b></label>
                    <div class="col-sm-9">
					<input type="text"  name="MRN"  maxlength="7"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{5,}" required
					    id="MRN"  class="form-control" value="" title="MRN have length between 5 and 6" />
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
               </div>
				
				<div class="form-group">
                    <label for="Bed Type" class="col-sm-3 control-label"><b>Bed No.</b></label>
                    <div class="col-sm-9">
					<input type="text"  name="bed"  maxlength="7"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						 required
					    id="MRN"  class="form-control" value="" />
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                    </div>
               </div>
				<center><button type="submit"  name="unassign" value="Unassign Bed" class="btn btn-primary"><h4>Unassign</h4></button></center>
			</form>
         </div> <!-- ./container -->   
          
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
				  
				  
				  
				  
                   
                    
				  
				 
               	
				
	<br><br><br><br>			
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

                     