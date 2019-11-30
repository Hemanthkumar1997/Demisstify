<?php
session_start();
?>

<?php
$mail= filter_input(INPUT_POST, "mail");
$p=filter_input(INPUT_POST, "p");
$name=filter_input(INPUT_POST, "name");
if (isset($_POST["radio"])) {
    $type = "admin";
} else {
    $type = "customer";
}
$db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
       $sql="INSERT INTO `profiles`(`name`,`Email`, `password`, `type`) VALUES ('$name','$mail','$p','$type')";
        if(!$db->query($sql)===TRUE){
            if(mysqli_errno($db)==1062){
                Echo '<p style="color:blue;font-size:25px;position:absolute;left:45%;top:42%;">User already exist.Try login </p>';
                
                    header("Refresh:3 url=login");
            }
            
        }else{
              Echo '<p style="color:blue;font-size:25px;position:absolute;left:45%;top:42%;">Account succesfully created </p>';
                
                    header("Refresh:3 url=index.php");  
            } 
        
    }