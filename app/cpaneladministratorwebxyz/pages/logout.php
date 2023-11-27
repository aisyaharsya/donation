<?php 
	// mengaktifkan session
    session_start();
    // menghapus session
    session_destroy();
    echo"<script> location.replace('login.php'); </script>";

?>
