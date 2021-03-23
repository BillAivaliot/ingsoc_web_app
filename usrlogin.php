<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>LOGIN-INGSOC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</style>
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
            
            username: <input type = "text" class = "form-control" name = "username" required autofocus></br>
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

  <?php if($_POST["username"]!="" && $_POST["password"]!=""){
    $_SESSION["username"]=$_POST["username"];
    $_SESSION["password"]=$_POST["password"];
    header("Location:userconnect.php");
    echo "test passed";
  }?>
 </body>
</html>
