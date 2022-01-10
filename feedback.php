<?php
	session_start();
	require_once('connect.php');
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
 .topnav {
  background-color:#DBF9DB;
  color:green;
}

input[type=submit]{
  background-color:#4CC417;
}
input[type=reset] {
background-color:#FF2400;
  
}

  body
	{
		
		}
		form
	{
	background-color:#F0FFFF;	
	}
table{
border-collapse:separate;
border-spacing:0 30px;

}	
td{
	text-align:center;
	font-weight:bold;
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
  
				
				
				
				
	<br><br><br>			
	<a href="Notify.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>			
                <form method="post" class="jNice" action="send feedback.php">
					
                   
					
                    	<fieldset>
						 <legend align="center" ><h2>Referral Feedback Form</h2></legend>
						 <table border = 0 cellspacing= 30 cellpadding=0 align="center">
						  <tr>
                        <td>MRN:</td>
                        <td> <input type="number" name="MRN" class="text-long" value="" /> </td>
                      </tr>
                   <tr>
                  <td> Diagnosis</td>
					<td><textarea id="diagnosis" name="diagnosis" value="  " rows="4" cols="40">
				   </textarea>
				 </td>
                    </tr>
					<tr>
					
					<td> Treatment Given </td>
					<td><textarea id="treatment" name="treatment" value="  " rows="4" cols="40">
                 </textarea>
				 </td>
				 
				   
				   </tr>
					
					<tr>
					 
					<td> Outcome </td>
					<td><textarea id="outcome" name="outcome" value="  " rows="4" cols="40">
                 </textarea>
				 </td>
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

       