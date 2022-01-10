<?php
	session_start();
	error_reporting(0);
	include_once('config.php');
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
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
    <title>view record</title>
	
	
    <style>
body {
   
}
form{
   
}
  .card{

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
	$condition	=	'';
	if(isset($_REQUEST['MRN']) and $_REQUEST['MRN']!=""){
		$condition	.=	' AND MRN LIKE "%'.$_REQUEST['MRN'].'%" ';
		}
		if(isset($_REQUEST['pname']) and $_REQUEST['pname']!=""){
		$condition	.=	' AND pname LIKE "%'.$_REQUEST['pname'].'%" ';
		}
		
		if(isset($_REQUEST['phone']) and $_REQUEST['phone']!=""){
		$condition	.=	' AND phone LIKE "%'.$_REQUEST['phone'].'%" ';
		}
		if(isset($_REQUEST['ward']) and $_REQUEST['ward']!=""){
		$condition	.=	' AND ward LIKE "%'.$_REQUEST['ward'].'%" ';
}
if(isset($_REQUEST['Appdate']) and $_REQUEST['Appdate']!=""){
		$condition	.=	' AND Appdate LIKE "%'.$_REQUEST['Appdate'].'%" ';
}
if(isset($_REQUEST['reason']) and $_REQUEST['reason']!=""){
		$condition	.=	' AND reason LIKE "%'.$_REQUEST['reason'].'%" ';
}
if(isset($_REQUEST['status']) and $_REQUEST['status']!=""){
		$condition	.=	' AND status LIKE "%'.$_REQUEST['status'].'%" ';
}

	$userData	=	$db->getAllRecords('appointment','*',$condition,'ORDER BY App_id DESC');
	?>
	
	
		  <div class="card">
		  <div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
		  
		  
					
					
					<div class="col-sm-12">
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>MRN</label>
									<input type="number" name="MRN" id="MRN" class="form-control" value="<?php echo isset($_REQUEST['MRN'])?$_REQUEST['MRN']:''?>">
								</div>
								</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="pname" id="pname" class="form-control" value="<?php echo isset($_REQUEST['pname'])?$_REQUEST['pname']:''?>">
								</div>
								</div>	
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                                </div>
								</div>
							</div>
							<div class="col-sm-2">
							<div class="form-group">
							<label>&nbsp;</label>
							<div>
							<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-success"><i class="fa fa-fw fa-sync"></i> Refresh</a>
							</div>
							</div>
							</div>
					  </div>
					</form>
				</div>	
            </div>
        			
					
			<hr>		

            <div>
			 <table class="table table-hover">
				<thead>
					<tr>
					   <th>S.N</th>
						<th>MRN:</th>
						<th>Patient Full Name:</th>
						<th>Phone Number:</th>
						<th>Department/Ward:</th>
						<th>Date of appointment:</th>
						<th>Doctor:</th>
						<th>Status:</th>
						
						
					</tr
				</thead>
				
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
							$status="";
							
							
							$today = new DateTime('now'); 

                            $date1 = new DateTime($val['Appdate']);

                            $diff = $today->diff($date1)->format("%r%a");
							if($diff==-0)
							{
							$status="<font color=green> Appointment is ready!</font";	
							}
							elseif($diff==0)
							{
							$status=" <font color=green>Appoint after 1 days</font>";	
							}
							
							elseif($diff>0)
							{
								$y=$diff+1;
							$status=" <font color=blue>Appoint after $y days</font>";
							}
							else{
								$x=abs($diff);
							$status=" <font color=red>expired before $x days</font>";	
							}
							
							$rn=$val['MRN'];
					 				if(strlen($rn)==1)
					 				$rn="000".$rn;
					 				elseif(strlen($rn)==2)
					 				$rn="00".$rn;
					 				elseif(strlen($rn)==3)
					 				$rn="0".$rn;
					 				elseif(strlen($rn)>3)
					 				$rn=$rn;	
					?>
					
					<tr>
						<td><?php echo $s;?></td>
						<td><?php printf("%06d", $rn);?></td>
						<td><?php echo $val['pname'];?></td>
						<td><?php echo $val['phone'];?></td>
						<td><?php echo $val['ward'];?></td>
						<td><?php echo $val['Appdate'];?></td>
						<td><?php echo $val['reason'];?></td>
						<td><?php echo $status;?></td>
				      </tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		 </div>	
	</div>
</body>
</html>
   
</div>
</div>
</div>
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
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->				
					
                        