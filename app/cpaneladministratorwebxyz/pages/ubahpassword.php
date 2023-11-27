<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">UBAH PROFIL ADMIN</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             Silahkan Ubah Profil Anda
         </div>
         <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <!--Proses-->
                    <?php
                    if(isset($_POST['simpan']))
                    { 

                        $query=mysqli_query($con,"update tbadmin set kataSandi='".md5($password)."' where namaPengguna='$username'");

                        echo"
                            <script>
                            location.assign('logout.php');
                            </script>";
                    }

                  /*pesan berhasil update*/
                if(isset($_GET['saya']))
                $data=mysqli_fetch_row(mysqli_query($con,"select * from tbadmin where namaPengguna='".$_GET['saya']."'"));
                ?>

                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama" type="text" value="<?php echo $data[1]; ?>" placeholder="Nama Lengkap" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" type="text" value="<?php echo $data[3]; ?>" placeholder="Nama Lengkap" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input class="form-control" name="nope" type="text" value="<?php echo $data[4]; ?>" placeholder="Nama Lengkap" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" value="<?php echo isset($_GET['saya'])?$_GET['saya']:''; ?>" placeholder="Username" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input class="form-control" name="u_password" id="u_password" type="password" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" name="simpan" id="btnSubmit" class="btn btn-info">Simpan Perubahan</button>
                    <button type="reset" class="btn btn-warning">Batal</button>
                </form>
            </div>
            <!-- /.col-lg-12 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
</div>

    <!-- /.row -->
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password").onchange = validatePassword;
            document.getElementById("u_password").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("password").value;
            var pass1=document.getElementById("u_password").value;
            if(pass1!=pass2)
                document.getElementById("u_password").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
            else
                document.getElementById("u_password").setCustomValidity('');
        }
    </script>