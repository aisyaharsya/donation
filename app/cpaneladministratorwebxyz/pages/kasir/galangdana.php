<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Galang Dana</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Campaign Yang Telah Dibuat.
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
                                        <b>Sukses !</b>, Status Sedekah Sudah Diupdate.
                                     </div>";
                            }
                        ?>
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Judul Campaign</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbgalangdana order by idGalangDana desc");
                                        $no=1;
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr><td><?php echo $no++;?></td>
                                    <td><?php echo date('d F Y', strtotime($data[7]));?></td>
                                    <td><?php echo $data[2]; ?></td>
                                    <!--<td><?php echo substr(strip_tags($data[3]), 0,10);  ?></td>-->
                                    <td><?php echo number_format($data[5],2,',','.'); ?></td>
                                    <td><?php echo date('d F Y', strtotime($data[8])); ?></td>
                                    <?php  
                                      $tgl1 = new DateTime($data[7]);
                                      $tgl2 = new DateTime($data[8]);
                                      $selisih= $tgl2->diff($tgl1)->days + 1;
                                    ?>
                                    <!--<td><?php echo $selisih; ?></td>-->
                                    <?php if ($data[9]=="P"){ ?>
                                      <td><span class="label label-info">Pending</span></td>
                                    <?php }elseif ($data[9]=="N") { ?>
                                      <td><span class="label label-danger">Tolak</span></td>
                                    <?php }elseif ($data[9]=="Y") { ?>
                                      <td><span class="label label-success">Tayang</span></td>
                                    <?php }else{ ?>
                                      <td><span class="label label-primary">Selesai</span></td>
                                    <?php } ?>
                                    <td><a href="index.php?page=detailgalangdana&href=<?php echo $data[3]; ?>" class="btn btn-info">Detail</a></td>
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