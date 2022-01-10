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
  p{
color:red;
font-size:18px;	
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
	if(isset($_REQUEST['slidenum']) and $_REQUEST['slidenum']!=""){
		$condition	.=	' AND slidenum LIKE "%'.$_REQUEST['slidenum'].'%" ';
		}
		
	$userData	=	$db->getAllRecords('ambulance','*',$condition,'ORDER BY slidenum ASC');
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
									<label>Slide No.</label>
									<input type="text" name="slidenum" id="side" class="form-control"
									value="<?php echo isset($_REQUEST['slidenum'])?$_REQUEST['slidenum']:''?>">
								</div>
								</div>
				        
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										<a href="<?php echo $_SERVER['PHP_SELF'];?>"class="btn btn-success"><i class="fa fa-fw fa-sync"></i> Refresh</a>
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									<a href="Ambulance.php" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> Add New Ambulance</a>
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
									<a href="Assign_ambulance.php" class="btn btn-success"><i class="fa fa-tasks"></i>Assign Ambulance </a>
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
									<a href="Unassign-Ambulance.php" class="btn btn-success"><i class="fa fa-tasks"></i>View assigned Ambulance </a>
										&nbsp &nbsp &nbsp &nbsp &nbsp 
									</div>
								</div>
							
						</div>
					</form>
				</div>	
          			
					
			<hr>		

            <div>
			 <table class="table table-hover" >
				<thead>
					<tr>
					   <th>S.N</th>
					  <th>ambulance slide number:</th>
					  <th>status</th>
					  <th>Action</th>
						
						
					</tr
				</thead>
				
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						$b=0;
						$d=0;
						foreach($userData as $val){
							$s++;
							$status="";
					$today=date("Y-m-d");
					$a=$val['slidenum'];
              $query =mysqli_query($server,"SELECT * FROM ambula WHERE edate  >='$today'
			  AND slidenum='$a'"); 
                 if (mysqli_num_rows($query) > 0) 
                {
				$status="<font color=red>Assigned!</font>";
				$b++;
				}
                 else
				 {
				$status="<font color=green>Free!</font>";
                $d++;				
				 }				
							
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo "Am".$val['slidenum'];?></td>
						<td><?php echo $status;?></td>
						<td>
							
							<a href="deleteambulance.php?delId=<?php echo $val['slidenum'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this ambulance?');">
							</i>X</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
				
			</table>
			<?php
			//$e=$b-$d;
			?>
			<center><p>Total:<?php echo $s; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Assigned:<?php echo $b; ?>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Free:<?php echo $d; ?></p>
			</center>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
					
                        