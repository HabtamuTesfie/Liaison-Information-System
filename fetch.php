<?php
include('connect.php');
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE DischargeNotification SET comment_status = 1 WHERE comment_status=0";
   mysqli_query($server, $update_query);
}
$query = "SELECT * FROM DischargeNotification ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($server, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["MRN"].'</strong><br />
  <small><em>'.$row["comment_text"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM DischargeNotification WHERE comment_status=0";
$result_query = mysqli_query($server, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>