<?php
session_start();
extract($_POST);
include"application/koneksi.php";
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));

//hash
$plainSalt = "L0ndon_bridg3_P&g";
$hashedSalt = substr(hash('haval160,4', $plainSalt), 4,17);
//hash
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
						LOGIN
					</span>
				</div>
                <?php 
                if(isset($_POST['simpan']))
                    {                                  
                    	$data=mysqli_query($con,"select * from tbanggota where (alamatEmail='".$username."' or nope='".$username."') and kataSandi='".sha1($hashedSalt.$pass)."'");

                        // menghitung jumlah data yang ditemukan
                    	$cek = mysqli_num_rows($data);
                    	$dataakun = mysqli_fetch_row($data);
                    
                    	if($cek > 0){
                    		if ($dataakun[9]=="N") {
                    			echo "<div class='alert alert-danger'>
		                    	<button class='close' data-dismiss='alert'>
		                    	<i class='ace-icon fa fa-times'></i>
		                    	</button>
		                    	<b>Gagal Login !</b> Akun anda belum diverifikasi, 
		                    	</div>";
                    		}else{
                    			$_SESSION['username'] = $username;
                    			$_SESSION['status'] = "login";
                    			echo"<script> location.replace('member/member'); </script>";
                    		}
                    	}else{
                    		echo "<div class='alert alert-danger'>
                            	<b>Gagal Login!</b>, Periksa inputan anda.
                            	</div>";
                    	}   

                    }
                    
                ?>
				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email/<br>Telepon</span>
						<input class="input100" type="text" name="username" placeholder="Masukkan Email / No.Handphone">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Masukkan Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Ingatkan Saya
							</label>
						</div>

						<div>
							<a href="lupasandi" class="txt1">
								Lupa Kata Sandi?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="simpan" class="login100-form-btn ">
							Login
						</button>
						<div style="margin: 2rem 1rem;"></div>
						<a  href="vendors/login-google/google.php" class="login100-form-btn " style=" background-color: red; color: white;">
							GOOGLE
						</a>
						<!-- <div class="text-center ">
							<a href="vendors/login-google/google.php" class="btn btn-danger"><i class="fa fa-google"></i> &nbsp;GOOGLE</a>
						</div> -->
					</div>

					<div class="container-login100-form-btn">
						<a href="daftar" class="mt-3">Belum memiliki akun? Daftar di sini</a>
					</div>
					
				</form>
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
		<script src="vendors/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/js/main.js"></script>

</body>
</html>