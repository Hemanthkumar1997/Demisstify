<?php 
session_start();
$_SESSION["toggle"]=0;
?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            <?php include 'common.php'; ?>
            .contact{
                color:black;
                position: absolute;
                top:15%;
                left:37%;
                border-radius:10px;
                background:#E8EAF6;
                width:31%;
                height:100%;
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
            }
            .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  z-index:0;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #311B92;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}     
        </style>
         <script>
             <?php include 'commonscripts.php'; ?>
             
              function validate(){
                  var2=document.getElementById("name").value;
                  var3=document.getElementById("pd").value;
                  var4=document.getElementById("cpd").value;
                  var v=document.getElementById("scv").value;
                  var x=document.getElementById("radio").checked;
                  if(x==true&&v!="3306" ){
                      alert(v);
                      alert("wrong security number");
                      return false;
                  }
                  if(var2===""||var3===""||var4===""){
                      alert("One or more fields are empty");
                      return false;
                  }
                  if(var3!=var4){
                      alert("Passwords do not match");
                      return false;
                  }
                  else return true;
              }  
              function adset(){
                  var x=document.getElementById("radio").checked;
                  if(x==true){
                      set();
                  }else unset();
              }
              function set(){
                  document.getElementById("sc").style.visibility="visible";
                  document.getElementById("scv").style.visibility="visible";
                  var x=document.getElementById("label").style;
                  x.position="absolute";
                  x.top="76%";
                  var y=document.getElementById("switch").style;
                  y.position="absolute";
                  y.top="80%";
                  var z=document.getElementById("submit").style;
                  z.position="absolute";
                  z.top="88%";
                  document.getElementById("contact").style.height="110%";
                  var m=document.getElementById("bt").style;
                  m.position="absolute";
                  m.top="130%";
              }
              function unset(){
                  document.getElementById("sc").style.visibility="hidden";
                  document.getElementById("scv").style.visibility="hidden";
                  var x=document.getElementById("label").style;
                  x.position="absolute";
                  x.top="68%";
                  var y=document.getElementById("switch").style;
                  y.position="absolute";
                  y.top="72%";
                  var z=document.getElementById("submit").style;
                  z.position="absolute";
                  z.top="82%";
                  document.getElementById("contact").style.height="100%";
                  var m=document.getElementById("bt").style;
                  m.position="absolute";
                  m.top="120%";
              }
              
     </script>
    </head>
   
    <body>
        
        <?php include 'topborder.php'; ?>
       
        <div class="contact" id="contact">
            <form method="post" name="qform" autocomplete="off" action="regp.php" onsubmit="return validate()">
                <h1 style="position:relative;left:40%;color:#311B92">Register</h1>
                <label style="font-size:25px;" >Name:</label><br>
                <input id="name" type="text" name="name" /><br><br>
                <label style="font-size:25px;" >Email:</label><br>
                <input id="mail" type="text" name="mail" /><br><br>
                <label style="font-size:25px;">Password:</label><br>
                <input id="pd" type="password" name="p" /><br><br>
                <label style="font-size:25px;">Confirm Password:</label><br>
                <input id="cpd" type="password" name="cp" /><br><br>
                <label id="error" style="color:red;position:absolute;top:62%"><?php 
        if(isset($_SESSION["invalid"]) ){
            
                echo $_SESSION["invalid"];
                unset($_SESSION["invalid"]);
            
        }
        ?></label>
                <label id="sc" style="font-size:25px;visibility:hidden">Enter Security code:</label><br>
                <input id="scv" type="text" name="sc" style="visibility:hidden"/><br><br>
                <label id="label" style='color:red;position:absolute;top:68%'>Admin&nbsp</label>
                <label id="switch" class="switch" style="position:absolute;top:72%">
                    <input id="radio" type="checkbox" name="radio" onchange="adset()" >
                    <span class="slider round"></span>
                </label>
                <input id="submit" type="submit" value="Register" style="position:absolute;top:82%;left:25%;"> 
            </form>             
        </div>        
        <?php include'bottomborder.php'; ?>
        <script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="120%";</script>
    </body>
</html>


