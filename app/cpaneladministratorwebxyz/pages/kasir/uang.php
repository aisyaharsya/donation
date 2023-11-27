<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">UANG</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Sedekah Uang.
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
                                        <th>Nama Anggota</th>
                                        <th>Nomor Telepon</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Uang</th>
                                        <th>Nama Pengirim</th>
                                        <th>Nomor Rekening</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select tbuang.idUang,tbanggota.nama,tbanggota.nope,tbuang.tanggal,tbuang.jumlahUang,tbuang.namaPengirim,tbuang.norek,tbuang.gambar,tbuang.status from tbuang inner join tbanggota on tbuang.idAnggota=tbanggota.idAnggota order by tbuang.idUang desc");
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['nope'] ?></td>
                                        <td><?php echo $data['tanggal'] ?></td>
                                        <td><?php echo number_format($data['jumlahUang'],2,',','.') ?></td>
                                        <td><?php echo $data['namaPengirim'] ?></td>
                                        <td><?php echo $data['norek'] ?></td>
                                        <td><img src="../gambar/buktitransfer/<?php echo $data['gambar'] ?>" alt="" style="width: 50px;height: 50px;"></td>
                                        <td><?php echo $data['status'] ?></td>
                                        <td>
                                            <a href='index.php?page=statusuang&edit=<?php echo $data['idUang'] ?>'><button class='btn btn-primary btn-xs'>Ubah Status</button></a>
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