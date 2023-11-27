<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DATA SLIDE</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?page=slide"><button class="btn btn-primary">Tambah Slide</button></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if(isset($_GET['pesan'])=='success')
                            {
                                echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses !</b>, Artikel berhasil diubah.
                                     </div>";
                            }
                        ?>

                        <?php 
                            if(isset($_GET['data_id']))
                            {
                                 $data=mysqli_fetch_row(mysqli_query($con,"select * from tbslide where idSlide='".$_GET['data_id']."'"));
                                 $gambar=$data[3];
                                unlink("../gambar/slide/$gambar");
                                mysqli_query($con,"delete from tbslide where idSlide='".$_GET['data_id']."'");
                                 echo "
                                    <script>
                                    location.assign('index.php?page=slidedata&pesandelete=successdelete');
                                    </script>
                                    ";
                            }

                             if(isset($_GET['pesandelete'])=='successdelete')
                            {
                                echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses !</b>, Artikel berhasil dihapus.
                                     </div>";
                            }
                        ?>
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbslide");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data[1] ?></td>
                                        <td><?php echo substr(strip_tags($data[2]),0,30)  ?></td>
                                        <td>
                                            <a href='index.php?page=slide&data_id=<?php echo $data[0] ?>'><button class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' title="Edit"></button><span></a>
                                            <a href="index.php?page=slidedata&data_id=<?php echo $data[0] ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                            <button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button></a>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                    <!-- /.col-lg-12 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->