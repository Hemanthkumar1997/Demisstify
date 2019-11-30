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
                margin-bottom:30px;
                padding:2%;
                
            }
            .headings{
                
                
            }
            .info p{
                display:inline;                
            }
            .mail{
                display:block;
                
            }
        </style>
        <script>
            <?php include 'commonscripts.php'; ?>
        </script>
    </head>
    <body>
        
<?php
include 'topborder.php';
$db=new mysqli("localhost","root","","demisstify");
$pos=20;
echo '<div class="container">';
if($db->error){
    die("connection failed".$db->error);
}
else{
    $count="SELECT count(*) as count FROM `query` WHERE 1 ORDER by `Date`";
    $rs=$db->query($count);
    if(mysqli_num_rows($rs)>0){  
     $row=$rs->fetch_assoc();
     echo '<b style="z-index:0;position:absolute;left:13.5%;top:-13%;font-size:20px"><x style="color:Green">Showing:</x> '.$row["count"].' Queries</b>';
    }$sql="SELECT * FROM `query` WHERE 1 ORDER by `Date`";
    $result=$db->query($sql);
    if(mysqli_num_rows($result)>0){  
    while($row=$result->fetch_assoc()){
        echo '<div class="info" style="position:relative;left:15%;">
                <div class="name"><b class="heading" style="position:relative;left:10%;">Name</b><p class="values" style="position:absolute;left:30%;top:5%"><b class="delimit">:</b> '.$row["Name"].'</p></div>
                <div class="mail"> <b class="heading" style="position:relative;left:10%;">Email</b><p class="values" style="position:absolute;left:30%;top:20%"><b class="delimit">:</b> '.$row["Email"].'</p></div>
                <div class="Subject"> <b class="heading" style="position:relative;left:10%;">Subject</b><p class="values" style="position:absolute;left:30%;top:37%"><b class="delimit">:</b> '.$row["subject"].'</p></div>
                <div class="query"> <b class="heading" style="position:relative;left:10%;">Description</b><p class="values" style="position:absolute;left:30%;top:55%"><b class="delimit">:</b> '.$row["query"].'</p></div>
              </div>'; 
        $pos+=20;
    }
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