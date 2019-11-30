<?php
session_start();
$_SESSION["task"]= filter_input(INPUT_GET, "task");
?>
<html>
    <head>
        <title><?php echo $_SESSION["task"]; ?></title>
        <style>
           <?php  include 'common.php';?>
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
            
        </style>
        <script>
       <?php  include 'commonscripts.php';?>
           function go(){
                x=document.getElementById("cid").value;
                x.trim();
                y=document.getElementById("btn").value;
                if(x==""){
                    alert("Invalid ID");
                }else if(y=="Match"){
                    window.location.href="match.php?id="+x;
                }else{
                    window.location.href="close.php?id="+x;
                }
            }
        </script>
    </head>
    <body>
        <?php  include 'topborder.php';?>
           <div class="middle" >
              <div class="add" style="height:1%;width:60%;padding:30px;border-radius:10px;cursor:pointer" >
               <input autocomplete="off" name="usn" id="cid" type="text" style="font-size:25px;padding:15px;width:93%;height:60px;position:absolute;top:0;left:0;border:none;text-align:center" placeholder="ENTER COMPLAINT ID">
               <div style="border:5px solid #737373">
                   <input id="btn" type="button" style=" box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);background:#311B92;color:white;font-size:25px;padding:15px;position:absolute;top:180%;left:40%;border:none;" value=<?php echo ucfirst($_SESSION["task"]);?> onclick="go()"></button>
                <img src="search.png" />
               </div>
            </div>
            
        </div>
        <?php  include 'bottomborder.php';?>
        <script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="90%";</script>
    </body>
</html>
