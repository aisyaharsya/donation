<?php  
session_start();
include"application/koneksi.php";

extract($_POST);
include 'member/session.php';
include "vendors/classes/class.phpmailer.php";
$mail = new PHPMailer; 
$link=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
$tentangwebkami=mysqli_fetch_array(mysqli_query($con,"select * from tbabout"));
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/about/<?php echo $tentangwebkami[8] ?>" type="image/png">
        <title><?php echo $tentangwebkami[7] ?> - <?php echo $tentangwebkami[9] ?></title>
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

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
              </div>	
           	</div>	

            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					      <div class="container">
						      <!-- Brand and toggle get grouped for better mobile display -->
						      <a class="navbar-brand logo_h" href="<?php echo BASEURL ?>" style="width: 40%;"><img src="images/about/<?php echo $tentangwebkami[6] ?>" alt="" style="width: 40%;"></a>
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
					      </div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->