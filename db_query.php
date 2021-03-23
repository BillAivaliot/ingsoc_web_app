
<?php 
$q = $_REQUEST["q"];

//echo $q;

$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} //else {echo "connected";}

$sql="select last_upload from users where userid=$q";
$result = $conn->query($sql);
//$conn->close(); 
$row = $result->fetch_assoc();

$sql1="select count(entryid) from entries where userid=$q";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

//echo $row[last_upload];

echo "You have ".$row1["count(entryid)"] . " entries the last of which was uploaded in ".$row[last_upload];


//echo $result;



$conn->close(); 

?>



