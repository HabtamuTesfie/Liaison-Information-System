
<?php 
session_start();
error_reporting(0);
require_once('connect.php');
//include('db_connect.php');
include_once('config.php');
//require_once 'dbConfig.php'; 
if(!isset($_SESSION['user_id']))
{ 
Redirect('index.php');
}
	else
	{
	//require_once('header.php');	
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
	margin-left:260px;
	margin-top:38px;
}
#refresh{
	position:fixed;
	margin-left
}


	</style>
	
</head>

<body>





<?php 


// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);		
         
        // Allow certain file formats 
        $allowTypes = array('JPEG','JPG','jpg','png','PNG','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
             
            $speciality=$_POST['name'];
			
    $insert = mysqli_query($server,"INSERT INTO medical_specialty (name,image) 
				VALUES ('$speciality','$image')");
			
			
            // Insert image content into database 
            //$insert = $db->query("INSERT into medical_specialty (name,image) VALUES ('$speciality','$image')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>
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
                <i class="fa fa-book-medical mr-3 text-secondary fa-fw"></i>
				
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

<div class="hab">
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			
			<div class="col-md-4">
			
			<a href="<?php echo $_SERVER['PHP_SELF'];?>" id="refresh" class="btn btn-secondary"><i class="fa fa-fw fa-sync"></i>Refresh</a>
			<br><br><br>
			<form action=""  action="" method="post" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						    Medical Specialties Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Department Name</label>
								<textarea name="name" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="image">
							</div>
							<div class="form-group">
								<img src="" alt="" id="cimg">
							</div>	
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" name="submit"  class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button type="reset"   class="btn btn-sm btn-default col-sm-3" type="button"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<?php 
							$condition	=	'';
	                        if(isset($_REQUEST['image']) and $_REQUEST['image']!=""){
		                     $condition	.=	' AND image LIKE "%'.$_REQUEST['image'].'%" ';
		                          }
		                  if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		                   $condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
		                        }
							$userData	=	$db->getAllRecords('medical_specialty','*',$condition,'ORDER BY id ASC');
						?>
			<div class="col-md-8">
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
			</div>	
					<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Image</th>
									<th class="text-center">Name</th>
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
									<td class="text-center"><?php echo $s;?></td>
									<td class="text-center">
										<img src="assets/img/<?php echo $val['image'] ?>" alt="">
									</td>
									<td class="">
										 <b><?php echo $val['name'];?></b>
									</td>
									<td class="text-center"> 
							        <a href="deleteDepartment.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this department?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
					
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>
</div>
</body>
</html>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
