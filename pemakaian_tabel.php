<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smartatk";
    
    // create connection
    $connection = new mysqli($ervername, $username, $password, $dbname);
    // checking connection
    if ($connection->connect_error) {
        die("Connection Failed: ". $connection->connect_error);
    }
    
    
    $result = $connection->query($swl);
    
    
    
    