<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">TENTANG KAMI</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ubah Tentang Web Disini
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            if(isset($_POST['simpan'])){ 
                                if(!empty($_FILES['logo']['tmp_name']) and !empty($_FILES['favicon']['tmp_name']))
                                    {
                                        $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                        if($ext1=='gif')
                                        {
                                            $ext1=".gif";
                                        }
                                        elseif ($ext1=='jpg') 
                                        {
                                            $ext1=".jpg";
                                        }
                                        elseif ($ext1=='jpeg') 
                                        {
                                            $ext1=".jpeg";
                                        }
                                        elseif($ext1=='png')
                                        {
                                            $ext1=".png";
                                        }
                                        else
                                        {
                                            $ext1="-";
                                        }

                                        $ext2=strtolower(substr($_FILES['favicon']['name'],-3));
                                        if($ext2=='gif')
                                        {
                                            $ext2=".gif";
                                        }
                                        elseif ($ext2=='jpg') 
                                        {
                                            $ext2=".jpg";
                                        }
                                        elseif ($ext2=='jpeg') 
                                        {
                                            $ext2=".jpeg";
                                        }
                                        elseif($ext2=='png')
                                        {
                                            $ext2=".png";
                                        }
                                        else
                                        {
                                            $ext2="-";
                                        }

                                        if ($ext1=='-' or $ext2=='-') {
                                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                            $faviconnama="favicon".$ext2;
                                            $logonama="logo".$ext1;
                                            $adaData=mysqli_num_rows(mysqli_query($con,"select * from tbabout"));
                                            if ($adaData>0) {
                                                if ($logotemp!="") {
                                                    unlink("../../images/about/".$logotemp);
                                                }

                                                if ($favicontemp!="") {
                                                    unlink("../../images/about/".$favicontemp);
                                                }

                                                move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/about/".basename("logo".$ext1));
                                                move_uploaded_file($_FILES['favicon']['tmp_name'],"../../images/about/".basename("favicon".$ext2));

                                                $query="update tbabout set isi='".$isi."',nope='".$nope."',alamat='".$alamat."',email='".$email."',framelokasi='".$framelokasi."',logo='".$logonama."',namaweb='".$namaweb."',favicon='".$faviconnama."',tagline='".$tagline."'";


                                            }else{
                                                move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/about/".basename(("logo").$ext1));
                                                move_uploaded_file($_FILES['favicon']['tmp_name'],"../../images/about/".basename("favicon").$ext2);
                                                $query="insert into tbabout values(Null,'".$isi."','".$nope."','".$alamat."','".$email."','".$framelokasi."','".$logonama."','".$namaweb."','".$faviconnama."','".$tagline."')";
                                            }

                                            $eksekusi=mysqli_query($con,$query);
                                            if($eksekusi)
                                              {
                                                  echo "<div class='alert alert-success'>
                                                    <button class='close' data-dismiss='alert'>
                                                    <i class='ace-icon fa fa-times'></i>
                                                    </button>
                                                    <b>Sukses !</b>, Tentang web berhasil diubah.
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

                                    }elseif(!empty($_FILES['logo']['tmp_name']) and empty($_FILES['favicon']['tmp_name'])){
                                        $ext1=strtolower(substr($_FILES['logo']['name'],-3));
                                        if($ext1=='gif')
                                        {
                                            $ext1=".gif";
                                        }
                                        elseif ($ext1=='jpg') 
                                        {
                                            $ext1=".jpg";
                                        }
                                        elseif ($ext1=='jpeg') 
                                        {
                                            $ext1=".jpeg";
                                        }
                                        elseif($ext1=='png')
                                        {
                                            $ext1=".png";
                                        }
                                        else
                                        {
                                            $ext1="-";
                                        }  

                                        if ($ext1=='-') {
                                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{
                                            $logonama="logo".$ext1;
                                            $adaData=mysqli_num_rows(mysqli_query($con,"select * from tbabout"));
                                            if ($adaData>0) {
                                                if ($logotemp!="") {
                                                    unlink("../../images/about/".$logotemp);
                                                }


                                                move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/about/".basename("logo".$ext1));

                                                $query="update tbabout set isi='".$isi."',nope='".$nope."',alamat='".$alamat."',email='".$email."',framelokasi='".$framelokasi."',logo='".$logonama."',namaweb='".$namaweb."',tagline='".$tagline."'";


                                            }else{
                                                move_uploaded_file($_FILES['logo']['tmp_name'],"../../images/about/".basename(("logo").$ext1));
                                                $query="insert into tbabout values(Null,'".$isi."','".$nope."','".$alamat."','".$email."','".$framelokasi."','".$logonama."','".$namaweb."','".$tagline."')";
                                            }

                                            $eksekusi=mysqli_query($con,$query);
                                            if($eksekusi)
                                              {
                                                  echo "<div class='alert alert-success'>
                                                    <button class='close' data-dismiss='alert'>
                                                    <i class='ace-icon fa fa-times'></i>
                                                    </button>
                                                    <b>Sukses !</b>, Tentang web berhasil diubah.
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



                                    }elseif(empty($_FILES['logo']['tmp_name']) and !empty($_FILES['favicon']['tmp_name'])){

                                        $ext2=strtolower(substr($_FILES['favicon']['name'],-3));
                                        if($ext2=='gif')
                                        {
                                            $ext2=".gif";
                                        }
                                        elseif ($ext2=='jpg') 
                                        {
                                            $ext2=".jpg";
                                        }
                                        elseif ($ext2=='jpeg') 
                                        {
                                            $ext2=".jpeg";
                                        }
                                        elseif($ext2=='png')
                                        {
                                            $ext2=".png";
                                        }
                                        else
                                        {
                                            $ext2="-";
                                        }

                                        if ($ext2=='-') {
                                                   
                                          echo "<div class='alert alert-danger'>
                                          <button class='close' data-dismiss='alert'>
                                          <i class='ace-icon fa fa-times'></i>
                                          </button>
                                          <b>Gagal </b> Ada Format file tidak didukung. 
                                          </div>";

                                        }else{

                                            $faviconnama="favicon".$ext2;
                                            $logonama="logo".$ext1;
                                            $adaData=mysqli_num_rows(mysqli_query($con,"select * from tbabout"));
                                            if ($adaData>0) {

                                                if ($favicontemp!="") {
                                                    unlink("../../images/about/".$favicontemp);
                                                }

                                                move_uploaded_file($_FILES['favicon']['tmp_name'],"../../images/about/".basename("favicon".$ext2));

                                                $query="update tbabout set isi='".$isi."',nope='".$nope."',alamat='".$alamat."',email='".$email."',framelokasi='".$framelokasi."',namaweb='".$namaweb."',favicon='".$faviconnama."',tagline='".$tagline."'";


                                            }else{
                                                move_uploaded_file($_FILES['favicon']['tmp_name'],"../../images/about/".basename("favicon").$ext2);
                                                $query="insert into tbabout values(Null,'".$isi."','".$nope."','".$alamat."','".$email."','".$framelokasi."','".$namaweb."','".$faviconnama."','".$tagline."')";
                                            }

                                            $eksekusi=mysqli_query($con,$query);
                                            if($eksekusi)
                                              {
                                                  echo "<div class='alert alert-success'>
                                                    <button class='close' data-dismiss='alert'>
                                                    <i class='ace-icon fa fa-times'></i>
                                                    </button>
                                                    <b>Sukses !</b>, Tentang web berhasil diubah.
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


                                    }else{

                                         $adaData=mysqli_num_rows(mysqli_query($con,"select * from tbabout"));
                                        if ($adaData>0) {

                                            $query="update tbabout set isi='".$isi."',nope='".$nope."',alamat='".$alamat."',email='".$email."',framelokasi='".$framelokasi."',namaweb='".$namaweb."',tagline='".$tagline."'";


                                        }else{
                                            $query="insert into tbabout values(Null,'".$isi."','".$nope."','".$alamat."','".$email."','".$framelokasi."','".$namaweb."','".$tagline."')";
                                        }

                                        $eksekusi=mysqli_query($con,$query);
                                        if($eksekusi)
                                          {
                                              echo "<div class='alert alert-success'>
                                                <button class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                                </button>
                                                <b>Sukses !</b>, Tentang web berhasil diubah.
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


                                }
									   

				                
				        ?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                            <?php
                            $query=mysqli_query($con,"select * from tbabout");
					        while($b=mysqli_fetch_array($query)) {
                            ?>
                                <div class="form-group">
                                    <label>Editor</label>
                                    <textarea id="editor1" name="isi" required><?php echo $b[1] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No.Telepon/Handphone</label>
                                    <input type="text" class="form-control" name="nope" value="<?php echo $b[2] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?php echo $b[3] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $b[4] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Frame Map</label>
                                    <input type="text" class="form-control" name="framelokasi" value="<?php echo $b[5] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo" accept="image/png,image/gif,image/jpeg,image/jpg" >
                                    <input type="hidden" class="form-control" name="logotemp" value="<?php echo $b[6] ?>">
                                    <?php if (!empty($b[6])): ?>
                                        <div style="margin-top: 10px;">
                                            <img src="../../images/about/<?php echo $b[6] ?>" width="100">
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Nama Web</label>
                                    <input type="text" class="form-control" name="namaweb" value="<?php echo $b[7] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Favicon</label>
                                    <input type="file" class="form-control" name="favicon" accept="image/png,image/gif,image/jpeg,image/jpg">
                                    <input type="hidden" class="form-control" name="favicontemp" value="<?php echo $b[8] ?>">
                                    <?php if (!empty($b[8])): ?>
                                        <div style="margin-top: 10px;">
                                            <img src="../../images/about/<?php echo $b[8] ?>" width="60">
                                        </div>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Tag Line</label>
                                    <input type="text" class="form-control" name="tagline" value="<?php echo $b[9] ?>" required>
                                </div>
                            <?php
                                }
                            ?>
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