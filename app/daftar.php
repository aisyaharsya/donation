<?php
session_start();
extract($_POST);
include"application/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/sendEmail/vendor/autoload.php';

$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));

//hash
$plainSalt = "L0ndon_bridg3_P&g";
$hashedSalt = substr(hash('haval160,4', $plainSalt), 4,17);
//hash
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar</title>
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
						DAFTAR
					</span>
				</div>

			<?php  
				date_default_timezone_set('Asia/Jakarta');
				if(isset($_POST['simpan'])){

					if($_SESSION['captcha'] == $pin){

						// Validate password strength
						$uppercase = preg_match('@[A-Z]@', $password);
						$lowercase = preg_match('@[a-z]@', $password);
						$number    = preg_match('@[0-9]@', $password);
						$specialChars = preg_match('@[^\w]@', $password);

						$query=mysqli_query($con,"select nope,alamatEmail from tbanggota where nope='$nope'");
						$ketemu=mysqli_num_rows($query);
						
						if($ketemu > 0){
							echo "<div class='alert alert-danger'>
							<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
							</button>
							<b>Gagal</b>, Nomor Telepon/handphone sudah terdaftar.
							</div>";
						}elseif(!$uppercase || !$lowercase || !$number  || strlen($password) < 8){
							echo "<div class='alert alert-danger'>
								<button class='close' data-dismiss='alert'>
								<i class='ace-icon fa fa-times'></i>
								</button>
								Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
								</div>";
						}elseif ($kpass!=$password) {
							echo "<div class='alert alert-danger'>
							   <button class='close' data-dismiss='alert'>
							   <i class='ace-icon fa fa-times'></i>
							   </button>
							   Konfirmasi password tidak sama.
							   </div>";
						}else{
							$query1=mysqli_query($con,"select alamatEmail from tbanggota where alamatEmail='$email'");
							$ketemu1=mysqli_num_rows($query1);
							if ($ketemu1>0) {
								echo "<div class='alert alert-danger'>
								<button class='close' data-dismiss='alert'>
								<i class='ace-icon fa fa-times'></i>
								</button>
								<b>Gagal</b>, Email sudah terdaftar.
								</div>";
							}else{

								
								$url=$link[1]."verifikasi?href=".md5($email);

								$mail = new PHPMailer(true);

								//Server settings
								// $mail->SMTPDebug = SMTP::DEBUG_SERVER;			// Enable verbose debug output
								$mail->isSMTP();                                 	// Send using SMTP
								$mail->Host       = 'smtp.gmail.com';           	// Set the SMTP server to send through
								$mail->SMTPAuth   = true;                         	// Enable SMTP authentication
								$mail->Username   = 'pure.charity.ind@gmail.com';	// SMTP username
								$mail->Password   = 'nsrvkykftpuuwiek';        		// SMTP password
								// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;	// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
								$mail->Port       = 587;							// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

								//Recipients
								$mail->setFrom('pure.charity.ind@gmail.com', 'Verifikasi Email');
								$mail->addAddress($email, $namalengkap);     		// Add a recipient
						
								// Content
								$mail->isHTML(true);                              	// Set email format to HTML
								$mail->Subject = 'Verifikasi Email';
								$mail->Body    = "<h1>Verifikasi E-Mail Anda</h1>
												<p>Klik tombol untuk verifikasi.</p><p><a href='".$url."' style='background-color: #4CAF50;border: none;color: white;padding: 15px 32px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Verifikasi</a></p>";
								$mail->Send();
												
								if($mail->send())
								{
									echo 'Konfirmasi pembayaran telah berhasil';
								}
								else{
									echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
								}
								exit;
								$query=mysqli_query($con,"INSERT INTO `tbanggota`(`idAnggota`, `tanggal`, `nama`, `asal`, `nope`, `alamatEmail`, `kataSandi`, `status`,`verif`,`verifakun`,`idTemp`) VALUES (Null,'".date('Y-m-d')."','".$namalengkap."',NULL,'".$nope."','".$email."','".sha1($hashedSalt.$password)."','','','N','".md5($email)."')");

								// $IdAnggota=mysqli_fetch_array(mysqli_query($con,"select idAnggota from tbanggota WHERE nope='$nope'"));
								// $queryToVerify = mysqli_query($con, "INSERT INTO  `tbverifikasi` (`idAnggota`) VALUES ('".$IdAnggota[0]."')");
								// Kirim email
								

								if($query){
									echo "<div class='alert alert-success'>
									<button class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
									</button>
									<b>Terimakasih !</b>, Anda sudah berhasil mendaftar, cek email untuk melakukan verifikasi.Jika tidak ada, periksa <b>spam</b>
									</div>";
								}else{
									echo "<div class='alert alert-danger'>
									<button class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
									</button>
									<b>Mohon Maaf !</b>, Anda gagal mendaftar, silahkan coba lagi.
									</div>";
								}
									
							}

						}
					} elseif(!preg_match("/^[a-zA-Z ]*$/",$namalengkap)){
						echo "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>
						<i class='ace-icon fa fa-times'></i>
						</button>
						Nama Hanya Boleh Huruf !
						</div>";
					}elseif(!is_numeric($nope)== TRUE){
						echo "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>
						<i class='ace-icon fa fa-times'></i>
						</button>
						Masukkan Nomor Handphone Dengan Benar !
						</div>";
					}else {
						echo "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>
						<i class='ace-icon fa fa-times'></i>
						</button>
						Kode Captcha Salah !
						</div>";
					}
				}
			?>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nama Lengkap</span>
						<input class="input100" type="text" name="namalengkap" placeholder="Masukkan Nama Lengkap">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Telepon/ Handphone</span>
						<input class="input100" type="text" name="nope" placeholder="Nomor Handphone">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email Valid">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Masukkan Password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Konfirmasi Password</span>
						<input class="input100" type="password" name="kpass" placeholder="Konfirmasi Password">
						<span class="focus-input100"></span>
					</div>

					<div><img src="captcha.php?date=<?php echo date('YmdHis');?>" alt="Captcha" style="width: 200px;height: 50px;margin-bottom: 10px;"></div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Captcha</span>
						<input class="input100" type="text" name="pin" placeholder="Masukkan Captcha">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="simpan" class="login100-form-btn">
							Daftar
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