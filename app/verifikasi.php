<?php
session_start();
extract($_POST);
include"application/koneksi.php";
 
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Verifikasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendors/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="vendors/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/banner/banner.jpg);">
					<span class="login100-form-title-1">
						VERIFIKASI
					</span>
				</div>

					<?php  
					date_default_timezone_set('Asia/Jakarta');
					if(isset($_GET['href']))
					{
						$query=mysqli_query($con,"UPDATE tbanggota set verifakun='Y' where idTemp='".$_GET['href']."'");
					}

					?>

				<div class="alert alert-success">Akun anda telah diverifikasi. Terimakasih telah melakukan verifikasi.</div>
				<div align="center" style="padding:20px;">
				    <a href="masuk" class="btn btn-primary">Masuk</a>
				</div>
				
			</div>
		</div>
	</div>

		<!--===============================================================================================-->
		<script src="vendors/login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/bootstrap/js/popper.js"></script>
		<script src="vendors/login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/js/main.js"></script>

</body>
</html>