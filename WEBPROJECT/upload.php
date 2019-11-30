<?php
session_start();
if(!isset($_SESSION["id"])){
 $_SESSION["id"]="missing";
}
?>
<?php
$name= filter_input(INPUT_POST, "name");
$contact=filter_input(INPUT_POST,"cn");
$height=filter_input(INPUT_POST,"height");
$weight=filter_input(INPUT_POST,"weight");
$email=filter_input(INPUT_POST,"email");
$place=filter_input(INPUT_POST,"place");
$photo=filter_input(INPUT_POST,"img");
$ID="DMS".substr($name,0, strlen($name)/2).substr($contact, 8);
$age=intval(filter_input(INPUT_POST,"age"));
$type=$_SESSION["type"];
$db=new mysqli("localhost","root","","demisstify");
    if($db->connect_error){
        die("Connection failed: " .$db->connect_error);
    }
    else{
        $imagename=$_FILES["img"]["name"]; 

        $imagetmp=addslashes (file_get_contents($_FILES['img']['tmp_name']));
        if(isset($_SESSION["mail"])){
            $cmail=$_SESSION['mail'];
            $sql="INSERT INTO `missing`(`Complaint ID`, `name`, `age`, `height`, `weight`, `contact_number`, `contact_email`, `place`, `photo`, `type`, `filed_by`) VALUES ('$ID','$name','$age','$height','$weight','$contact','$email','$place','$imagetmp','$type','$cmail')";

        }else{
        $sql="INSERT INTO `missing`(`Complaint ID`, `name`, `age`, `height`, `weight`, `contact_number`, `contact_email`, `place`, `photo`, `type`) VALUES ('$ID','$name','$age','$height','$weight','$contact','$email','$place','$imagetmp','$type')";
        }if(!$db->query($sql)===TRUE){
            if(mysqli_errno($db)==1062){
                Echo '<p style="color:blue;font-size:25px;position:absolute;left:25%;top:42%;">Data already exist.We will get to you as soon as we find the match </p>';           
                    header("Refresh:3 url=index.php");
            }
        }else{
           Echo '<p style="color:blue;font-size:25px;position:absolute;left:20%;top:42%;">successfully Registered Complaint.We will get to you as soon as we find the match </p>';
           echo '<p style="color:blue;font-size:25px;position:absolute;left:20%;top:47%;">Note the Complaint ID for future Reference ID:<b style="color:red">'. $ID.'</b></p>';
         $command = 'C:\\Users\\Hemanth\\AppData\\Local\\Programs\\Python\\Python36\\python C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\compare.py '.$ID;
            exec($command,$output,$retval);
          
             echo '<a href="index.php" style="color:RED;font-size:25px;position:absolute;left:20%;top:70%;">CONTINUE>></a>';         
                   
        }
    
        $db->close();
    }