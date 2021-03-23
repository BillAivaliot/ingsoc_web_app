<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <title>INGSOC-UPLOAD</title>
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



<body class="bg-dark text-danger ">
<div class="jumbotron mb-3" >
   <h3 class="text-danger">
      INGSOC ONLINE
   </h3>
</div>

<br>
<div class="row">
<div class="col-1"></div>
<div class="col-4">
<form id="fileform">

<input type="file" id="fileinput">
</div>
</div>


<div >
<script>
//var myForm = document.getElementById("fileform");
var parsed;
var clean_object;
var str1;
function readSingleFile(event) {
        //Retrieve the first (and only!) File from the FileList object
        var myFile=document.getElementById("fileinput").files[0];
        var f = event.target.files[0]; 
        var formData = new FormData();
        
        var new_data_file;
        var x;
        formData.append('fileinput', myFile, myFile.name);
     

        if (f) {
          var r = new FileReader();
              r.onload = function(e) { 
              var contents = e.target.result;
           



              
              //document.getElementById("hello").innerHTML = contents;
              parsed=JSON.parse(contents);

              //clean_object.log.

              delete parsed.log.version;
              delete parsed.log.creator;
              delete parsed.log.browser;
              delete parsed.log.pages;
              delete parsed.log.comment;
              parsed.log.entries.forEach(delete_extra_in_entity);

              str1=JSON.stringify(parsed);
              
              //var xhttp;
              //xhttp = new XMLHttpRequest();
              //xhttp.onreadystatechange = function() {
              //     if (this.readyState == 4 && this.status == 200) {
              //           document.getElementById("hello").innerHTML = this.responseText;
              //     }
              //};
    
          
              //xhttp.open("POST", "file_handler.php?q="+str1, true);
              //xhttp.send();

              

              //return str1;

             //document.getElementById("bye").value=str1;
          }
          r.readAsText(f);


        } else { 
          alert("Failed to load file");
        }
      }

      



     //function build_clean_file(value, index, array){
     //    clean_object.log.entries[index].startedDateTime=parsed.log.entries[index].startedDateTime;
     //}

     var subst_req, subst_res;



      function delete_extra_in_entity(value, index, array){
         delete parsed.log.entries[index].connection;
         delete parsed.log.entries[index].cache;
         delete parsed.log.entries[index].time;
         delete parsed.log.entries[index].comment;
         delete parsed.log.entries[index].pageref;
         delete parsed.log.entries[index]._securityState;


         delete parsed.log.entries[index].timings.blocked;
         delete parsed.log.entries[index].timings.dns;
         delete parsed.log.entries[index].timings.connect;
         delete parsed.log.entries[index].timings.send;
         delete parsed.log.entries[index].timings.receive;
         delete parsed.log.entries[index].timings.ssl;
         delete parsed.log.entries[index].timings.comment;


         delete parsed.log.entries[index].request.httpVersion;
         delete parsed.log.entries[index].request.queryString;
         delete parsed.log.entries[index].request.postData;
         delete parsed.log.entries[index].request.headersSize;
         delete parsed.log.entries[index].request.bodySize;
         delete parsed.log.entries[index].request.comment;
         delete parsed.log.entries[index].request.cookies;
          
         var url_pat=/:\/\/[^\/]*/i;
         var url_m=url_pat.exec(parsed.log.entries[index].request.url);
         f=url_m.toString();
         parsed.log.entries[index].request.url=f.substring(3);
     
         
         subst_req=parsed.log.entries[index].request;
         subst_res=parsed.log.entries[index].response;
         subst_req.headers.forEach(clean_req_head);


         delete parsed.log.entries[index].response.httpVersion;
         delete parsed.log.entries[index].response.cookies;
         delete parsed.log.entries[index].response.content;
         delete parsed.log.entries[index].response.redirectURL;
         delete parsed.log.entries[index].response.headersSize;
         delete parsed.log.entries[index].response.bodySize;
         delete parsed.log.entries[index].response.comment;

         subst_res.headers.forEach(clean_res_head);



      }

      function clean_req_head(value, index, array){
           if((subst_req.headers[index].name!="Content-Type")&&(subst_req.headers[index].name!="content-type")&&(subst_req.headers[index].name!="Cache-Control")&&(subst_req.headers[index].name!="cache-control")&&(subst_req.headers[index].name!="pragma")&&(subst_req.headers[index].name!="Pragma")&&(subst_req.headers[index].name!="expires")&&(subst_req.headers[index].name!="Expires")&&(subst_req.headers[index].name!="age")&&(subst_req.headers[index].name!="Age")&&(subst_req.headers[index].name!="last-modified")&&(subst_req.headers[index].name!="Last-Modified")&&(subst_req.headers[index].name!="Last-Modified")){
           delete subst_req.headers[index];}
  
      }
      
      function clean_res_head(value, index, array){
           if((subst_res.headers[index].name!="content-type")&&(subst_res.headers[index].name!="cache-control")&&(subst_res.headers[index].name!="pragma")&&(subst_res.headers[index].name!="expires")&&(subst_res.headers[index].name!="age")&&(subst_res.headers[index].name!="last-modified")&&(subst_res.headers[index].name!="last-modified")){
           delete subst_res.headers[index];}
  
      }
     var newparsed;
     
     function upload_clean_file_data(){
        
        //str_req=str1;
        newparsed=JSON.parse(str1);
        newparsed.log.entries.forEach(loop_through_entries);
        //str_req=JSON.stringify(newparsed.log.entries[0]);
       // document.getElementById("hello2u").innerHTML=str_req;
            //var xmlhttp = new XMLHttpRequest();
            //xmlhttp.onreadystatechange = function() {
            //    if (this.readyState == 4 && this.status == 200) {
            //         document.getElementById("hello00").innerHTML = this.responseText;
            //    }
            //};
            //xmlhttp.open("GET", "file_handler.php?q=" +"<?php echo $id;?>"+" "+str_req, true);
            //xmlhttp.send();
            return false;

     }
     <?php $id=$_SESSION['userid']; ?>

     function loop_through_entries(value, index, array){
            setTimeout(function() { 
      // Add tasks to do 
  
            var str_req;
            str_req=JSON.stringify(newparsed.log.entries[index]);
       // document.getElementById("hello2u").innerHTML=str_req;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("hello00").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "file_handler.php?q=" +"<?php echo $id;?>"+" "+str_req, true);
            xmlhttp.send();
            return false;
           }, 500 * index);
     }



      document.getElementById('fileinput').addEventListener('change', readSingleFile, false);

      
</script>

<div class="row">
<div class="col-1"></div>
<div class="col-4">
<button id="sendbtn" role="button" class="btn btn-danger mt-4" onclick="return upload_clean_file_data()"> Send </button>
</div>
</div>


<div class="row">
<div class="col-1"></div>
<div class="col-4">
<a href="usermain.php" role="button" class="btn btn-danger mt-4">Go Back</a>
</div>
</div>
<p id="hello00"></p>
<p id="hello0"></p>
<p id="hello1"></p>
<p id="hello2"></p>
<p id="hello3"></p>
<p id="hello"></p>
<p id="hello2u"></p>


<p id="bye" onchange=></p>

<?php
if($_SESSION["username"]=="" && $_SESSION["password"]==""){
    header("Location:usrlogin.php");
}

?>






</div>
</body>
</html>
