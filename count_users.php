<?php 

$q = $_REQUEST["q"];

$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1="select count(userid) from users";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
//echo "hello";
echo "There are ".$row1["count(userid)"] . " users subscribed to our service";

?>
