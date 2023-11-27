<?php include"header.php"; ?>
<section id="about-sec" style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <?php include"menu.php"; ?>


      <div class="col-sm-9 col-md-9 clearfix top-off">
        <div class="card">
          <div class="card-header">
            <h3 style="margin: 0;">GALANG DANA</h3><hr style="margin-left: 0px;">             
          </div>

          <div class="card-body" style="margin-top: 10px;">
            <div class="row">
              <div class="col-md-12">
                <?php
                if(isset($_GET['pesan'])=='success')
                {
                  echo "<div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>
                  <i class='ace-icon fa fa-times'></i>
                  </button>
                  <b>Sukses !</b>, Bukti Transfer berhasil dikirim, tunggu kemajuan status sedekah anda.
                  </div>";
                }elseif(isset($_GET['pesannoresi'])=='berhasilupdate')
                {
                  echo "<div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>
                  <i class='ace-icon fa fa-times'></i>
                  </button>
                  <b>Sukses !</b>, Nomor Resi berhasil dikirim, tunggu kemajuan status sedekah anda.
                  </div>";
                }
                ?>
               <?php
               $getId=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'")); 
                if($getId[9]=="Y"){
               ?>
                <a href="tambahcampaign" class="btn btn-warning" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Galang Dana</a>

             <?php }else{ ?>
                <a href="verifikasi" class="btn btn-warning" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Galang Dana</a>
             <?php } ?>

              
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTables-example"> 
                 <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Judul Campaign</th>
                    <!--<th scope="col">Deskripsi</th>-->
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <!--<th scope="col">Sisa Hari</th>-->
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $eksekusi=mysqli_query($con,"select * from tbgalangdana where idAnggota=".$getId[0]." order by idGalangDana desc");
                 $no=1;
                 while ($data=mysqli_fetch_array($eksekusi)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo date('d F Y', strtotime($data[7]));?></td>
                    <td><?php echo $data[2]; ?></td>
                    <!--<td><?php echo substr(strip_tags($data[3]), 0,10);  ?></td>-->
                    <td><?php echo number_format($data[5],2,',','.'); ?></td>
                    <td><?php echo date('d F Y', strtotime($data[8])); ?></td>
                    <?php  
                      $tgl1 = new DateTime($data[7]);
                      $tgl2 = new DateTime($data[8]);
                      $selisih= $tgl2->diff($tgl1)->days + 1;
                    ?>
                    <!--<td><?php echo $selisih; ?></td>-->
                    <?php if ($data[9]=="P"){ ?>
                      <td><span class="label label-info">Pending</span></td>
                    <?php }elseif ($data[9]=="N") { ?>
                      <td><span class="label label-danger">Tolak</span></td>
                    <?php }elseif ($data[9]=="Y") { ?>
                      <td><span class="label label-success">Tayang</span></td>
                    <?php }else{ ?>
                      <td><span class="label label-primary">Selesai</span></td>
                    <?php } ?>
                    <td><a href="detailgalangdana?href=<?php echo $data[3]; ?>" class="btn btn-info">Detail</a> <a href="editgalangdana?href=<?php echo $data[3]; ?>" class="btn btn-primary">Edit</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>
</div>
</div>
</section>

<?php include"footer.php"; ?>

