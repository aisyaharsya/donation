<?php include"header.php"; 
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
?>
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>Verifikasi Akun</h4><hr>
                          <div class="row">
                <?php
                  if(isset($_POST['simpan']))
                  {
                    date_default_timezone_set('Asia/Jakarta');
                    $idVerif=mysqli_fetch_row(mysqli_query($con,"select max(idVerifikasi) as idVerifikasi from tbverifikasi"));
                    $idVerifSekarang=$idVerif[0]+1;

                    if(!empty($_FILES['ktp']['tmp_name']) and !empty($_FILES['selfie']['tmp_name']))
                      {
                        $ext1=strtolower(substr($_FILES['ktp']['name'],-3));
                        if($ext1=='gif')
                        {
                            $ext1=".gif";
                        }
                        elseif ($ext1=='jpg') 
                        {
                            $ext1=".jpg";
                        }
                        elseif ($ext1=='jpeg') 
                        {
                            $ext1=".jpeg";
                        }
                        elseif($ext1=='png')
                        {
                            $ext1=".png";
                        }
                        else
                        {
                            $ext1="-";
                        }

                        $ext2=strtolower(substr($_FILES['selfie']['name'],-3));
                        if($ext2=='gif')
                        {
                            $ext2=".gif";
                        }
                        elseif ($ext2=='jpg') 
                        {
                            $ext2=".jpg";
                        }
                        elseif ($ext2=='jpeg') 
                        {
                            $ext2=".jpeg";
                        }
                        elseif($ext2=='png')
                        {
                            $ext2=".png";
                        }
                        else
                        {
                            $ext2="-";
                        }

                        if ($ext1=='-' or $ext2=='-' ) {

                          echo "<div class='alert alert-danger'>
                          <button class='close' data-dismiss='alert'>
                          <i class='ace-icon fa fa-times'></i>
                          </button>
                          <b>Gagal </b>  Pastikan hanya memasukkan format file .gif/.jpg/.jpeg/.png
                          </div>";

                        }
                        else if( !is_numeric($_POST['nomorktp']) || strlen($_POST['nomorktp']) < 16 ){

                          echo "<div class='alert alert-danger'>
                          <button class='close' data-dismiss='alert'>
                          <i class='ace-icon fa fa-times'></i>
                          </button>
                          <b>Gagal </b> Pastikan memasukkan angka dan periksa jumlah digit KTP (16 Digit)
                          </div>";
                          
                        }
                        else{
                           move_uploaded_file($_FILES['ktp']['tmp_name'],"../images/berkas/ktp/".basename(($idVerifSekarang).$ext1));
                           move_uploaded_file($_FILES['selfie']['tmp_name'],"../images/berkas/selfie/".basename(($idVerifSekarang).$ext2));

                           $query=mysqli_query($con,"insert into tbverifikasi values(Null,".$data[0].",'".$nomorktp."','".$idVerifSekarang.$ext1."','".$idVerifSekarang.$ext2."','P')");

                            if($query){
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses </b> Data anda akan diproses untuk kami verifikasi. Pemberitahuan verifikasi akun akan dikirim pada email selambat lambatnya 1x24 jam proses kerja
                                </div>";
                            }else{
                                echo "<div class='alert alert-danger'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Gagal </b> Terjadi kesalahan, silahkan coba kembali. 
                                </div>";
                            }
                        }

                      } 
                  }
                ?>

                <?php  
                  $query=mysqli_query($con,"select * from tbverifikasi where idAnggota=".$data[0]."");
                  $cekverif=mysqli_num_rows($query);
                  if($cekverif > 0){
                    $dataverif=mysqli_fetch_row($query);
                    if ($dataverif[5]=="P") {
                      $ket="pending <a href='$link[1]member/member'>Kembali ke halaman utama</a>";
                    }elseif ($dataverif[5]=="Y") {
                      $ket="diterima <a href='$link[1]member/member'>SILAKAN MELANJUTKAN</a> ";
                    }elseif($dataverif[5]=="N"){
                      $ket="ditolak <a href='$link[1]member/member'>Kembali ke halaman utama</a>";
                    }
                  }

                  if ($cekverif > 0) {
                ?>

                <div class="alert alert-info" role="alert">
                    Anda telah melakukan verifikasi dan status verifikasi saat ini <b><?php echo $ket; ?></b>
                  </div>

              <?php }else{ ?>
                  <div class="col-md-6">
                  <div class="alert alert-info" role="alert">
                    Berkas yang sudah di kirim tidak dapat diubah.
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="fotoid">Foto Identitas (KTP)*</label>
                      <input type="file" name="ktp" id="fotoid" class="form-control" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                    </div>

                    <div class="form-group">
                      <label for="fotoid">Nomor KTP*</label>
                      <input type="text" name="nomorktp"  class="form-control"  required>
                    </div>

                    <div class="form-group">
                      <label for="fotoid">Foto Selfie Dengan Identitas (KTP)*</label>
                      <input type="file" name="selfie" id="fotoid" class="form-control" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                    </div>

                    <div>
                      <small>
                        <p>*) wajib diisi</p>
                      </small>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="simpan" value="Kirim" class="btn btn-primary">
                    </div>
                  </form>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Foto Identitas (KTP)*</label>
                    <img src="../images/ktp.png" alt="" style="width: 100%;">
                  </div>

                  <div class="form-group">
                    <label for="">Foto Selfie Dengan KTP*</label>
                    <img src="../images/selfie.png" alt="" style="width: 100%;">
                  </div>
                </div>
              <?php } ?>
      </div>
        </div>
        </div>



</div>


</div>
</div>
</section>

<?php include"footer.php"; ?>

