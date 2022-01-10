<?php
session_start();
error_reporting(0);
include('include/config.php');
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
	#page-title{
		background-color:white;
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
<a  href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
//from Admission
$result=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Postive' AND sex='Male'");
$row=mysqli_fetch_row($result);
$Dnumber=$row[0];
mysqli_query($con,"update report set male='$Dnumber'where report_id=6");

$result4=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Postive' AND sex='Female'");
$row4=mysqli_fetch_row($result4);
$Dnumber4=$row4[0];
mysqli_query($con,"update report set female='$Dnumber4' where report_id=6");


$total=$row4[0]+$row[0];
mysqli_query($con,"update report set Dnumber='$total' where report_id=6");




$result5=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative' AND sex='Male'");
$row5=mysqli_fetch_row($result5);
$Dnumber5=$row5[0];
mysqli_query($con,"update report set male='$Dnumber5'where report_id=7");

$result6=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative' AND sex='Female'");
$row6=mysqli_fetch_row($result6);
$Dnumber6=$row6[0];
mysqli_query($con,"update report set female='$Dnumber6' where report_id=7");


$total1=$row5[0]+$row6[0];
mysqli_query($con,"update report set Dnumber='$total1' where report_id=7");




$result7=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND age<18 AND sex='Male'");
$row7=mysqli_fetch_row($result7);
$Dnumber7=$row7[0];
mysqli_query($con,"update report set male='$Dnumber7'where report_id=8");

$result8=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND age<18 AND sex='Female'");
$row8=mysqli_fetch_row($result8);
$Dnumber8=$row8[0];
mysqli_query($con,"update report set female='$Dnumber8' where report_id=8");


$total2=$row7[0]+$row8[0];
mysqli_query($con,"update report set Dnumber='$total2' where report_id=8");






$result9=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative' OR result='Postive'  AND sex='Male'");
$row9=mysqli_fetch_row($result9);
$Dnumber9=$row9[0];
mysqli_query($con,"update report set male='$Dnumber9'where report_id=9");

$result11=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative'  AND sex='Female'");
$row11=mysqli_fetch_row($result11);
$Dnumber11=$row11[0];

$result10=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Postive'  AND sex='Female'");
$row10=mysqli_fetch_row($result10);
$Dnumber10=$row10[0];
$totalfemale=$row11[0]+$row10[0];
mysqli_query($con,"update report set female='$totalfemale' where report_id=9");


$total3=$row9[0]+$row11[0]+$row10[0];
mysqli_query($con,"update report set Dnumber='$total3' where report_id=9");





$result14=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative' OR result='Postive'  AND sex='Male' AND screened='TB'");
$row14=mysqli_fetch_row($result14);
$Dnumber14=$row14[0];
mysqli_query($con,"update report set male='$Dnumber14'where report_id=10");

$result15=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Postive'  AND sex='Female' AND screened='TB'");
$row15=mysqli_fetch_row($result15);
$Dnumber15=$row15[0];

$result16=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND result='Negative' AND sex='Female' AND screened='TB'");
$row16=mysqli_fetch_row($result16);
$Dnumber16=$row16[0];
$totalfemal16=$row15[0]+$row16[0];
mysqli_query($con,"update report set female='$totalfemal16'where report_id=10");

$total15=$row14[0]+$row15[0]+$row16[0];
mysqli_query($con,"update report set Dnumber='$total15'where report_id=10");



$result17=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND NCoD='Malaria' ");
$row17=mysqli_fetch_row($result17);
$Dnumber17=$row17[0];

$result19=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND NCoD='malaria' ");
$row19=mysqli_fetch_row($result19);
$Dnumber19=$row19[0];

$result20=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND NCoD='MALARIA' ");
$row20=mysqli_fetch_row($result20);
$Dnumber20=$row20[0];
$maletotal=$row17[0]+$row19[0]+$row20[0];
mysqli_query($con,"update report set male='$maletotal'where report_id=11");

$result18=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND NCoD='Malaria' OR NCoD='malaria' OR NCoD='MALARIA' AND sex='Female'");
$row18=mysqli_fetch_row($result18);
$Dnumber18=$row18[0];
mysqli_query($con,"update report set female='$Dnumber18' where report_id=11");


$total1=$row17[0]+$row19[0]+$row20[0]+$row18[0];
mysqli_query($con,"update report set Dnumber='$total1' where report_id=11");






$result21=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND NCoD='CANCER' OR NCoD='cancer' OR NCoD='Cancer' ");
$row21=mysqli_fetch_row($result21);
$Dnumber21=$row21[0];


$maletotal23=$row21[0];
mysqli_query($con,"update report set male='$maletotal23'where report_id=12");

$result24=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND NCoD='CANCER' ");
$row24=mysqli_fetch_row($result24);
$Dnumber24=$row24[0];
$result25=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND NCoD='Cancer' ");
$row25=mysqli_fetch_row($result25);
$Dnumber25=$row25[0];
$result26=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND NCoD='cancer'  ");
$row26=mysqli_fetch_row($result26);
$Dnumber26=$row26[0];
$totalfemale=$row24[0]+$row25[0]+$row26[0];
mysqli_query($con,"update report set female='$totalfemale' where report_id=12");


$total13=$row21[0]+$row24[0]+$row25[0]+$row26[0];
mysqli_query($con,"update report set Dnumber='$total13' where report_id=12");





$result27=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND NCoD='TB' ");
$row27=mysqli_fetch_row($result27);
$Dnumber27=$row27[0];


$maletotal24=$row27[0];
mysqli_query($con,"update report set male='$maletotal24'where report_id=13");

$result28=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND NCoD='TB' ");
$row28=mysqli_fetch_row($result28);
$Dnumber28=$row28[0];
mysqli_query($con,"update report set female='$Dnumber28' where report_id=13");

$total14=$row27[0]+$row28[0];
mysqli_query($con,"update report set Dnumber='$total14' where report_id=13");




$result29=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND accident='Pedestrian' ");
$row29=mysqli_fetch_row($result29);
$maletotal29=$row29[0];
mysqli_query($con,"update report set male='$maletotal29'where report_id=14");

$result30=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND accident='Pedestrian' ");
$row30=mysqli_fetch_row($result30);
$Dnumber30=$row30[0];
mysqli_query($con,"update report set female='$Dnumber30' where report_id=14");

$total15=$row29[0]+$row30[0];
mysqli_query($con,"update report set Dnumber='$total15' where report_id=14");




$result31=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND accident='Motor cyclist' ");
$row31=mysqli_fetch_row($result31);
$maletotal31=$row31[0];
mysqli_query($con,"update report set male='$maletotal31'where report_id=15");

$result32=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND accident='Motor cyclist' ");
$row32=mysqli_fetch_row($result32);
$Dnumber32=$row32[0];
mysqli_query($con,"update report set female='$Dnumber32' where report_id=15");

$total16=$row31[0]+$row32[0];
mysqli_query($con,"update report set Dnumber='$total16' where report_id=15");





$result33=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND accident='Vehicle occupant' ");
$row33=mysqli_fetch_row($result33);
$maletotal33=$row33[0];
mysqli_query($con,"update report set male='$maletotal33'where report_id=16");

$result34=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND accident='Vehicle occupant' ");
$row34=mysqli_fetch_row($result34);
$Dnumber34=$row34[0];
mysqli_query($con,"update report set female='$Dnumber34' where report_id=16");

$total17=$row33[0]+$row34[0];
mysqli_query($con,"update report set Dnumber='$total17' where report_id=16");


$result35=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Acute Respiratory Infection' OR NCoD='Acute respiratory infection' 
OR NCoD='acute respiratory infection' OR NCoD='ACUTE RESPIRATORY INFECTION') ");
$row35=mysqli_fetch_row($result35);
$maletotal35=$row35[0];
mysqli_query($con,"update report set male='$maletotal35' where report_id=17");

$result36=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Acute Respiratory Infection' OR NCoD='Acute respiratory infection' 
OR NCoD='acute respiratory infection' OR NCoD='ACUTE RESPIRATORY INFECTION') ");
$row36=mysqli_fetch_row($result34);
$Dnumber36=$row36[0];
mysqli_query($con,"update report set female='$Dnumber36' where report_id=17");

$total18=$row35[0]+$row36[0];
mysqli_query($con,"update report set Dnumber='$total18' where report_id=17");



$result37=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Bronchitis' OR NCoD='bronchitis' 
OR NCoD='BRONCHITIS' OR NCoD='Bronchiolitis' OR NCoD='bronchiolitis' OR NCoD='BRONCHIOTIS') ");
$row37=mysqli_fetch_row($result37);
$maletotal37=$row37[0];
mysqli_query($con,"update report set male='$maletotal37' where report_id=19");

$result38=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Bronchitis' OR NCoD='bronchitis' 
OR NCoD='BRONCHITIS' OR NCoD='Bronchiolitis' OR NCoD='bronchiolitis' OR NCoD='BRONCHIOTIS') ");
$row38=mysqli_fetch_row($result38);
$Dnumber38=$row38[0];
mysqli_query($con,"update report set female='$Dnumber38' where report_id=19");

$total19=$row37[0]+$row38[0];
mysqli_query($con,"update report set Dnumber='$total19' where report_id=19");




$result39=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Hypertension' OR NCoD='hypertension' 
OR NCoD='HYPERTENSION') ");
$row39=mysqli_fetch_row($result39);
$maletotal39=$row39[0];
mysqli_query($con,"update report set male='$maletotal39' where report_id=20");

$result40=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Hypertension' OR NCoD='hypertension' 
OR NCoD='HYPERTENSION') ");
$row40=mysqli_fetch_row($result40);
$Dnumber40=$row40[0];
mysqli_query($con,"update report set female='$Dnumber40' where report_id=20");

$total20=$row39[0]+$row40[0];
mysqli_query($con,"update report set Dnumber='$total20' where report_id=20");



$result41=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Acute Watery Diarrhea' OR NCoD='Acute watery diarrhea' 
OR NCoD='acute watery diarrhea' OR NCoD='ACUTE WATERY DIARRHEA') ");
$row41=mysqli_fetch_row($result41);
$maletotal41=$row41[0];
mysqli_query($con,"update report set male='$maletotal41' where report_id=21");

$result42=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Acute Watery Diarrhea' OR NCoD='Acute watery diarrhea' 
OR NCoD='acute watery diarrhea' OR NCoD='ACUTE WATERY DIARRHEA') ");
$row42=mysqli_fetch_row($result42);
$Dnumber42=$row42[0];
mysqli_query($con,"update report set female='$Dnumber42' where report_id=21");

$total21=$row41[0]+$row42[0];
mysqli_query($con,"update report set Dnumber='$total21' where report_id=21");



$result43=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Influenza' OR NCoD='influenza' 
OR NCoD='INFLUENZA') ");
$row43=mysqli_fetch_row($result43);
$maletotal43=$row43[0];
mysqli_query($con,"update report set male='$maletotal43' where report_id=22");

$result44=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Influenza' OR NCoD='influenza' 
OR NCoD='INFLUENZA') ");
$row44=mysqli_fetch_row($result44);
$Dnumber44=$row44[0];
mysqli_query($con,"update report set female='$Dnumber44' where report_id=22");

$total22=$row43[0]+$row44[0];
mysqli_query($con,"update report set Dnumber='$total22' where report_id=22");



$result45=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Urinary Tract Infection' OR NCoD='Urinary tract infection' 
OR NCoD='urinary tract infection' OR NCoD='URINARY TRACT INFECTION') ");
$row45=mysqli_fetch_row($result45);
$maletotal45=$row45[0];
mysqli_query($con,"update report set male='$maletotal45' where report_id=23");

$result46=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Urinary Tract Infection' OR NCoD='Urinary tract infection' 
OR NCoD='urinary tract infection' OR NCoD='URINARY TRACT INFECTION') ");
$row46=mysqli_fetch_row($result46);
$Dnumber46=$row46[0];
mysqli_query($con,"update report set female='$Dnumber46' where report_id=23");

$total23=$row45[0]+$row46[0];
mysqli_query($con,"update report set Dnumber='$total23' where report_id=23");

$result47=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Injurie' OR NCoD='injurie' 
OR NCoD='INJURIE') ");
$row47=mysqli_fetch_row($result47);
$maletotal47=$row47[0];
mysqli_query($con,"update report set male='$maletotal47' where report_id=25");

$result48=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Injurie' OR NCoD='injurie' 
OR NCoD='INJURIE') ");
$row48=mysqli_fetch_row($result48);
$Dnumber48=$row48[0];
mysqli_query($con,"update report set female='$Dnumber48' where report_id=25");

$total24=$row47[0]+$row48[0];
mysqli_query($con,"update report set Dnumber='$total24' where report_id=25");



$result49=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND  sex='Male' AND (NCoD='Heart Diseases' OR NCoD='Heart diseases' 
OR NCoD='heart diseases' OR NCoD='HEART DISEASES') ");
$row49=mysqli_fetch_row($result49);
$maletotal49=$row49[0];
mysqli_query($con,"update report set male='$maletotal49' where report_id=26");

$result50=mysqli_query($con,"SELECT COUNT(pat_id) FROM admission where date(creationdate) between '$fdate' and '$tdate' 
AND sex='Female' AND (NCoD='Heart Diseases' OR NCoD='Heart diseases' 
OR NCoD='heart diseases' OR NCoD='HEART DISEASES') ");
$row50=mysqli_fetch_row($result50);
$Dnumber50=$row50[0];
mysqli_query($con,"update report set female='$Dnumber50' where report_id=26");

$total25=$row49[0]+$row50[0];
mysqli_query($con,"update report set Dnumber='$total25' where report_id=26");

?>

<h5 align="center" style="color:blue"> From <?php echo $fdate?> to <?php echo $tdate?></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Data element</th>
<th>Male</th>
<th>Female</th>
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
if($tdate<=$today)
{
$sql=mysqli_query($con,"select * from report where type='diseases'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><?php echo $row['Delement'];?></td>
<td><?php echo $row['male'];?></td>
<td><?php echo $row['female'];?></td>
<td><?php echo $row['Dnumber'];?></td>


</tr>
<?php 
$cnt=$cnt+1;
 }
 }
 else
 {
	 echo '<span style="color:red;text-align:center;font-size:25px;">You inserted  out of  maximum reporting date so please insert date within the range of today!!!</span>';
 }}
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
