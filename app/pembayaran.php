<?php 

include"header.php";
if(empty($_SESSION['status']))
{
  echo"<script> location.replace('./masuk'); </script>";
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/sendEmail/vendor/autoload.php';

$data =mysqli_fetch_array(mysqli_query($con,"select bgd.*,gd.*,a.*,r.*,gd.jumlah as jumlahGoal,a.nama as namaAnggota,bgd.jumlah as jumlahtf,bgd.tanggalBerakhir as tanggalAkhirTransfer from tbberdonasigalangdana as bgd inner join tbgalangdana as gd on(gd.idGalangDana=bgd.idGalangDana) inner join tbanggota as a on(a.idAnggota=gd.idAnggota) inner join tbrekening as r on(r.idRekening=bgd.idRekening) where bgd.idTemp='".$_GET['bayar']."'"));

$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data['idGalangDana']." and status='Y'"));

$persentase=round(($jumlahTerkumpul[0]/$data['jumlahGoal'])*100); 

if (isset($_GET['bayar'])) {
      // Konfigurasi SMTP

      $mail = new PHPMailer(true);
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;			// Enable verbose debug output
      $mail->isSMTP();                                 	// Send using SMTP
      $mail->Host       = 'smtp.gmail.com';           	// Set the SMTP server to send through
      $mail->SMTPAuth   = true;                         	// Enable SMTP authentication
      $mail->Username   = 'pure.charity.ind@gmail.com';	// SMTP username
      $mail->Password   = 'nsrvkykftpuuwiek';        		// SMTP password
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;	// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;							// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('pure.charity.ind@gmail.com', 'Invoice Sedekah');
      $mail->addAddress($data[8],$data[5]);     		// Add a recipient
      
      // Content
      $mail->isHTML(true);                              	// Set email format to HTML
      $mail->Subject = 'Invoice Sedekah';
      $mail->Body    =  "<div class='col-lg-12 text-center' style='text-align: center;font-family: calibri;'>
      <div class='col-md-8' style='display: inline-block;'>
        <div class='right_text text-center'>

          <div class='row text-center mb-5' style='border: 1px solid gray;'>
            <div class='col-md-12 mt-2' style='padding: 10px;'>
              <b>Anda akan berdonasi untuk campaign</b><hr>
              <h4 style='margin: 0px;'>".$data[19]."</h4>
              <small style='color: #cecece;'><i class='fa fa-calendar'></i> ".date('d M Y',strtotime($data[24]))."</i> | <b>".$data[30]." <i class='fa fa-check-circle-o text-success'></i></b></small>

            </div>
          </div>


          <div style='margin-top: 20px;'>
            <span>Silahkan transfer sesuai nominal berikut</span>
            <h2 style='margin: 0px;'>Rp. ".number_format($data['jumlahtf'],0,',','.')."</h2>
          </div>

          <div class='col-md-12 text-center' style='border: 1px solid gray;margin-top: 20px;padding: 5px;'> <b>PENTING</b>, transfer sampai 3 digit terakhir agar donasi Anda dapat diproses</div>
          <div class='row'>
            <div class='col-md-12' style='margin-top: 15px;'>
              <span><b>Nominal Donasi</b></span><br><br> <span style='border: 1px solid gray;margin-top: 20px;padding: 5px;'>Rp. ".number_format($data['jumlahtf']-$data['kodeUnik'],0,',','.')."</span>  
            </div>

            <div class='col-md-12' style='margin-top: 20px;'>
              <span><b>Kode Unik</b></span> <br><br> <span style='border: 1px solid gray;margin-top: 20px;padding: 5px;'>Rp. ".number_format($data['kodeUnik'],0,',','.')."</span>  
            </div>

            <div class='col-md-12'>
              <p class='text-left'><small><i>*3 angka terakhir akan didonasikan</i></small></p>
            </div>
          </div>


          <div class='col-md-12 rekening' style='margin-top: 15px;'>
            <h5>Silahkan Transfer Ke</h5>
            <h1>".$data[40]."</h1>
            
           <h3 style='margin: 0px;margin-top: 10px;'>".$data[42]."</h3>
           <p>Atas Nama ".$data[41]."</p>
         </div>

         <div class='col-md-12 text-center' style='border: 1px solid gray;margin-top: 20px;padding: 5px;'> Pastikan Anda transfer <b>".date('d M Y',strtotime($data['tanggalAkhirTransfer']))."</b> - pukul ".date('h.i',strtotime($data['tanggalAkhirTransfer']))." atau donasi anda otomatis dibatalkan oleh sistem</div>

      </div>
    </div>
  </div>
</div>";
$mail->Send();



       
}
?>

<!--================Event Details Area =================-->
<section class="event_details_area pt-2 pb-5">
	<div class="container text-center">
		<div class="event_d_inner">
			<div class="row event_text_inner">
				
				<div class="col-lg-12 text-center">
          <div class="col-md-8" style="display: inline-block;">

            <div class="right_text text-center">

              <div class="row text-center border mb-5">
                <div class="col-md-12 mt-2">
                  <b>Anda akan berdonasi untuk campaign</b><hr>
                  <h4 style="margin: 0px;"><?php echo $data[19] ?></h4>
                  <small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[24])) ?></i> | <b><?php echo $data[30] ?> <i class="fa fa-check-circle-o text-success"></i></b></small>
                </div>
              </div>

              <div>
                <span>Silahkan transfer sesuai nominal berikut</span>
                <h2 style="margin: 0px;">Rp. <?php echo number_format($data['jumlahtf'],0,',','.'); ?></h2>
              </div>

              <div class="col-md-12 text-center" style="border: 1px solid gray;margin-top: 20px;"> PENTING, transfer sampai 3 digit terakhir agar donasi Anda dapat diproses</div>

              <div class="row">
                <div class="col-md-12" style="margin-top: 15px;">
                  <span style="float: left;"><b>Nominal Donasi</b></span> <span style="float: right;">Rp. <?php echo number_format($data['jumlahtf']-$data['kodeUnik'],0,',','.') ?></span>  
                </div>

                <div class="col-md-12">
                  <span style="float: left;"><b>Kode Unik</b></span> <span style="float: right;">Rp. <?php echo number_format($data['kodeUnik'],0,',','.') ?></span>  
                </div>

                <div class="col-md-12">
                  <p class="text-left"><small><i>*3 angka terakhir akan didonasikan</i></small></p>
                </div>
              </div>

              <div class="col-md-12 rekening" style="margin-top: 15px;">
                <h5>Silahkan Transfer Ke</h5>
                <?php if ($data['barcode']=="") { ?>
                  <img src="images/rekening/logo/<?php echo $data['logo'] ?>" style="width: 200px;">
                <?php }else { ?>
                  <img src="images/rekening/barcode/<?php echo $data['barcode'] ?>" style="width: 200px;">
                <?php } ?>

                <h3 style="margin: 0px;margin-top: 10px;"><?php echo $data['nomorRek'] ?></h3>
                <p>Atas Nama <?php echo $data['atasNama'] ?></p>
              </div>

              <div class="col-md-12 text-center" style="border: 1px solid gray;margin-top: 20px;"> Pastikan Anda transfer sebelum <?php echo date('d M Y',strtotime($data['tanggalAkhirTransfer'])) ?> - pukul <?php echo date('h.i',strtotime($data['tanggalAkhirTransfer'])) ?> atau donasi anda otomatis dibatalkan oleh sistem</div>

              <div class="col-md-12 text-center" style="margin-top: 30px;"> 
                <h4><b>Ayo bantu sebarkan campaign ini!</b></h4>
                <p>
                  "Memberi adalah kebahagiaan..<br>
                  Layaknya menanam, suatu saat engkau akan menuainya.."<br>
                  — Hilaludin Wahid
                </p>
              </div>  

              <div class="row mt-5">
                <div class="col-md-6 text-center" style="background-color: #e6e4fd;padding: 10px; "><a href="https://www.facebook.com/share.php?u=<?php echo $link[1] ?>galangdana?campaign=<?php echo $data['slug']; ?>"><h3 style="margin: 0px;"><i class="fa fa-facebook"></i></h3></a></div>
                <div class="col-md-6 text-center" style="background-color: #e4fde4; padding: 10px;"><a href="whatsapp://send?text=<?php echo $link[1] ?>galangdana?campaign=<?php echo $data['slug']; ?>"><h3 style="margin: 0px;"><i class="fa fa-whatsapp text-success"></i></h3></a></div>
              </div>
            </div>
            <a href="campaign" class="btn btn-primary btn-block" style="margin-top: 30px;">Tutup</a>
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