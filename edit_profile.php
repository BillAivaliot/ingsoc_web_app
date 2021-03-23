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

<?php
$id=$_SESSION['userid'];
$mail=$_SESSION['usermail'];

?>


<div class="jumbotron">
   <h3 class="text-danger">
      INGSOC ONLINE
   </h3>
</div>
<div class="container text-center">
     <div class="row">
       <div class="col-4"></div>
        <div class="form-group col-4 text-danger">
          <label for="usr">New Username:</label>
          <input type="text" class="form-control" id="usr">
        </div>
     </div>
     <button role="button" class="btn btn-danger mb-4" onclick="change_username_to('<?php echo $id;?>'+' '+usr.value)"> Change Username</button>

     <div class="row">
       <div class="col-4"></div>
        <div class="form-group col-4 text-danger">
          <label for="pwd">New Password:</label>
          <input type="password" class="form-control" id="pwd">
        </div>
     </div>
     <button role="button" class="btn btn-danger mb-4" onclick="change_password_to('<?php echo $id;?>'+' '+pwd.value)"> Change Password</button>
     <div class="row">
        <div class="col-4"></div>
         <div class="col-4">
              <a href="usermain.php" role="button" class="btn btn-danger">Go Back</a>
         </div>
     </div>
<p id="txtO"></p>


  

<script>
    function change_username_to(str){
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
        xhttp.open("POST", "changename.php?q="+str, true);
        xhttp.send();
        }
    }


    function change_password_to(str){
       var xhttp;
        var spc=str.indexOf(" ");
        var pass=str.slice(spc);
        var pwdl8, pwdnum, pwdsym, pwdcap;
        pwdl8=/.{8}.*/;
        pwdnum=/.*[0-9]+.*/;
        pwdcap=/.*[A-Z]+.*/;
        pwdsym=/.*[^A-Za-z0-9]+.*/;  
        if (str == "") {
              document.getElementById("txtO").innerHTML = "";
              return;
        } else if((!(pwdl8.test(pass)))||(!(pwdnum.test(pass)))||(!(pwdcap.test(pass)))||(!(pwdsym.test(pass)))){
              document.getElementById("txtO").innerHTML = "Password must have a length of at least eight characters and includeinclude at least one number one upper case letter and one symbol";
              return;
        }else{
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("txtO").innerHTML = this.responseText;
             }
        };
        xhttp.open("POST", "changepassword.php?q="+str, true);
        xhttp.send();
        }
    }

</script>

<div>
</body>
</html>



