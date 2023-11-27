<?php include"header.php"; ?>
<!--================Home Banner Area =================-->
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h2>Blog</h2>
        <div class="page_link">
          <a href="#">Home</a>
          <a href="artikel">Blog</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->
    <!--================Event Details Area =================-->
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">
      <div class="row event_text_inner">
        
        <div class="col-lg-12">
          <div class="right_text">

          <div class="row">
           <?php  
              $halaman = 9;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $query=mysqli_query($con,"select * from tbartikel");
              $total=mysqli_num_rows($query);
              $pages = ceil($total/$halaman); 
              $query = mysqli_query($con,"select * from tbartikel order by idArtikel desc LIMIT $mulai, $halaman");
              $no =$mulai+1;
              while ($data=mysqli_fetch_array($query)) { ?>
                

                <div class="col-md-4">
                <div class="item">
                <div class="causes_item" style="border:1px solid #f5f5f5;">
                  <div class="causes_img">
                    <img class="img-fluid" src="../images/artikel/<?php echo $data[4] ?>" alt="" style="height:250px;">
                  <div class="causes_text" style="padding: 0px; padding: 10px 10px 10px 10px;">
                    <h4 style="margin: 0px; height:150px;"><a href="bacaartikel?berita=<?php echo $data[5] ?>"><?php echo $data[2] ?></a></h4>
                    <small>Publish <?php echo date('d M y', strtotime($data[1])) ?></small>
                    <p><?php echo substr(strip_tags($data[3]),0,100)  ?></p>
                  </div>
                  <a href="bacaartikel?berita=<?php echo $data[5] ?>" class="btn btn-success btn-block">Selengkapnya</a>

                  </div>
                </div>
              </div>
              </div>




              <?php } ?>
              </div>
              <div class="mt-5">
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              <a href="?halaman=<?php echo $i; ?>" class="btn btn-primary"><?php echo $i; ?></a>
             
              <?php } ?>
             
            </div>




          </div>
        </div>
      </div>


    </div>
  </div>
</section>
<!--================End Event Details Area =================-->
<?php include"footer.php"; ?>
