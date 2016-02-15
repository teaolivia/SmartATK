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
$selected = mysql_select_db("smartatk",$dbhandle) 
  or die("Could not select examples");

// eksekusi Query berdasarkan perintah
$result1 = mysql_query("SELECT  nama_barang, stock FROM t_atk");                // lihat kode barang
$result2 = mysql_query("SELECT nama_barang FROM t_atk");                        // lihat nama barang
$result3 = mysql_query("SELECT stok FROM t_atk");                               // lihat stok
$result4 = mysql_query("INSERT INTO t_atk VALUES (‘x’, ‘y’, ‘z’)");             // insert Data ATK
$result5 = mysql_query("UPDATE t_atk SET stok = stok+x WHERE kode_barang = y"); // Tambah Stok
$result6 = mysql_query("UPDATE t_atk SET stok = stok-x WHERE kode_barang = y"); // Kurang Stok
$result7 = mysql_query("INSERT INTO t_pemakaian VALUES id_user, nama_user, "
        . "             kategori_user, n_pakai, kode_barang, nama_barang, "
        . "             tanggal");                                              // masukkan row baru pada tabel pemakaian
$result8 = mysql_query("INSERT INTO t_user VALUES id_user, nama_user, kategori_user"); // Masukkan row baru pada Tabel User
$result9 = mysql_query("SELECT  nama_barang, stock FROM t_atk"); // data barang + stok
$result10 = mysql_query("SELECT nama_user, kategori_user FROM t_user"); // data user
$result11 = mysql_query("SELECT nama_barang, nama_user, n_pakai FROM t_pemakaian "
        . "             ORDER BY nama_user DESC"); // data pemakaian
$result12 = mysql_query("SELECT a.kode_barang, a.nama_barang, stok_minimum FROM 
            (SELECT kode_barang, nama_barang FROM t_atk) AS a JOIN (SELECT kode_
            barang, sum(n_pakai) as stok_minimum FROM t_pemakaian GROUP BY 
                    kode_barang) AS b ON a.kode_barang=b.kode_barang"); // stok minimum???
$result13 = mysql_query("SELECT id_user, nama_user, kategori_user, nama_barang, n_pakai, deskripsi, "
        . "             tanggal FROM `t_pemakaian` WHERE nama_user=x"); // pemakaian ATK per user
$result14 = mysql_query("SELECT kode_barang, nama_barang, sum(n_pakai) as "
        . "'jumlah pemakaian' FROM `t_pemakaian` WHERE tanggal<x  and tanggal>y "
        . "GROUP BY kode_barang"); // pemakaian ATK per periode
/*
* Q009 Data Barang + Stock : SELECT nama_barang, stock FROM t_ATK
* Q010 Data User : SELECT nama_user, kategori_user FROM t_user
* Q011 Data Pemakaian : SELECT nama_barang, nama_user, n_pakai FROM t_pemakaian ORDER BY nama_user DESC
*/

$result15 = mysql_query("SELECT nama_barang, stok FROM t_ATK"); // cek data ATK + stok
$result16 = mysql_query("SELECT nama_user, kategori_user FROM t_user"); // cek data user
//$result16 = mysql_query("SELECT * FROM t_user");
$result17 = mysql_query("SELECT nama_barang, nama_user, n_pakai FROM t_pemakaian ORDER BY nama_user ASC"); // cek data pemakaian

// fetch data dari database

// close connection
mysql_close($dbhandle);
