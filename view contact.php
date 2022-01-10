

<?php 

include_once('config.php');
error_reporting(0);

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


	<?php
	$condition	=	'';
	if(isset($_REQUEST['name']) and $_REQUEST['uname']!=""){
		$condition	.=	' AND uname LIKE "%'.$_REQUEST['uname'].'%" ';
	}
	if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
		$condition	.=	' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
	}
	
	if(isset($_REQUEST['role']) and $_REQUEST['role']!=""){
		$condition	.=	' AND role LIKE "%'.$_REQUEST['role'].'%" ';
	}
	if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
		$condition	.=	' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
	}
	
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('contact','*',$condition,'ORDER BY dt DESC');
	?>
	




<!-- Page content holder -->
<div class="page-content p-5" id="content">


<hr>
		
		   <div class="hab">
			<table class="table table-hover">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>name</th>
						<th>User Email</th>
						<th>User Phone</th>
						<th>Message</th>
						<th>Sent date</th>
						
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
						<td><?php echo $val['name'];?></td>
						<td><?php echo $val['useremail'];?></td>
						<td><?php echo $val['userphone'];?></td>
						<td><?php echo $val['role'];?></td>
						<td><?php echo $val['dt'];?></td>
						
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

</body>
</html>


