<?php 
session_start();
error_reporting(0);
require_once('connect.php');
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
.space{
	margin-left:650px;
	margin-top:50px;
	
}
#but{
	background-color:danger;
	color:white;
	text-decoration: none;
}
.admin{
	margin-left:-50px;
}
table{
	background-color:white;
	color:black;
}
a:link{color:black;}
a:visited{color:green;}
a:hover{color:hotpink;}
a:active{color:blue;}
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
      <a href="AdminHome.php" class="nav-link text-dark font-italic" id="home">
                <i class="fa fa-home mr-3 text-secondary fa-fw"></i>
				
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

<div class="page-content p-5" id="content">
<div class="admin">
<img src="image/admin5.JFIF" alt="Admistrator" width="350" height="250">
          &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<img src="image/admin3.JFIF" alt="Admistrator" width="350" height="250">
</div>
					<center><h3>User Statistics</h3></center>
               	  <table class="table table-hover">
                  <?php
				  	$result=mysqli_query($server,"SELECT COUNT(user_id) FROM users where role='Admin' ");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(user_id) FROM users where role='Physician' ");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(user_id) FROM users where role='Liaison officer' ");
					$row3=mysqli_fetch_row($result3);
					
					 $result4=mysqli_query($server,"SELECT COUNT(user_id) FROM users where role='HMIS focal person' ");
					 $row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(id) FROM medical_specialty");
					$row5=mysqli_fetch_row($result5);
					
					$today =date("Y-m-d");
					$result6=mysqli_query($server,"SELECT COUNT(id) FROM userlog where date(creationdate)='$today' ");
					$row6=mysqli_fetch_row($result6);
					
					
  							echo"<tr>
							   <td align=center valign=middle><b>S.N.</b></td>
    							<td align=center valign=middle><b>Users</b></td>
    							<td align=center valign=middle><b>Total Number</b></td>
								
  							</tr>
  							<tr>
							    <td align=center valign=middle><b>1</b></td>
    							<td align=center valign=middle><b>Admin</b></td>
    							<td align=center valign=middle><b>$row[0]</b></td>
								
							</tr>
							<tr>
							  <td align=center valign=middle><b>2</b></td>
   							  <td align=center valign=middle><b>HMIS focal person</b></td>
    						  <td align=center valign=middle><b>$row4[0]</b></td>
							</tr>
  							<tr>
							     <td align=center valign=middle><b>3</b></td>
    							<td align=center valign=middle><b>Physician</b></td>
    							<td align=center valign=middle><b>$row2[0]</b></td>
								
							</tr>
  							<tr>
							    <td align=center valign=middle><b>4</b></td>
   		 						<td align=center valign=middle><b>Liaison officer</b></td>
    							<td align=center valign=middle><b>$row3[0]</b></td>
								
							</tr>";
					?>
				  </table>
				  
				  <h5>Total Departments Registered <button type="button" class="btn btn-danger btn-lg"><a href="categories.php" id="but"><?php echo $row5[0]; ?>
				  </a></button>
				  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	             &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp				
				 Todays User log<button type="button" class="btn btn-danger btn-lg"><a href="user-logs.php" id="but"><?php echo $row6[0]; ?></a></h5>
				  
				  
				  
				  
				  
                </div>





<?php
    /* Your Database Name */
$dbname = 'bed';
$username = 'root';
$password = '';

try {
  /* Establish the database connection */
  $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  /* select all the weekly tasks from the table googlechart */
  $result = $conn->query('SELECT role, concat((count( * ) *100 / (SELECT count( * ) FROM `users`)) , "%") AS percent FROM `users` GROUP BY 	role ');
  $rows = array();
  $table = array();
  $table['cols'] = array(

    // Labels for your chart, these represent the column titles.
    /* 
        note that one column is in "string" format and another one is in "number" format 
        as pie chart only required "numbers" for calculating percentage 
        and string will be used for Slice title
    */

    array('label' => 'role', 'type' => 'string'),
    array('label' => 'percent', 'type' => 'number')

);
    /* Extract the information from $result */
    foreach($result as $r) {

      $temp = array();

      // the following line will be used to slice the Pie chart

      $temp[] = array('v' => (string) $r['role']); 

      // Values of each slice

      $temp[] = array('v' => (int) $r['percent']); 
      $rows[] = array('c' => $temp);
    }

$table['rows'] = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
 ?>
<div class="space">
    <!--Load the Ajax API-->
    <script type="text/javascript" src="include/loader.js"></script>
    <script src="include/jquery.js"></script>
    <script src="include/chart.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: 'Users based on role',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  

  
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
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


