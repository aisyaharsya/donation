<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DATA PROSES LOKASI</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 50px;">
                Data Lokasi Yang Telah Dikunjungi
                <a href="index.php?page=datausulanlokasi"><button class="btn btn-primary pull-right">Data Usulan Lokasi </button></a>
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
                                        <b>Sukses !</b>, Proses Edit Berhasil.
                                     </div>";
                            }
                        ?>

                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tblokasiproses order by idLokasiProses desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d M y', strtotime($data[1])) ?></td>
                                        <td><?php echo $data[2] ?></td>
                                        <td><?php echo $data[3] ?></td>
                                        <td>
                                                <a href='index.php?page=prosesusulanlokasi&edit=<?php echo $data[0] ?>'><button class='btn btn-primary btn-xs'>Ubah</button></a>
                                           
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