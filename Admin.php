

<?php 
session_start();
error_reporting(0);
include_once('config.php');
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
		  
		  
		  
		<style>
.vertical-nav {
  min-width: 17rem;
  width: 17rem;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 3px 3px 10px rgba(1, 1, 1, 0.1);
  transition: all 0.8s;

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
  background-color:#F0FFFF;
}
table{
	margin-right:-100px;
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

#space{
	margin-left:950px;
	position:fixed;
}
.hab{
	margin-left:-45px;
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
                <i class="fa fa-user mr-3 text-secondary fa-fw"></i>
				
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
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
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



	<?php
	$condition	=	'';
	if(isset($_REQUEST['uname']) and $_REQUEST['uname']!=""){
		$condition	.=	' AND uname LIKE "%'.$_REQUEST['uname'].'%" ';
	}
	if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
		$condition	.=	' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
	}
	if(isset($_REQUEST['pword']) and $_REQUEST['pword']!=""){
		$condition	.=	' AND pword LIKE "%'.$_REQUEST['pword'].'%" ';
	}
	if(isset($_REQUEST['role']) and $_REQUEST['role']!=""){
		$condition	.=	' AND role LIKE "%'.$_REQUEST['role'].'%" ';
	}
	if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
		$condition	.=	' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
	}
	if(isset($_REQUEST['SID']) and $_REQUEST['SID']!=""){
		$condition	.=	' AND SID LIKE "%'.$_REQUEST['SID'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('users','*',$condition,'ORDER BY user_id DESC');
	?>
	




<!-- Page content holder -->
<div class="page-content p-5" id="content">

<div class="card-header">
 <a href="add-users.php" id="space"   class="float-right btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> 
Add Users</a></div>


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
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i>Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="uname" id="username" class="form-control"
									value="<?php echo isset($_REQUEST['uname'])?$_REQUEST['uname']:''?>" placeholder="Enter user name">
								</div>
								</div>
					
							<div class="col-sm-2">
								<div class="form-group">
									<label>User Phone</label>
									<input type="tel" name="userphone" id="userphone" class="form-control" 
									value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Enter user phone">
								</div>
							</div>
                               
							 <div class="col-sm-2">
								   <div class="form-group">
								 <label>&nbsp;</label><br>
								<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										</div>
				             </div>
										
								<div class="col-sm-2">
										<div class="form-group">
										 <label>&nbsp;</label><br>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-secondary"><i class="fa fa-fw fa-sync"></i> Refresh</a>
									</div>
								</div>
							 
						</div>
					</form>
				</div>
			</div>
		

<hr>
		
		   <div class="hab">
			<table class="table table-hover">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>Username</th>
						<th>Full Name</th>
						<th>Role</th>
						<th>User Email</th>
						<th>User Phone</th>
						<th>Security Id</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['uname'];?></td>
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['role'];?></td>
						<td><?php echo $val['useremail'];?></td>
						<td><?php echo $val['userphone'];?></td>
						<td><?php echo $val['SID'];?></td>
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['user_id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i>Edit</a>
							<a href="delete.php?delId=<?php echo $val['user_id'];?>" class="text-danger" onClick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-fw fa-trash"></i>Delete</a>
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


</div>
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


