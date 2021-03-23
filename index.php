<!DOCTYPE html>


<html lang="en">

 <head>
  <title>WELCOME-INGSOC</title>
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
  <div class="container text-center" id="begin">
    <div class="row">
     <div class="col">
      <a href="usrlogin.php" role="button" class="btn btn-danger">
       user login
      </a>
     </div>
    </div>
    <div class="row mt-3">
    <div class="col">  
      <a href="adminlogin.php" role="button" class="btn btn-danger">
       administrator login
      </a>

    </div>
    </div>

     <div class="row mt-3">
    <div class="col">
      <a href="signup.php" role="button" class="btn btn-danger">
       sign up
      </a>

    </div>
    </div>

  </div>

<?php if($_POST["usermail"]=="bill@bill.bill" && $_POST["password"]=="bill"){
   
    echo "still here? I thought you were leaving?";
  }?>
 </body>
</html>
