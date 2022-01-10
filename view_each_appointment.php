
<?php include_once('config.php'); 
error_reporting(0);

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('appointment','*',' AND App_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	
	$data	=	array(
					'reason'=>$reason,
					'Appdate'=>$Appdate,
					'ward'=>$ward,
					);
	$update	=	$db->update('appointment',$data,array('App_id'=>$editId));
	if($update){
		header('location: viewappointment.php?msg=rus');
		exit;
	}else{
		header('location: viewappointment.php?msg=rnu');
		exit;
	}
}
?>


<?php
	session_start();
	require_once('connect.php');
	
	require_once('db_connect.php');
	if(!isset($_SESSION['user_id']))
	{ 
Redirect('index.php'); }
	else
	{

	}
?>


<!doctype html>
<htm>
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
  height: 100vh;
  width: 100vw;
  position:fixed;
 
 
}
.container{
	 width: 102%;
	 margin-left: -2%;
    position:fixed;
	}
	.contain{
		margin-left:260px;
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
form{
	background-color:#F0FFFF;
	color:black;
	margin-left:200px;
	margin-right:500px;
}
table{
border-collapse:separate;
border-spacing:0 30px;


}	
td{
	text-align:center;
	font-weight:bold;
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
  
	<br><br><br><br>	
	
	
<a href="viewappointment.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>





   	
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> bed type is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Ward name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Total bed is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		
		<form method="post">
			           
                       


              <fieldset>
						   
						 <legend align="center" ><h2>Appointment form</h2></legend>
						     <table border = 0 cellspacing= 30 cellpadding=0 align="center">
                              <tr>
							 <td>Department/Ward:</td>
							 <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 <select name="ward"    class="custom-select browser-default select2" required="true">
								<option value=""><?php echo $row[0]['ward'];?></option>
									
									<?php
									$result2=mysqli_query($server,"SELECT * FROM medical_specialty  ORDER BY name asc");
									while($row2=mysqli_fetch_assoc($result2))
									{
										echo"<option value=$row2[name]>$row2[name]</option>";
									}
								   ?>
							 </select> </td>
							  </tr>
							  
							  <tr>
                        <td>Date of appointment:</td>
                        <td> <input type="date" name="Appdate" class="text-long" value="<?php echo $row[0]['Appdate']; ?>" required > </td>
							  </tr>
						  <tr>
                        <td>Doctor:</td>
                        <td> <select name="reason"    class="custom-select browser-default select2" required="true">
									<option value=""><?php echo $row[0]['reason'];?></option>
									<?php
									$result3=mysqli_query($server,"SELECT * FROM users where role='Physician' ORDER BY name asc");
									while($row3=mysqli_fetch_assoc($result3))
									{
										echo"<option value=$row3[name]>$row3[name]</option>";
									}
								   ?>
								</select> </td>
							 </tr>
						 
                        	 	</table>
                        </fieldset>
                 </form>
					
			
</body>
</html>
<script src="include/formvalidation.js"></script>
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