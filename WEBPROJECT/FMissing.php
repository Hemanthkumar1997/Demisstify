<?php
session_start();
$_SESSION["type"]=filter_input(INPUT_GET, 'id');
?>

<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="ajaxjquery.js"></script>
         <style>
            
            .middle{
                 position: absolute;
                 top:13.5%;
                 left:35%;
                box-shadow:0 14px 18px 0 rgba(0, 0, 0.8, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);

            }
            <?php include 'common.php'; ?>
            
            form input{
                width:400px;
                margin:auto;
                display:inline;
                margin-right: 15px;
                height:40px;
                padding-left: 15px;
                margin-top: 20px;
                border:none;
            }
            form input:focus,select:focus{
                outline:none;
                box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                
            }
            input[type=number]{
                
                width:183px;
                margin-right: 20px;
            }
            b{
                font-size: 20px;
            }
            input[type=file]:focus{
                outline: none;
            }
          x b{
           font-size:15px;
             }
        </style>
     m b{
         font-size:15px;
           }
        <script>

            <?php include 'commonscripts.php'; ?>
            
            $(document).ready(function(){
                $('input[type="file"]').change(function(){
                var fn=this.value;
                var index=fn.lastIndexOf(".")+1;
                var extension=fn.substr(index,fn.length).toLowerCase();
                if(extension!=="jpg"&&extension!=="jpeg"&&extension!=="png"){
                    alert("Invalid Image type");
                    this.value=null;
                }
                });
            });
            function validate1(){
                  var2=document.forms["qform"]["name"].value;
                  var3=document.forms["qform"]["cn"].value;
                  var4=document.forms["qform"]["height"].value;
                  var5=document.forms["qform"]["weight"].value;
                  var1=document.forms["qform"]["img"].value;
                  var file = document.getElementById('img').files[0];
                      if(var1==""||var2==""||var3==""||var4==""||var5==""){
                      alert("One or more fields are empty");
                      
                      return false;
                  }
                  else return true;
                   
      
                  
              }
     </script>
    </head>
    <body>
        
        <?php include 'topborder.php'; ?>
        
        <div class="middle" style="background: #E8EAF6;height:90%;padding:30px;border-radius:10px;" >
            <div class="Form">
                <form name="qform" autocomplete="off" action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return validate1()">
                    <Label style="position:relative;left:25%;font-size:25px;color:#311B92">Complaint Forum</label><br><br>
                    <input type="text" title="Enter name of missing person" name="name" placeholder="Enter Name" ><b style="color:red">*</b><br><br>
                    <select name="age" style="width:100px;height:40px;border-radius: 15px;margin-right: 15px">
                        <option value="fake" >Select Age</option>
                     <?php 
                      for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                     ?>
                    </select><b style="color:red">*</b>
                    
                    <input type="number" title="Enter your contact Number" name="cn" placeholder="Enter Contact number" style="width:270px" min="6000000000" oninvalid="alert('Invalid phone number')"><b style="color:red;font-size:20px">*</b><br><br>
                    <input type="number" title="Enter height of missing person" name="height" difference="1" min="100" placeholder="Enter Height in cm"><b style="color:red">*</b>
                    <input type="number" title="Enter weight of missing person" name="weight" difference="1"  placeholder="Enter weight in kg"><b style="color:red">*</b>
                    
                    <br><br>
                    <input type="text"  title="Enter your email" name="email" placeholder="Enter Contact Email" ><b style="color:red">*</b>   <br><br>
                    <input type="text" title="Enter last seen place of missing person" name="place" placeholder="Enter Last seen place" ><b style="color:red">*</b>   <br><br>
                    <input id="img" type='file' title="upload a Clear picture of missing person" name="img" accept="image/*" oninput="validateImage()">
<br>
                    <label style='color:red'>*Image size should be less than 6MB</label>
                    <center><input type="submit" value="upload" style="font-size: 20px;box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);background:#311B92;color:white;width: 200px"></center>
                </form>
            </div>
            

        </div>
        
        <?php include 'bottomborder.php'; ?>
        <script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="130%";
               document.getElementById("addr").style.fontsize="10px";
               document.getElementById("cr").style.fontsize="10px";
       </script>
    </body>
</html>
