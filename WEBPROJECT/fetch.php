<?php
$id = filter_input(INPUT_GET,'id');
  $db= new mysqli("localhost", "root", "","demisstify");
  if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
                   }
  $sql = "SELECT `photo` FROM `missing` WHERE `Complaint ID` = '$id'";
  $result =$db->query($sql);
  $row=$result->fetch_assoc();
  header("Content-type: image");
  echo $row['photo'];
  $db->close();
