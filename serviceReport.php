<?php
session_start();
error_reporting(0);
include('include/config.php');
require_once('connect.php');
include('include/checklogin.php');
check_login();
if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View Reports</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<style>
	#space{
	margin-left:93%;

}
#page-title{
	
	background-color:white;
}
.font{
font-size:25px;
color:red;
}

	</style>
	
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header1.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<a  href="#" id="space">
</a><?php echo date("d/m/y") ;  ?>
<center><img src="image/logo.PNG" alt="..." width="150px" height="100px"></center>

</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">

<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$to=$_POST['to'];
$period=$_POST['period'];
$diff = strtotime($fdate) - strtotime($tdate);
$a=ceil(abs($diff / 86400));
 
?>

<h4 class="tittle-w3-agileits mb-4" style="color:blue"><?php echo $period?> Report from University of Gondar Comprehensive Specialized Hospital Liaison Office to
<?php echo $to?></h4>



<?php
//from appointment
$s =0;
 $query =mysqli_query($server,"SELECT * FROM appointment
 where date(creationdate) between '$fdate' and '$tdate'AND ward='Surgical ward' "); 
                 if (mysqli_num_rows($query) > 0) 
                {
					while($row=mysqli_fetch_row($query))
						{

					$appoDate=strtotime($row[7]);
					$regDate=strtotime($row[10]);
					$diff = abs(floor( ($appoDate-$regDate) /(60*60*24)));
                   $s =$s+$diff;
		        }

mysqli_query($server,"update report set Dnumber='$s'where report_id=1");
						
				}


//from beds
$result1=mysqli_query($con,"SELECT COUNT(totalBed) FROM beds where date(creationdate) between '$fdate' and '$tdate'");
$row1=mysqli_fetch_row($result1);
$Dnumber1=$row1[0];
mysqli_query($con,"update report set Dnumber='$Dnumber1'where report_id=3");
//from referralout
$result2=mysqli_query($con,"SELECT COUNT(refout_id) FROM referralout 
where date(creationdate) between '$fdate' and '$tdate' AND type='Emergency case referral' ");
$row2=mysqli_fetch_row($result2);
$Dnumber2=$row2[0];
mysqli_query($con,"update report set Dnumber='$Dnumber2'where report_id=4");

//from referralout
$result3=mysqli_query($con,"SELECT COUNT(refout_id) FROM referralout 
where date(creationdate) between '$fdate' and '$tdate' AND type='Cold case referral' ");
$row3=mysqli_fetch_row($result3);
$Dnumber3=$row3[0];
mysqli_query($con,"update report set Dnumber='$Dnumber3'where report_id=5");


//from discharge
$result5=mysqli_query($con,"SELECT COUNT(dis_id) FROM discharge 
where date(creationdate) between '$fdate' and '$tdate' ");
$row5=mysqli_fetch_row($result5);
$Dnumber5=$row5[0];
mysqli_query($con,"update report set Dnumber='$Dnumber5'where report_id=28");

//from pat_to_bed
$result10=mysqli_query($con,"SELECT COUNT(id) FROM pat_to_bed 
where date(creationdate) between '$fdate' and '$tdate' ");
$row10=mysqli_fetch_row($result10);
$Dnumber10=$row10[0];
mysqli_query($con,"update report set Dnumber='$Dnumber10'where report_id=27");

$result11=mysqli_query($con,"SELECT COUNT(id) FROM pat_to_bed 
where date(creationdate) between '$fdate' and '$tdate' AND 	type='Elective' ");
$row11=mysqli_fetch_row($result11);
$Dnumber11=$row11[0];
mysqli_query($con,"update report set Dnumber='$Dnumber11'where report_id=2");

//from discharge
$result6=mysqli_query($con,"SELECT sum(length) FROM discharge 
where date(creationdate) between '$fdate' and '$tdate' ");
$row6=mysqli_fetch_row($result6);

$result7=mysqli_query($con,"SELECT count(length) FROM discharge 
where date(creationdate) between '$fdate' and '$tdate' ");
$row7=mysqli_fetch_row($result7);

$Dnumber7=$row6[0]/$row7[0];
mysqli_query($con,"update report set Dnumber='$Dnumber7'where report_id=29");



//from discharge
$result8=mysqli_query($con,"SELECT COUNT(dis_id) FROM discharge 
where date(creationdate) between '$fdate' and '$tdate' AND condtion='Died' ");
$row8=mysqli_fetch_row($result8);
$Dnumber8=$row8[0];
mysqli_query($con,"update report set Dnumber='$Dnumber8'where report_id=30");



//from ambula
$result9=mysqli_query($con,"SELECT COUNT(amb_id) FROM ambula 
where date(creationdate) between '$fdate' and '$tdate' ");
$row9=mysqli_fetch_row($result9);
$Dnumber9=$row9[0];
mysqli_query($con,"update report set Dnumber='$Dnumber9'where report_id=34");

$result11=mysqli_query($con,"SELECT COUNT(amb_id) FROM ambula 
where date(creationdate) between '$fdate' and '$tdate' AND request=1");
$row11=mysqli_fetch_row($result11);
$Dnumber11=$row11[0];
mysqli_query($con,"update report set Dnumber='$Dnumber11'where report_id=33");

?>

<h5 align="center" style="color:blue"> From <?php echo $fdate?> to <?php echo $tdate?></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th>Code of data element</th>
<th>Report period</th>
<th>Data element</th>
<th>Total </th>
</tr>
</thead>
<tbody>

<?php
$today = date( 'Y-m-d');
if($period=='Monthly' && ($a>35 || $a<25))
{	
echo '<span style="color:red;text-align:center;font-size:25px;">The report is not monthly !!!</span>';
echo "(".$a." days report )";
}
elseif($period=='Quarterly' && ($a>95 || $a<85))
{	
echo '<span style="color:red;text-align:center;font-size:25px;">The report is not Quarterly !!!</span>';
echo "(".$a." days report )";
}
elseif($period=='Semi-Annualy' && ($a>185 || $a<175))
{	
echo '<span style="color:red;text-align:center;font-size:25px;">The report is not Semi-Annualy !!!</span>';
echo "(".$a." days report )";
}
elseif($period=='Annualy' && ($a>370 || $a<360))
{	
echo '<span style="color:red;text-align:center;font-size:25px;">The report is not Annualy !!!</span>';
echo "(".$a." days report )";
}
else
{

if($tdate<=$today )
{
$sql=mysqli_query($con,"select * from report where type='service'"  );
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><?php echo $row['code'];?></td>
<td><?php echo $row['Rperiod'];?></td>
<td><?php echo $row['Delement'];?></td>
<td><?php echo $row['Dnumber'];?></td>
</tr>
<?php 
$cnt=$cnt+1;
 }
 
 
 }
else
 {
	 echo '<span style="color:red;text-align:center;font-size:25px;">You inserted  out of  maximum reporting date so please insert date within the range of today!!!</span>';
	 
 }
}
 ?></tbody>
</table>
<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
}
</script>


<button onclick="window.print()"><h4 style="color:blue">Print</h4></button>



</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
