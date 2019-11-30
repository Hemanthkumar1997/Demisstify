<?php 
session_start();
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mail=filter_input(INPUT_POST, 'mail');
$p=filter_input(INPUT_POST, 'p');
$db = new mysqli("localhost", "root","","demisstify");
            if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
                   }
            else{
                $sql="SELECT * FROM `profiles` WHERE Email='$mail'";
                 $res=mysqli_query($db,$sql);
                 if (mysqli_num_rows($res) > 0) {
                    $row = $res->fetch_assoc();
                    if($row["password"]==$p){
                        $_SESSION["name"]=$row["name"];
                        $_SESSION['mail']=$mail;
                        $_SESSION["type"]=$row["type"];
                        if(strcmp($_SESSION["type"],"customer")==0){
                        header("Location:index.php");
                    }else{
                        header("Location:Admin.php");
                    }
                }
                    else{
                        $_SESSION["invalid"]="Invalid password";
                        header("Location:login.php");
                    }
                    $db->close();
                     }
                     else{
                        $_SESSION["invalid"]="Invalid user ID";
                        header("Location:login.php");
                        $db->close();
                    }
                    
                }
             
            