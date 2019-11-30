<?php
session_start();
?>

<html>
    <head>
        <title>check</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="bootstrap.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <script src="ajaxjquery.js"></script>
         <script src="bootstrap.js"></script>
         <style>
             <?php include 'common.php'; ?>

        .middle b{
             position:absolute;
              top:88%;
             left:25%;
             }
            .middle img{
               position:absolute;
              top:0%;
              left:93%;
              width:6%;
              height:82%;

            }
          .add{
                 position: absolute;
                 top:30%;
                 left:22%;
                 box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
                 
            }
           
            
            .topborder label{
                font-family:  cursive;
                color:white;
                font-size: 20px;
       
            }
            input:focus{
               outline:none;
             }
            .dropbtn {
                background-color: #3498DB;
                color: white;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }


            .dropbtn:hover, .dropbtn:focus {
                background-color: #2980B9;
            }

            .dropdown {
                position: absolute;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {
                background-color: #ddd
            }

            .show {
                display:block;
            }
           
        </style>
        <script>
           <?php include 'commonscripts.php'; ?>
            function go(){
                x=document.getElementById("cid").value;
                x.trim();
                if(x==""){
                    alert("Invalid ID");
                }else{
                    window.open("display.php?id="+x);
                }
            }
                             </script>
    </head>
    <body>
        <?php include 'topborder.php'; ?>

        
        <div class="middle" >
              <div class="add" style="height:5%;width:60%;padding:30px;border-radius:10px;cursor:pointer" >
               <input autocomplete="off" name="usn" id="cid" type="text" style="font-size:25px;padding:15px;width:93%;height:60px;position:absolute;top:0;left:0;border:none;text-align:center" placeholder="ENTER COMPLAINT ID">
               <div style="border:5px solid #737373">
               <input  type="button" style=" box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);background:#311B92;color:white;font-size:25px;padding:15px;position:absolute;top:180%;left:40%;border:none;" value="SEARCH" onclick="go()"></button>
                <img src="search.png" />
               </div>
            </div>
            
        </div>
        
       <?php include 'bottomborder.php'; ?>
        <script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="90%";</script>
    </body>
</html>


