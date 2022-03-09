<?php
define('DB_SERVER','remotemysql.com');
define('DB_USER','6Yj8WDRD9s');
define('DB_PASS' ,'NmNEiNUO8F');
define('DB_NAME', '6Yj8WDRD9s');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
