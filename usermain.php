<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <title>INGSOC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .button-group {
    width: 100%;
    margin-left: 15px;
  }
  .button-line {
    width: 100%;
  }
  .button-col {
    padding-left: 0px;
    padding-right: 0px;
  }
  .button-col button{
   width: 100%;
 }
</style>
</head>



<body class="bg-dark">
<?php
if($_SESSION["username"]=="" && $_SESSION["password"]==""){
    header("Location:usrlogin.php");
}

?>


<div class="jumbotron text-center">
   <h3 class="text-danger">
      INGSOC ONLINE
   </h3>
</div>

<div class="container text-center">
<?php
$id=$_SESSION['userid'];
$mail=$_SESSION['usermail'];
?>
<a href="edit_profile.php"  role="button" class="btn btn-danger mb-5">
       Edit Profile
</a>

<button role="button" class="btn btn-danger mb-5" onclick="placeholder('<?php echo $id;?>')">
       Check Data
</button>

<a href="file_upload.php"  role="button" class="btn btn-danger mb-5">
       Parse Files
</a>


<a href="logout.php" role="button" class="btn btn-danger mb-5">Logout</a>



<h5 id="txtO" class="text-danger"></h5>


  

<script>
    function placeholder(str){
       var xhttp;  
        if (str == "") {
              document.getElementById("txtO").innerHTML = "";
              return;
        }else{
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("txtO").innerHTML = this.responseText;
             }
        };
        xhttp.open("POST", "db_query.php?q="+str, true);
        xhttp.send();
        }
    }

</script>

<div>
</body>
</html>
