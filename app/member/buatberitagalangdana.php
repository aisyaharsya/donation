<?php include"header.php";
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($data[8]=="N") {
    header("Location: galangdana");
    exit(); 
}
 $data=mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['href']."'"));
?>
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>Buat Berita</h4><hr>
                <?php  
                   if(isset($_POST['simpan']))
                     {

                        if ($isi=="") {
                            echo "<div class='alert alert-danger'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Gagal </b> Isi tidak boleh kosong. 
                            </div>";
                        }else{
                            date_default_timezone_set('Asia/Jakarta');
                            $query=mysqli_query($con,"INSERT INTO tbberitagalangdana VALUES(NULL,".$id.",'".date('Y-m-d')."','".$judulberita."','".$isi."')");
                            if($query){
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses </b> Berita telah dibuat <a href='member'>Kembali ke halaman utama</a>
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

                ?>
              <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" size="40" class="form-control" value="<?php echo $data[0] ?>">
                <input type="hidden" name="bannertemp" size="40" class="form-control" value="<?php echo $data[6] ?>">
                <div class="form-group">
                    <label>Judul Campaign</label>
                    <input type="text" name="judul" size="40" class="form-control" value="<?php echo $data[2] ?>"  placeholder="Judul*" readonly>
                    <input type="hidden" name="id" size="40" class="form-control" value="<?php echo $data[0] ?>"  placeholder="Judul*" readonly>
                </div>

                 <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judulberita" size="40" class="form-control"  placeholder="Judul*">
                </div>

                <div class="form-group">
                    <label>Isi</label>
                    <textarea id="editor1" name="isi" required></textarea>
                </div>
            <div class="form-group submit-button">
                <input type="submit" name="simpan" value="Buat Berita" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                <a href="detailgalangdana?href=<?php echo $_GET['href']; ?>" class="btn btn-danger" style="border:none; margin: 20px 0 0 0">Kembali</a>
            </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>

<?php include"footer.php"; ?>

