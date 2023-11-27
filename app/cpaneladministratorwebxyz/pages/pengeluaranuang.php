<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">PENGELUARAN UANG</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Sisa Uang
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
                                        <b>Sukses !</b>, Pengeluaran Uang Berhasi Dibuat.
                                     </div>";
                            }
                        ?>
                        
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sisa Uang</th>                                     
                                        <th>Aksi</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                       $eksekusi=mysqli_query($con,"select * from tbsisauang order by idSisaUang desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>                                        
                                        <td><?php echo number_format($data['sisaUang'],2,',','.')  ?></td>
                                        <td><a href='index.php?page=inputpengeluaranuang&sisauang=<?php echo $data['idSisaUang']; ?>'><button class='btn btn-primary btn-xs'>Masukkan Pengeluaran Uang</button></a></td>
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

        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengeluaran Uang
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>                                     
                                        <th>Jumlah Uang</th>                                     
                                        <th>Keterangan</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                       $eksekusi=mysqli_query($con,"select * from tbpengeluaranuang order by idPengeluaranUang desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>   
                                        <td><?php echo date('d F Y', strtotime($data['tanggal'])); ?></td>
                                        <td><?php echo number_format($data['jumlahUang'],2,',','.')  ?></td>
                                        <td><?php echo $data['keterangan'] ?></td>
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



    </div>
</div>
<!-- /.row -->
