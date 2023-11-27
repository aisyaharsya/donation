<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sponsor</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row" id="data">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Tambah Sponsor</a>
           </div>


           <!-- Modal -->
           <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Sponsor</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama Sponsor</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="file" class="form-control" name="logo" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" name="simpan" class="btn btn-primary" value="tambah">
                    </div>
                </form>
            </div>

        </div>
    </div>




    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">



               <?php  
               if(isset($_POST['simpan']))
               {
                date_default_timezone_set('Asia/Jakarta');
                $idsponsor=mysqli_fetch_row(mysqli_query($con,"select max(idSponsor) as idSponsorTemp from tbsponsor"));
                $idSpnsorSekarang=$idsponsor[0]+1;


                if(!empty($_FILES['logo']['tmp_name']))
                { 
                    $ext=strtolower(substr($_FILES['logo']['name'],-3));
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

                        move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/sponsor/".basename(($idSpnsorSekarang).$ext));

                        $query=mysqli_query($con,"insert into tbsponsor values(Null,'".$nama."','".$idSpnsorSekarang.$ext."')");
                        if($query){
                            echo "<div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Sukses </b> sponsor berhasil dibuat. 
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


            ?>




            <?php 
            if(isset($_GET['data_id']))
            {
                $datasponsor=mysqli_fetch_array(mysqli_query($con,"select * from tbsponsor where idSponsor=".$_GET['data_id'].""));

                if (file_exists("../../images/sponsor/".$datasponsor[2])) {
                    unlink("../../images/sponsor/".$datasponsor[2]);
                }

                $query=mysqli_query($con,"delete from tbsponsor where idSponsor=".$_GET['data_id']."");
                if($query){
                    echo "<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Sukses </b> Sponsor Dihapus 
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



            if(isset($_POST['edit']))
            {


                if(!empty($_FILES['logo']['tmp_name']))
                { 
                    if (file_exists("../../images/sponsor/".$gambarTemp)) {
                        unlink("../../images/sponsor/".$gambarTemp);
                    }
                    $ext=strtolower(substr($_FILES['logo']['name'],-3));
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

                        move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/sponsor/".basename(($id).$ext));

                        $query=mysqli_query($con,"update tbsponsor set nama='".$nama."',logo='".$id.$ext."' where idSponsor=".$id."");
                        if($query){
                            echo "<div class='alert alert-success'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Sukses </b> sponsor berhasil diubah. 
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
                    $query=mysqli_query($con,"update tbsponsor set nama='".$nama."',logo='".$gambarTemp."' where idSponsor=".$id."");
                    if($query){
                        echo "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>
                        <i class='ace-icon fa fa-times'></i>
                        </button>
                        <b>Sukses </b> sponsor berhasil diubah. 
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
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Proses-->
                    <?php 
                    $eksekusi=mysqli_query($con,"select * from tbsponsor order by idSponsor desc");
                    $no=1;
                    while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data[1]  ?></td>
                            <td><img src="../../images/sponsor/<?php echo $data[2]  ?>" alt="" width="50"></td>
                            <td>
                                <a href="index.php?page=sponsor&data_id=<?php echo $data[0] ?>" onclick="return confirm('Yakin ingin menghapus?')">
                                    <button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button></a>
                                    <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data[0] ?>" data-backdrop="static" data-keyboard="false"><span class='glyphicon glyphicon-pencil'></span></a>
                                </td>
                            </tr>


                            
                            <!-- Modal -->
                            <div id="myModal<?php echo $data[0] ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Ubah Sponsor</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Nama Sponsor</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $data[1] ?>" required>
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $data[0] ?>" required>
                                            <input type="hidden" class="form-control" name="gambarTemp" value="<?php echo $data[2] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Logo</label>
                                            <input type="file" class="form-control" name="logo" accept="image/png,image/gif,image/jpeg,image/jpg">
                                        </div>

                                        <img src="../../images/sponsor/<?php echo $data[2]  ?>" alt="" width="100" class="mt-5">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" name="edit" class="btn btn-primary" value="Edit">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>



                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.col-lg-12(nested) -->
</div>
<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
</div>
<!-- /.row -->