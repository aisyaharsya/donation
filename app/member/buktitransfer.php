<?php include"header.php"; ?>
<section id="about-sec" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <?php include"menu.php"; ?>

            <div class="col-sm-9 col-md-9 clearfix top-off">
              <div class="card">
                  <div class="card-header">
                   <h4 style="margin: 0;">Mohon Masukkan Bukti Transfer || <a href="donasisaya" style="color: blue;">Kembali</a></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                     <!--Proses-->
                     <?php  
                     if(isset($_POST['simpan']))
                     {

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
                        move_uploaded_file($_FILES['foto']['tmp_name'],"../admin/gambar/buktitransfer/".basename(($_GET['nomortransfer']).$ext));
                    }

                            mysqli_query($con,"update tbuang set gambar='".$_GET['nomortransfer'].$ext."',status='' where idUang='$idUang'");

                            echo"
                            <script>
                            location.assign('sedekahuang?pesan=success');
                            </script>
                            ";
                }
                ?>
                <!--Proses-->
                <form action="" method="post" enctype="multipart/form-data">
                    <?php 

                    if(isset($_GET['nomortransfer']))
                    {
                        $query=mysqli_query($con,"select * from tbuang where idUang='".$_GET['nomortransfer']."'");
                        while ($data=mysqli_fetch_array($query)) {
                            ?>
                            <div class="col-md-12">
                                <label for="">Bukti Transfer</label>
                                <input type="hidden" name="idUang" value="<?php echo $data[0] ?>" size="40" class="form-control" required>
                                <input type="file" accept="image/*" name="foto" class="form-control" id="foto" required>
                                <small style="color: blue;">Bukti transfer yang sudah dikirim tidak dapat diubah lagi, mohon untuk memasukkan bukti transfer yang benar.!!</small>
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
                            <div class="col-xs-12 submit-button">
                                <input type="submit" name="simpan" value="Kirim Bukti Transfer" class="btn2" id="sub" style="border:none; margin: 20px 0 0 0">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</section>

<?php include"footer.php"; ?>

