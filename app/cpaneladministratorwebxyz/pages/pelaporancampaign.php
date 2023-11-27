<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DATA LAPORAN CAMPAIGN</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dafar Data Laporan Campaign
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Campaign</th>
                                        <th>Jumlah Laporan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select lgd.idGalangDana,gd.judul,gd.slug,count(lgd.idLaporanGalangDana) as jumlah from tblaporangalangdana as lgd inner join tbgalangdana as gd on(gd.idGalangDana=lgd.idGalangDana) group by lgd.idGalangDana");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['judul'] ?></td>
                                        <td><?php echo $data['jumlah']  ?></td>
                                        <td>
                                            <a href='index.php?page=detaillaporan&campaign=<?php echo $data['idGalangDana'] ?>&href=<?php echo $data['slug'] ?>'><button class='btn btn-primary btn-xs'>Detail</button></a>
                                            <a href='index.php?page=detailgalangdana&href=<?php echo $data['slug'] ?>'><button class='btn btn-info btn-xs'>Lihat Campaign</button></a>
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