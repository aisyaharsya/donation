<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">DETAIL ANGGOTA BARU</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Member
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                        if(isset($_GET['anggota']))
                            {  
                                mysqli_query($con,"update tbanggota set status='Dilihat' where idAnggota='".$_GET['anggota']."'");
                                
                            }
                            
                    ?>


                        <?php 
                            $query=mysqli_query($con,"select * from tbanggota where idAnggota='".$_GET['anggota']."'");
                            while($data=mysqli_fetch_array($query)){
                        ?>
                        <!--Proses-->
                        <form action="" method="post">
                            <div class="col-md-12">
                                <input type="hidden" name="idAnggota" value="<?php echo $data['idAnggota']; ?>" size="40" class="form-control">
                                <label>Nama Lengkap</label>
                                <input type="text" name="namalengkap" value="<?php echo $data['nama']; ?>" size="40" class="form-control" required readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Asal</label>
                                <input type="text" name="asal" value="<?php echo $data['asal']; ?>" size="40" class="form-control" required readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Nomor Telepon</label>
                                <input type="text" name="nope" value="<?php echo $data['nope']; ?>" size="40" class="form-control" required readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $data['alamatEmail']; ?>" size="40" class="form-control" required readonly>
                            </div>
                            <div class="col-xs-12 submit-button">
                                <a href="index.php?page=dataanggota" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">Lihat Data Anggota </a>
                            </div>
                        </form>
                        <?php } ?>
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


