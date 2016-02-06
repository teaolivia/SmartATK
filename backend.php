<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username = "nama_user";
$category = "kategori_user";
$userid = "id_user";

$stname = "nama_barang";
$stid = "kode_barang";
$stock = "stok";

$date = "tanggal";
$qty = "n_pakai";
$desc = "deskripsi";

// koneksi ke database
$dbhandle = mysql_connect($hostname, $username, $password) or die("The page requested is unavailable :(");

// memilih database
$selected = mysql_select_db("smartATK",$dbhandle) 
  or die("Could not select examples");

// eksekusi Query berdasarkan perintah

// fetch data dari database

// close connection
mysql_close($dbhandle);
