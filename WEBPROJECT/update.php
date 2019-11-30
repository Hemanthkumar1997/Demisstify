<?php
session_start();
?>
<html>
    <head>
        <title>update</title>
                <meta charset="UTF-8">
        <style>
        <?php     include 'common.php'; ?>
         .middle{
                 position: absolute;
                 top:20%;
                 left:37%;
                 box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
                 
            }
          form input{
                width:400px;
                margin:auto;
                display:inline;
                margin-right: 15px;
                height:30px;
                padding-left: 15px;
                margin-top: 10px;
               border:none;
            }
            form input:focus,select:focus{
                outline: none;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            input[type=number],select{
                
                width:183px;
                margin-right: 20px;
                height:30px;
            }
            b{
                font-size: 20px;
            }
            textarea{
                border:none;
             }
            textarea:focus{
                border:none;
                outline:none;
                 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             }
        </style>
        <script>
        function isImage(){
    var fileInput = document.getElementById('img');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }
}
        </script>
        <script>
            function validate(){
                x=document.getElementById("img").value;
                y=document.getElementById("ch").value;
                z=document.getElementById("cid").value;
                m=document.getElementById("vl").value;
                if(y!=="photo" && z==="" ){
                    alert("ENTER VALID ID");
                    return false;
                }
                if(y!=="photo" && m==="" ){
                    alert("ENTER VALID Value");
                    return false;
                }
                if(y==="photo" && z===""){
                    alert("ENTER VALID ID");
                    return false;
                }
                if(y==="photo" && x===""){
                    alert("select a image");
                    return false;
                }
                return true;
            }
        <?php     include 'commonscripts.php'; ?>
           
            function showit(){
                x=document.getElementById("ch").value;
                if(x=="photo"){
                    document.getElementById("vl").style.visibility="hidden";
                    
                    document.getElementById("img").style.visibility="visible";
                }
                else{
                    document.getElementById("vl").style.visibility="visible";
                    document.getElementById("img").style.visibility="hidden";
                     document.getElementById("vl").placeholder="Enter new Email";
                    if(x=="contact_email"){
                    document.getElementById("vl").placeholder="Enter new Email";
                }else{
                    document.getElementById("vl").placeholder="Enter new Phone number";
                }
                }
            }
        </script>
    </head>
    <body>
<?php include 'topborder.php';?>

  <div class="middle" style="background: #E8EAF6;height:60%;width:25%;padding:30px;border-radius:10px;">
            <div class="Form">
                <form name="qform" autocomplete="off" action="updateval.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                    <Label style="position:relative;left:20%;font-size:25px;color:#311B92">Update Complaint</label><br><br>
                    <select id="ch" name="choice" style="position:absolute;left:25%;" onchange="showit()" required>
      			<option value="">UPDATE</option>
      			<option value="contact_email">Contact Email</option>
      			<option value="contact_number"> Contact number</option>
      			<option value="photo"> photo</option>
                    </select><b style="color:red;position:absolute;left:72%;">*</b><br>
                    <input type="text" id="cid" name="cid" style="width:260px;height:40px;position:absolute;left:15%;top:33%;" placeholder="Enter the Complaint ID"/>
                    <input type="text" id="vl" name="value" placeholder="" style="width:260px;height:40px;position:absolute;left:15%;top:50%;">
                    <input type="file" id="img" style="width:65%;border:solid #311B92;position:absolute;left:15%;top:50%;visibility: hidden" title="upload a Clear picture of missing person" name="img" accept="image/*" onchange="return isImage()">
                    <center><input type="submit" value="upload" style="border-radius:0;border:none;font-size: 20px;background:#311B92;color:white;width: 200px;height:40px;box-shadow:0 14px 18px 0 rgba(0, 0, 0, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);position:absolute;top:78%;left:25%"></center>
                </form>
            </div>
  </div>
      
  <?php include 'bottomborder.php';?>
    </body>
</html>