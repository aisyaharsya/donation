<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ADMIN</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             Masukkan Data Admin Baru Disini
         </div>
         <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <!--Proses-->
                    <?php
                    if(isset($_POST['simpan']))
                    { 

                        $query=mysqli_query($con,"select namaPengguna from tbadmin where namaPengguna='$username'");
                        $ketemu=mysqli_num_rows($query);
                        if($ketemu>0)
                        {
                            echo "<script>location.assign('index.php?page=admin&adminready=adminready');</script>";
                        }else
                        {
                            $eksekusi=mysqli_query($con,"insert into tbadmin values(null,'".$nama."','".$username."','".$alamat."','".$nope."','".md5($password)."','".$status."')");
                            if($eksekusi)
                            {
                              echo "<script>location.assign('index.php?page=admin&pesan=success');</script>";
                          }else
                          {
                              echo "<script>location.assign('index.php?page=admin&error=error');</script>";
                          }
                      }

                  }

                  /*pesan berhasil update*/
                  if(isset($_GET['pesan'])=='success')
                  {
                    echo "<div class='alert alert-success'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Sukses !</b>, Admin berhasil ditambah.
                    </div>";
                }
                elseif(isset($_GET['error'])=='error')
                {
                    echo "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Gagal!</b>, Admin gagal ditambah.
                    </div>";
                }
                elseif(isset($_GET['adminready'])=='adminready')
                {
                    echo "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>
                    <i class='ace-icon fa fa-times'></i>
                    </button>
                    <b>Gagal!</b>, Username sudah terdaftar.
                    </div>";
                }

                ?>

                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama" type="text" placeholder="Tuliskan Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" type="text" placeholder="Tuliskan Alamat Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input class="form-control" name="nope" type="text" placeholder="Tuliskan Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="A">Admin</option>
                            <option value="K">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input class="form-control" name="u_password" id="u_password" type="password" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" name="simpan" id="btnSubmit" class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-warning">Batal</button>
                    <a href="#data" class="btn btn-default">Data Admin</a>
                </form>
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

<div class="row" id="data">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             Data Admin
         </div>
         <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                            if(isset($_GET['admin']))
                            {
                                mysqli_query($con,"delete from tbadmin where idAdmin='".$_GET['admin']."'");
                                 echo "
                                    <script>
                                    location.assign('index.php?page=admin&pesandelete=successdelete#data');
                                    </script>
                                    ";
                            }

                             if(isset($_GET['pesandelete'])=='successdelete')
                            {
                                echo "<div class='alert alert-success'>
                                        <button class='close' data-dismiss='alert'>
                                        <i class='ace-icon fa fa-times'></i>
                                        </button>
                                        <b>Sukses !</b>, Admin berhasil dihapus.
                                     </div>";
                            }
                        ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Proses-->
                            <?php 
                            $eksekusi=mysqli_query($con,"select * from tbadmin");
                            while ($data=mysqli_fetch_array($eksekusi)) {
                                ?>
                                <tr>
                                    <td><?php echo $data[1] ?></td>
                                    <td><?php echo $data[2]  ?></td>
                                    <td><?php 
                                        if ($data[6]=="A") {
                                            echo"Admin";
                                        }else{
                                            echo"Kasir";
                                        }
                                    ?></td>
                                    <td>
                                            <a href="index.php?page=admin&admin=<?php echo $data[0] ?>" onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                                <button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col-lg-12(nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password").onchange = validatePassword;
            document.getElementById("u_password").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("password").value;
            var pass1=document.getElementById("u_password").value;
            if(pass1!=pass2)
                document.getElementById("u_password").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
            else
                document.getElementById("u_password").setCustomValidity('');
        }
    </script>