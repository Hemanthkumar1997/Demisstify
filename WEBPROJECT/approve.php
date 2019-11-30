<?php
session_start();
?>
<html>
    <head>
        <?php if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")!=0){header("Location:index.php");} 
        if(!isset($_SESSION["type"])){header("Location:index.php");} 
        ?>
        <title>Queries</title>
        <style>
            <?php include 'common.php'; ?>
            .container{
                position:absolute;
                top:20%;
            }
            .info{
                display:block;
                box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width:1000px;
                height:300px;
                margin-bottom:30px;
                padding:4%;
                
            }
            .info p{
                display:inline;                
            }
            .mail{
                display:block;
                
            }
        button{
        text-align:center;
        width:180px;
        height:35px;
        color:white;
        background:#311B92;
        position:absolute;
        top:80%;
        left:30%;
        font-size:20px;
        border:none;
        box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        z-index:1;
        display:block;
        }
        .img1{
            position:absolute;
            left:5%;
            width:200px;
            height:200px;
            padding:2px;
        }
        .img2{
            width:200px;
            height:200px;
            position:relative;left:80%;
             padding:2px;
        }
        </style>
        <script>
            <?php include 'commonscripts.php'; ?>
          function goto(id,action){
          var res = id.split("-");

          window.location.href="accept.php?id1="+res[0]+"&&id2="+res[1]+"&&action="+action;
       
        }
        </script>
    </head>
    <body>
        
<?php
function name($id){
    $db=new mysqli("localhost","root","","demisstify");
if($db->error){
    die("connection failed".$db->error);
}else{
    $sql="SELECT `name` FROM `missing` WHERE `Complaint ID`='$id'";
    $result=$db->query($sql);
    $row=$result->fetch_assoc();
    return $row["name"];
}
}
include 'topborder.php';
$db=new mysqli("localhost","root","","demisstify");
$pos=20;
echo '<div class="container">';
if($db->error){
    die("connection failed".$db->error);
}
else{
    $sql="SELECT * FROM `matched` WHERE `status` ='pending'";
    $result=$db->query($sql);
    if(mysqli_num_rows($result)>0){ 
    
    while($row=$result->fetch_assoc()){
        echo '<div class="info" style="position:relative;left:10%;height:35%">
            <div class="img1"> <img src="fetch.php?id='.$row["id1"].'" width="200px" height="200px" style="object-fit:contain;" /></div>
             <label style="color:#311B92;font-size:25px;position:absolute;top:88%;left:7%">'.name($row['id1']).'</label>
           <div class="img2">  <img src="fetch.php?id='.$row["id2"].'" width="200px" height="200px" style="object-fit:contain;"  /></div>
                <label style="color:#311B92;font-size:25px;position:absolute;top:88%;left:80%"">'.name($row['id2']).'</label>
                 <button id="'.($row["id1"]."-".$row["id2"]).'" style="cursor:pointer" onclick="goto(this.id,\'accept\')">Accept</button>
                 <button id="'.($row["id1"]."-".$row["id2"]).'" style="cursor:pointer;position:absolute;left:48%;" onclick="goto(this.id,\'reject\')">Reject</button>
             </div>'; 
        $pos+=51;
    }
    }
    else{
        echo '<b style="color:red;position:absolute;top:100px;left:550px;font-size:25px;"><pre>No Record to Approve</pre></b>';
    }
}
if($pos<90){
    $pos=70;
}
echo ' </div>';
include 'bottomborder.php';

       echo '<script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="'.($pos+20).'%";</script>';
       ?>
    </body>
</html>