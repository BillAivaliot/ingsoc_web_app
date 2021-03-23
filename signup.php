<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>SIGN UP-INGSOC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>

 <body class="bg-dark">
  <div class="jumbotron text-center">
   <h1 class="text-danger">
      ingsoconline.com
   </h1>
   <h3>
      INTERNET TRAFFIC MONITORING
   </h3>
  </div>
  <div class="container text-center">
    <div class="row text-danger text-center">
     <div class="col-4"></div>
     <div class="col-4">
         <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            username: <input type = "text" class = "form-control" name = "username" required autofocus></br>
            email:    <input type = "text" class = "form-control" name = "usermail" required>
            password: <input type = "password" class = "form-control" name = "password" required>
            <button class = "btn btn-lg btn-danger btn-block mt-4" type = "submit"  name = "login">Login</button>
        
            
         </form>

         <div class="row text-danger text-center">
           <div class="col-4"></div>
             <div class="col-4">
               <a href="index.php" type="button" class="btn btn-danger btn-block mt-4">Go Back</a>
             </div>
           </div>
        </div>
      </div>
     </div>
    </div>
    
        
     </div>
    </div>


  </div>

  <?php 
   $mailform="/.+@.+\..+/i";
   $pwdl8="/.{8}.*/";
   $pwdnum="/.*[0-9]+.*/";
   $pwdcap="/.*[A-Z]+.*/";
   $pwdsym="/.*[^A-Za-z0-9]+.*/";

   // if($_POST["username"]=="" || $_POST["password"]=="" || $_POST["usermail"]==""){
   //     echo "Please complete all required fields"."<br>";
  //  } elseif((preg_match( $mailform,$_POST["usermail"]))==0){
   //     echo "wrong email format"."<br>";
   // }   elseif((!(preg_match($pwdl8,$_POST["password"])))||(!(preg_match( $pwdnum,$_POST["password"])))||(!(preg_match($pwdcap,$_POST["password"])))(!(preg_match($pwdsym,$_POST["password"])))){
   //     echo "Password must have a length of at least eight characters and includeinclude at least one number one upper case letter and one symbol"."<br>";}
    if($_POST["username"]!="" && $_POST["password"]!=""&& $_POST["usermail"]&&preg_match($mailform,$_POST["usermail"])&&(preg_match($pwdl8,$_POST["password"]))&&(preg_match($pwdnum,$_POST["password"]))&&(preg_match($pwdcap,$_POST["password"]))&&(preg_match($pwdsym,$_POST["password"]))){
    
   $_SESSION["username"]=$_POST["username"];
    $_SESSION["usermail"]=$_POST["usermail"];
    $_SESSION["password"]=$_POST["password"];
    echo "so far so good";
    header("Location:new_user.php");

  }?>
 </body>
</html>
