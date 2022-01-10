

<?php
	session_start();
	error_reporting(0);
	date_default_timezone_set("Africa/Addis_Ababa");
	require_once('connect.php');
	require_once('db_connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg>Bed Added Successfully</span><br><br>";
		require_once('header.php');
	}
?>



<html>
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
cellspacing:200px;

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
	  <a class="navbar-brand" href="viewRequestReferral.php" id="phys"><i class="fa fa-ambulance"></i> Request Referral</a>
	 <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
	 
	 <a class="navbar-brand" href="viewappointment.php" id="physi"><i class="fa fa-calendar" aria-hidden="true"> </i> Appointment</a>
	 
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
                <form method="post" >
					
                    <?php
						if(isset($_POST['save']))
						{
							$MRN=$_POST['MRN'];
							$ward=$_POST['ward'];
							$Appdate=$_POST['Appdate'];
							$reason=$_SESSION['name'];
							$pname="";
							$phone="";
							$user_id=$_SESSION['user_id'];
							$id="";
							
				$today =date("Y-m-d");
                if($Appdate<=$today)
                {
	echo'<script>alert(" Invalid Appointment Date.")</script>'; 
                }
                else{				
				$query =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
                 while($row=mysqli_fetch_row($query))
						{
					$pname=$row[2];
                    $phone=$row[6];	
                         }
				$A =mysqli_query($server,"SELECT * FROM medical_specialty WHERE name  = '". $ward ."'"); 
                 while($row=mysqli_fetch_row($A))
						{
					$id=$row[0];	
                         }		 
						 
						 
			$query =mysqli_query($server,"SELECT * FROM patients WHERE MRN  = '". $MRN ."'"); 
                 if (mysqli_num_rows($query) > 0) 
                {
					$query =mysqli_query($server,"SELECT * FROM Appointment WHERE MRN  = '". $MRN ."'"); 
                          $MRNduplicate = null;
                 if (mysqli_num_rows($query) > 0) 
                {
					 echo'<script>alert(" Patient with this MRN is Already Appointed.")</script>'; 
       
                }
					
				else
				{
					
				$in_ch=mysqli_query($server,"INSERT INTO Appointment (MRN,user_id,id,pname,phone,
				ward,Appdate,reason)
				VALUES ('$MRN','$user_id','$id','$pname','$phone','$ward',
				'$Appdate','$reason')");
				
							if($in_ch==1)  
                                 {  
                            echo'<script>alert("Appointment Registered Successfully")</script>';  
                             }  
                             else  
                                 {  
                          echo'<script>alert("Failed To Insert")</script>';  
                             }  
	
							}
							
							if($error!=""){ echo $error; }
						}
						else{
					 echo'<script>alert("Patient with this MRN is not registered")</script>';  	
					}
						}}
					?>
					
		
					
                    	<fieldset>
						   
						 <legend align="center" ><h2>Patient Appointment Form</h2></legend>
						     <table border = 0 cellspacing= 30 cellpadding=0 align="center">
								<tr>
                        <td>MRN:</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text"  name="MRN"  maxlength="6"
						onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"
						pattern=".{6,}" required
					    id="MRN" 
                       value="" autofocus >
					<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span> </td>
							  </tr> 
                              <tr>
							 <td>Department/Ward:</td>
							 <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 <select name="ward"    class="custom-select browser-default select2" required="true">
								<option value=""></option>
									<?php 
									$qry = $conn->query("SELECT * FROM medical_specialty order by name asc");
										while($row=$qry->fetch_assoc()):
									 ?>
									<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
							 </select> </td>
							  </tr>
							  
							  <tr>
                        <td>Date of appointment:</td>
                        <td> <input type="date" name="Appdate" class="text-long" value="" required/> </td>
							  </tr>
						  
							  	  
						
					<tr align="center">
                        <td align="center"><button type="submit" name="save" class="btn btn-lg btn-info">Submit</button></td>
                        <td></td><td></td><td></td>
						<td align="center"> <button type="reset" name="reset" class="btn btn-lg btn-info">Cancel</button></td>
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