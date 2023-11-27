<?php 
    // mengaktifkan session
session_start();
extract($_POST);
include"../application/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Silahkan Masuk || Master Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/master-sedenasto.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <?php 
                    

                    ?>
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <!--Proses-->
                        <?php  
                        if(isset($_POST['masuk']))
                        {

                            $data=mysqli_query($con,"select * from tbadmin where namaPengguna='$username' and kataSandi='".md5($password)."'");

                            // menghitung jumlah data yang ditemukan
                            $cek = mysqli_num_rows($data);
                            $cekstatus=mysqli_fetch_row($data);

                            if($cek > 0){
                                $_SESSION['username'] = $username;
                                $_SESSION['status'] = "login";

                                if ($cekstatus[6]=="A") {
                                     echo"<script> location.replace('index.php?page=home'); </script>";
                                }else{
                                    echo"<script> location.replace('kasir/index.php?page=home'); </script>";
                                }
                               
                            }else{
                               echo"<script> location.replace('login.php?pesan=gagal'); </script>";
                           }
                       }
                       if(isset($_GET['pesan'])=='gagal')
                       {
                        echo "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                        </button>
                        <b>Gagal Login !</b>, 
                        </div>";
                        }else if(isset($_GET['pesan1'])=='success')
                        {
                            echo "<div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Sukses</b> Password Berhasil Diubah, silahkan login 
                            </div>";
                        }
                    ?>
                    <!--End Proses-->
                    <form role="form" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="masuk" class="btn btn-lg btn-success btn-block">Masuk</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/master-sedenasto.js"></script>

</body>

</html>
