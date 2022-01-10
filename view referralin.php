<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	include_once('config.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		
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
  #view{
	margin-left:1110px;
	
	text-decoration:none;
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
		
		if(isset($_REQUEST['age']) and $_REQUEST['age']!=""){
		$condition	.=	' AND age LIKE "%'.$_REQUEST['age'].'%" ';
		}
		if(isset($_REQUEST['sex']) and $_REQUEST['sex']!=""){
		$condition	.=	' AND sex LIKE "%'.$_REQUEST['sex'].'%" ';
}
		if(isset($_REQUEST['woreda']) and $_REQUEST['woreda']!=""){
		$condition	.=	' AND woreda LIKE "%'.$_REQUEST['woreda'].'%" ';
	}
	if(isset($_REQUEST['dateReferral']) and $_REQUEST['dateReferral']!=""){
		$condition	.=	' AND dateReferral LIKE "%'.$_REQUEST['dateReferral'].'%" ';
	}
	if(isset($_REQUEST['type']) and $_REQUEST['type']!=""){
		$condition	.=	' AND type LIKE "%'.$_REQUEST['type'].'%" ';
	}
	

	
	if(isset($_REQUEST['way']) and $_REQUEST['way']!=""){
		$condition	.=	' AND way LIKE "%'.$_REQUEST['way'].'%" ';
		}
		if(isset($_REQUEST['reason']) and $_REQUEST['reason']!=""){
		$condition	.=	' AND reason LIKE "%'.$_REQUEST['reason'].'%" ';
		}
		if(isset($_REQUEST['sender']) and $_REQUEST['sender']!=""){
		$condition	.=	' AND sender LIKE "%'.$_REQUEST['sender'].'%" ';
     }
		if(isset($_REQUEST['diagnosis']) and $_REQUEST['diagnosis']!=""){
		$condition	.=	' AND diagnosis LIKE "%'.$_REQUEST['diagnosis'].'%" ';
	}
	if(isset($_REQUEST['treatment']) and $_REQUEST['treatment']!=""){
		$condition	.=	' AND treatment LIKE "%'.$_REQUEST['treatment'].'%" ';
	}
	if(isset($_REQUEST['appropriate']) and $_REQUEST['appropriate']!=""){
		$condition	.=	' AND appropriate LIKE "%'.$_REQUEST['appropriate'].'%" ';
	}
	
	
	if(isset($_REQUEST['feedback']) and $_REQUEST['feedback']!=""){
		$condition	.=	' AND feedback LIKE "%'.$_REQUEST['feedback'].'%" ';
	}
	if(isset($_REQUEST['diagnosis']) and $_REQUEST['diagnosis']!=""){
		$condition	.=	' AND diagnosis LIKE "%'.$_REQUEST['diagnosis'].'%" ';
	}
	if(isset($_REQUEST['user_id']) and $_REQUEST['user_id']!=""){
		$condition	.=	' AND user_id LIKE "%'.$_REQUEST['user_id'].'%" ';
	}
	$userData	=	$db->getAllRecords('referral','*',$condition,'ORDER BY ref_id DESC');
	?>
	
	<div class="container">
         <a href="view_all_referralIn.php" id="view">View All</a>
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
									<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>">
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
            </div>
        			
					
			<hr>		
			 <table class="table table-hover">
				<thead>
					<tr>
					   <th>Serial No</th>
						<th>MRN</th>
						<th>Patient full name</th>
						<th>Age</th>
						<th>Sex</th>
						<th>Woreda</th>
						<th>Date recieved</th>
						<th>Types of referral</th>
						<th>Referred from</th>
						<th>Action</th>
				
						
					</tr
				</thead>
				
				<tbody>
					<?php 
				$a=$_SESSION['user_id'];
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$b=$val['user_id'];
							if($a==$b)
							{
							$s++;
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
						<td><?php echo $val['age'];?></td>
						<td><?php echo $val['sex'];?></td>
						<td><?php echo $val['woreda'];?></td>
						<td><?php echo $val['dateReferral'];?></td>
	                    <td><?php echo $val['type'];?></td>
						<td><?php echo $val['sender'];?></td>
						
						
						
						<td align="center">
							<a href="editreferralin.php?editId=<?php echo $val['ref_id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="deletreferralin.php?delId=<?php echo $val['ref_id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this patient?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
    <script>
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
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
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->				
					
					
					
					
					
					
					
					
					
					
		