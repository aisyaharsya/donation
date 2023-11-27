<?php include"header.php"; ?>
<section id="about-sec" style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <?php include"menu.php"; ?>



      <div class="col-sm-9 col-md-9 clearfix top-off">
        <div class="card">
          <div class="card-header">
            <h3 style="margin: 0;">SEDEKAH SAYA</h3><hr style="margin-left: 0px;">             
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

                <a class="btn btn-success" href="donasisaya" role="button"><i class="fa fa-gift"></i> Campaign</a>
                <?php if ($menu[1]=="Y"){ ?>
                  <a class="btn btn-primary" href="sedekahbahanmakanan" role="button"><i class="fa fa-gift"></i> Bahan Makanan</a>
                <?php } ?>

                <?php if ($menu[2]=="Y"){ ?>
                  <a class="btn btn-primary" href="sedekahnasibungkus" role="button"><i class="fa fa-cutlery"></i> Nasi Bungkus</a>
                <?php } ?>

                <?php if ($menu[3]=="Y"){ ?>
                  <a class="btn btn-primary" href="sedekahuang" role="button"><i class="fa fa-money"></i> Uang</a>
                <?php } ?>
                
              
               <?php
               $getId=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'")); 
               ?>
               <div class="table-responsive" style="margin-top: 15px;">
                <table class="table table-bordered table-striped" id="dataTables-example">
                 <thead>
                  <tr>
                    <th scope="col">Judul Campaign</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Kode Unik</th>
                    <th scope="col">Tanggal Donasi</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $eksekusi=mysqli_query($con,"select bdg.*,gd.judul from tbberdonasigalangdana as bdg inner join tbgalangdana gd on(gd.idGalangDana=bdg.idGalangDana) where bdg.idAnggota=".$getId[0]." order by  bdg.idBerdonasiGalangDana desc");
                 while ($data=mysqli_fetch_array($eksekusi)) {
                  ?>
                  <tr>
                    <td><?php echo $data[16] ?></td>
                    <td>Rp. <?php echo number_format($data[12],2,',','.'); ?></td>
                    <td>Rp. <?php echo number_format($data[3],2,',','.'); ?></td>
                    <td><?php echo date('d M Y',strtotime($data[13])) ?></td>
                    <td>
                      <?php if ($data[15]=="P") {
                        $ket="Pending";
                      }elseif ($data[15]=="N") {
                        $ket="Ditolak";
                      }elseif ($data[15]=="K"){
                        $ket="Konfirmasi";
                      } ?>

                      <?php echo $ket; ?></td>
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

