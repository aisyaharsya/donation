<?php include"header.php"; ?>
<section id="inner-banner">
        <div class="overlay">
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-6"><h1>KETENTUAN SEDEKAH</h1></div>
                    <div class="col-sm-6">
                      <h6 class="breadcrumb"><a href="<?php echo $link[1] ?>member">Beranda</a> / Ketentuan Sedekah</h6></div>
                  </div>
              </div>
          </div>
      </section>
      <section id="about-sec">
        <div class="container">
            <div class="row text-left">                
                <?php  
                $query=mysqli_query($con,"select * from tbabout");
                while($data=mysqli_fetch_array($query))
                {
                ?>
                    <?php echo $data[1] ?>
                <div class="text-left">
                </div>
            </div>
        </div>
    </section>
    <section id="about-sec">
        <div class="container">
            <div class="row text-center" style=" margin-top:-20px;">
                <div class="col-md-4" style=" margin-top:20px;">
                    <div class="con-box">
                        <div class="fancy-box-icon">
                            <i class="fa fa-mobile-phone"></i>
                        </div>
                        <h3>Telepon / Handphone</h3>
                        <div class="fancy-box-content">
                            <p><?php echo $data[2] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style=" margin-top:20px;">
                    <div class="con-box" style="background:#2f3191;">
                        <div class="fancy-box-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h3>Alamat</h3>
                        <div class="fancy-box-content">
                            <p><?php echo $data[3] ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4" style=" margin-top:20px;">
                    <div class="con-box">
                        <div class="fancy-box-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <h3>EMAIL</h3>
                        <div class="fancy-box-content">
                            <p><?php echo $data[4] ?></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php } ?>
        </div>
    </section>
    <?php include"footer.php"; ?>



