<?php
$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$q = $_REQUEST["q"];

$spc=strpos($q," ");

$userid=(int) substr($q,0,$spc);
$entrystr=substr($q,$spc+1);
//$fileName = $_FILES['fileinput']['name'];
//$myfile=$q[0].value;
//$f = fopen($fileName, 'r');
//$parsed = JsonMachine::fromFile($filename);
$obj = json_decode($entrystr);
$sdt=$obj->startedDateTime;
$reqmeth=$obj->request->method;
$requrl=$obj->request->url;
$resstatus=$obj->response->status;
$resstatustxt=$obj->response->statusText;
$tmngw=$obj->timings->wait;
$sip=$obj->serverIPAddress;
$lastdate=date("Y/m/d");

$sql1="insert into entries(userid, startedDateTime,reqmethod ,requrl, resstatus, resstatustext, timingswait, serveripaddress) values ($userid,'$sdt','$reqmeth','$requrl' ,'$resstatus' ,'$resstatustxt', '$tmngw', '$sip')";
$conn->query($sql1);
$sql2="UPDATE users SET last_upload = '$lastdate' WHERE userid=$userid";
$conn->query($sql2);
echo $q;
//$myfile = fopen("testfile.txt", "w");
//fwrite($myfile, $q);
//echo "$myfile";
//fclose($myfile);
$conn->close();
?>
