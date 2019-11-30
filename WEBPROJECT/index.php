<?php
session_start();
?>
<html>
    <head>
        <?php if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")==0){header("Location:Admin.php");} ?>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="bootstrap.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <script src="ajaxjquery.js"></script>
         <script src="bootstrap.js"></script>
         <style>
            
            <?php include 'common.php' ?>
            .options{
                color:White;
                position:absolute;
                top:80%;
                height:12%;
                width:12%;
                left:30%;
                background:#311B92;
                font-size: 20px;
                text-align:center;
                border-radius: 10px;
                cursor: pointer;
                box-shadow:0 10px 18px 0 rgba(1, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);

            }
            .options1{              
                color:White;
                position:absolute;
                top:80%;
                height:12%;
                width:12%;
                left:60%;
                background:#311B92;
                font-size: 20px;
                text-align:center;
                border-radius: 10px;
                cursor:pointer;
                box-shadow:0 10px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);

            }
            
            
        </style>
        <script>
           
           
            function change(url,id){
                if(id.innerText==="Login"||id.innerText==="Home"||id.innerText==="Contact us")
                 window.location.href = url;
             
            }
            function change1(url,id){
                if(id!==""){
                 window.location.href = url+"?id="+id;
             }
             else{
                window.location.href = url; 
             }
             
            }
            
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {

                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                        }
                    }
                }
            };
            function query(){
                var val=document.getElementById("question").value;
                var x=document.getElementById("question");
                if(x.value==="")
                {
                alert("Input cannot be empty");
                }
                else{
                window.location.href="search.php?q="+val;
            }
            }
            function fade(id){
                document.getElementById(id).style.color="white";
                document.getElementById(id).style.background="#3D5AFE";
            }
            function darken(id){
                document.getElementById(id).style.color="white";
                document.getElementById(id).style.background="#311B92";
            }
            
     </script>
    </head>
    <body style="background:#FAFAFA">
       <?php include 'topborder.php'; ?>
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style=" position:absolute;top:10%;width:100%;height:50%;">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" style="height:100%">
    <div class="item active" style="height:100%;position:absolute;left:17%;">
      <img src="img1.jpg" width="90%" >
    </div>

    <div class="item" style="height:100%;position:absolute;left:17%;">
      <img src="img2.jpg" width="90%" >
    </div>

    <div class="item" style="height:100%;position:absolute;left:17%;">
      <img src="img3.jpg" width="90%" >
    </div>
  </div>

 
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <marquee style="color:#311B92;position: absolute;top:60%;font-size: 20px">Help families find their lost and loved ones!!!</marquee>
    <div id="miss" class="options" onclick="change1('FMissing.php','missing')" onmouseenter="fade(this.id)" onmouseout="darken(this.id)">
            File a Missing Complaint
        </div>  
        <div id="found" class="options1" onclick="change1('FMissing.php','found')" onmouseenter="fade(this.id)" onmouseout="darken(this.id)">
            File a Found Complaint
        </div>
        
    
    
    
    
        
        <?php include 'bottomborder.php' ?>
        
    </body>
</html>
