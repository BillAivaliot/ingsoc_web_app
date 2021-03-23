<?php
   ob_start();
   session_start();
?>
<html>
<body class="bg-dark text-danger ">
<div class="jumbotron mb-3" >
   <h3 class="text-danger">
      INGSOC ONLINE
   </h3>
</div>

<?php

   //if($_SESSION["usermail"]!="bill@bill.bill" && $_SESSION["password"]=="bill"){
   
  //  echo "still here? I thought you were leaving?<br>";
   
    //}
    unset($_SESSION["adminname"]);
    unset($_SESSION["usermail"]);
    unset($_SESSION["password"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userid"]);
    if($_SESSION["usermail"]!="" && $_SESSION[""]!=""){
   
    echo "you forgot something";
   }else {
    echo "ok bye <br>";
   }
   echo($_SESSION["usermail"]);
   echo($_SESSION["password"]);
   echo 'You have cleaned session';
   header('Refresh: 1; URL = index.php');
?>

</body>
</html>

