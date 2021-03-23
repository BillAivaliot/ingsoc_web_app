
<?php 
$q = $_REQUEST["q"];

$spc=strpos($q," ");

$userid=substr($q,0,$spc);
$newpass=substr($q,$spc+1);

$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {echo "connected";}

$sql2="UPDATE users SET password = '$newpass' WHERE userid=$userid";
$conn->query($sql2);
echo "$q";


$conn->close(); 

?>
