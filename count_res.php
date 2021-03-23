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
$sql1="select count(entryid) from entries where resstatus='$q'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

echo "there are ".$row1['count(entryid)'] ." entries with response status=".$q;


?>
