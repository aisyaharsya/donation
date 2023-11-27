<?php include"header.php"; ?>
<section id="about-sec" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <?php include"menu.php"; ?>

            <div class="col-sm-9 col-md-9 clearfix top-off">
              <div class="card" style="border:1px solid #ccc;padding: 30px; border-radius: 10px;">
                  <div class="card-header">
                    <h3 style="margin: 0;">UBAH KATA SANDI</h3><hr style="margin-left: 0px;">
                </div>
                <div class="card-body">
                    <div class="row">
                     <!--Proses-->
                     <?php  
                     if(isset($_POST['simpan']))
					 {
						if($_SESSION['captchalogin'] == $pin2)
                        {   
                            $query=mysqli_query($con,"select kataSandi from tbanggota where kataSandi='".md5($password)."'");
                            $cek=mysqli_num_rows($query);
                            if($cek>0)
                            {
                               echo "<div class='col-md-12'><div class='alert alert-danger'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Gagal </b> Password yang anda masukkan sama dengan password lama, silahkan masukkan password yang berbeda ! 
                                        </div></div>"; 
                            }else
                            {
                              $query=mysqli_query($con,"update tbanggota set kataSandi='".md5($password)."' where username='".$_SESSION['username']."'");
                                if($query)
                                {
                                    echo "<div class='col-md-12'><div class='alert alert-success'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Sukses </b> Kata Sandi anda berhasil diubah. 
                                    </div></div>";
                                }else
							    {
                                    echo "<div class='col-md-12'><div class='alert alert-danger'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Gagal </b> Kata Sandi anda gagal diubah. 
                                        </div></div>";
                                }  
                            }
                       }else
                       {
                        echo "<div class='col-md-12'><div class='alert alert-danger'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Gagal </b> Captcha Salah. 
                            </div></div>";
                       }
                    }
                    ?>
                    <!--Proses-->
                    <form action="" method="post">
                        <?php 
                        $query=mysqli_query($con,"select * from tbanggota where username='".$_SESSION['username']."'");
                        while($data=mysqli_fetch_row($query))
                        {
                            ?>
                            <div class="form-group">
                                <div class='alert alert-success'>
                                    <b>Hai Orang Baik</b>, Selalu ingat kata sandi anda ya.
                                </div>
                                <label>Password Baru</label>
                                <input type="password" name="password" value="" class="form-control"  placeholder="Masukkan Kata Sandi Baru" required>
                            </div>
							 <div class="form-group" style="text-align: left;">
                                <img src="captcha2.php?date=<?php echo date('YmdHis');?>" alt="Captcha" style="width: 200px;height: 50px; margin-top: 10px;margin-bottom: 10px;"> 
								<input type="text" name="pin2" class="form-control" value="" placeholder="Masukkan Captcha" required>
                            </div>
                        <div class="form-group submit-button">
                            <input type="submit" name="simpan" value="Ubah Kata Sandi" class="btn2" id="sub" style="border:none; margin: 20px 0 0 0">
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</section>

<?php include"footer.php"; ?>

