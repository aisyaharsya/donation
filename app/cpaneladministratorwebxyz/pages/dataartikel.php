<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DATA ARTIKEL</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?page=artikel"><button class="btn btn-primary">Tambah Artikel</button></a>
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
                                 $data=mysqli_fetch_row(mysqli_query($con,"select * from tbartikel where idArtikel='".$_GET['data_id']."'"));
                                 $gambar=$data[4];
                                unlink("../gambar/artikel/$gambar");
                                mysqli_query($con,"delete from tbartikel where idArtikel='".$_GET['data_id']."'");
                                 echo "
                                    <script>
                                    location.assign('index.php?page=artikeldata&pesandelete=successdelete');
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
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbartikel");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d M y', strtotime($data[1])) ?></td>
                                        <td><?php echo $data[2] ?></td>
                                        <td><?php echo substr(strip_tags($data[3]),0,30)  ?></td>
                                        <td>
                                            <a href='index.php?page=artikel&data_id=<?php echo $data[0] ?>'><button class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil' title="Edit"></button><span></a>
                                            <a href="index.php?page=artikeldata&data_id=<?php echo $data[0] ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
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