<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>

<html>
    <head>
        <title>Contact us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            <?php include 'common.php'; ?>
            .contact{
                color:black;
                position: absolute;
                top:12%;
                left:35%;
                border-radius:10px;
                z-index: -1;
                background: #E8EAF6;
                width:32%;
                height:90%;
                box-shadow:0 10px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
            }
            
            .contact input{
                width:300px;
                height:25px;
                border-style:ridge;
                margin-top: 5px;
                padding-left:5px;
                border:seashell;
            }
            
            textarea{
                
                border-radius:10px;
                width:280px;
                height:100px;
                border-style:ridge;
            }
            input[type=submit]{
                cursor:pointer;
                width:180px;
                height:40px;
                background: #311B92;
                color:white;
                position:absolute;
                left:30%;
                top:93%;
                font-size:20px;
                color:white;
                box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .contact input:focus{
                outline: none;
                box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            
            textArea{
                padding: 10px;
                border-radius:0px;
                border:solid white;
            }
            textArea:focus{
                outline: none;
                box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius:0px;
            }
        </style>
         <script>
             <?php include 'commonscripts.php'; ?>
            
              function validate(){
                  var1=document.forms["qform"]["name"].value;
                  var2=document.forms["qform"]["ml"].value;
                  var3=document.forms["qform"]["sub"].value;
                  var4=document.forms["qform"]["query"].value;
                  if(var1===""||var2===""||var3===""||var4===""){
                      alert("One or more fields are empty");
                      return false;
                  }
                  else return true;
              }
                          
     </script>
    </head>
   
    <body>
        <?php include 'topborder.php'; ?>
       
        <div class="contact">
            <form method="post" name="qform" autocomplete="off" action="submit_query.php" onsubmit="return validate()">
                <h1 style="position:relative;left:10%;color:#311B92">Get help from demisstify</h1>
                <div class="inp" style="position:absolute;left:7%">
                <label  style="font-size:25px;position:relative;left:10%;" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];} ?>" >Name:</label><br>
                <input type="text" id="nm" name="name" style="position:relative;left:10%;" /><br><br>
                <label  style="font-size:25px;position:relative;left:10%;" value="<?php if(isset($_SESSION["mail"])){echo $_SESSION["mail"];} ?>" >Email:</label><br>
                <input id="ml" type="text" name="ml" style="position:relative;left:10%;"/><br><br>
                <script>
                    document.getElementById("nm").value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];} ?>";
                    document.getElementById("ml").value="<?php if(isset($_SESSION["mail"])){echo $_SESSION["mail"];} ?>";
                </script>
                <label style="font-size:25px;position:relative;left:10%;">subject:</label><br>
                <input type="text" name="sub" style="position:relative;left:10%;"/><br><br>
                <label style="font-size:25px;position:relative;left:10%;">How can we help?</label><br><br>
                <textarea name="query" style="position:relative;left:10%;"></textarea><br><br><br>
                <input type="submit" value="Query">
                </div>
            </form>
        </div>
        
        
        <?php include 'bottomborder.php'; ?>
    </body>
</html>
