<?php
session_start();
extract($_POST);
include"application/koneksi.php";
// include "vendors/classes/class.phpmailer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/sendEmail/vendor/autoload.php';

// $mail = new PHPMailer; 
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lupa Sandi</title>
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
						LUPA KATA SANDI
					</span>
				</div>
                <?php 
                if(isset($_POST['simpan']))
                    {                                  
                    	$data=mysqli_query($con,"select * from tbanggota where alamatEmail='".$email."'");
                    
                    	$cek = mysqli_num_rows($data);
                    	$dataakun =mysqli_fetch_array($data);
                    
                    	if($cek > 0){
                    		

                    		$url=$link[1]."resetpassword?href=".$dataakun[10];

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
							$mail->addAddress($email);     		// Add a recipient
					
							// Content
							$mail->isHTML(true);                              	// Set email format to HTML
							$mail->Subject = 'Lupa Sandi';
							$mail->Body    = "<h1>Permintaan Reset Password</h1>
												<p>Klik tombol untuk reset password anda.</p><p><a href='".$url."' style='background-color: #4CAF50;border: none;color: white;padding: 15px 32px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Verifikasi</a></p>";

							// if($mail->send())
							// {
							// 	echo 'Konfirmasi pembayaran telah berhasil';
							// }
							// else{
							// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
							// }




							// Konfigurasi SMTP
							
							// $mail->IsSMTP();
                            // $mail->SMTPSecure = 'ssl'; 
                            // $mail->Host = "mail.aguspramono.com"; //host masing2 provider email
                            // $mail->SMTPDebug = 2;
                            // $mail->Port = 465;
                            // $mail->SMTPAuth = true;
                            // $mail->Username = "support@aguspramono.com"; //user email
                            // $mail->Password = "AgusPramono3545"; //password email 
                            // $mail->SetFrom("support@aguspramono.com","Sedekah"); //set email pengirim
                            // $mail->Subject = "Lupa Sandi"; //subyek email
                            // $mail->AddAddress($email,);  //tujuan email

							// Mengatur format email ke HTML
							//  $mail->MsgHTML("<h1>Permintaan Reset Password</h1>
							//     <p>Klik tombol untuk reset password anda.</p><p><a href='".$url."' style='background-color: #4CAF50;border: none;color: white;padding: 15px 32px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Verifikasi</a></p>");
							// Kirim email
							if(!$mail->Send()){
								    echo "<div class='alert alert-danger'>
			                    	<button class='close' data-dismiss='alert'>
			                    	<i class='ace-icon fa fa-times'></i>
			                    	</button>
			                    	<b>Gagal!</b>, Terjadi kesalahan,coba kembali
			                    	</div>";
								}else{
								    echo "<div class='alert alert-success'>
									<button class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
									</button>
									Link reset password telah dikirim ke email.
									</div>";
								}


                    	}else{
                    		echo "<div class='alert alert-danger'>
	                    	<button class='close' data-dismiss='alert'>
	                    	<i class='ace-icon fa fa-times'></i>
	                    	</button>
	                    	<b>Gagal!</b>, Email tidak ditemukan
	                    	</div>";
                    	}                                 
                    }
                ?>
				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Masukkan E-Mail Terdaftar</span>
						<input class="input100" type="email" name="email" placeholder="E-Mail Terdaftar">
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