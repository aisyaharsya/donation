<?php
/**
 * Namafile : config.php 
 * ----------------------------*/
include 'config.php';

$dbhost = DBHOST; 
 
$dbuser = DBUSER;     
 
$dbpass = DBPASS;         

$dbname = DBNAME;
 
// melakukan koneksi ke database
 
$con= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 
// cek koneksi yang kita lakukan berhasil atau tidak
 
if ($con->connect_error) {
    // jika terjadi error, matikan proses dengan die() atau exit();
    die('koneksi gagal');
}

?>