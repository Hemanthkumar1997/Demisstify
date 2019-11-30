<?php
session_start();
?>
 <html>
    <head>
        <?php if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")!=0){header("Location:index.php");} 
        if(!isset($_SESSION["type"])){header("Location:index.php");} 
        ?>
        <style>
           <?php  include 'common.php';?>
           .middle b{
             position:absolute;
              top:88%;
             left:30%;
             }
            .middle img{
               position:absolute;
              top:0%;
              left:0%;
              width:100%;
              height:85%;
               object-fit:contain;

            }
           .list{
                 position: absolute;
                 top:30%;
                 left:67%;
                 box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
              }
          .approve{
                 position: absolute;
                 top:30%;
                 left:7%;
                 box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
            }
           .queries{
                position: absolute;
                 top:30%;
                 left:37%;
                 box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
             }
        </style>
        <script>
       <?php  include 'commonscripts.php';?>
        </script>
    </head>
    <body>
        <?php  include 'topborder.php';?>
            <div class="middle" >
              <div class="approve" style="height:40%;width:20%;padding:30px;border-radius:10px;cursor:pointer" onclick="change1('approve.php')">
               <img src="approve.png" />
                <b>Approve matched</b>
              </div>
              <div class="queries" style="height:40%;width:20%;padding:30px;border-radius:10px;cursor:pointer" onclick="change1('vquery.php')">
              <img src="quries.png" />
                <b style="position:absolute;left:35%;">Check queries</b>
              </div>
              <div class="list" style="height:40%;width:20%;padding:30px;border-radius:10px;cursor:pointer" onclick="change1('lcomplaints.php')">
               <img src="complaints.png" />
                <b>List of Complaints</b>
             </div>
            </div>
        <?php  include 'bottomborder.php';?>
    </body>
</html>