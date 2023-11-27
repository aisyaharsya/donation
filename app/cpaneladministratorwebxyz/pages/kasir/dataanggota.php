<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DATA ANGGOTA</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Akun Anggota
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tanggal Daftar</th>
                                        <th>Nama</th>
                                        <th>Asal</th>
                                        <th>Nomor Telp/Hp</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbanggota order by idAnggota desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo date('d F Y', strtotime($data[1])); ?></td>
                                        <td><?php echo $data[2]; ?></td>
                                        <td><?php echo $data[3]; ?></td>
                                        <td><?php echo $data[4]; ?></td>
                                        <td><?php echo $data[5]; ?></td>
                                        <td>
                                            <a href='index.php?page=riwayatdonasi&anggota=<?php echo $data[0] ?>'><button class='btn btn-primary btn-xs'>Lihat Riwayat Donasi</button></a>
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