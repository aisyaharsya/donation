<?php 
include"header.php";
include"../application/formatnumbertok.php";
$angkaribu=new angkaribu();

$jumlahdonatur=mysqli_num_rows(mysqli_query($con,"select idBerdonasiGalangDana from tbberdonasigalangdana where status='Y'"));
$jumlahdonasi=mysqli_fetch_array(mysqli_query($con,"select sum(jumlah) as jumlah from tbberdonasigalangdana where status='Y'"));
$jumlahcampaign=mysqli_num_rows(mysqli_query($con,"select idGalangDana from tbgalangdana where status='Y'"));
$sampul=mysqli_fetch_array(mysqli_query($con,"select * from tbslide order by idSlide desc limit 1"));
?>  
      
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background: url(../images/slide/<?php echo $sampul[3]; ?>) no-repeat scroll center center;"></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h3><?php echo $sampul[1] ?></h3>
                        <p><?php echo $sampul[2] ?></p>
                        <a class="main_btn" href="index">Galang Dana</a>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
            <div class="container">
                <div class="row welcome_inner">
                    <div class="col-lg-6">
                        <div class="welcome_text">
        					<h4>Selamat Datang di Web Pure Charity</h4>
        					<p>Pure Chariy adalah website yang dibuat untuk galang dana ataupun sedekah secara online dan yang pastinya mempermudah dalam proses galang dana, saat ini kami telah mengumpulkan lebih dari :</p>
        					<div class="row text-center">
        						<div class="col-sm-4">
        							<div class="wel_item ">
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
                    <div class="col-lg-6">
        				<!-- <div class="welcome_img"> -->
        					<img class="img-fluid" src="../img/child.png" alt="" style="height:400px;">
        				<!-- </div> -->
        			</div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Causes Area =================-->
        <section class="causes_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Ayo Mandirikan Mereka</h2>
                    <p>Sahabat Dermawan, pilih campaign yang sedang berlangsung</p>
                </div>
                <div class="causes_slider owl-carousel">

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


                    <div class="item">
        				<div class="causes_item">
        					<div class="causes_img">
        						<img class="img-fluid" style="height: 200px;" src="../images/banner/<?php echo $data['banner'] ?>" alt="">
        					<div class="causes_text" style=" height: 150px;">
        						<h4 style="margin: 0px;"><a href="galangdana?campaign=<?php echo $data['slug']; ?>"><?php echo $data['judul']; ?></a></h4>
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

                    <?php } ?>



                </div>
                    <div align="center" class="mt-5">
                        <a href="campaign" class="btn btn-primary">Lihat Semua</a>
                    </div>
            </div>

        </section>
        <!--================End Causes Area =================-->
        
        <!--================Event Area =================-->
        <section class="event_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Blog</h2>
                    <p>berita terupdate dari kami.</p>
                </div>
                <div class="event_slider owl-carousel">


                    <?php  
                    $query=mysqli_query($con,"select * from tbartikel order by idArtikel desc limit 3");
                    while ($data=mysqli_fetch_array($query)) { ?>
                    <div class="item">
                        <div class="causes_item">
                            <div class="causes_img">
                                <img class="img-fluid" src="../images/artikel/<?php echo $data[4] ?>" alt="" style="height:300px;">
                            <div class="causes_text">
                                <h4 style="margin: 0px;height:100px;"><a href="bacaartikel?berita=<?php echo $data[5] ?>"><?php echo $data[2] ?></a></h4>
                                <small>Publish <?php echo date('d M y', strtotime($data[1])) ?></small>
                                <p><?php echo substr(strip_tags($data[3]),0,100)  ?></p>
                            </div>
                            <a href="bacaartikel?berita=<?php echo $data[5] ?>" class="btn btn-success btn-block">Selengkapnya</a>

                            </div>
                        </div>
                    </div>

                    <?php } ?>


                </div>
                <div align="center" class="mt-5">
                        <a href="artikel" class="btn btn-primary">Lihat Semua</a>
                </div>
            </div>
        </section>
        <!--================End Event Area =================-->
        
                        <!--================Clients Logo Area =================-->
        <section class="clients_logo_area">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>Sponsor</h2>    
                </div>
                


                    <?php 
                    $query=mysqli_query($con,"select * from tbsponsor order by idSponsor desc");
                    $jumlah=mysqli_num_rows($query);
                    if($jumlah>5){ ?>
                        <div class="clients_slider owl-carousel">
                        <?php while($data=mysqli_fetch_row($query)) { ?>
                                <div class="item">
                                    <img src="../images/sponsor/<?php echo $data[2] ?>" alt="" style="width: 25%;">
                                </div>
                        <?php } ?>
                        </div>
                    <?php }else{ ?>
                        <?php while($data=mysqli_fetch_row($query)){ ?>

                            <div class="text-center">
                                <img src="../images/sponsor/<?php echo $data[2] ?>" alt="" style="width: 25%;" title="<?php echo $data[1] ?>">
                            </div>
                        <?php } } ?>
                    
                    </div>
                </section>
                <!--================End Clients Logo Area =================-->

        <?php include"footer.php"; ?>