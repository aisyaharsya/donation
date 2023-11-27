<?php include"header.php"; 
$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
?>

<section class="welcome_area p_120" style="margin-top: 20px;">
  <div class="container">
    <div class="row welcome_inner">
        <div class="col-md-12">
            <?php 
            
            ?>
            <div class='alert alert-info'>
              <button class='close' data-dismiss='alert'>
                  <i class='ace-icon fa fa-times'></i>
              </button>
              Selamat Datang <b><?php echo $dataakun[2]; ?></b>
          </div>

           <?php  
             if(isset($_POST['ubahprofile']))
             {
                if ($password=="") {
                    $query=mysqli_query($con,"update tbanggota set nama='$namalengkap', asal='$asal',nope='$nope',alamatEmail='$email' where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'");
                }else{
                    $query=mysqli_query($con,"update tbanggota set nama='$namalengkap', asal='$asal',nope='$nope',alamatEmail='$email',kataSandi='".md5($password)."' where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'");
                }
                
                if($query)
                {
                    echo "<div class='col-md-12'><div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Sukses </b> Data anda berhasil diubah. 
                    </div><div class='col-md-12'>";
                }
                else
                {
                    echo "<div class='col-md-12'><div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Gagal </b> Data anda gagal diubah. 
                    </div><div class='col-md-12'>";
                }
            }

            if(isset($_GET['penarikan'])){
                $query=mysqli_query($con,"UPDATE tbpenarikangalangdana SET status='B' where idpenarikangalangdana=".$_GET['penarikan']."");
                if($query){
                  echo "<div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>
                  <i class='ace-icon fa fa-times'></i>
                  </button>
                  <b>Sukses </b> Penarikan dana berhasil dibatalkan. 
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
          <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'campaign')">Campaign</button>
            <button class="tablinks" onclick="openCity(event, 'mydonate')">Donasi Saya</button>
            <?php if ($dataakun[8]=="Y"){ ?>
              <button class="tablinks" onclick="openCity(event, 'penarikan')">Penarikan Dana</button>
            <?php } ?>
            
            <button class="tablinks" onclick="openCity(event, 'profile')">Profile</button>
           
            
        </div>

        <div id="campaign" class="tabcontent" style="display: block;">
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
              if($getId[8]=="Y"){
                 ?>
                 <a href="tambahcampaign" class="btn btn-primary text-white" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Galang Dana</a>

             <?php }else{ ?>
                <a href="verifikasi" class="btn btn-warning" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Galang Dana</a>
            <?php } ?>


            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable"> 
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
                          <td><span class="badge badge-info">Pending</span></td>
                      <?php }elseif ($data[9]=="N") { ?>
                          <td><span class="badge badge-danger">Tolak</span></td>
                      <?php }elseif ($data[9]=="Y") { ?>
                          <td><span class="badge badge-success">Tayang</span></td>
                      <?php }else{ ?>
                          <td><span class="badge badge-primary">Selesai</span></td>
                      <?php } ?>
                      <td>
                        <div style="align-items: center;">
                          <a href="detailgalangdana?href=<?php echo $data[3]; ?>" class="btn-sm btn-info">Detail</a> 
                        </div>
                        <div class="mt-2">
                          <a href="editgalangdana?href=<?php echo $data[3]; ?>" class="btn-sm btn-primary">Edit</a>
                        </div>
                      </td>
                  </tr>
              <?php } ?>
          </tbody>
      </table>
  </div>
</div>
</div>
</div>

<div id="mydonate" class="tabcontent">
   <?php
   $getId=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'")); 
   ?>
   <div class="table-responsive" style="margin-top: 15px;">
    <table class="table table-bordered table-striped" id="myTable1">
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
            <td><?php echo $data[17] ?></td>
            <td>Rp. <?php echo number_format($data[12],2,',','.'); ?></td>
            <td>Rp. <?php echo number_format($data[3],2,',','.'); ?></td>
            <td><?php echo date('d M Y',strtotime($data[13])) ?></td>
            <td>
              <?php if ($data[15]=="P") {
                $ket="<span class='badge badge-primary'>Pending</span>";
            }elseif ($data[15]=="N") {
                $ket="<span class='badge badge-danger'>Ditolak</span>";
            }elseif ($data[15]=="K"){
                $ket="<span class='badge badge-warning'>Konfirmasi</span>";
            }elseif ($data[15]=="Y"){
                $ket="<span class='badge badge-success'>Diterima</span>";
            } ?>

            <?php echo $ket; ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>

<div id="penarikan" class="tabcontent">
  <div class="row">
    <div class="col-md-12">
       <div class="table-responsive">
            <table class="table table-bordered table-striped" id="myTable4"> 
             <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah</th>
                <!--<th scope="col">Deskripsi</th>-->
                <th scope="col">Rekening</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $eksekusi=mysqli_query($con,"SELECT pgd.*,rm.*,gd.* FROM `tbpenarikangalangdana` as pgd inner join tbrekeningmember as rm on(rm.idRekeningMember=pgd.idRekeningMember) inner join tbgalangdana as gd on(gd.idGalangDana=pgd.idGalangDana) WHERE pgd.idAnggota=".$dataakun[0]." order by pgd.idpenarikangalangdana");
             $no=1;
             while ($datapenarikan=mysqli_fetch_array($eksekusi)) {
              ?>
              <tr>
                 <td><?php echo $no++;?></td>
                <td><?php echo date('d F Y', strtotime($datapenarikan[5]));?></td>
                <td><?php echo number_format($datapenarikan[4],2,',','.'); ?></td>
                <td><?php echo $datapenarikan[12]." (".$datapenarikan[10].")"; ?></td>
                <td><?php echo $datapenarikan[7]; ?></td>
                <!--<td><?php echo $selisih; ?></td>-->
                <?php if ($datapenarikan[6]=="P"){ ?>
                  <td><span class="badge badge-info">Pending</span></td>
                <?php }elseif ($datapenarikan[6]=="N") { ?>
                  <td><span class="badge badge-danger">Tolak</span></td>
                <?php }elseif ($datapenarikan[6]=="Y") { ?>
                  <td><span class="badge badge-success">Selesai</span></td>
                <?php }elseif ($datapenarikan[6]=="B") { ?>
                  <td><span class="badge badge-danger">Batal</span></td>
                <?php } ?>
                <td>
                  <?php if ($datapenarikan[6]=="P"){ ?>
                      <a href="detailgalangdana?href=<?php echo $_GET['href']; ?>&penarikan=<?php echo $datapenarikan[0]; ?>" class="btn btn-warning" onclick="return confirm('Yakin ingin membatalkan penarikan dana?')">Batalkan</a></td>
                  <?php }else{ ?>
                    -
                  <?php } ?>
                  
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="profile" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            <?php 
            if ($dataakun[8]=="N"){  ?>
             <div class="alert alert-info" role="alert">
                Verifikasi akun anda <a href="verifikasi"><b>di sini.</b></a>
            </div>
        <?php }elseif($dataakun[8]=="Y"){ ?>
            <div class="alert alert-info" role="alert">
                Akun anda sudah verifikasi.
            </div>
        <?php } ?>
        <form action="" method="post">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="namalengkap" value="<?php echo $dataakun[2] ?>" size="40" class="form-control"  placeholder="Nama Lengkap*" required>
            </div>
            <div class="form-group">
                <label>Asal</label>
                <input type="text" name="asal" value="<?php echo $dataakun[3] ?>" size="40" class="form-control" placeholder="Asal*" required>
            </div>
            <div class="form-group">
                <label>Nomor Telp/Hp</label>
                <input type="text" name="nope" value="<?php echo $dataakun[4] ?>" size="40" class="form-control" placeholder="Nomor Telp/Hp Yang Bisa Dihubungi*" required>
            </div>
            <div class="form-group">
               <label>E-Mail</label>
               <input type="email" name="email" value="<?php echo $dataakun[5] ?>" size="40" class="form-control"  placeholder="E-Mail*" readonly>
           </div>

           <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" size="40" class="form-control"  placeholder="Isi jika ingin mengubah password*" >
           </div>
           <div class="form-group submit-button">
            <input type="submit" name="ubahprofile" value="Ubah Profile" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
        </div>
    </form>
</div>
</div>
</div>




</div>

</div>
</div>
</section>

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

