<?php
   ob_start();
   session_start();
?> 

<?php

$servername = "localhost";
$dbusername = "sitemaster";
$dbpassword = "*****";
$dbname = "sitedb";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//echo $_SESSION['usermail']. "<br>";
//echo $_SESSION['password'];

$namevar= $_SESSION['adminname'];
$passvar= $_SESSION['password'];

$sql = "SELECT * FROM admins WHERE admin_name ='$namevar' and password='$passvar' ";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

if ($result->num_rows > 0) {

    header("Location:adminmain.php");
} else {
    echo "invalid username or password";
    header('Refresh: 0.5; URL = adminlogin.php');
}
$conn->close(); 

?> 
