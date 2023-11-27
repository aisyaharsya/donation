<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pelaporan Campaign</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pelaporan Campaign
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            if(isset($_GET['href']))
				                {    

                                $query="update tblaporangalangdana set status='Y' where idLaporanGalangDana=".$_GET['href']."";
                                $eksekusi=mysqli_query($con,$query);
                                  
									   
				                }

				                
				        ?>
                            <form role="form" action="" method="post">
                            <?php
                            $datalink=mysqli_fetch_array(mysqli_query($con,"select lgd.*,gd.judul as judulgalangdana,gd.slug from tblaporangalangdana as lgd inner join tbgalangdana as gd on(gd.idGalangDana=lgd.idGalangDana) where lgd.idLaporanGalangDana=".$_GET['href'].""));
                            ?>
                                <div class="form-group">
                                    <label>Nama Campaign</label>
                                    <input type="text" class="form-control" name="link" value="<?php echo $datalink['judulgalangdana'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Judul Laporan</label>
                                    <input type="text" class="form-control" name="link" value="<?php echo $datalink['judul'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Isi</label>
                                    <textarea name="" id="editor1"><?php echo $datalink['isi'] ?></textarea>
                                </div>

                                <a href="index.php?page=detailgalangdana&href=<?php echo $datalink['slug'] ?>" class="btn btn-primary">Lihat Campaign</a>
                            </form>
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