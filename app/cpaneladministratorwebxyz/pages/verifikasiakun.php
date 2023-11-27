<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Verifikasi Akun</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                user Yang Melakukan Verifikasi.
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\SMTP;
                            use PHPMailer\PHPMailer\Exception;

                            require '../../vendors/sendEmail/vendor/autoload.php';
                        
                            if(isset($_POST['simpan']))
                            {
                                $query=mysqli_query($con,"UPDATE tbverifikasi SET status='".$status."' where idVerifikasi=".$id."");
                                $query=mysqli_query($con,"UPDATE tbanggota SET verif='".$status."' where idAnggota=".$idAnggota."");

                                if($query){
                                    echo "<div class='alert alert-success'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Sukses </b> Verifikasi selesai 
                                    </div>";

                                    $eksekusi=mysqli_query($con,"select v.*,a.*,v.status as statusverif from tbverifikasi as v inner join tbanggota as a on(a.idAnggota=v.idAnggota) order by v.idVerifikasi desc");
                                    $data = mysqli_fetch_array($eksekusi);

                                    // Konfigurasi SMTP



                                    $mail = new PHPMailer(true);
                                    //Server settings
                                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;			// Enable verbose debug output
                                    $mail->isSMTP();                                 	// Send using SMTP
                                    $mail->Host       = 'smtp.gmail.com';           	// Set the SMTP server to send through
                                    $mail->SMTPAuth   = true;                         	// Enable SMTP authentication
                                    $mail->Username   = 'pure.charity.ind@gmail.com';	// SMTP username
                                    $mail->Password   = 'nsrvkykftpuuwiek';        		// SMTP password
                                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;	// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                    $mail->Port       = 587;							// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                    //Recipients
                                    $mail->setFrom('pure.charity.ind@gmail.com', 'Pemberitahuan Verifikasi Akun');
                                    $mail->addAddress($data['alamatEmail'],$data['nama']);     		// Add a recipient
                                    
                                    // Content
                                    $mail->isHTML(true);                              	// Set email format to HTML
                                    $mail->Subject = 'Pemberitahuan Verifikasi Akun';
                                    $mail->Body    = "<h1>Mohon Cek Status Pengguna Anda</h1>
                                    <p>Klik tombol untuk Memeriksa Status Pengguna.</p><p><a href='".BASEURL.'/member/verifikasi'."' style='background-color: #4CAF50;border: none;color: white;padding: 15px 32px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Periksa Status</a></p>";

                                    $mail->Send();
                                }else{
                                    echo "<div class='alert alert-danger'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Gagal </b> Terjadi kesalahan, silahkan coba kembali. 
                                    </div>";
                                    }
                            }

                        ?>
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama User</th>
                                        <th>KTP</th>
                                        <th>Nomor KTP</th>
                                        <th>Selfie</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $no=1;
                                        $eksekusi=mysqli_query($con,"select v.*,a.*,v.status as statusverif from tbverifikasi as v inner join tbanggota as a on(a.idAnggota=v.idAnggota) order by v.idVerifikasi desc");
                                        // echo '<pre>';
                                        // print_r(mysqli_fetch_array($eksekusi));
                                        // echo '</pre>';
                                        // exit;
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><img src="../../images/berkas/ktp/<?php echo $data['ktp'] ?>" alt="" width="70"></td>
                                        <td><?php echo $data['nomorKtp'] ?></td>
                                        <td><img src="../../images/berkas/selfie/<?php echo $data['selfie'] ?>" alt="" width="70"></td>

                                        <?php if ($data['statusverif']=="P"){
                                            $ket="<span class='label label-warning'>Pending</span>";
                                        }elseif ($data['statusverif']=="Y") {
                                            $ket="<span class='label label-success'>diterima</span>";
                                        }elseif ($data['statusverif']=="N") {
                                            $ket="<span class='label label-danger'>ditolak</span>";
                                        } ?>
                                        <td><?php echo $ket; ?></td>
                                        <td>
                                            <a href='#' class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $data['idVerifikasi'] ?>" data-backdrop="static" data-keyboard="false">Ubah Status</a>
                                        </td>
                                        <!-- Modal -->
                                        <div id="myModal<?php echo $data['idVerifikasi'] ?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Verifikasi Akun</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="">Nama</label>
                                                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['idVerifikasi'] ?>" readonly>
                                                        <input type="hidden" class="form-control" name="idAnggota" value="<?php echo $data['idAnggota'] ?>" readonly>
                                                        <input type="nama" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Nomor KTP</label>
                                                        <input type="nama" class="form-control" name="noKtp" value="<?php echo $data['nomorKtp'] ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">foto KTP</label>
                                                        <img src="../../images/berkas/ktp/<?php echo $data['ktp'] ?>" alt="" style="width: 100%;">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">foto Selfie</label>
                                                        <img src="../../images/berkas/selfie/<?php echo $data['selfie'] ?>" alt="" style="width: 100%;">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control" required>
                                                            
                                                            <?php if ($data['statusverif']=="P"){
                                                                $ket="Pending";
                                                            }elseif ($data['statusverif']=="Y") {
                                                                $ket="diterima";
                                                            }elseif ($data['statusverif']=="N") {
                                                                $ket="ditolak";
                                                            } ?>
                                                            <option value="<?php echo $data['statusverif']; ?>"><?php echo $ket; ?></option>
                                                            <option value="Y">Diterima</option>
                                                            <option value="N">Ditolak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input type="submit" name="simpan" class="btn btn-primary" value="Ubah">
                                                </div>
                                              </form>
                                            </div>

                                          </div>
                                        </div>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Trigger the modal with a button -->
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