
<?php




$servername = "remotemysql.com";
$username = "6Yj8WDRD9s";
$password = "NmNEiNUO8F";
$db_database='6Yj8WDRD9s';

// Create connection
$server = mysqli_connect($servername, $username, $password);

// Check connection
if (!$server) {
    die("Connection failed: " . mysqli_connect_error());
}


if(!$server)
{
  echo "Cannot connect to mysql at the moment";
}

$found=mysqli_select_db($server,$db_database);
if(!$found)
{
   echo"Cannot find database at the moment";
}


function Redirect($url) { 
       if(headers_sent()) { 
               echo "<script type='text/javascript'>location.href='$url';</script>"; 
       } else { 
               header("Location: $url"); 
       } 
}  

?>






