

<?php
session_start();
error_reporting(0);
 require_once('connect.php');
 include_once('config.php');
if(!isset($_SESSION['user_id'])){ 
	Redirect('index.php'); 
	}
	else
	{
require_once('header.php');
	}
?>

	
<!DOCTYPE html>
<html lang="en">
  
<head>
   <title>Physician page</title>
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
		
		
		
		table {
            margin: 0 auto;
			margin-left:10px;
            font-size: large;
            border: 1px solid black;
			font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
			margin-right:15px;
        }

  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }



td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

 #customer th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.card{
	position:fixed;
	background-color:#F0FFFF;
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
	margin-left:-15px;
	background-color:silver;
	color:black;
}
#phys{
	background-color:black;
	color:white;
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
	  <a class="navbar-brand" href="viewRequestReferral.php" id="phys"><i class="fa fa-ambulance"></i> Request Referral</a>
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
  
  <a href="change-passwordPhysician.php">Change password</a>
  <a href="logout.php">Log out</a>
  <a href="#">
               			
			<div id="google_translate_element"></div>
			<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							
</a>
  </div>
</div>
	</div>
  </nav>
  </div>
  
 
  <br><br>
          
		  <?php
	$condition	=	'';
	if(isset($_REQUEST['comment_id']) and $_REQUEST['comment_id']!=""){
		$condition	.=	' AND comment_id LIKE "%'.$_REQUEST['comment_id'].'%" ';
		}
		if(isset($_REQUEST['MRN']) and $_REQUEST['MRN']!=""){
		$condition	.=	' AND MRN LIKE "%'.$_REQUEST['MRN'].'%" ';
	}
		if(isset($_REQUEST['comment_text']) and $_REQUEST['comment_text']!=""){
		$condition	.=	' AND comment_text LIKE "%'.$_REQUEST['comment_text'].'%" ';
		}
		if(isset($_REQUEST['admissionDate']) and $_REQUEST['admissionDate']!=""){
		$condition	.=	' AND admissionDate LIKE "%'.$_REQUEST['admissionDate'].'%" ';
}
		if(isset($_REQUEST['NCoD']) and $_REQUEST['NCoD']!=""){
		$condition	.=	' AND NCoD LIKE "%'.$_REQUEST['NCoD'].'%" ';
	}
	if(isset($_REQUEST['length']) and $_REQUEST['length']!=""){
		$condition	.=	' AND length LIKE "%'.$_REQUEST['length'].'%" ';
	}
	if(isset($_REQUEST['condtion']) and $_REQUEST['condtion']!=""){
		$condition	.=	' AND condtion LIKE "%'.$_REQUEST['condtion'].'%" ';
	}
	
	if(isset($_REQUEST['result']) and $_REQUEST['result']!=""){
		$condition	.=	' AND result LIKE "%'.$_REQUEST['result'].'%" ';
	}
	if(isset($_REQUEST['Screen']) and $_REQUEST['Screen']!=""){
		$condition	.=	' AND Screen LIKE "%'.$_REQUEST['Screen'].'%" ';
	}
	if(isset($_REQUEST['resultTB']) and $_REQUEST['resultTB']!=""){
		$condition	.=	' AND resultTB LIKE "%'.$_REQUEST['resultTB'].'%" ';
	}
	if(isset($_REQUEST['diagnosis']) and $_REQUEST['diagnosis']!=""){
		$condition	.=	' AND diagnosis LIKE "%'.$_REQUEST['diagnosis'].'%" ';
	}
	if(isset($_REQUEST['screened']) and $_REQUEST['screened']!=""){
		$condition	.=	' AND screened LIKE "%'.$_REQUEST['screened'].'%" ';
	}
	
	
	
	$userData	=	$db->getAllRecords('DischargeNotification','*',$condition,'ORDER BY comment_id DESC');
	?> 
		  
<br>
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
		  
		  
					
			
				
				
					
					
							<div class="form-group">
							<label>&nbsp;</label>
							<div>
							
							<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-primary"><i class="fa fa-fw fa-sync"></i> Refresh</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
							
							
				  <a href="feedback.php" id="space" class="btn btn-primary"><i class="fas fa-thumbs-up" style="font-size:24px"></i> Send feedback </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="viewSentFeedback.php" id="space" class="btn btn-primary"><i class="fas fa-eye" style="font-size:24px"> </i> View sent feedback <i class=""> </i></a>
							</div>
							</div>
							
							
						</div>
				
			
				
            </div>
        			
					
			<hr>		
        <br><br><br>
        <h1>Discharged patient information</h1>
        <div>
        <table class="table table-hover" id="customers">
		<thead>
            <tr style="background-color:#566D7E; color:white;">
			    <th>S.N</th>
                <th>MRN</th>
                <th>Adress</th>
                <th>Discharge date</th>
                <th>Length of stay</th>
                <th>Condition at discharge</th>
               <th>status</th>
				<th>&nbsp;</th>
		</tr>
     </thead>  
	 <tbody>
            <?php 
           if(count($userData)>0){
			$s	=	'';
			
				foreach($userData as $val){
					$s++;
             
                 if ( $val['comment_status']==0) 
                 {
					$status="<font color=green>New</font";	
                 }
				else{
				$status=" <font color=blue>Visited</font>";   
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
						<td><?php echo $val['comment_text'];?></td>
						<td><?php echo $val['admissionDate'];?></td>
						<td><?php echo $val['length'];?></td>
	                    <td><?php echo $val['condtion'];?></td>
						<td><?php echo $status;?></td>
						<td><a href="deleteNotification.php?delId=<?php echo $val['comment_id'];?>" 
						class="text-danger" onClick="return confirm('Are you sure to delete this data?');">X</a></td>
					
					</tr>
					<?php 
						}
					}
					else
					{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
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


				