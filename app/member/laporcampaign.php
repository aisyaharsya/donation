<?php include"header.php"; 
$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
?>


        <section id="pro-sec1">
        <div class="container">
            <div class="row">
                <?php  
                $data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['campaign']."'")); ?>
                    <div class="col-sm-12 col-md-8 clearfix top-off" style="padding: 20px;margin-bottom: 20px;">
                      <h4>Laporkan Campaign</h4>
                      <hr>

                      <?php  
                        date_default_timezone_set('Asia/Jakarta');
                       
                        if (isset($_POST['simpan'])) {
                          $query=mysqli_query($con,"INSERT INTO tblaporangalangdana VALUES(NULL,".$data[0].",'".date('Y-m-d h:i:s')."','".$judul."','".$isi."','P')");
                            if($query){
                                echo "<div class='alert alert-success'>
                                  <button class='close' data-dismiss='alert'>
                                  <i class='ace-icon fa fa-times'></i>
                                  </button>
                                  <b>Sukses </b> Terimakasih telah memberi laporan terhadap campaign ini, laporan anda akan kami proses. 
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

                      <form action="" method="post">

                         <div class="form-group">
                          <label for="">Judul*</label>
                          <input type="text" class="form-control" name="judul" placeholder="Judul Laporan" required>
                        </div>

                        <div class="form-group">
                          <label for="">Isi Laporan*</label>
                          <textarea name="isi" class="form-control"  placeholder="Isi Laporan" id="editor1" required></textarea>
                        </div>

                        <button type="submit" name="simpan" id="btnSubmit" class="btn btn-primary">Laporkan Campaign Ini</button>

    
                      </form>

                    </div>
                    <div class="col-sm-12 col-md-4 clearfix top-off">
                        <div class="post-content" style="padding: 10px;margin-bottom: 20px;">
                        <?php 
                        if ($data[9]=="P"){ 
                          $ket="pending";
                        }elseif($data[9]=="Y"){
                          $ket="tayang";
                        }elseif ($data[9]=="N") {
                          $ket="tolak";
                        }
                        ?>
                          <img src="../images/banner/<?php echo $data[6] ?>" style="width: 100%;">
                          <h3 class="text-info" style="margin-bottom: 20px;"><?php echo $data[2] ?></h3>
                          <div class="row">
                            <div class="col-md-2">
                              <img src="../images/icon/user.png" alt="" width="30">    
                            </div>
                            <div class="col-md-10" style="padding-left:0px;">
                              <span class="text-info"><h4 style="margin: 0px;"><?php echo $data[11] ?></h4></span>
                              <small><i>Akun Terverifikasi</i></small>
                              
                            </div>

                            <div class="col-md-12">
                              <p>
                                <?php  
                                date_default_timezone_set('Asia/Jakarta');
                                  $tgl1 = new DateTime(date('Y-m-d'));
                                  $tgl2 = new DateTime($data[8]);
                                  $selisih= $tgl2->diff($tgl1)->days + 1;

                                  if ($data[8]<date('Y-m-d')) {
                                    $selisih=0;
                                  }
                                  
                                  if($data[10]=="Y"){
                                        $ketJumlahHari="Unlimited";
                                    }else{
                                        $ketJumlahHari=$selisih." Hari lagi";
                                    }
                                                                    ?>
                                <h4 style="margin-bottom: 0px;margin-top: 20px;"><b>Rp. <?php echo number_format(0,2,',','.'); ?></b></h4>
                                <small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                                <small><i><?php echo $ketJumlahHari ?></i></small>
                              </p> 

                            </div>
                            
                          </div>
                          
                       </div>
                   </div>
           </div>
       </div>
   </section>

<?php include"footer.php"; ?>

