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
                <a href="index.php?page=detailgalangdana&href=<?php echo $_GET['href'] ?>" class="btn btn-primary">Lihat Campaign</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Campaign</th>
                                        <th>Judul Laporan</th>
                                        <th>Isi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select gd.judul,gd.slug,lgd.judul as judullaporan,lgd.isi from tblaporangalangdana as lgd inner join tbgalangdana as gd on(gd.idGalangDana=lgd.idGalangDana) where lgd.idGalangDana=".$_GET['campaign']."");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['judul'] ?></td>
                                        <td><?php echo $data['judullaporan']  ?></td>
                                        <td><?php echo $data['isi']  ?></td>
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