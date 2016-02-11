<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$username = $kategori = $userid = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["nama_barang"]);
    $kategori = test_input($_POST["kategori"]);
    $userid = test_input($_POST["id_barang"]);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}