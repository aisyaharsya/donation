<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">RIWAYAT DONASI</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                if(isset($_GET['anggota'])) :
                    $data=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where idAnggota='".$_GET['anggota']."'"));
                ?>
                Data Riwayat Sedekah  <b><?php echo $data[2] ?></b> || <a href="index.php?page=dataanggota">Kembali</a>
                <?php endif;?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tanggal Donasi</th>
                                        <th>Judul Campaign</th>
                                        <th>Nominal</th>
                                        <th>Kode Unik</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($_GET['anggota'])) {
                                        $eksekusi=mysqli_query($con,"select bdg.*,gd.judul from tbberdonasigalangdana as bdg inner join tbgalangdana gd on(gd.idGalangDana=bdg.idGalangDana) where bdg.idAnggota=".$_GET['anggota']." order by  bdg.idBerdonasiGalangDana desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                            ?>
                                            <tr>
                                                <td><?php echo date('d M Y',strtotime($data[13])) ?></td>
                                                <td><?php echo $data[17] ?></td>
                                                <td>Rp. <?php echo number_format($data[12],2,',','.'); ?></td>
                                                <td>Rp. <?php echo number_format($data[3],2,',','.'); ?></td>
                                                <td>
                                                <?php if ($data[15]=="P") {
                                                    $ket="<span class='badge badge-primary'>Pending</span>";
                                                }elseif ($data[15]=="N") {
                                                    $ket="<span class='badge badge-danger'>Ditolak</span>";
                                                }elseif ($data[15]=="K"){
                                                    $ket="<span class='badge badge-warning'>Konfirmasi</span>";
                                                }elseif ($data[15]=="Y"){
                                                    $ket="<span class='badge badge-success'>Diterima</span>";
                                                } ?>

                                                <?php echo $ket; ?></td>
                                            </tr>
                                    <?php } }?>
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