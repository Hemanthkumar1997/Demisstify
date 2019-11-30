<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

function change(url,id){
                if(id.innerText==="Login"||id.innerText==="Home"||id.innerText==="Contact us")
                 window.location.href = url;
             
            }

function change1(url){
                 window.location.href = url;
            }
 
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                        }
                    }
                }
            };
       
            function query(){
                var x=document.getElementById("question");
                if(x.value=="")
                {
                alert("Input cannot be empty");
                }
                else{
                window.location.href="search.php?q="+x.value;
                }
            }
            
           