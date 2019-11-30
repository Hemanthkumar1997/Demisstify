<?php 
session_start();
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <style>
            <?php include 'common.php'; ?>
            .contact{
                color:black;
                position: absolute;
                top:25%;
                left:37%;
                border-radius:10px;
                background:#E8EAF6;
                width:30%;
                height:60%;
                box-shadow:0 10px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);

            }
            
            .contact input{
                margin-top: 15px;
                width:280px;
                height:30px;
                border-style:ridge;
                position:relative;
                left:15%;
                 padding-left: 5px;
                  border:seashell;
            }
            .contact input:focus{
                outline: none;
                box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .contact label{
                 position:relative;
                left:15%;
                margin-top:20px;
                
            }
            input[type=submit],button{
                width:200px;
                height:40px;
                background: #311B92;
                color:white;
                font-size:20px;
                display: block;
                margin-bottom: 15px;
                position:relative;
                left:17%;
                color:white;
                box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
                cursor:pointer;
                z-index:1;
            }
            
        </style>
         <script>
             <?php include 'commonscripts.php'; ?>
             
              function validate(){
                  var2=document.forms["qform"]["mail"].value;
                  var3=document.forms["qform"]["p"].value;
                  if(var2===""||var3===""){
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
            <form method="post" name="qform" autocomplete="off" action="logp.php" onsubmit="return validate()">
                <h1 style="position:relative;left:40%;color:#311B92">Login</h1>
                <label style="font-size:25px;" >Email:</label><br>
                <input type="text" name="mail" /><br><br>
                <label style="font-size:25px;">Password:</label><br>
                <input type="password" name="p" /><br><br>
                <label id="error" style="color:red;position:absolute;top:62%"><?php 
        if(isset($_SESSION["invalid"]) ){
            
                echo $_SESSION["invalid"];
                unset($_SESSION["invalid"]);
            
        }
        ?></label>
                <input type="submit" value="Login" style="position:absolute;top:70%;left:25%;"> 
            </form>             
        </div>
        
        
        <?php include'bottomborder.php'; ?>
    </body>
</html>
