<?php 

// session_start();

include"header.php";
if(empty($_SESSION['status']))
{
  echo"<script> location.replace('./masuk'); </script>";
}

$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
$data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['campaign']."'"));
$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));
$persentase=round((floatval($jumlahTerkumpul[0])/floatval($data[5]))*100); 

date_default_timezone_set('Asia/Jakarta');
$tgl1 = new DateTime(date('Y-m-d'));
$tgl2 = new DateTime($data[8]);
$selisih= $tgl2->diff($tgl1)->days + 1;
if ($data[8]<date('Y-m-d')) {
  $selisih=0;
}

if (isset($_POST['simpan'])) {

 $idBerdonasiGalangDana=mysqli_fetch_row(mysqli_query($con,"select max(idBerdonasiGalangDana) as idBerdonasiGalangDana from tbberdonasigalangdana"));
 $idBayar=$idBerdonasiGalangDana[0]+1;
 $idTemp=md5($idBayar.$data[0]);

 $besok = mktime (0,0,0, date("m"), date("d")+1,date("Y"));

 $unik=substr(rand(0,1234567890),0,3);

    $nominal = $jumlah; // jumlah nominal awal
    $sub = substr($nominal,-3);
    $sub2 = substr($nominal,-2);
    $sub3 = substr($nominal,-1);

    $total =  substr(rand(0,1234567890),0,3);
    $total2 =  substr(rand(0,1234567890),0,2);
    $total3 =  substr(rand(0,1234567890),0,1);

    if($sub==0){
      $hasil =  $nominal + $total;
      $no=$total;
    }else if($sub2 == 0){
      $hasil = $nominal + $total2; 
      $no = substr($hasil,-3);
    }else if($sub3 == 0){
      $hasil = $nominal + $total3; 
      $no = substr($hasil,-3);
    }else{
      $no=$sub;
      $hasil=$nominal;
    }

    $namasamar="";
    if (isset($anonim)) {
      $namasamar="Anonim";
    }else{
      $namasamar=$nama;
    }
    $query=mysqli_query($con,"INSERT INTO tbberdonasigalangdana(`idTemp`, `idGalangDana`, `kodeUnik`,`idAnggota`, `nama`, `anonim`, `nope`, `email`, `namaUsaha`, `lokasiUsaha`, `idRekening`, `jumlah`, `tanggal`, `tanggalBerakhir`, `status`,`dukungan`) VALUES('".$idTemp."',".$data[0].",'".$no."',$dataakun[0],'".$nama."','".$namasamar."','".$nope."','".$email."',NULL,NULL,".$bank.",".$hasil.",'".date('Y-m-d h:i:s')."','".date('Y-m-d h:i:s',$besok)."','P','".$dukungan."')");
    if($query){
      echo "
      <script>
      location.assign('pembayaran?bayar=$idTemp');
      </script>
      ";
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

  <!--================Event Details Area =================-->
  <section class="event_details_area pt-2 pb-5">
    <div class="container">
      <div class="event_d_inner">
        <div class="row event_text_inner">

          <div class="col-lg-8">
            <div class="right_text">

              <div class="row text-center border mb-5" id="donasimobile">
                <div class="col-md-12 mt-2">
                  <b>Anda akan berdonasi untuk campaign</b><hr>
                  <h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
                  <small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i> | <b><?php echo $data[11] ?> <i class="fa fa-check-circle-o text-success"></i></b></small>
                </div>
              </div>

              <h4>Silahkan isi data</h4>
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Nama Lengkap*</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $dataakun[2]; ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="">Email*</label>
                  <input type="email"  class="form-control" name="email" placeholder="E-mail" value="<?php echo $dataakun[5]; ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="">Nomor Handphone*</label>
                  <input type="text" class="form-control"  name="nope" placeholder="Nomor Handphone" required>
                </div>


                <div class="form-group">
                  <label for="">Masukkan Nominal*</label>
                  <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="jumlah" id="tempJumlah" placeholder="Min. 10.000" required>
                </div>

                <script>
                  function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                      return false;
                    return true;
                  }
                </script>

                <script type="text/javascript">
                  window.onload = function () {
                    document.getElementById("tempJumlah").onchange = validatePassword;
                  }
                  function validatePassword(){
                    var pass1=document.getElementById("tempJumlah").value;
                    if(pass1<10000)
                      document.getElementById("tempJumlah").setCustomValidity("Jumlah kurang dari 10000");
                    else
                      document.getElementById("tempJumlah").setCustomValidity('');
                  }
                </script>

                <div class="form-group">
                  <label for="">Metode Pembayaran*</label>
                  <select name="bank" id="" class="form-control" required>
                    <option value="">Pilih Metode Pembayaran</option>

                    <?php 
                    $eksekusi=mysqli_query($con,"select * from tbrekening order by idRekening desc");
                    $no=1;
                    while ($databank=mysqli_fetch_array($eksekusi)) {
                      ?>
                      <option value="<?php echo $databank[0]; ?>"><?php echo $databank[1]; ?></option>
                      <?php }?>
                  </select>
                </div>

                <div class="form-group mt-5">
                  <label for="">Tulis Komentar dan Dukungan Anda*</label>
                  <textarea name="dukungan" class="form-control" id="" placeholder="Tulis Dukungan Anda"></textarea>
                </div>

                <div class="form-group">
                  <div class="checkbox">
                    <label><input type="checkbox" name="anonim" value="Anonim"> Donasi Sebagai Anonim</label>
                  </div>
                </div>

                <button type="submit" name="simpan" id="btnSubmit" class="btn btn-primary">Lanjut Pembayaran</button>
              </form>
            </div>
          </div>

          <div class="col-lg-4" id="donasidesktop">
            <div class="left_text" style="position: -webkit-sticky;position: sticky;top: 120px;">
              <h4>Anda Akan Berdonasi Untuk Campign</h4><hr>
              <img class="img-fluid" src="images/banner/<?php echo $data[6] ?>" alt="" style="width: 100%;">
              <h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
              <small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i></small>
              <div class="row" style="margin-top: 20px; margin-bottom: 20px;">

                <div class="col-md-2">
                  <img src="images/icon/user.png" alt="" width="40">    
                </div>
                <div class="col-md-10" style="padding-left:0px;">
                  <span class="text-info"><h5 style="margin: 0px;"><?php echo $data[11] ?></h5></span>
                  <small><i>Akun Terverifikasi</i></small>
                </div>
              </div>

              <hr>
              <div class="text-center mt-5">
                <h4>Bantu sebarkan via</h4>
                <div class="row">
                  <div class="col-md-6 text-center" style="background-color: #e6e4fd; padding-top: 5px;padding-bottom: 5px;"><a href="https://www.facebook.com/share.php?u=<?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-facebook"></i></h3></a></div>
                  <div class="col-md-6 text-center" style="background-color: #e4fde4; padding-top: 5px;padding-bottom: 5px;"><a href="whatsapp://send?text=<?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-whatsapp text-success"></i></h3></a></div>

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