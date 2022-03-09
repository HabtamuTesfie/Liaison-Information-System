<?php  
// Database configuration  
$dbHost     = "remotemysql.com";  
$dbUsername = "6Yj8WDRD9s";  
$dbPassword = "NmNEiNUO8F";  
$dbName     = "6Yj8WDRD9s";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}
