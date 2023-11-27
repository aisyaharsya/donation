<?php 
session_start();

if(empty($_SESSION['status']))
{
	echo"<script> location.replace('../login.php'); </script>";
}
?>