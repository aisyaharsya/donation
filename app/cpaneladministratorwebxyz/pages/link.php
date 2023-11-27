<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">link Web</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ubah Link Web
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            if(isset($_POST['simpan']))
				                {    
                                $adaData=mysqli_num_rows(mysqli_query($con,"select * from tblinkweb"));
                                if($adaData > 0)
                                {
                                    $query="update tblinkweb set link='".$link."'";
                                }else
                                {
                                    $query="insert into tblinkweb values(null,'".$link."')";
                                }
                                                         
								  $eksekusi=mysqli_query($con,$query);
                                  if($eksekusi)
                                  {
                                      echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses !</b>, Link berhasil dibuat.
                                     </div>";
                                  }else
                                  {
                                      echo "<div class='alert alert-danger'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Gagal!</b>, Tentang web gagal diubah.
                                     </div>";
                                  }
									   
				                }

				                
				        ?>
                            <form role="form" action="" method="post">
                            <?php
                            $datalink=mysqli_fetch_array(mysqli_query($con,"select * from tblinkweb"));
                            ?>
                                <div class="form-group">
                                    <label>Link (Dengan Http atau Https)</label>
                                    <input type="text" class="form-control" name="link" placeholder="https://www.linkweb.com/" value="<?php echo $datalink[1] ?>" required>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
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