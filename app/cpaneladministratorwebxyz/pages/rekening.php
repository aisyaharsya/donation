<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">REKENING</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
			<a href="index.php?page=tambahrekening"><button class="btn btn-primary">Tambah Rekening</button></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                        if(isset($_GET['data_id']))
                        {    

                            $eksekusi=mysqli_query($con,"delete from tbrekening where idRekening=".$_GET['data_id']."");
                            if($eksekusi)
                            {
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses !</b>, Berhasil dihapus.
                                </div>";
                            }else
                            {
                                echo "<div class='alert alert-danger'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Gagal!</b>, Terjadi kesalahan, coba kembali
                                </div>";
                          }

                      }

                    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bank</th>
                            <th>Atas Nama</th>
                            <th>Nomor Rekening</th>
                            <th>Logo</th>
                            <th>Barcode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Proses-->
                        <?php 
                            $eksekusi=mysqli_query($con,"select * from tbrekening order by idRekening desc");
                            $no=1;
                            while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data[1] ?></td>
                            <td><?php echo $data[2] ?></td>
                            <td><?php echo $data[3] ?></td>
                            <td><img src="../../images/rekening/logo/<?php echo $data[4] ?>" alt="" width="100"></td>
                            <td><?php if($data[5]==""){
                                echo"-";
                            }else{ ?>
                                <img src="../../images/rekening/barcode/<?php echo $data[5]; ?>" alt="" width="100">

                            <?php }?></td>
                            <td><a href="index.php?page=tambahrekening&data_id=<?php echo $data[0]; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                <a href="index.php?page=rekening&data_id=<?php echo $data[0]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
</div>
<!-- /.row -->