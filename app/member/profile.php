<?php include"header.php"; ?>
<section id="about-sec" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <?php include"menu.php"; ?>

            <div class="col-sm-9 col-md-9 clearfix top-off">
              <div class="card" style="border:1px solid #ccc;padding: 30px; border-radius: 10px;">
                  <div class="card-header">
                    <h3 style="text-align: center;">PROFILE</h3><hr>
                </div>
                <?php $data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'")); ?>
                <div class="card-body">
                    <div class="row">
                     <!--Proses-->
                     <?php  
                     if(isset($_POST['simpan']))
                     {
                        $query=mysqli_query($con,"update tbanggota set nama='$namalengkap', asal='$asal',nope='$nope',alamatEmail='$email' where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'");
                        if($query)
                        {
                            echo "<div class='col-md-12'><div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Sukses </b> Data anda berhasil diubah. 
                            </div><div class='col-md-12'>";
                        }
                        else
                        {
                            echo "<div class='col-md-12'><div class='alert alert-danger'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Gagal </b> Data anda gagal diubah. 
                            </div><div class='col-md-12'>";
                        }
                    }
                    ?>

                    <?php 
                        if ($data[9]=="N"){  ?>
                           <div class="alert alert-info" role="alert">
                            Verifikasi akun anda <a href="verifikasi"><b>di sini.</b></a>
                          </div>
                        <?php }elseif($data[9]=="Y"){ ?>
                            <div class="alert alert-info" role="alert">
                                Akun anda sudah verifikasi.
                          </div>
                        <?php } ?>
                    <!--Proses-->
                    <form action="" method="post">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="namalengkap" value="<?php echo $data[2] ?>" size="40" class="form-control"  placeholder="Nama Lengkap*" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $data[3] ?>" size="40" class="form-control" placeholder="Asal*" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Asal</label>
                                <input type="text" name="asal" value="<?php echo $data[4] ?>" size="40" class="form-control" placeholder="Asal*" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telp/Hp</label>
                                <input type="text" name="nope" value="<?php echo $data[5] ?>" size="40" class="form-control" placeholder="Nomor Telp/Hp Yang Bisa Dihubungi*" required>
                            </div>
                            <div class="form-group">
                             <label>E-Mail</label>
                             <input type="email" name="email" value="<?php echo $data[6] ?>" size="40" class="form-control"  placeholder="E-Mail*" required>
                         </div>
                        <div class="form-group submit-button">
                            <input type="submit" name="simpan" value="Ubah Profile" class="btn2" id="sub" style="border:none; margin: 20px 0 0 0">
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</section>

<?php include"footer.php"; ?>

