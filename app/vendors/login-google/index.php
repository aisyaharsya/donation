<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login
	header('location: welcome.php'); // Kita Redirect ke halaman welcome.php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login via Google Account</title>

    <!-- Load File CSS Bootstrap  -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading{
        margin-bottom: 10px;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    </style>
</head>
<body>
	<div class="container">
        <div class="form-signin">
            <div class="panel panel-default">
				<div class="panel-body">
					<h2 class="form-signin-heading" style="margin-top: 0;">Silahkan login</h2>

					<?php
					// Cek apakah terdapat cookie dengan nama message
					if(isset($_COOKIE["message"])){ // Jika ada
						?>
						<div class="alert alert-danger">
							<?php
							// Tampilkan pesannya
							echo $_COOKIE["message"];
							?>
						</div>
						<?php
					}
					?>

					<form method="post" action="login.php">
						<div class="form-group">
					        <label>Username</label>
					        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
					    </div>
					    <div class="form-group">
					        <label>Password</label>
					        <input type="password" class="form-control" name="password" placeholder="Password" required>
					    </div>
					    <button type="submit" class="btn btn-lg btn-success btn-block">LOGIN</button>
						<div class="text-center" style="margin-top: 10px;margin-bottom: 10px;">
							atau login dengan
						</div>
						<div class="text-center">
							<a href="google.php" class="btn btn-danger"><i class="fa fa-google"></i> &nbsp;GOOGLE</a>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</body>
</html>
