<?php
session_start();
?>
<?php
if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")!=0){header("Location:index.php");} 
if(!isset($_SESSION["type"])){header("Location:index.php");} 
        
$action= filter_input(INPUT_GET, "action");
$id1=filter_input(INPUT_GET, "id1");
$id2=filter_input(INPUT_GET, "id2");
if(strcmp($action,"accept")==0){
$sql="UPDATE `matched` SET `status`='Accepted' WHERE  `id1` ='$id1' and `id2` ='$id2'";

}else{
   $sql="UPDATE `matched` SET `status`='Rejected' WHERE  `id1` ='$id1' and `id2` ='$id2'";
}
$affected=0;
$db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
        $affected=$db->query($sql);
        if(mysqli_affected_rows($db)>0){
        header("Refresh:0 url=Approve.php");       
        }
        $db->close();
    }

