<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <title>INGSOC-ADMIN</title>
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



<body class="bg-dark text-danger text-center">
<div class="jumbotron mb-3" >
   <h3 class="text-danger text-center">
      INGSOC ONLINE
   </h3>
</div>
<button role="button" class="btn btn-danger mb-5" onclick="active_users()">
       Active Users
</button>

<button role="button" class="btn btn-danger mb-5" onclick="hsmethform()">
       Count entries by request method
</button>

<button role="button" class="btn btn-danger mb-5" onclick="hsstatform()">
       Count entries by response status
</button>

<button role="button" class="btn btn-danger mb-5" onclick="individual_domains()">
       Individual domains
</button>

<a href="logout.php" role="button" class="btn btn-danger mb-5">Logout</a>

<script>
function active_users(){
var x = document.getElementById("statform");
  var y = document.getElementById("methform");
  y.style.display = "none";
  x.style.display = "none";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("QUERYRESULT").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "count_users.php?q="+"hi", true);
    xmlhttp.send();

}

function individual_domains(){
    var x = document.getElementById("statform");
  var y = document.getElementById("methform");
  y.style.display = "none";
  x.style.display = "none";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("QUERYRESULT").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "count_dom.php?q="+"hi", true);
    xmlhttp.send();

}


function count_req(str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("QUERYRESULT").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "count_req.php?q="+str, true);
    xmlhttp.send();

}


function count_res(str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("QUERYRESULT").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "count_res.php?q="+str, true);
    xmlhttp.send();

}



//document.getElementById("methform").style.display="none";
function hsmethform() {
  document.getElementById("QUERYRESULT").innerHTML="";
  var x = document.getElementById("methform");
  var y = document.getElementById("statform");
  y.style.display = "none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function hsstatform() {
  document.getElementById("QUERYRESULT").innerHTML="";
  var x = document.getElementById("statform");
  var y = document.getElementById("methform");
  y.style.display = "none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}



</script>


<div  class="row" >
       <div class="col-5"></div>
        <div class="form-group col-2 text-danger" id="methform" style="display:none;">
          <label for="reqmeth">Request Method:</label>
          <input type="text" class="form-control" id="reqmeth">
<button role="button" class="btn btn-danger mt-4" onclick="count_req(reqmeth.value)"> Count</button>
        </div>
     </div>


<div  class="row" >
       <div class="col-5"></div>
        <div class="form-group col-2 text-danger" id="statform" style="display:none;">
          <label for="reqmeth">Response Status:</label>
          <input type="text" class="form-control" id="resstat">
<button role="button" class="btn btn-danger mt-4" onclick="count_res(resstat.value)"> Count</button>
        </div>
     </div>


<h4 id="QUERYRESULT"></h4>


<?php
if($_SESSION["adminname"]=="" && $_SESSION["password"]==""){
    header("Location:usrlogin.php");
}
?>



</body>
