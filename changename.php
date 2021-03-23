
<?php 
$q = $_REQUEST["q"];

$spc=strpos($q," ");

$userid=substr($q,0,$spc);
$newname=substr($q,$spc+1);

$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {echo "connected";}
$sql="SELECT * FROM users WHERE username ='$newname'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "username already used by another person $q";
} else {

$sql2="UPDATE users SET username = '$newname' WHERE userid=$userid";
$conn->query($sql2);
echo "$q";

}
$conn->close(); 

?>
