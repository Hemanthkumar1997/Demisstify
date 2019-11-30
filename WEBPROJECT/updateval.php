<?php
session_start();
?>
<?php
$choice= filter_input(INPUT_POST, "choice");
$cid=filter_input(INPUT_POST, "cid");
if(strcmp($choice,"photo")!=0){
$value=filter_input(INPUT_POST, "value");
$sql="UPDATE `missing` SET `$choice`='$value' WHERE `Complaint ID` ='$cid'";

}else{
    $imagename=$_FILES["img"]["name"]; 
    $imagetmp=addslashes (file_get_contents($_FILES['img']['tmp_name']));
    $sql="UPDATE `missing` SET `$choice`='$imagetmp' WHERE `Complaint ID` ='$cid'";
}
$affected=0;
$db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
        
        $affected=$db->query($sql);
        if(mysqli_affected_rows($db)>0){
        echo '<center><b style="color:blue;text-align:center;">successfully Updated the Complaint record</b></center>';
        $command = 'C:\\Users\\Hemanth\\AppData\\Local\\Programs\\Python\\Python36\\python C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\compare.py '.$cid;
            exec($command,$output,$retval);
        header("Refresh:2 url=update.php");       
        }
else {
      echo '<center><b style="color:Red;text-align:center;">No Changes done</b></center>';
      header("Refresh:2 url=update.php");
}
        $db->close();
    }