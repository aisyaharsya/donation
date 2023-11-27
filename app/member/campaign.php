<?php include"header.php"; ?>
<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h2>Campaign</h2>
        <div class="page_link">
          <a href="#">Home</a>
          <a href="campaign">Campaign</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">
      <div class="row event_text_inner">
        
        <div class="col-lg-12">
          <div class="right_text">


            <div class="row">
              <?php 
              $eksekusi=mysqli_query($con,"select gd.*,a.nama,(select sum(jumlah) from tbberdonasigalangdana where status='Y' and idGalangDana=gd.idGalangDana) as jumlahTerkumpul from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota)where gd.status='Y' order by gd.idGalangDana desc limit 9");
              $no=1;
              while ($data=mysqli_fetch_array($eksekusi)) {
                ?>
                <?php 
                date_default_timezone_set('Asia/Jakarta'); 
                $tgl1 = new DateTime(date('Y-m-d'));
                $tgl2 = new DateTime($data['tanggalBerakhir']);
                $selisih= $tgl2->diff($tgl1)->days + 1;
                $persentase=round((floatval($data[11])/floatval($data[5]))*100); 
                if($persentase>100){
                    $persentase=100;
                }else{
                    $persentase=$persentase;
                }

                if ($data['tanggalBerakhir']<date('Y-m-d')) {
                  $selisih=0;
                }
                
                if($data[10]=="Y"){
                    $ketJumlahHari="Unlimited";
                }else{
                    $ketJumlahHari=$selisih." Hari lagi";
                }
                ?>
                <div class="col-md-4 mt-3">
                  <div class="item">
                    <div class="causes_item" style="border:1px solid #f5f5f5;">
                      <div class="causes_img">
                        <img class="img-fluid" src="../images/banner/<?php echo $data['banner'] ?>" alt="" style="height: 200px;width:100%;">
                        <div class="causes_text" style="padding: 10px 10px 10px 10px;">
                          <h5 style="margin: 0px;height: 50px;"><a href="more?campaign=<?php echo $data['slug']; ?>"><?php echo $data['judul']; ?></a></h5>
                          <p><span class="text-primary"><?php echo $data['nama']; ?></span> <i class="fa fa-check-circle-o text-success"></i></p>
                        </div>

                      </div>
                      <div class="progress" style="margin-bottom: 5px;height: 30px;">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>; padding-left: 5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
                      </div>
                      <div class="causes_bottom">

                        <a href="#" style="line-height: 1.8;">terkumpul <br><b style="color: #fff;"> Rp. <?php echo number_format($data[12],2,',','.'); ?></b></a>
                        <a href="#" style="line-height: 1.8;">sisa <br><b><?php echo $ketJumlahHari; ?></b></a>
                      </div>
                    </div>
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
