
<?php
	session_start();
	error_reporting(0);
	date_default_timezone_set("Africa/Addis_Ababa");

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
	if(isset($_REQUEST['slidenum']) and $_REQUEST['slidenum']!=""){
		$condition	.=	' AND slidenum LIKE "%'.$_REQUEST['slidenum'].'%" ';
		}
		if(isset($_REQUEST['sdate']) and $_REQUEST['sdate']!=""){
		$condition	.=	' AND sdate LIKE "%'.$_REQUEST['sdate'].'%" ';
		}
		if(isset($_REQUEST['MRN']) and $_REQUEST['MRN']!=""){
		$condition	.=	' AND MRN LIKE "%'.$_REQUEST['MRN'].'%" ';
		}
		if(isset($_REQUEST['edate']) and $_REQUEST['edate']!=""){
		$condition	.=	' AND edate LIKE "%'.$_REQUEST['edate'].'%" ';
}
		if(isset($_REQUEST['stime']) and $_REQUEST['stime']!=""){
		$condition	.=	' AND stime LIKE "%'.$_REQUEST['stime'].'%" ';
	}
	if(isset($_REQUEST['etime']) and $_REQUEST['etime']!=""){
		$condition	.=	' AND etime LIKE "%'.$_REQUEST['etime'].'%" ';
	}
	
		if(isset($_REQUEST['distance']) and $_REQUEST['distance']!=""){
		$condition	.=	' AND distance LIKE "%'.$_REQUEST['distance'].'%" ';
		}
		if(isset($_REQUEST['reciever']) and $_REQUEST['reciever']!=""){
		$condition	.=	' AND reciever LIKE "%'.$_REQUEST['reciever'].'%" ';
     }
	
	if(isset($_REQUEST['passengers']) and $_REQUEST['passengers']!=""){
		$condition	.=	' AND passengers LIKE "%'.$_REQUEST['passengers'].'%" ';
	}
	
	
	if(isset($_REQUEST['submitter']) and $_REQUEST['submitter']!=""){
		$condition	.=	' AND submitter LIKE "%'.$_REQUEST['submitter'].'%" ';
	}
	
	
	$userData	=	$db->getAllRecords('ambula','*',$condition,'ORDER BY amb_id DESC');
	?>
	
	
	<div class="container">

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
		  
		  
				<div><a href="view ambulance.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a></div>	
			<br><br>
				<div class="col-sm-12">
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>slidenum</label>
									<input type="number" name="slidenum" id="slidenum" class="form-control" value="<?php echo isset($_REQUEST['MRN'])?$_REQUEST['MRN']:''?>" placeholder="please enter MRN">
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
							<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-success"><i class="fa fa-fw fa-sync"></i> Refresh</a>
							</div>
							</div>
							</div>
							
						</div>
					</form>
				</div>	
				
            </div>
         </div>				
					
			<hr>		

            <div>
			 <table class="table table-hover">
				<thead>
					<tr>
					   <th>S.N.</th>
						<th>slide number</th>
						<th>Patient MRN</th>
						<th>Start date</th>
						<th>End date</th>
						<th>Start time</th>
						<th>End time</th>
						<th>Distance(in KM)</th>
						<th>To(Name of health facility)</th>
						<th>Action</th>
						
						
						
					</tr
				</thead>
				
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$b=$val['request'];
							$today=date("Y-m-d");
							$a=$val['edate'];
							if($b==1 && $a>=$today)
							{
							 $s++;
							 $rnn=$val['MRN'];
					 				if(strlen($rnn)==1)
					 				$rn="000".$rnn;
					 				elseif(strlen($rnn)==2)
					 				$rn="00".$rnn;
					 				elseif(strlen($rnn)==3)
					 				$rn="0".$rnn;
					 				elseif(strlen($rnn)>3)
					 				$rnn=$rnn;									
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo "Am".$val['slidenum'];?></td>
						<td><?php printf("%06d", $rnn);?></td>
						<td><?php echo $val['sdate'];?></td>
						<td><?php echo $val['edate'];?></td>
						<td><?php echo $val['stime'];?></td>
						<td><?php echo $val['etime'];?></td>
	                    <td><?php echo $val['distance'];?></td>
						<td><?php echo $val['reciever'];?></td>
						
						 <td>
						<a href="editAssignedAmbulance.php?editId=<?php echo $val['amb_id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
						<a href="deleteAssignedambulance.php?delId=<?php echo $val['amb_id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this ambulance?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
					
					
					
					
					
					
					
					
					
					
		