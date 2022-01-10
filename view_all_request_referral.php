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
    <meta charset="UTF-8">
    <title>Physician page</title>
     
	 <script src="include/min.js"></script>
     <link rel="stylesheet" href="include/dist/css/bootstrap.min.css" />
     <script src="include/min1.js"></script>
	
	 <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/fontawesome.min.css">
    
    <style>

 
body {
  border-left: 15px solid silver;
  background-color:#F0FFFF;
  height: 100vh;
  width: 100vw;
  
}
.container{
	 width: 102%;
	 margin-left: -2%;
    position:fixed;
	}
	
	
.dropbtn {
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: black;
}

.navbar{
background-color: black;
color:white;	
}
#notification {
  background-color: #555;
  color: white;
  text-decoration: none;
 
  top: 15px;
  right: 40px;
  position: relative;
  display: inline-block;
  border-radius: 100%;
}
#notification:hover {
  background: red;
}

#notification #badge {
  position: absolute;
  top: 0;
  right: 10px;
  padding: 5px 10px;
  border-radius: 100%;
  background: red;
   text-align: top;
  color: white;
}
#Notify{
	margin-left:-17px;
	background-color:black;
	color:white;
}
#phys{
	background-color:black;
	color:white;
}
#physi{
	background-color:silver;
	color:black;
}
 </STYLE>
</head>
<body>
 
 <div class="container">
  <nav class="navbar navbar-inverse">
   <div class="container-fluid">
    <div class="navbar-header"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	   
	
	  <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <a class="navbar-brand" href="physicianhomepage.php" id="phys"><i class="fas fa-home"></i>Home</a>
	  <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	  <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
	  <a class="navbar-brand" href="viewRequestReferral.php" id="physi"><i class="fa fa-ambulance"></i> Request Referral</a>
	 <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
	 
	 <a class="navbar-brand" href="viewappointment.php" id="phys"><i class="fa fa-calendar" aria-hidden="true"> </i> Appointment</a>
	 
	 </div>
	 
    <ul class="nav navbar-nav navbar">
	
     <li class="dropdown">
      <a href="" class="dropdown-toggle" data-toggle="dropdown">
	   <span class="label label-pill label-danger count" id="badge" ></span>
	   <span class="glyphicon glyphicon-bell" id="notification" style="font-size:18px;"></span>
	  </a> 
	 
      <ul class="dropdown-menu"></ul>
	  </li>
    </ul>
	
	<div>
<a class="navbar-brand" id="Notify" href="Notify.php">Discharge notification</a>
	</div>
		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<div class="dropdown">
  <button class="dropbtn"> <i class="fas fa-user"> </i> User   <i  class="fa fa-angle-down"></i></button>
  <div class="dropdown-content">
  <a href="#">
               			
			<div id="google_translate_element"></div>
			<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							
</a>
  <a href="change-passwordPhysician.php">Change password</a>
  <a href="logout.php">Log out</a>
  
  </div>
</div>
	</div>
  </nav>
  </div>
  


  
	<br><br><br><br><br><br>	



	<a href="viewRequestReferral.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['MRN']) and $_REQUEST['MRN']!=""){
		$condition	.=	' AND MRN LIKE "%'.$_REQUEST['MRN'].'%" ';
		}
		if(isset($_REQUEST['pname']) and $_REQUEST['pname']!=""){
		$condition	.=	' AND pname LIKE "%'.$_REQUEST['pname'].'%" ';
		}
		
		if(isset($_REQUEST['follow']) and $_REQUEST['follow']!=""){
		$condition	.=	' AND follow LIKE "%'.$_REQUEST['follow'].'%" ';
		}
		if(isset($_REQUEST['submitdate']) and $_REQUEST['submitdate']!=""){
		$condition	.=	' AND submitdate LIKE "%'.$_REQUEST['submitdate'].'%" ';
}
if(isset($_REQUEST['outcome']) and $_REQUEST['outcome']!=""){
		$condition	.=	' AND outcome LIKE "%'.$_REQUEST['outcome'].'%" ';
}
if(isset($_REQUEST['diagnosis']) and $_REQUEST['diagnosis']!=""){
		$condition	.=	' AND diagnosis LIKE "%'.$_REQUEST['diagnosis'].'%" ';
}
if(isset($_REQUEST['treatment']) and $_REQUEST['treatment']!=""){
		$condition	.=	' AND treatment LIKE "%'.$_REQUEST['treatment'].'%" ';
}
if(isset($_REQUEST['user_id']) and $_REQUEST['user_id']!=""){
		$condition	.=	' AND user_id LIKE "%'.$_REQUEST['user_id'].'%" ';
	}
	$userData	=	$db->getAllRecords('requestreferral','*',$condition,'ORDER BY fed_id DESC');
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
		  
		  
					
				<div class="hab">	
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i>SEARCH APPOINTMENT</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>MRN</label>
									<input type="number" name="MRN" id="MRN" class="form-control" value="<?php echo isset($_REQUEST['MRN'])?$_REQUEST['MRN']:''?>" placeholder="please enter MRN">
								</div>
								</div>
								
							<div class="col-sm-2">
								<div class="form-group">
									<label>Patient Name:</label>
									<input type="text" name="pname" id="pname" class="form-control" value="<?php echo isset($_REQUEST['pname'])?$_REQUEST['pname']:''?>" placeholder="Enter patient name">
								</div>
								</div
					

							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-primary"><i class="fa fa-fw fa-sync"></i>Refresh</a>
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
										</div>
								</div>
							</div>
							
							
							
							
						</div>
					</form>
				</div>	
            </div>
         </div>				
		</div>			
			<hr>		

            <div>
			 <table class="table table-hover">
				<thead>
					<tr class="bg-primary text-white">
					   <th>S.N.</th>
						<th>MRN:</th>
						<th>Patient Full Name:</th>
						<th>Woreda/Sub City</th>
						<th>Date of request made</th>
						<th>Reciever(Health facility)</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
						
						
					</tr
				</thead>
				
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
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
						<td><?php echo $val['follow'];?></td>
						<td><?php echo $val['submitdate'];?></td>
						<td><?php echo $val['outcome'];?></td>
						<td align="center">
							<a href="view_each_request_referral.php?editId=<?php echo $val['fed_id'];?>" class="text-primary"><i class="fa fa-fw fa-eye"></i>View</a>  
							
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
		</div> <!--/.col-sm-12-->
		
	</div>
</body>
</html>
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
$('#comment_form').on('submit', function(event){
 event.preventDefault();
 if($('#subject').val() != '' && $('#comment').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#comment_form')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>

              