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
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "now what";
$namevar= $_SESSION['username'];
$emailvar=$_SESSION['usermail'];
$passvar= $_SESSION['password'];
echo "$namevar";
$sql="SELECT * FROM users WHERE username ='$namevar' or email='$emailvar'";

$result=$conn->query($sql);
if ($result->num_rows > 0) {
    unset($_SESSION["usermail"]);
    unset($_SESSION["usermail"]);
    unset($_SESSION["password"]);
    //user name already exists
    echo "username or email already exist";
    header('Refresh: 0.5; URL = signup.php');
} else {
    echo "creating account";
    $sql1="insert into users(username ,password,email  ) values('$namevar','$passvar','$emailvar')";
    $conn->query($sql1);
    unset($_SESSION["usermail"]);
    unset($_SESSION["usermail"]);
    unset($_SESSION["password"]);
    header('Refresh: 0.5; URL = index.php');
}

$conn->close(); 


?>
