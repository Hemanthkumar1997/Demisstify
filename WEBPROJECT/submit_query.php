<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$name=filter_input(INPUT_POST, 'name');
$mail=filter_input(INPUT_POST, 'ml');
$sub=filter_input(INPUT_POST, 'sub');
$query=filter_input(INPUT_POST, 'query');
 
$db = new mysqli("localhost", "root","","demisstify");
            if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
                   }
            else{
                $sql="INSERT INTO `query`(`Name`, `Email`, `subject`, `query`) VALUES ('$name','$mail','$sub','$query')";
                if($db->query($sql)===TRUE){
                    Echo '<p style="color:blue;font-size:25px;position:absolute;left:42%;top:42%;">successfully sent your query <br>we will get back to you soon</p>';
                
                    header("Refresh:3 url=index.php");
                }
             
            }

