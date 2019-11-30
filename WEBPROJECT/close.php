<?php
session_start();
?>
<?php
$id1=filter_input(INPUT_GET, "id");
if(strlen($id1)==0){
    echo "<B style='color:Red;position:absolute;left:45%;top:48%;'>Input cannot be empty</B>";
}else{
$sql="UPDATE `missing` SET `status`='Closed' WHERE `Complaint ID` ='$id1'";
$affected=0;
$db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
        $affected=$db->query($sql);
        if(mysqli_affected_rows($db)>0){
            echo "<B style='color:blue;position:absolute;left:35%;top:48%;'>Successfully closed Complaint.Thanks for using our Service</B>";
        header("Refresh:2 url=index.php");       
        }
        else{
           echo "<B style='color:Red;position:absolute;left:30%;top:48%;'>Something Went wrong.causes may be no Complaint exist or complaint already closed</B>"; 
        
           header("Refresh:3 url=index.php"); 
        }
        $db->close();
    }

}