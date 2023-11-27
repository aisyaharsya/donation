<?php  
session_start();

include"application/koneksi.php";
extract($_POST);
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
$tentangwebkami=mysqli_fetch_array(mysqli_query($con,"select * from tbabout"));

$data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['campaign']."'"));
$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));
$persentase=round((floatval($jumlahTerkumpul[0])/floatval($data[5]))*100); 
if($persentase>100){
    $persentase=100;
}else{
    $persentase=$persentase;
}

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
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="title" content="<?php echo $tentangwebkami[7] ?> | <?php echo $tentangwebkami[9] ?>">
	    <meta name="keywords" content="donasi,donatur,kampanye,social crowdfunding">
	    <meta name="description" content="<?php echo $tentangwebkami[9] ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">

	    <meta property="og:url" content="<?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>">
	    <meta property="og:type" content="article">
	    <meta property="og:site_name" content="Klik untuk donasi - <?php echo $data[2] ?>">
        <meta property="og:title" content="Klik untuk donasi - <?php echo $data[2] ?>">
        <meta property="og:description" content="<?php echo $data[2] ?>">
        <meta property="og:image" content="<?php echo $link[1] ?>images/banner/<?php echo $data[6] ?>">
	    <meta property="og:image:secure_url" content="<?php echo $link[1] ?>images/banner/<?php echo $data[6] ?>">

	    <meta name="twitter:card" content="summary">
	    <meta name="twitter:site" content="<?php echo $link[1] ?>">
	    <meta name="twitter:title" content="<?php echo $tentangwebkami[7] ?> | <?php echo $data[2] ?>">
	    <meta name="twitter:description" content="<?php echo $data[2] ?>">
	    <meta name="twitter:image" content="<?php echo $link[1] ?>images/banner/<?php echo $data[6] ?>">

        
        <link rel="icon" href="images/about/<?php echo $tentangwebkami[8] ?>" type="image/png">
        <title><?php echo $data[2] ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <style>

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }
        .bottomMenu1 {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px;
            background-color: #f7f7f7;
            z-index: 1;
            transition: all 1s;
            box-shadow: 1px 1px 5px grey;
        }
        .hide {
            opacity:0;
            left:-100%;
        }
        .show {
            opacity:1;
            left:0;
        }
        
        @media only screen and (max-width: 988px) {
          #donasidesktop {
            display:none;
          }
          #donasimobile{
            display: block;
          }
          #donasimobile1{
            display: block;
          }
        }


         @media only screen and (min-width: 988px) {
          #donasimobile{
            display: none;
          }
          #donasimobile1{
            display: none;
          }
        }
        </style>
    </head>
    <body>
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
						<?php if(empty($_SESSION['status']) ) : // kondisi tidak login?>
							<div class="float-right">
								<a class="ac_btn" href="masuk">Masuk / Daftar</a>
								<a class="dn_btn" href="masuk">Galang Dana</a>
							</div>
						<?php else : //kodisi login?>
							<div class="float-right">
								<a class="ac_btn" href="<?php echo BASEURL ?>/member/logout">Keluar</a>
								<a class="dn_btn" href="<?php echo BASEURL ?>/member/member">Galang Dana</a>
							</div>
				
						<?php endif;?>
							<!-- <div class="float-right">
								<a class="ac_btn" href="masuk">Masuk / Daftar</a>
								<a class="dn_btn" href="masuk">Galang Dana</a>
							</div> -->
           		</div>	
           	</div>	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="<?php echo $link[1] ?>" style="width: 50%;"><img src="images/about/<?php echo $tentangwebkami[6] ?>" alt="" style="width: 40%;"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
              					<li class="nav-item"><a class="nav-link" href="<?php echo BASEURL ?>">Home</a></li> 
              
              					<?php if(!empty($_SESSION['status']) ) : // kondisi login?>
                				<li class="nav-item"><a class="nav-link" href="<?php echo $link[1] ?>member/member">Dashboard</a></li> 
              					<?php else : ?>
                				<li class="nav-item"><a class="nav-link" href="<?php echo BASEURL ?>/masuk">Masuk</a></li> 
                				<?php endif;?>
								<li class="nav-item"><a class="nav-link" href="<?php echo BASEURL ?>/campaign">Campaign</a></li>
                				<li class="nav-item"><a class="nav-link" href="<?php echo BASEURL ?>/artikel">Artikel</a></li> 
								<li class="nav-item"><a class="nav-link" href="<?php echo BASEURL ?>/about">Tentang Kami</a></li> 
							</ul>
						</div> 
						<!-- <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="<?php echo $link[1] ?>">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="campaign">Campaign</a></li>
								<li class="nav-item"><a class="nav-link" href="about">Tentang Kami</a></li> 
                                <li class="nav-item"><a class="nav-link" href="artikel">Blog</a></li> 
								<li class="nav-item"><a class="nav-link" href="masuk">Masuk</a></li> 
							</ul>
						</div>  -->
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		<!--================Event Details Area =================-->
		<section class="event_details_area pt-2 pb-5">
			<div class="container">
				<div class="event_d_inner">
					<div class="row event_text_inner">
						
						<div class="col-lg-8">
							<div class="right_text">
								<img class="img-fluid" src="images/banner/<?php echo $data[6] ?>" alt="" style="width: 100%;">

								<div class="row" id="donasimobile1">
									<div class="col-md-12 mt-2">
										<h4 style="margin: 0px;"><?php echo $data[2] ?></h4>
										<small style="color: #cecece;"><i class="fa fa-calendar"></i> <i><?php echo date('d M Y',strtotime($data[7])) ?></i> | <b><?php echo $data[11] ?> <i class="fa fa-check-circle-o text-success"></i></b></small>
										<ul class="list" style="margin-bottom: 10px;">
											<li><h4 style="margin: 0px;padding: 0px;">Rp.<?php echo number_format($jumlahTerkumpul[0],2,',','.'); ?></h4><small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small></li>
											<li>
												<div class="progress" style="margin-bottom: 5px;height: 30px;">
													<div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>; padding-left: 5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
												</div>
												<small><i class="fa fa-clock-o"></i> <?php echo $ketJumlahHari ?> </small><hr></li>
											<li style="text-align: center;">
												<?php if ($selisih!=0 || $data[10]=="Y"): ?>
													<a href="whatsapp://send?text=Klik untuk donasi - <?php echo $data[2] ?> <?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>" class="btn btn-success pl-3 pr-3"><i class="fa fa-whatsapp mr-2"></i> Bagikan</a> <a href="berdonasi?campaign=<?php echo $_GET['campaign'] ?>" class="btn btn-primary text-white"> Donasi Sekarang</a>
												<?php else: ?>
													<div class="alert alert-info">Campaign ini telah berakhir</div>
												<?php endif ?>
																		
											</li>
										</ul>

									</div>
								</div>
								<hr>

								<div class="tab">
									<button class="tablinks active" onclick="openCity(event, 'Deskripsi')">Cerita</button>
									<button class="tablinks" onclick="openCity(event, 'Kabar')">Kabar</button>
									<button class="tablinks" onclick="openCity(event, 'Dermawan')">Sahabat Dermawan</button>
									<!-- <button class="tablinks" onclick="openCity(event, 'Doa')">Doa</button> -->
								</div>

								<div id="Deskripsi" class="tabcontent" style="display: block;">
									<p>
										<?php echo $data[4]; ?>
									</p>
									<hr>
									<!-- <p class="text-center"><b>Disclaimer :</b> Informasi dan opini yang tertulis di halaman penggalangan ini adalah milik penggalang dana dan tidak mewakili sedekah</p> -->
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
																	<a data-toggle="collapse" href="#collapse<?php echo $databerita['idBeritaGalangDana'] ?>" class="text-info"><?php echo $no++.". ".$databerita['judul'] ?></a> 
																</b>
																<br>
																<small style="margin-left: 18px;"><i><?php echo date('d M Y',strtotime($databerita['tanggal'])) ?></i></small>
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
														while ($datagalang=mysqli_fetch_array($eksekusi)) { ?>

														<li class="list-group-item" style="margin-top: 5px;">
														<span class="float-left"><?php echo $datagalang['anonim'] ?><br><small><i><?php echo date('d M Y',strtotime($datagalang['tanggal'])) ?></i> , <i class="text-secondary"><?php if($datagalang['dukungan']==""){echo"-";}else{echo $datagalang['dukungan'];}  ?></i></small></span><span class="float-right"><strong> Rp. <?php echo number_format($datagalang['jumlah'],2,',','.'); ?></strong></span></li>
													<?php } ?>
												</ul> 
											</div>
										</div>
									</div>
								</div>
									
							</div>
							</div>

							<div class="col-lg-4" id="donasidesktop">
							<div class="left_text" style="position: -webkit-sticky;position: sticky;top: 120px;">
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

								


								<ul class="list">
									<li><a href="#"><h4 style="margin: 0px;padding: 0px;">Rp.<?php echo number_format($jumlahTerkumpul[0],2,',','.'); ?></h4><small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small></li>
									<li><a href="#"><div class="progress" style="margin-bottom: 5px;height: 30px;">
										<div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>; padding-left: 5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
									</div><small><i class="fa fa-clock-o"></i><?php echo $ketJumlahHari ?> </small><hr></li>
									<?php if ($selisih!=0 || $data[10]=="Y"): ?>
										<li><a href="berdonasi?campaign=<?php echo $_GET['campaign'] ?>" class="btn btn-primary btn-lg btn-block text-white"> Donasi Sekarang</a></li>
									<?php else: ?>
										<div class="alert alert-info">Campaign ini telah berakhir</div>
									<?php endif ?>

									
								</ul>

								<hr>
								<div class="text-center mt-5">
									<h4>Bantu sebarkan via</h4>
									<div class="row">
										<div class="col-md-6 text-center" style="background-color: #e6e4fd; padding-top: 5px;padding-bottom: 5px;"><a href="https://www.facebook.com/share.php?u=<?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-facebook"></i></h3></a></div>

										<div class="col-md-6 text-center" style="background-color: #e4fde4; padding-top: 5px;padding-bottom: 5px;"><a href="https://web.whatsapp.com/send?text=Klik untuk donasi - <?php echo $data[2] ?> <?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>"><h3 style="margin: 0px;"><i class="fa fa-whatsapp text-success"></i></h3></a></div>

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

		<div class="col-md-12 bottomMenu1 hide" id="donasimobile" style="position: fixed;bottom: 0;color: white;text-align: center;">
			<?php if ($selisih!=0 || $data[10]=="Y"): ?>
				<a href="whatsapp://send?text=Klik untuk donasi - <?php echo $data[2] ?> <?php echo $link[1] ?>galangdana?campaign=<?php echo $data[3]; ?>" class="btn btn-success pl-3 pr-3"><i class="fa fa-whatsapp mr-2"></i> Bagikan</a>
				<a href="berdonasi?campaign=<?php echo $_GET['campaign'] ?>" class="btn btn-primary pl-3 pr-3">Donasi Sekarang</a>
			<?php else: ?>
				<div class="alert alert-info">Campaign ini telah berakhir</div>
			<?php endif ?>
			
		</div>

		<script type="text/javascript">
			myID = document.getElementById("donasimobile");

			var myScrollFunc = function () {
				var y = window.scrollY;
				if (y >= 400) {
					myID.className = "bottomMenu1 show"
				} else {
					myID.className = "bottomMenu1 hide"
				}
			};

			window.addEventListener("scroll", myScrollFunc);
		</script>