<?php include"header.php";
$data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($data[8]=="N") {
    header("Location: galangdana");
    exit(); 
}
date_default_timezone_set('Asia/Jakarta');
$data=mysqli_fetch_row(mysqli_query($con,"select bgd.*,gd.* from tbgalangdana as gd inner join tbberitagalangdana as bgd on(bgd.idGalangDana=gd.idGalangDana) where gd.slug='".$_GET['href']."'"));
?>
<!--================Event Details Area =================-->
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>Edit Berita</h4><hr>
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
                            $query=mysqli_query($con,"UPDATE tbberitagalangdana SET judul='".$judulberita."', isi='".$isi."' where idBeritaGalangDana=".$id."");
                            if($query){
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses </b> Berita telah diedit, silahkan kembali untuk melihat perubahan. 
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
                <div class="form-group">
                    <label>Judul Campaign</label>
                    <input type="text" name="judul" size="40" class="form-control" value="<?php echo $data[7] ?>"  placeholder="Judul*" readonly>
                    <input type="hidden" name="id" size="40" class="form-control" value="<?php echo $data[0] ?>"  placeholder="Judul*" readonly>
                </div>

                 <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judulberita" size="40" class="form-control" value="<?php echo $data[3] ?>"  placeholder="Judul*" required>
                </div>

                <div class="form-group">
                    <label>Isi</label>
                    <textarea id="editor1" name="isi" required><?php echo $data[4]; ?></textarea>
                </div>
            <div class="form-group submit-button">
                <input type="submit" name="simpan" value="Edit Berita" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                <a href="detailgalangdana?href=<?php echo $_GET['href']; ?>" class="btn btn-danger" style="border:none; margin: 20px 0 0 0">Kembali</a>
            </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>
<!--================End Event Details Area =================-->
<?php include"footer.php"; ?>

