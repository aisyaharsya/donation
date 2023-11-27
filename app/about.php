<?php 
include"header.php";
include"application/formatnumbertok.php";
$angkaribu=new angkaribu();
$jumlahdonatur=mysqli_num_rows(mysqli_query($con,"select idAnggota from tbberdonasigalangdana where status='Y' group by idAnggota"));
$jumlahdonasi=mysqli_fetch_array(mysqli_query($con,"select sum(jumlah) as jumlah from tbberdonasigalangdana where status='Y'"));
$jumlahcampaign=mysqli_num_rows(mysqli_query($con,"select idGalangDana from tbgalangdana where status='Y'"));
?>

<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h2>Tentang Kami</h2>
        <div class="page_link">
          <a href="#">Home</a>
          <a href="about">Tentang Kami</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<section class="welcome_area p_120">
  <div class="container">
    <div class="row welcome_inner">
      <div class="col-md-8" style="border-right: 1px solid #f5f5f5;">
        <div class="welcome_text">
          <h4>Selamat Datang</h4>
          <p> <?php echo $tentangwebkami[1] ?></p>
          <div class="row text-center">
            <div class="col-sm-4">
              <div class="wel_item">
                <i class="lnr lnr-database"></i>
                <h4><?php echo $angkaribu->angkaformat($jumlahdonasi[0]); ?></h4>
                <p>Total Donasi</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="wel_item">
                <i class="lnr lnr-book"></i>
                <h4><?php echo $angkaribu->angkaformat($jumlahcampaign); ?></h4>
                <p>Total Campaign</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="wel_item">
                <i class="lnr lnr-users"></i>
                <h4><?php echo $angkaribu->angkaformat($jumlahdonatur); ?></h4>
                <p>Total Donatur</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h4>Kontak Kami</h4>
        <iframe src="<?php echo $tentangwebkami[5] ?>" height="450" frameborder="0" style="border:0;border-radius: 10px;width: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="row mt-5">
          <div class="col-md-3">
            Alamat <span class="float-right">:</span>
          </div>
          <div class="col-md-9">
            <?php echo $tentangwebkami[3] ?>
          </div>

          <div class="col-md-3">
            Telepon<span class="float-right">:</span>
          </div>
          <div class="col-md-9">
            <?php echo $tentangwebkami[2] ?>
          </div>

          <div class="col-md-3">
            E-Mail<span class="float-right">:</span>
          </div>
          <div class="col-md-9">
            <?php echo $tentangwebkami[4] ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php include"footer.php"; ?> 