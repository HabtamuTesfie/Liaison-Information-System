
<?php
date_default_timezone_set("Africa/Addis_Ababa"); 
session_start();
error_reporting(0);
include_once('config.php');
require_once('connect.php');
if(!isset($_SESSION['user_id']))
{ 
Redirect('index.php');
}
	else
	{
		
	}


?>

	

<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Liaison Information System</title>
	
	     <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
          <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
		  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
		  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/fontawesome.min.css">
		 <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen"> 
		<style>
.vertical-nav {
  min-width: 17rem;
  width: 17rem;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;

}

.page-content {
  width: calc(100% - 17rem);
  margin-left: 17rem;
  transition: all 0.4s;
}

/* for toggle behavior */

#sidebar.active {
  margin-left: -17rem;
}

#content.active {
  width: 100%;
  margin: 0;
}

@media (max-width: 768px) {
  #sidebar {
    margin-left: -17rem;

	
  }
  #sidebar.active {
    margin-left: 0;
  }
  #content {
    width: 100%;
    margin: 0;
  }
  #content.active {
    margin-left: 17rem;
    width: calc(100% - 17rem);
  }
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
 
  min-height: 100vh;
  overflow-x: hidden;
  background-color:#F0FFFF
}

.separator {
  margin: 3rem 0;
  border-bottom: 1px dashed #fff;
}

.text-uppercase {
  letter-spacing: 0.1em;
}

.text-gray {
  color: #aaa;
}





.nav{
width:100%;
margin-top:0px;


}
/* Add a black background color to the top navigation */
.topnav {
  background-color: black;
  color:white;
  overflow: hidden;
  margin-left:90px;
   position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%;
 
}

/* Style the links inside the navigation bar */
.topnav a {
  float: top;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.hab{
	margin-left:276px;
}






	</style>
	
</head>

<body>
<div class="topnav">
     <center><span><h5><b>You Are Logged As <?php echo $_SESSION['role']; ?>!!!</b></h5></span></center>
 </div>



<div class="habt"> 
<div class="vertical-nav bg-light" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="image/ma.JFIF" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">ADMIN</h4>
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>

  <ul class="nav flex-column bg-light mb-0">
    <li class="nav-item">
      <a href="AdminHome.php" class="nav-link text-dark font-italic">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
				
               <b>HOME</b>
            </a>
    </li>
  
  
    <li class="nav-item">
      <a href="Admin.php" class="nav-link text-dark font-italic">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
				
               <b> MANAGE USER</b>
            </a>
    </li>
	
	<li class="nav-item">
      <a href="categories.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book-medical mr-3 text-primary fa-fw"></i>
				
               <b>DEPARTMENTS</b>
            </a>
    </li>
	
	
    <li class="nav-item">
      <a href="user-logs.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-secondary fa-fw"></i>
                <b>USER LOGS</b>
            </a>
      </li>
    </ul>

  <br><br><br><br><br><br><br>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">
  <a href="logout.php" class="nav-link text-dark font-italic"> <i class="fa fa-power-off"></i>  <b>Logout</b> </a></p>

  <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  
  
  </div>
</div>
<!-- End vertical navbar -->
<br><br><br><br>


	<?php
	date_default_timezone_set("Africa/Addis_Ababa");
	$condition	=	'';
	if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
		$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
	}
	if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
	}
	if(isset($_REQUEST['uid']) and $_REQUEST['uid']!=""){
		$condition	.=	' AND uid LIKE "%'.$_REQUEST['uid'].'%" ';
	}
	if(isset($_REQUEST['password']) and $_REQUEST['password']!=""){
		$condition	.=	' AND password LIKE "%'.$_REQUEST['password'].'%" ';
	}
	if(isset($_REQUEST['role']) and $_REQUEST['role']!=""){
		$condition	.=	' AND role LIKE "%'.$_REQUEST['role'].'%" ';
	}
	if(isset($_REQUEST['loginTime']) and $_REQUEST['loginTime']!=""){
		$condition	.=	' AND loginTime LIKE "%'.$_REQUEST['loginTime'].'%" ';
	}
	if(isset($_REQUEST['logoutTime']) and $_REQUEST['logoutTime']!=""){

	$condition	.=	' AND logoutTime LIKE "%'.$_REQUEST['logoutTime'].'%" ';

	}
	
	
	$userData	=	$db->getAllRecords('userlog','*',$condition,'ORDER BY id DESC');
	?>
<div class="hab">
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
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-secondary"><i class="fa fa-fw fa-sync"></i> Refresh</a>
									</div>
							</div>
							 
						</div>
					</form>
				</div>
			</div>



	          
						<table class="table table-hover">
										<thead>
											<tr  class="bg-primary text-white">
												<th class="center">#</th>
												<th>Username</th>
												<th>User full name</th>
												<th>Role</th>
												<th>Password</th>
												<th>Login time</th>
												<th>Logout time</th>
												<th>Action</th>
												
											
												
												
											</tr>
										</thead>
                   <?php
				 date_default_timezone_set("Africa/Addis_Ababa");
                 $today =date("Y-m-d");				   
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$b=$val['creationdate'];
							if($today<=$b)
							{
							$s++;
				
							
					?>
											<tr>
												<td><?php echo $s;?></td>
												<td class="hidden-xs"><?php echo $val['username'];?></td>
												<td><?php echo $val['name'];?></td>
												<td><?php echo $val['role'];?></td>
												<td><?php echo $val['password'];?></td>
												<td><?php echo $val['loginTime'];?></td>
											    <td><?php echo $val['logoutTime'];?></td>
												<td align="center">
							<a href="deleteuserlog.php?delId=<?php echo $val['id'];?>" title="Are you sure to delete this userlog information?"
							class="text-danger" onClick="return confirm('Are you sure to delete this userlog information?');"><i class="fa fa-times fa fa-white"></i></a>
						</td>
											</tr>
												<?php 
						}
						}
					}
					else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
											
										</tbody>
									</table>
								</div>







<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

<!-- End demo content -->
<script>
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
</script>


</body>
</html>