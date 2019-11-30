<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$command = 'python C:\\Users\\Hemanth\\Desktop\\python-compare-two-images\\compare.py DMShell74';
$a=exec($command,$retval);
foreach($retval as $i){
echo $i;
}