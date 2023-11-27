<?php 
include"header.php";
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($data[8]=="N") {
  header("Location: galangdana");
  exit(); 
}
date_default_timezone_set('Asia/Jakarta');

$data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['href']."'")); 
$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));
$persentase=round((floatval($jumlahTerkumpul[0])/floatval($data[5]))*100);
if($persentase>100){
    $persentase=100;
}else{
    $persentase=$persentase;
}


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

<!--================Event Details Area =================-->
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">
      <div class="row event_text_inner">

        <div class="col-lg-8">
          <div class="right_text">
            <?php  
            if(isset($_GET['hrefid']))
            {
              $query=mysqli_query($con,"delete from tbberitagalangdana where idBeritaGalangDana='".$_GET['hrefid']."'");
              if($query){
                echo "<div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>
                <i class='ace-icon fa fa-times'></i>
                </button>
                <b>Sukses </b> Berita telah dihapus. 
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

            if(isset($_GET['penarikan'])){
                $query=mysqli_query($con,"UPDATE tbpenarikangalangdana SET status='B' where idpenarikangalangdana=".$_GET['penarikan']."");
                if($query){
                  echo "<div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>
                  <i class='ace-icon fa fa-times'></i>
                  </button>
                  <b>Sukses </b> Penarikan dana berhasil dibatalkan. 
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
            <img class="img-fluid" src="../images/banner/<?php echo $data[6] ?>" alt="" style="width: 100%;">


            <div class="row" id="donasimobile">
              <div class="col-md-12 mt-2">
                <?php 
              if ($data[9]=="P"){ 
                $ket="pending";
              }elseif($data[9]=="Y"){
                $ket="tayang";
              }elseif ($data[9]=="N") {
                $ket="tolak";
              }
              ?>
              <div class="alert alert-info" role="alert">
                Status campaign anda <b><?php echo $ket; ?></b>
              </div>

                <h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
                <small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i> | <b><?php echo $data[10] ?> <i class="fa fa-check-circle-o text-success"></i></b></small>


                <ul class="list" style="margin-bottom: 10px;">
                  <li><a href="#"><h4 style="margin: 0px;padding: 0px;">Rp.<?php echo number_format($jumlahTerkumpul[0],2,',','.'); ?></h4><small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small></li>
                    <li><a href="#"><div class="progress" style="margin-bottom: 5px;height: 30px;">
                      <div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>; padding-left: 5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
                    </div><small><i class="fa fa-clock-o"></i> <?php echo $ketJumlahHari; ?> </small><hr></li>
                    <li><a href="editgalangdana?href=<?php echo $data[3]; ?>" class="btn btn-block btn-primary">Edit</a>
                     <?php 
                     if ($data[9]=="Y"){  ?>
                      <a href="buatberitagalangdana?href=<?php echo $data[3]; ?>" class="btn btn-block btn-warning">Buat Berita</a>
                    <?php } ?>

                    <?php if ($selisih==0){ ?>
                     <a href="" onclick="return alert('Silahkan hubungi kami')" class="btn btn-block btn-success">Tarik Dana Campaign</a> 
                   <?php } ?>

                   <a href="<?php echo $link[1] ?>member/member" class="btn btn-block btn-danger">Kembali</a> </li>
                 </ul>

               </div>
             </div>


             <div class="tab">
              <button class="tablinks active" onclick="openCity(event, 'Deskripsi')">Cerita</button>
              <button class="tablinks" onclick="openCity(event, 'Kabar')">Kabar</button>
              <button class="tablinks" onclick="openCity(event, 'Dermawan')">Sahabat Dermawan</button>
              <button class="tablinks" onclick="openCity(event, 'Dana')">Data Penarikan Dana</button>
            </div>

            <div id="Deskripsi" class="tabcontent" style="display: block;">
              <p>
                <?php echo $data[4]; ?>
              </p>
              <hr>
              <!-- <p class="text-center"><b>Disclaimer :</b> Informasi dan opini yang tertulis di halaman penggalangan ini adalah milik penggalang dana dan tidak mewakili sedenasto</p> -->
            </div>

            <div id="Kabar" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12" style="overflow: scroll;height:200px;max-height: 500px;">
                    <?php 
                    $eksekusi=mysqli_query($con,"select * from tbberitagalangdana where idGalangDana=".$data[0]." order by idBeritaGalangDana desc");
                    $no=1;
                    while ($databerita=mysqli_fetch_array($eksekusi)) {
                      ?>

                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <b class="panel-title">
                              <a data-toggle="collapse" href="#collapse<?php echo $databerita['idBeritaGalangDana'] ?>" class="text-info"><?php echo $no++.". ".$databerita['judul'] ?></a> </b>
                              <br>
                              <?php 
                                if($databerita['judul']!="Penarikan Dana"){ ?>
                                    <small style="margin-left: 18px;"><i><?php echo date('d M Y',strtotime($databerita['tanggal'])) ?></i><br><a href="editberitagalangdana?href=<?php echo $data[3]; ?>" class="btn btn-primary btn-xs text-white" style="margin-left: 18px;" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="detailgalangdana?hrefid=<?php echo $databerita['idBeritaGalangDana']; ?>&href=<?php echo $data[3]; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus?')" title="Hapus"><i class="fa fa-trash"></i></a></small>
                              <?php   
                                }
                              ?>
                              </div>
                              <div id="collapse<?php echo $databerita['idBeritaGalangDana'] ?>" class="panel-collapse collapse" style="padding: 10px;">
                                <p>
                                  <?php echo $databerita['isi']; ?>
                                </p>
                              </div>
                            </div>
                          </div>

                        <?php } ?>

                      </div>
                    </div>
                  </div> 
                </div>

                <div id="Dermawan" class="tabcontent">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12" style="overflow: scroll;max-height: 500px;">
                     <ul class="list-group" style="margin-top: 10px;margin-bottom: 10px;">
                      <?php 
                      $eksekusi=mysqli_query($con,"select * from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y' order by  idBerdonasiGalangDana desc");
                      $no=1;
                      while ($datagalang=mysqli_fetch_array($eksekusi)) {
                        ?>
                        <li class="list-group-item" style="margin-top: 5px;"><span class="float-left"><?php echo $datagalang['anonim'] ?><br><small><?php echo date('d M Y',strtotime($datagalang['tanggal'])) ?> | <i><b><?php if($datagalang['dukungan']==""){echo"-";}else{echo $datagalang['dukungan'];}  ?></b></i></small></span><span class="float-right"><strong> Rp. <?php echo number_format($datagalang['jumlah'],2,',','.'); ?></strong></span></li>
                      <?php } ?>
                    </ul> 
                  </div>
                </div>
              </div>
            </div>


            <div id="Dana" class="tabcontent">
                 <div class="row">
                  <div class="col-md-12">

                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="myTable"> 
                     <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah</th>
                        <!--<th scope="col">Deskripsi</th>-->
                        <th scope="col">Rekening</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                     $eksekusi=mysqli_query($con,"SELECT * FROM `tbpenarikangalangdana` as pgd inner join tbrekeningmember as rm on(rm.idRekeningMember=pgd.idRekeningMember) WHERE pgd.idGalangDana=".$data[0]." order by pgd.idpenarikangalangdana");
                     $no=1;
                     while ($datapenarikan=mysqli_fetch_array($eksekusi)) {
                      ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($datapenarikan[5]));?></td>
                        <td><?php echo number_format($datapenarikan[4],2,',','.'); ?></td>
                        <td><?php echo $datapenarikan[12]." (".$datapenarikan[10].")"; ?></td>
                        <td><?php echo $datapenarikan[7]; ?></td>
                        <!--<td><?php echo $selisih; ?></td>-->
                        <?php if ($datapenarikan[6]=="P"){ ?>
                          <td><span class="badge badge-info">Pending</span></td>
                        <?php }elseif ($datapenarikan[6]=="N") { ?>
                          <td><span class="badge badge-danger">Tolak</span></td>
                        <?php }elseif ($datapenarikan[6]=="Y") { ?>
                          <td><span class="badge badge-success">Selesai</span></td>
                        <?php }elseif ($datapenarikan[6]=="B") { ?>
                          <td><span class="badge badge-danger">Batal</span></td>
                        <?php } ?>
                        <td>
                          <?php if ($datapenarikan[6]=="P"){ ?>
                              <a href="detailgalangdana?href=<?php echo $_GET['href']; ?>&penarikan=<?php echo $datapenarikan[0]; ?>" class="btn btn-warning" onclick="return confirm('Yakin ingin membatalkan penarikan dana?')">Batalkan</a></td>
                          <?php }else{ ?>
                            -
                          <?php } ?>
                          
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>


                </div>
              </div>
            </div>






          </div>
        </div>

        <div class="col-lg-4" id="donasidesktop">
          <div class="left_text" style="position: -webkit-sticky;position: sticky;top: 120px;">
             <?php 
              if ($data[9]=="P"){ 
                $ket="pending";
              }elseif($data[9]=="Y"){
                $ket="tayang";
              }elseif ($data[9]=="N") {
                $ket="tolak";
              }
              ?>
              <div class="alert alert-info" role="alert">
                Status campaign anda <b><?php echo $ket; ?></b>
              </div>
            <h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
            <small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i></small>
            <div class="row" style="margin-top: 20px; margin-bottom: 20px;">

              <div class="col-md-2">
                <img src="../images/icon/user.png" alt="" width="40">    
              </div>
              <div class="col-md-10" style="padding-left:0px;">
                <span class="text-info"><h5 style="margin: 0px;"><?php echo $data[11] ?></h5></span>
                <small><i>Akun Terverifikasi</i></small>

              </div>
            </div>




            <ul class="list">
              <li><a href="#"><h4 style="margin: 0px;padding: 0px;">Rp.<?php echo number_format($jumlahTerkumpul[0],2,',','.'); ?></h4><small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small></li>
                <li><a href="#"><div class="progress" style="margin-bottom: 5px;height: 30px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>; padding-left: 5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
                </div><small><i class="fa fa-clock-o"></i><?php echo $ketJumlahHari; ?></small><hr></li>
                <a href="editgalangdana?href=<?php echo $data[3]; ?>" class="btn btn-block btn-primary">Edit</a>
                <?php 
                if ($data[9]=="Y"){  ?>
                  <a href="buatberitagalangdana?href=<?php echo $data[3]; ?>" class="btn btn-block btn-warning">Buat Berita</a>
                <?php } ?>

                <?php if ($selisih==0){ ?>
                 <a href="tarikdanagalangdana?href=<?php echo $data[3]; ?>" class="btn btn-block btn-success">Tarik Dana Campaign</a> 
               <?php } ?>

               <a href="<?php echo $link[1] ?>member/member" class="btn btn-block btn-danger">Kembali</a> 


             </ul>

             <hr>
             <div class="text-center mt-5">
              <h4>Bantu sebarkan via</h4>
              <div class="row">
                <div class="col-md-6 text-center" style="background-color: #e6e4fd; padding-top: 5px;padding-bottom: 5px;"><a href="https://www.facebook.com/share.php?u=<?php echo $link[1] ?>more?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-facebook"></i></h3></a></div>

                <div class="col-md-6 text-center" style="background-color: #e4fde4; padding-top: 5px;padding-bottom: 5px;"><a href="whatsapp://send?text=<?php echo $link[1] ?>more?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-whatsapp text-success"></i></h3></a></div>

                <div class="col-md-12" style="margin-top: 20px;">
                  <small>Campaign ini mencurigakan?<a href="laporcampaign?campaign=<?php echo $data[3]; ?>"><b> laporkan</b></a></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        

      </div>


    </div>
  </div>
</section>
<!--================End Event Details Area =================-->

<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

<?php include"footer.php"; ?>