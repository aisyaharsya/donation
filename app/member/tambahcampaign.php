<?php include"header.php";
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($data[8]=="N") {
    header("Location: galangdana");
    exit(); 
}
?>
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>Buat Campaign</h4><hr>
                <?php  
                     if(isset($_POST['simpan']))
                     {
                        date_default_timezone_set('Asia/Jakarta');
                        $idgalang=mysqli_fetch_row(mysqli_query($con,"select max(idGalangDana) as idGalangDanaTemp from tbgalangdana"));
                        $idGalangDanaSekarang=$idgalang[0]+1;
                        if($deskripsi==""){
                            echo "<div class='alert alert-danger'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Gagal </b> Deskripsi Masih Kosong. 
                            </div>";
                        }else{

                             if(!empty($_FILES['banner']['tmp_name']))
                               { 
                                $ext=strtolower(substr($_FILES['banner']['name'],-3));
                                if($ext=='gif')
                                {
                                    $ext=".gif";
                                }
                                elseif ($ext=='jpg') 
                                {
                                    $ext=".jpg";
                                }
                                elseif ($ext=='jpeg') 
                                {
                                    $ext=".jpeg";
                                }
                                elseif($ext=='png')
                                {
                                    $ext=".png";
                                }
                                else
                                {
                                    $ext="-";
                                }

                                if ($ext=='-') {
                                   
                                    echo "<div class='alert alert-danger'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Gagal </b> Format file tidak didukung. 
                                    </div>";

                                }else{
                                    
                                    move_uploaded_file($_FILES['banner']['tmp_name'],"../images/banner/".basename(($idGalangDanaSekarang).$ext));
                                    if(isset($_POST['unlimited'])){
                                        $unlimited="Y";
                                    }else{
                                        $unlimited="N";
                                    }

                                    $query=mysqli_query($con,"insert into tbgalangdana values(Null,".$data[0].",'".$judul."','".strtolower(str_replace(' ', '-',$judul."-".$idGalangDanaSekarang))."','".$deskripsi."',".$jumlah.",'".$idGalangDanaSekarang.$ext."','".date('Y-m-d')."','".date('Y-m-d',strtotime($tanggalberakhir))."','P','".$unlimited."')");
                                    if($query){
                                        echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses </b> Data anda akan diproses, untuk melihat apakah data anda sudah kami terima, dapat melakukan pengecekan di menu <b>Dashboard</b>  <a href='$link[1]member/member'>Kembali ke halaman utama</a>
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
                        }
                    }
                }


                    ?>
              <form action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                                <label>Judul Campaign*</label>
                                <input type="text" name="judul" size="40" class="form-control"  placeholder="Judul*" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi*</label>
                                <textarea id="editor1" name="deskripsi" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah*</label>
                                <input type="text" name="jumlah" size="20" class="form-control" placeholder="Jumlah Uang*" onkeypress="return hanyaAngka(event)" required>
                            </div>

                            <script>
                                function hanyaAngka(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                                        return false;
                                    return true;
                                }
                            </script>
                            <div class="form-group">
                                <label>Tanggal Berakhir*</label>
                                <input type="date" name="tanggalberakhir" size="40" class="form-control" placeholder="Tanggal Kirim" value="<?php echo date('Y-m-d'); ?>" required>
                                 <div class="form-check">
                                    <input type="checkbox" name="unlimited" class="form-check-input ml-1" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1"> Ceklis Jika Unlimited Waktu</label>
                                  </div>
                            </div>
                             <div class="form-group">
                                <label>Banner*</label>
                                <input type="file" name="banner" value="" size="40" class="form-control" placeholder="File Banner" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                            </div>
                            <div>
                                <small>
                                    <p style="color: red;">*) wajib diisi</p>
                                </small>
                            </div>
                        <div class="form-group submit-button">
                            <input type="submit" name="simpan" value="Buat Campaign" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                            <a href="<?php echo $link[1] ?>member/member" class="btn btn-danger" style="border:none; margin: 20px 0 0 0">Kembali</a>
                        </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>

<?php include"footer.php"; ?>

