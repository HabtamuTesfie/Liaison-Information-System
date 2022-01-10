

<?php
	session_start();
	error_reporting(0);
	require_once('connect.php');
	include_once('config.php');
	if(!isset($_SESSION['user_id']))
	{
		Redirect('index.php');
		}
	else
	{
		
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
 <style>
#view{
	margin-left:1086px;
	
	text-decoration:none;
}
#arrow{
	position:fixed;
}
.card{
margin-left:55px;
position:fixed;
width:100%;	
}
table{
       height:500px;display:block;overflow:scroll;
	   width: 400px;
     }
	 th{
		 width:5%;
		 height:100%;
		 
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
		if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
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
	if(isset($_REQUEST['phone']) and $_REQUEST['phone']!=""){
		$condition	.=	' AND phone LIKE "%'.$_REQUEST['phone'].'%" ';
	}
	if(isset($_REQUEST['creationdate']) and $_REQUEST['creationdate']!=""){
		$condition	.=	' AND creationdate LIKE "%'.$_REQUEST['creationdate'].'%" ';
	}
	if(isset($_REQUEST['user_id']) and $_REQUEST['user_id']!=""){
		$condition	.=	' AND user_id LIKE "%'.$_REQUEST['user_id'].'%" ';
	}
	$userData	=	$db->getAllRecords('patients','*',$condition,'ORDER BY creationdate DESC');
	?>
				
						
						
		
	
<a href="view_all_patients.php" id="view"><i class="fa fa-fw fa-eye" style='font-size:18px'></i><b>View All</b></a>
		  
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
			<br><br><br><br><br><br><br>		
			<hr>		

            <div>
			 <table class="table table-hover">
				<thead>
					<tr>
					   <th>S.N</th>
						<th>MRN</th>
						<th>Name</th>
						<th>Age</th>
						<th>Sex</th>
						<th>Woreda/Sub city</th>
						<th>Phone</th>
						<th>Reg.date</th>
						<th>Action</th>
						
						
						
					</tr
				</thead>
				
				<tbody>
					<?php 
					$a=$_SESSION['user_id']; 
					if(count($userData)>0 ){
						$s	=	'';
						
						foreach($userData as $val){
							$b=$val['user_id'];
							$c=$val['status'];
							$d=$val['admit'];
							if($a==$b && $c==1 && $d==0)
							{
							$s++;
				
						            $rn=$val['MRN'];
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
									else
									{
					 				$rn=$rn;	
									}
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php printf("%06d", $rn);?></td>
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['age'];?></td>
						<td><?php echo $val['sex'];?></td>
						<td><?php echo $val['woreda'];?></td>
						<td><?php echo $val['phone'];?></td>
	                    <td><?php echo $val['creationdate'];?></td>
					
						<td>
							<a href="edit-patients1.php?editId=<?php echo $val['MRN'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a><br>  
							<a href="deletepatients.php?delId=<?php echo $val['MRN'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this patient?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}
					    
					  }}
					else
					{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php 
					} ?>
				     </tbody>
			        </table>
		            </div> <!--/.col-sm-12-->
		
	                  </div>
		
				     </body>
		        </html>

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
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->


        
              