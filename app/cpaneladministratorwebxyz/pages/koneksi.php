<?php
/**
 * Namafile : config.php 
 * ----------------------------*/
 
$dbhost = 'localhost'; 
 
$dbuser = 'root';     // ini berlaku di xampp
 
$dbpass = '';         // ini berlaku di xampp
 
$dbname = 'sedenasto';
 
// melakukan koneksi ke database
 
$con= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 
// cek koneksi yang kita lakukan berhasil atau tidak
 
if ($con->connect_error) {
    // jika terjadi error, matikan proses dengan die() atau exit();
    die('koneksi gagal');
}
?>