<?php
session_start();
?>
<html>
    <head>
        <?php if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"customer")!=0){header("Location:index.php");} 
        if(!isset($_SESSION["type"])){header("Location:index.php");} 
        ?>
        <style>
           <?php  include 'common.php';?>
          
        </style>
        <script>
       <?php  include 'commonscripts.php';?>
        </script>
    </head>
    <body>
        <?php  include 'topborder.php';
        $db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
        $mail=$_SESSION['mail'];
        $sql="SELECT `Complaint ID` FROM `missing` WHERE `filed_by`='$mail'";
        $result=$db->query($sql);
         if(mysqli_num_rows($result)>0){            
             $row=$result->fetch_assoc();
             echo "<b style='font-size:25px;position:absolute;left:35%;top:35%'>Your Registered Complaint ID is<p style='color:RED;position:relative;left:30%'>".$row["Complaint ID"]."</p></b>";
         }else{
             echo "<b style='font-size:25px;position:absolute;left:35%;top:35%'>You Have not registered any complaints</b>";
         }
    }?>
            
        <?php  include 'bottomborder.php';?>
        <?php 
        echo '<script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="90%";</script>';
        ?>
    </body>
</html>

