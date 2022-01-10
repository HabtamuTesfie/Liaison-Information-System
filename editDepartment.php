<?php
	session_start();
	error_reporting(0);
	include_once('config.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>


<?php
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('medical_specialty','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	
	$data	=	array(
					
					'name'=>$name,
				    'image'=>$image,
					
					);
	$update	=	$db->update('medical_specialty',$data,array('id'=>$editId));
	if($update){
		header('location: categories.php?msg=rus');
		exit;
	}else{
		header('location: categories.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>admin</title>
            <meta charset="UTF-8">

	      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  background-color:#F0FFFF;
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
.card{
	margin-left:163px;
	 background-color:#F0FFFF;
	 color:black;
	
}

		  </style>
</head>

<body>

<div class="topnav">
     <center><span><h5><b>You Are Logged Us <?php echo $_SESSION['role']; ?>!!!</b></h5></span></center>
</div>

<div class="habt"> 
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="image/ma.JFIF" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">ADMIN</h4>
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="Admin.php" class="nav-link text-dark font-italic">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
				
               <b> MANAGE USER</b>
            </a>
    </li>
	
	
	
	<li class="nav-item">
      <a href="doctors.php" class="nav-link text-dark font-italic">
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
	    <li class="nav-item">
      <a href="statics.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                <b>STATISTICS</b>
            </a>
    </li>
	
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0"></p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                <b></b>
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                <b></b>
            </a>
    </li>
  
  </ul>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">
  <a href="logout.php" class="nav-link text-dark font-italic"> <i class="fa fa-power-off"></i>  <b>Logout</b> </a></p>
</div>
</div>
<!-- End vertical navbar -->
	   
	   
	   
	   
	   
	   
	   
	    <div class="container">
	    <br><br>
	
		   <div class="card">
			<div class="card-header"> 
			<a href="categories.php" class="float-left btn btn-dark"><i class="fa fa-arrow-left" style='font-size:24px'></i></a>
		  </div>

			<div class="card-body">
				
				<div class="col-sm-6">
				<center>
					<form method="post">

						<div class="form-group">
							<label>Department<span class="text-danger">*</span></label>
							<input type="text" name="name" id="name" class="form-control" 
							value="<?php echo $row[0]['name']; ?>" placeholder="Enter Department name" required>
						</div>
						<br>
                  <div class="form-group">
							<label>Image<span class="text-danger">*</span></label>
							<input type="file" name="image" id="image" class="form-control" 
							value="<?php echo $row[0]['image']; ?>" placeholder="" required>
						</div>
						<br>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update</button>
						</div>
					</form>
					</center>
				</div>
			</div>
		</div>
	</div>
</body>
</html>