<?php
session_start();
$_SESSION["id"]=$_GET["id"];
?>
<html>
    <head>
        <title>
            Display
        </title>
        <style>
            .page{
                height:120%;
                width:50%;
                background:white;
                position:absolute;
                left:25%;
                margin-bottom: 5%;
                margin-top:1%;
                box-shadow:0 14px 18px 0 rgba(0, 0, 0.8, 0.2), 0 16px 20px 0 rgba(0, 0, 0, 0.19);
            }
            table,td,tr{
                padding:5px;
            }
          .values{
                display:inline;
                 position:relative;
                 left:40%;
                 top:10px;
                 font-size: 19px;
            }
            .headings{
                position:relative;
                left:50%;
                top:10px;
                font-size: 19px;
            }
            .sep{
                margin-right: 5px;
                
            }
        </style>
    </head>
    <body style="background: #263238">
         
        <?php 
   
        $db=new mysqli("localhost","root","","demisstify");
if($db->error){
    die("connection failed".$db->error);
}
else{
$id=$_SESSION["id"];
$sql="SELECT * FROM `missing` WHERE `Complaint ID`='$id'";
$result=$db->query($sql);
   if(mysqli_num_rows($result)>0){
       $row=$result->fetch_assoc();
       $color="red";
       if(strcmp($row["status"],"Active")==0){$color='green';}
       echo'<div class="page">
           <h1 style="text-align:center">MISSING PROFILE</h1>
           
            <table>
             <tr><td> <b class="headings"> Complaint ID</b></td><td><p class="values"><b class="sep">:</b>'.$row["Complaint ID"].'</p><br></td></tr>
             <tr><td>   <b class="headings"> Name</b></td><td><p class="values"><b class="sep">:</b>'.$row["name"].'</p><br></td></tr>
             <tr><td>   <b class="headings"> Age</b></td><td><p class="values"><b class="sep">:</b>'.$row["age"].'</p><br></td></tr>
             <tr><td> <b class="headings"> Height</b></td><td><p class="values"><b class="sep">:</b>'.$row["height"].'</p><br></td></tr>
             <tr><td>   <b class="headings"> weight</b></td><td><p class="values"><b class="sep">:</b>'.$row["weight"].'</p><br></td></tr>
                 <tr><td> <b class="headings"> If Found contact</b></td><td><p class="values"><b class="sep">:</b>'.$row["contact_number"].'</p><br></td></tr>
             <tr><td>   <b class="headings"> Contact Email</b></td><td><p class="values"><b class="sep">:</b>'.$row["contact_email"].'</p><br></td></tr>
                 <tr><td> <b class="headings">Last seen place</b></td><td><p class="values"><b class="sep">:</b>'.$row["place"].'</p><br></td></tr>
             <tr><td>   <b class="headings">Complaint Filed at</b></td><td><p class="values"><b class="sep">:</b>'.$row["date"].'</p><br></td></tr>
            <tr><td>   <b class="headings">Complaint Type</b></td><td><p class="values"><b class="sep">:</b>'.$row["type"].'</p><br></td></tr> 
                <tr><td>   <b class="headings">Complaint Status</b></td><td><p class="values"><b class="sep" >:</b><x style="color:'.$color.'">'.$row["status"].'</x></p><br></td></tr>
            </div>
           </table> 
           <img src="ico.jpg" width="20%" height="20%" style="object-fit:contain;position:absolute;top:-4%;left:2%"/>
           <img src="fetch.php?id='.$row["Complaint ID"].'" width="20%" height="20%" style="object-fit:contain;position:absolute;top:14%;left:65%"/>';
   }
  else {
        echo'<div class="page"><p style="color:red;position:absolute;top:42%;left:35%">No Entries found with above ID</p></div>';
   }
}
?>
    </body>

</html>

