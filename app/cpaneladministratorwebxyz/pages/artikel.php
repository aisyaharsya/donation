<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ARTIKEL</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?page=artikeldata"><button class="btn btn-primary">Data Artikel Disini</button></a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Proses-->
                        <?php
                            date_default_timezone_set('Asia/Jakarta');
                            if(isset($_POST['simpan']))
                                {    
                                    
                                    $getId=mysqli_fetch_row(mysqli_query($con,"select max(idArtikel) from tbartikel"));
                                    
                                    if(!empty($_FILES['foto']['tmp_name']))
                                    { 
                                        $ext=strtolower(substr($_FILES['foto']['name'],-3));
                                        if($ext=='gif')
                                        {
                                            $ext=".gif";
                                        }
                                        elseif ($ext=='jpg') 
                                        {
                                            $ext=".jpg";
                                        }
                                        elseif ($ext=='jpeg') 
                                        {
                                            $ext=".jpeg";
                                        }
                                        else
                                        {
                                            $ext=".png";
                                        }
                                        move_uploaded_file($_FILES['foto']['tmp_name'],"../../images/artikel/".basename(($getId[0]+1).$ext));
                                    }
                                    
                                    mysqli_query($con,"insert into tbartikel values(Null,'".date('Y-m-d')."','".$judul."','".$isi."','".($getId[0]+1).$ext."','".strtolower(str_replace(' ','-',$judul))."')");
                                    
                                      echo "
                                    <script>
                                    location.assign('index.php?page=artikel&pesan=success');
                                    </script>
                                    ";
                                }
                                elseif(isset($_POST['edit']))
                                {
                                    if(!empty($_FILES['foto']['tmp_name']))
                                    { 
                                        unlink("../gambar/artikel/$gambar");
                                        $ext=strtolower(substr($_FILES['foto']['name'],-3));
                                        if($ext=='gif')
                                        {
                                            $ext=".gif";
                                        }
                                        elseif ($ext=='jpg') 
                                        {
                                            $ext=".jpg";
                                        }
                                        elseif ($ext=='jpeg') 
                                        {
                                            $ext=".jpeg";
                                        }
                                        else
                                        {
                                            $ext=".png";
                                        }
                                        move_uploaded_file($_FILES['foto']['tmp_name'], "../../images/artikel/" . basename(($_GET['data_id']).$ext));
                                        
                                        mysqli_query($con,"update tbartikel set judul='$judul',thumbnail='".$_GET['data_id'].$ext."',isi='$isi' where idArtikel='".$_GET['data_id']."'");
                                    }
                                    else
                                        mysqli_query($con,"update tbartikel set judul='$judul',isi='$isi' where idArtikel='".$_GET['data_id']."'");
                                    
                                    echo "
                                    <script>
                                    location.assign('index.php?page=artikeldata&pesan=success');
                                    </script>
                                    ";
                                }

				        /*pesan berhasil update*/
							if(isset($_GET['pesan'])=='success')
                            {
                                echo "<div class='alert alert-success'>
										<button class='close' data-dismiss='alert'>
										<i class='ace-icon fa fa-times'></i>
										</button>
										<b>Sukses !</b>, Artikel berhasil disimpan.
								     </div>";
                            }
                            if(isset($_GET['data_id']))
                                $data=mysqli_fetch_row(mysqli_query($con,"select * from tbartikel where idArtikel='".$_GET['data_id']."'"));
				                
				        ?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <input class="form-control" name="idArtikel" type="hidden" value="<?php echo isset($_GET['data_id'])?$_GET['data_id']:''; ?>">
                                <input class="form-control" name="gambar" type="hidden" value="<?php echo isset($data[4])?$data[4]:''; ?>">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" name="judul" type="text" placeholder="Judul Artikel" required value="<?php echo isset($data[2])?$data[2]:''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Editor</label>
                                    <textarea id="editor1" name="isi" required>
                                        <?php echo isset($data[3])?$data[3]:''; ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>thumbnail</label>
                                    <input type="file" accept="image/*" name="foto" class="form-control" id="foto">
                                    <div id="image-holder" style="margin-top: 10px;">
                                   <?php
                                        if(isset($_GET['data_id']))
                                            echo "<img src='../gambar/artikel/$data[4].'?rand='".rand()."' alt='' style='width:200px;'>";
                                        ?>
                                    </div>
                                    <script>
                                    $("#foto").on('change', function () {

                                        //Get count of selected files
                                        var countFiles = $(this)[0].files.length;

                                        var imgPath = $(this)[0].value;
                                        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                        var image_holder = $("#image-holder");
                                        image_holder.empty();

                                        var x = document.getElementById("foto");
                                        var file = x.files[0];

                                        if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "gif") {
                                            if (typeof (FileReader) != "undefined") {

                                                //loop for each file selected for uploaded.
                                                for (var i = 0; i < countFiles; i++) {

                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $("<img />", {
                                                            "src": e.target.result,
                                                            "class": "thumb-image"
                                                        }).appendTo(image_holder);
                                                    }

                                                    image_holder.show();
                                                    reader.readAsDataURL($(this)[0].files[i]);
                                                }

                                            } else {
                                                alert("This browser does not support FileReader.");
                                            }
                                        } else {
                                            alert("hanya boleh foto bertype PNG, JPG dan GIF");
                                            var control = $("#foto");
                                            control.replaceWith(control.val('').clone(true));
                                        }
                                    });
                                </script>
                                </div>
                                 <input onclick="change_url()" type="submit" class="btn btn-info" value="Simpan" name="<?php echo isset($_GET['data_id'])?'edit':'simpan'; ?>"> <button type="reset" name="batal" class="btn btn-warning">Batal</button>
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