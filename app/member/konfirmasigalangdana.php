<?php include"header.php"; 
$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
?>
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>konfirmasi Donasi</h4><hr>
                 <!--Proses-->
                       <?php  
                       $kodeunik="";
                       $idbayar="";
                       $namacampaign="";
                       $total="";
                       $bank="";
                       if(isset($_GET['unik']))
                       {

                            $data =mysqli_fetch_array(mysqli_query($con,"select bgd.*,gd.*,a.*,r.*,gd.jumlah as jumlahGoal,a.nama as namaAnggota,bgd.jumlah as jumlahtf,bgd.tanggalBerakhir as tanggalAkhirTransfer from tbberdonasigalangdana as bgd inner join tbgalangdana as gd on(gd.idGalangDana=bgd.idGalangDana) inner join tbanggota as a on(a.idAnggota=gd.idAnggota) inner join tbrekening as r on(r.idRekening=bgd.idRekening) where bgd.kodeUnik='".$_GET['unik']."' and bgd.idAnggota=".$dataakun[0]." and bgd.status='P'"));
                            if($data > 1){
                              $kodeunik=$_GET['unik'];
                              $idbayar=$data['idBerdonasiGalangDana'];
                              $namacampaign=$data['judul'];
                              $total=$data['jumlahtf'];
                              $bank=$data['bank'];
                            }else{
                              $kodeunik="Kode Unik Tidak Ditemukan";
                              $idbayar="";
                              $namacampaign="";
                              $total="";
                              $bank="";
                            }
                        }


                        if (isset($_GET['simpan'])) {
                            $query=mysqli_query($con,"UPDATE tbberdonasigalangdana SET status='K' where idBerdonasiGalangDana=".$_GET['tempkey']."");
                            if($query){
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses </b> Terimakasih telah melakukan donasi, semoga bermanfaat bagi yang membutuhkan
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
                    ?>
              <form action="" method="get" enctype="multipart/form-data">
                <div class="input-group">
                            <input type="text" name="unik" class="form-control" placeholder="Masukkan Kode Unik" value="<?php echo $kodeunik; ?>" required>
                            <div class="input-group-btn">
                              <button type="submit" name="cari" class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                          <div class="form-group" style="margin-top: 10px;">
                            <label for="">Nama Campaign</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Campaign" value="<?php echo $namacampaign; ?>" readonly required>
                            <input type="hidden" class="form-control" name="tempkey" placeholder="ID" value="<?php echo $idbayar; ?>" readonly required>
                          </div>

                           <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" class="form-control" name="total" placeholder="Total" value="<?php echo 'Rp.'.$total ?>" readonly required>
                          </div>

                          <div class="form-group">
                            <label for="">Transfer Ke</label>
                            <input type="text" class="form-control" name="tf" placeholder="Transfer Ke" value="<?php echo $bank; ?>" readonly required>
                          </div>

                <div class="form-group submit-button">
                    <input type="submit" name="simpan" value="Konfirmasi Pembayaran" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>
<?php include"footer.php"; ?>

