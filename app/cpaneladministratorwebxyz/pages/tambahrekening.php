<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">SLIDE</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?page=rekening"><button class="btn btn-primary">Data Rekening</button></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            date_default_timezone_set('Asia/Jakarta');
                            if(isset($_POST['simpan']))
                                {    
                                    
                                    date_default_timezone_set('Asia/Jakarta');
                                    $idRek=mysqli_fetch_row(mysqli_query($con,"select max(idRekening) as idRekening from tbrekening"));
                                    $idRekSekarang=$idRek[0]+1;

                                    if(!empty($_FILES['logo']['tmp_name']) and !empty($_FILES['barcode']['tmp_name']))
                                    {
                                        $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                        if($ext1=='gif')
                                        {
                                            $ext1=".gif";
                                        }
                                        elseif ($ext1=='jpg') 
                                        {
                                            $ext1=".jpg";
                                        }
                                        elseif ($ext1=='jpeg') 
                                        {
                                            $ext1=".jpeg";
                                        }
                                        elseif($ext1=='png')
                                        {
                                            $ext1=".png";
                                        }
                                        else
                                        {
                                            $ext1="-";
                                        }

                                        $ext2=strtolower(substr($_FILES['barcode']['name'],-3));
                                        if($ext2=='gif')
                                        {
                                            $ext2=".gif";
                                        }
                                        elseif ($ext2=='jpg') 
                                        {
                                            $ext2=".jpg";
                                        }
                                        elseif ($ext2=='jpeg') 
                                        {
                                            $ext2=".jpeg";
                                        }
                                        elseif($ext2=='png')
                                        {
                                            $ext2=".png";
                                        }
                                        else
                                        {
                                            $ext2="-";
                                        }

                                        if ($ext1=='-' or $ext2=='-') {
                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                           move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/rekening/logo/".basename(($idRekSekarang).$ext1));
                                           move_uploaded_file($_FILES['barcode']['tmp_name'],"../../images/rekening/barcode/".basename(($idRekSekarang).$ext2));

                                           $query=mysqli_query($con,"insert into tbrekening values(Null,'".$bank."','".$atasnama."','".$norek."','".$idRekSekarang.$ext1."','".$idRekSekarang.$ext2."')");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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
                                    }elseif(!empty($_FILES['logo']['tmp_name']) and empty($_FILES['barcode']['tmp_name'])){
                                        $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                        if($ext1=='gif')
                                        {
                                            $ext1=".gif";
                                        }
                                        elseif ($ext1=='jpg') 
                                        {
                                            $ext1=".jpg";
                                        }
                                        elseif ($ext1=='jpeg') 
                                        {
                                            $ext1=".jpeg";
                                        }
                                        elseif($ext1=='png')
                                        {
                                            $ext1=".png";
                                        }
                                        else
                                        {
                                            $ext1="-";
                                        }

                                        if ($ext1=='-') {
                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                           move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/rekening/logo/".basename(($idRekSekarang).$ext1));

                                           $query=mysqli_query($con,"insert into tbrekening values(Null,'".$bank."','".$atasnama."','".$norek."','".$idRekSekarang.$ext1."','')");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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
                                elseif(isset($_POST['edit']))
                                {
                                    if(!empty($_FILES['logo']['tmp_name']) and !empty($_FILES['barcode']['tmp_name']))
                                    { 
                                        if(file_exists("../../images/rekening/logo/$logo") and file_exists("../../images/rekening/barcode/$barcode")){
                                            unlink("../../images/rekening/logo/$logo");
                                            unlink("../../images/rekening/barcode/$barcode");
                                        }
                                        
                                        $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                        if($ext1=='gif')
                                        {
                                            $ext1=".gif";
                                        }
                                        elseif ($ext1=='jpg') 
                                        {
                                            $ext1=".jpg";
                                        }
                                        elseif ($ext1=='jpeg') 
                                        {
                                            $ext1=".jpeg";
                                        }
                                        elseif($ext1=='png')
                                        {
                                            $ext1=".png";
                                        }
                                        else
                                        {
                                            $ext1="-";
                                        }

                                        $ext2=strtolower(substr($_FILES['barcode']['name'],-3));
                                        if($ext2=='gif')
                                        {
                                            $ext2=".gif";
                                        }
                                        elseif ($ext2=='jpg') 
                                        {
                                            $ext2=".jpg";
                                        }
                                        elseif ($ext2=='jpeg') 
                                        {
                                            $ext2=".jpeg";
                                        }
                                        elseif($ext2=='png')
                                        {
                                            $ext2=".png";
                                        }
                                        else
                                        {
                                            $ext2="-";
                                        }

                                        if ($ext1=='-' or $ext2=='-') {
                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{

                                           move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/rekening/logo/".basename(($_GET['data_id']).$ext1));
                                           move_uploaded_file($_FILES['barcode']['tmp_name'],"../../images/rekening/barcode/".basename(($_GET['data_id']).$ext2));

                                           $query=mysqli_query($con,"update tbrekening set bank='".$bank."', atasNama='".$atasnama."',nomorRek='".$norek."',logo='".$_GET['data_id'].$ext1."',barcode='".$_GET['data_id'].$ext2."' where idRekening=".$_GET['data_id']."");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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


                                    }elseif(!empty($_FILES['logo']['tmp_name']) and empty($_FILES['barcode']['tmp_name'])){
                                        if(file_exists("../../images/rekening/logo/$logo")){
                                            unlink("../../images/rekening/logo/$logo");
                                        }
                                         
                                          $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                            if($ext1=='gif')
                                            {
                                                $ext1=".gif";
                                            }
                                            elseif ($ext1=='jpg') 
                                            {
                                                $ext1=".jpg";
                                            }
                                            elseif ($ext1=='jpeg') 
                                            {
                                                $ext1=".jpeg";
                                            }
                                            elseif($ext1=='png')
                                            {
                                                $ext1=".png";
                                            }
                                            else
                                            {
                                                $ext1="-";
                                            }



                                        if ($ext1=='-') {
                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                           move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/rekening/logo/".basename(($_GET['data_id']).$ext1));

                                           $query=mysqli_query($con,"update tbrekening set bank='".$bank."', atasNama='".$atasnama."',nomorRek='".$norek."',logo='".$_GET['data_id'].$ext1."' where idRekening=".$_GET['data_id']."");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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

                                    }elseif(empty($_FILES['logo']['tmp_name']) and !empty($_FILES['barcode']['tmp_name'])){
                                        if (file_exists("../../images/rekening/barcode/$barcode") and $barcode!=""){
                                            unlink("../../images/rekening/barcode/$barcode");
                                        }
                                        

                                        $ext2=strtolower(substr($_FILES['barcode']['name'],-3));
                                        if($ext2=='gif')
                                        {
                                            $ext2=".gif";
                                        }
                                        elseif ($ext2=='jpg') 
                                        {
                                            $ext2=".jpg";
                                        }
                                        elseif ($ext2=='jpeg') 
                                        {
                                            $ext2=".jpeg";
                                        }
                                        elseif($ext2=='png')
                                        {
                                            $ext2=".png";
                                        }
                                        else
                                        {
                                            $ext2="-";
                                        }

                                        if ($ext2=='-') {
                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                           move_uploaded_file($_FILES['barcode']['tmp_name'],"../../images/rekening/barcode/".basename(($_GET['data_id']).$ext2));

                                           $query=mysqli_query($con,"update tbrekening set bank='".$bank."', atasNama='".$atasnama."',nomorRek='".$norek."',barcode='".$_GET['data_id'].$ext2."' where idRekening=".$_GET['data_id']."");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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

                                    }else{
                                         $query=mysqli_query($con,"update tbrekening set bank='".$bank."', atasNama='".$atasnama."',nomorRek='".$norek."' where idRekening=".$_GET['data_id']."");

                                            if($query){
                                                echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses </b> Rekening Berhasil Ditambah. 
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

                            if(isset($_GET['data_id']))
                                $data=mysqli_fetch_row(mysqli_query($con,"select * from tbrekening where idRekening='".$_GET['data_id']."'"));
				                
				        ?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <input class="form-control" name="idRekening" type="hidden" value="<?php echo isset($_GET['data_id'])?$_GET['data_id']:''; ?>">
                                <input class="form-control" name="barcode" type="hidden" value="<?php echo isset($data[5])?$data[5]:''; ?>">
                                <input class="form-control" name="logo" type="hidden" value="<?php echo isset($data[4])?$data[4]:''; ?>">
                                <div class="form-group">
                                    <label>Bank</label>
                                    <input class="form-control" name="bank" type="text" placeholder="Nama Bank" required value="<?php echo isset($data[1])?$data[1]:''; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input class="form-control" name="atasnama" type="text" placeholder="Atas Nama" required value="<?php echo isset($data[2])?$data[2]:''; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                    <input class="form-control" name="norek" type="text" placeholder="Nomor Rekening" required value="<?php echo isset($data[3])?$data[3]:''; ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" name="logo" type="file" placeholder="Logo" accept="image/png,image/gif,image/jpeg,image/jpg" <?php echo isset($_GET['data_id'])?'':'required'; ?>>

                                    <?php
                                    if(isset($_GET['data_id']))
                                        echo "<img src='../../images/rekening/logo/$data[4]' alt='' style='width:100px;'>";
                                    ?>
                                </div>


                                 <div class="form-group">
                                    <label>Barcode</label>
                                    <input class="form-control" name="barcode" type="file" placeholder="Logo" accept="image/png,image/gif,image/jpeg,image/jpg">

                                    <?php
                                    if(isset($_GET['data_id']))
                                        if ($data[5]!="") {
                                           echo "<img src='../../images/rekening/barcode/$data[5]' alt='' style='width:100px;'>";
                                        }
                                        
                                    ?>
                                </div>

                                 <input onclick="change_url()" type="submit" class="btn btn-info" value="Simpan" name="<?php echo isset($_GET['data_id'])?'edit':'simpan'; ?>"> <button type="reset" name="batal" class="btn btn-warning">Batal</button>
                            </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->