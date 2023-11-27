<?php 
include"header.php";
$data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['campaign']."'"));
$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));
$persentase=round(($jumlahTerkumpul[0]/$data[5])*100); 


date_default_timezone_set('Asia/Jakarta');
$tgl1 = new DateTime(date('Y-m-d'));
$tgl2 = new DateTime($data[8]);
$selisih= $tgl2->diff($tgl1)->days + 1;
if ($data[8]<date('Y-m-d')) {
  $selisih=0;
}



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

<!--================Event Details Area =================-->
<section class="event_details_area pt-2 pb-5">
	<div class="container">
		<div class="event_d_inner">
			<div class="row event_text_inner">
				
				<div class="col-lg-8">
					<div class="right_text">
						
						<div class="row text-center border mb-5" id="donasimobile">
							<div class="col-md-12 mt-2">
								<b>Anda akan melaporkan campaign</b><hr>
								<h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
								<small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i> | <b><?php echo $data[11] ?> <i class="fa fa-check-circle-o text-success"></i></b></small>

							</div>
						</div>


						<h4>Silahkan isi</h4>
						<form action="" method="post">
              <div class="form-group">
                <label for="">Judul*</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul Laporan" required>
              </div>

              <div class="form-group">
                <label for="">Isi Laporan*</label>
                <textarea name="isi" class="form-control"  placeholder="Isi Laporan" id="editor1" required></textarea>
              </div>

              <button type="submit" name="simpan" id="btnSubmit" class="btn btn-primary">Laporkan Campaign</button>
            </form>

          </div>
        </div>

        <div class="col-lg-4" id="donasidesktop">
          <div class="left_text" style="position: -webkit-sticky;position: sticky;top: 120px;">
            <h4>Anda akan melaporkan campaign</h4><hr>
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