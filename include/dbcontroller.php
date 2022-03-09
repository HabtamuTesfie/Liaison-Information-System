<?php
$DB_host = "remotemysql.com";
$DB_user = "6Yj8WDRD9s";
$DB_pass = "NmNEiNUO8F";
$DB_name = "6Yj8WDRD9s";
try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 $e->getMessage();
}
?>
