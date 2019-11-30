<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
             label:focus{
              background:white;
              }
            .topborder{
                      width:100%;
                      height:10%;
                      background: #311B92;
                      position: fixed;
                      top:0%;
                      left:0%;
                      color:white;
                      text-align:center;
                      z-index:2;
            }
            .bottom{                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                      width:100%;
                      height:30%;
                      background: #311B92;
                      position: absolute;
                      top:110%;
                      left:0%;
                      color:white;
                      text-align: center;
            }
            
            .search,.search input{
                      width:30%;
                      height:50%;
                      background:white;
                      position: absolute;
                      top:35%;
                      left:39%;
                      border-radius:10px;
                     
            }
            .search input{
               margin-left: 5px;
               color:black;
            }
            .search input:focus{
                outline: none;
            }
            .topborder label{
                color:white;
                font-size: 20px;
                font-weight:bold;
       
            }
            .dropbtn {
                background-color: #3498DB;
                color: white;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }


            .dropbtn:hover, .dropbtn:focus {
                background-color: #2980B9;
            }

            .dropdown {
                position: absolute;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {
                background-color: #ddd
            }

            .show {
                display:block;
            }

            