<?php include"header.php";
$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($dataakun[8]=="N") {
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
                <h4>Tambah Rekening</h4><hr>
                <?php  
                   if(isset($_POST['simpan']))
                     {

                        date_default_timezone_set('Asia/Jakarta');
                        $query=mysqli_query($con,"INSERT INTO tbrekeningmember VALUES(NULL,".$id.",'".$bank."','".$nama."','".$norek."')");
                        if($query){
                            echo "<div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Sukses </b> Rekening telah ditambah, silahkan kembali. 
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
              <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" size="40" class="form-control" value="<?php echo $dataakun[0] ?>">
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="bank" size="40" class="form-control" placeholder="Bank" required>
                </div>

                <div class="form-group">
                    <label>Atas Nama</label>
                    <input type="text" name="nama" size="40" class="form-control"  placeholder="Atas Nama*" required>
                </div>

                 <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" name="norek" size="40" class="form-control" placeholder="Nomor Rekening*" required>
                </div>

            <div class="form-group submit-button">
                <input type="submit" name="simpan" value="Tambah Rekening" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                <a href="tarikdanagalangdana?href=<?php echo $_GET['link']; ?>" class="btn btn-danger" style="border:none; margin: 20px 0 0 0">Kembali</a>
            </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>

<?php include"footer.php"; ?>

