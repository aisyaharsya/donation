<?php
if(!isset($_GET['href'])){
	header('location:login');
	exit();
}
session_start();
extract($_POST);
include"application/koneksi.php";
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));

//hash
$plainSalt = "L0ndon_bridg3_P&g";
$hashedSalt = substr(hash('haval160,4', $plainSalt), 4,17);
//hash

$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
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
						RESET PASSWORD
					</span>
				</div>
                <?php 
                if(isset($_POST['simpan']))
                    {                               
						// Validate password strength
						$uppercase = preg_match('@[A-Z]@', $newpass);
						$lowercase = preg_match('@[a-z]@', $newpass);
						$number    = preg_match('@[0-9]@', $newpass);
						$specialChars = preg_match('@[^\w]@', $newpass);

                    	     if ($kpass!=$newpass) {
                    	         echo "<div class='alert alert-danger'>
									<button class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
									</button>
									Konfirmasi password tidak sama.
									</div>";
                    	      }elseif(!$uppercase || !$lowercase || !$number  || strlen($newpass) < 8){
								echo "<div class='alert alert-danger'>
									<button class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
									</button>
									Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
									</div>";
							
							}
							  else{

                    	      		$query=mysqli_query($con,"UPDATE tbanggota SET kataSandi='".sha1($hashedSalt.$newpass)."' where idTemp='".$_GET['href']."'");
                    	      		if($query)
										{
											echo "<div class='alert alert-success'>
											<button class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
											</button>
											Password anda telah diubah
											</div>";
											header('Location:', $link[1]);
										}
										else
										{
											echo "<div class='alert alert-danger'>
											<button class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
											</button>
											Terjadi kesalahan, silahkan coba lagi.
											</div>";
										}
                    	      }                        
                    }
                ?>
				<form class="login100-form validate-form" method="post">
					<input type="hidden" name="idTemp" value="<?php echo $_GET['href'] ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Password Baru</span>
						<input class="input100" type="password" name="newpass" placeholder="Password Baru">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Konfirmasi Password</span>
						<input class="input100" type="password" name="kpass" placeholder="Konfirmasi Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="simpan" class="login100-form-btn">
							Proses
						</button>
						<a href="masuk" class="mt-3">Sudah memiliki akun? Masuk di sini</a>
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
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="vendors/login/js/main.js"></script>

</body>
</html>