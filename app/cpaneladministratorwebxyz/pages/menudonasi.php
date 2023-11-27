<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Menu Donasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ubah Pengaturan Donasi
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            if(isset($_POST['simpan']))
				                {    
                               
                                  $query="update tbmenudonasi set bahanmakanan='".$bahanmakanan."',nasibungkus='".$nasibungkus."',uang='".$uang."'";                    
								  $eksekusi=mysqli_query($con,$query);
                                  if($eksekusi)
                                  {
                                      echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses !</b>, Menu berhasil diubah.
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
                            $datalink=mysqli_fetch_array(mysqli_query($con,"select * from tbmenudonasi"));
                            ?>
                                <div class="form-group">
                                    <label>Bahan Makanan</label>
                                    <select name="bahanmakanan" id="" class="form-control">
                                        <option value="<?php echo $datalink[1] ?>"><?php echo $datalink[1] ?></option>
                                        <option value="N">N</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nasi Bungkus</label>
                                    <select name="nasibungkus" id="" class="form-control">
                                        <option value="<?php echo $datalink[2] ?>"><?php echo $datalink[2] ?></option>
                                        <option value="N">N</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Uang</label>
                                    <select name="uang" id="" class="form-control">
                                        <option value="<?php echo $datalink[3] ?>"><?php echo $datalink[3] ?></option>
                                        <option value="N">N</option>
                                        <option value="Y">Y</option>
                                    </select>
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