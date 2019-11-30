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
            .held table,td,th{
                border:2px solid #3e8e41;
                text-align:center;
               }
            .held table{
                width:90%;
                z-index:-1;
                position:absolute;
                top:20%;
                left:5%;
                border-collapse:collapse;
                 box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            th,td{
                padding:15px;
            }
            th{
                background:darkgray;
                color:white
            }
        </style>
        <script>
            <?php include 'commonscripts.php'; ?>
        </script>
    </head>
    <body>
        
<?php
 include 'topborder.php';

?>
  <div class="middle">
<?php 
$pos=30;
$db=new mysqli("localhost","root","","demisstify");
if($db->error){
    die("connection failed".$db->error);
}else{
echo "<b style='color:#3e8e41;position:absolute;top:15%;left:5%;font-size:20px;z-index:-1'>LIST OF Complaints</b>";
$sql="SELECT * FROM `missing` order by name";
$result=$db->query($sql);
 if (mysqli_num_rows($result) > 0) {
  echo '<div class="held"><table><tr><th>Name</th><th>Age</th><th>contact email</th><th>contact number</th><th>Last seen At</th><th>Filed by</th></tr>';
  while(  $row = $result->fetch_assoc()){
           echo "<tr><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["contact_email"]."</td><td>".$row["contact_number"]."</td><td>".$row["place"]."</td><td>".$row["filed_by"]."</td></tr>";
           $pos+=8;
       }
  echo '</table></div>';
    }

}
if($pos<70){$pos=70;}
$_SESSION["pos"]=$pos;
?>

  </div>
<?php
include 'bottomborder.php';


        echo '<script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="'.($pos+20).'%";</script>';
       ?>
    </body>
</html>

