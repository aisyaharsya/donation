<?php 
include '../application/config.php';
	// mengaktifkan session
    session_start();
    // menghapus session
    session_unset();
    unset($_SESSION["status"]);
    session_destroy();
    header('location: '.BASEURL);

?>
