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

$namevar= $_SESSION['username'];
$passvar= $_SESSION['password'];

$sql = "SELECT * FROM users WHERE username ='$namevar' and password='$passvar' ";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
    $_SESSION['userid']=$row['userid'];
    $_SESSION['usermail']=$row['email'];
if ($result->num_rows > 0) {

    header("Location:usermain.php");
} else {
    $_SESSION['username']="";
    $_SESSION['password']="";
    echo "invalid username or password";
    header('Refresh: 0.5; URL = index.php');
}
$conn->close(); 

?> 
