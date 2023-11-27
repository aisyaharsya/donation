<?php  
 $data =mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama,a.alamatEmail from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['href']."'")); 
$jumlahTerkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahTerkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));
$persentase=round(($jumlahTerkumpul[0]/$data[5])*100); 
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Galang Dana</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Campaign
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                    <?php 
                            if(isset($_POST['simpan']))
                            {
                                $query=mysqli_query($con,"UPDATE tbgalangdana SET status='".$status."' where idGalangDana=".$id."");

                                if($query){
                                    echo "<div class='alert alert-success'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Sukses </b> Status Selesai 
                                    </div>";
                                }else{
                                    echo "<div class='alert alert-danger'>
                                    <button class='close' data-dismiss='alert'>
                                    <i class='ace-icon fa fa-times'></i>
                                    </button>
                                    <b>Gagal </b> Terjadi kesalahan, silahkan coba kembali. 
                                    </div>";
                                    }
                            }

                            if (isset($_POST['statuspenarikan'])) {
                                date_default_timezone_set('Asia/Jakarta');
                                $datapenarikan1=mysqli_fetch_array(mysqli_query($con,"select * from tbpenarikangalangdana where idpenarikangalangdana=".$id.""));

                                if ($status=="P"){
                                    $ket="Pending";
                                }elseif ($status=="Y") {
                                    $ket="Diterima";
                                }elseif ($status=="N") {
                                    $ket="Ditolak";
                                }

                                $mail->IsSMTP();
                                $mail->SMTPSecure = 'ssl'; 
                                $mail->Host = "mail.aguspramono.com"; //host masing2 provider email
                                $mail->SMTPDebug = 2;
                                $mail->Port = 465;
                                $mail->SMTPAuth = true;
                                $mail->Username = "support@aguspramono.com"; //user email
                                $mail->Password = "AgusPramono3545"; //password email 
                                $mail->SetFrom("support@aguspramono.com","Sedekah"); //set email pengirim
                                $mail->Subject = "Status Penarikan Dana"; //subyek email
                                $mail->AddAddress($email,$nama);  //tujuan email

                                $mail->MsgHTML("<div class='col-lg-12 text-center' style='text-align: center;font-family: calibri;'>
                                        <div class='col-md-8' style='display: inline-block;'>
                                          <div class='right_text text-center'>

                                            <div class='row text-center mb-5' style='border: 1px solid gray;'>
                                              <div class='col-md-12 mt-2' style='padding: 10px;'>
                                                <b>Status penarikan dana untuk campaign</b><hr>
                                                <h4 style='margin: 0px;'>".$data[2]."</h4>
                                                <small style='color: #cecece;'><i class='fa fa-calendar'></i> ".date('d M Y',strtotime($data[7]))."</i> | <b>".$data[10]." <i class='fa fa-check-circle-o text-success'></i></b></small>

                                              </div>
                                            </div>

                                            <div style='margin-top: 8px;'>
                                              <span>Pada tanggal</span>
                                              <h3 style='margin: 0px;'>".date('d M Y h:i:s',strtotime($datapenarikan1['tanggal']))."</h3>
                                            </div>

                                            <div style='margin-top: 20px;'>
                                              <span>Dana yang ditarik sebesar</span>
                                              <h2 style='margin: 0px;'>Rp. ".number_format($datapenarikan1['jumlah'],0,',','.')."</h2>
                                            </div>
                                            
                                             <div style='margin-top: 5px;'>
                                              <h1 style='margin: 0px;'>".$ket."</h1>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>");

                                // Kirim email
							    $mail->Send();

                                $query=mysqli_query($con,"UPDATE tbpenarikangalangdana SET status='".$status."' where idpenarikangalangdana=".$id."");
                                    if($query){
                                      echo "<div class='alert alert-success'>
                                      <button class='close' data-dismiss='alert'>
                                      <i class='ace-icon fa fa-times'></i>
                                      </button>
                                      <b>Sukses </b> Penarikan dana berhasil dikonfirmasi. 
                                      </div>";
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


                    <div class="col-sm-12 col-md-8 clearfix top-off">
                        <div class="grid-image"><img src="../../../images/banner/<?php echo $data[6] ?>" style="height: 400px;width: 100%;"></div>
                        <div class="post-content" style="background-color: #f2f2f2;padding: 10px;margin-bottom: 20px;">
                            <small style="color: #0581d7;"><?php echo $data[10]; ?></small> | <small><?php echo date('d M Y',strtotime($data[7])); ?></small>
                          <ul class="nav nav-tabs" style="margin-top: 10px;">
                            <li class="active"><a data-toggle="tab" href="#home">Deskripsi</a></li>
                            <li><a data-toggle="tab" href="#menu1">Kabar</a></li>
                            <li><a data-toggle="tab" href="#menu2">Sahabat Dermawan</a></li>
                            <li><a data-toggle="tab" href="#menu3">Data Penarikan Dana</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                              <p>
                                <?php echo $data[4]; ?>
                              </p>
                              <hr>
                              <p class="text-center"><b>Disclaimer :</b> Informasi dan opini yang tertulis di halaman penggalangan ini adalah milik penggalang dana dan tidak mewakili sedenasto</p>
                              
                            </div>
                            <div id="menu1" class="tab-pane fade">
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="col-md-12" style="overflow: scroll;max-height: 500px;">
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbberitagalangdana where idGalangDana=".$data[0]." order by idBeritaGalangDana desc");
                                        $no=1;
                                        while ($databerita=mysqli_fetch_array($eksekusi)) {
                                    ?>

                                    <div class="panel-group" style="margin-top: 20px;">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" href="#collapse<?php echo $databerita['idBeritaGalangDana'] ?>" class="text-info"><?php echo $no++.". ".$databerita['judul'] ?></a>
                                          <br><small style="margin-left: 18px;"><i><?php echo date('d M Y',strtotime($databerita['tanggal'])) ?></i></small><br>
                                      </div>
                                      <div id="collapse<?php echo $databerita['idBeritaGalangDana'] ?>" class="panel-collapse collapse" style="padding: 10px;">
                                        <p>
                                          <?php echo $databerita['isi']; ?>
                                        </p>
                                      </div>
                                    </div>
                                  </div>

                                  <?php } ?>

                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                               <div class="row">
                                <div class="col-md-12">
                                  <div class="col-md-12" style="overflow: scroll;max-height: 500px;">
                                     <ul class="list-group" style="margin-top: 10px;">
                                      <?php 
                                        $eksekusi=mysqli_query($con,"select * from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y' order by  idBerdonasiGalangDana desc");
                                        $no=1;
                                        while ($datagalang=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                          <li class="list-group-item" style="margin-top: 5px;">

                                              <div class="row">
                                                    <div class="col-md-8">  
                                                        <?php echo $datagalang['anonim'] ?><br><small><i><?php echo date('d M Y',strtotime($datagalang['tanggal'])) ?></i> | <b>Usaha :<?php echo $datagalang['namaUsaha']." ( ".$datagalang['lokasiUsaha']." )" ?></b> | <i><b><?php if($datagalang['dukungan']==""){echo"-";}else{echo $datagalang['dukungan'];}  ?></b></i></small>
                                                    </div> 
                                                    <div class="col-md-4">  
                                                      <span class="float-left"></span><span class="float-right"><strong> Rp. <?php echo number_format($datagalang['jumlah'],2,',','.'); ?></strong></span>
                                                    </div>
                                              </div>



                                            </li>
                                  <?php } ?>
                                      </ul> 
                                  </div>
                                </div>
                              </div>
                            </div>



                            <div id="menu3" class="tab-pane fade">
                              <div class="row">
                                <div class="col-md-12 border">
                                  <div class="table-responsive" style="margin-top:10px;">
                                <table class="table table-bordered table-striped" id="dataTables-example1" style="width: 100%;"> 
                                 <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                    <!--<th scope="col">Deskripsi</th>-->
                                    <th scope="col">Rekening</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                 $eksekusi=mysqli_query($con,"SELECT * FROM `tbpenarikangalangdana` as pgd inner join tbrekeningmember as rm on(rm.idRekeningMember=pgd.idRekeningMember) WHERE pgd.idGalangDana=".$data[0]." order by pgd.idpenarikangalangdana");
                                 $no=1;
                                 while ($datapenarikan=mysqli_fetch_array($eksekusi)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo date('d F Y', strtotime($datapenarikan[5]));?></td>
                                    <td><?php echo number_format($datapenarikan[4],2,',','.'); ?></td>
                                    <td><?php echo $datapenarikan[9]; ?></td>
                                    <!--<td><?php echo $selisih; ?></td>-->
                                    <?php if ($datapenarikan[6]=="P"){ ?>
                                      <td><span class="label label-info">Pending</span></td>
                                    <?php }elseif ($datapenarikan[6]=="N") { ?>
                                      <td><span class="label label-danger">Tolak</span></td>
                                    <?php }elseif ($datapenarikan[6]=="Y") { ?>
                                      <td><span class="label label-success">Selesai</span></td>
                                    <?php }elseif ($datapenarikan[6]=="B") { ?>
                                      <td><span class="label label-danger">Batal</span></td>
                                    <?php } ?>
                                    <td>
                                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $datapenarikan[0] ?>" data-backdrop="static" data-keyboard="false">Konfirmasi</a>
           
                                      </td>
                                      
                                  </tr>

                                         <div id="myModal<?php echo $datapenarikan[0] ?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">konfirmasi Penarikan Dana</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $datapenarikan[0] ?>" readonly>
                                                    <input type="hidden" class="form-control" name="email" value="<?php echo $data[11] ?>" readonly>
                                                    <input type="hidden" class="form-control" name="nama" value="<?php echo $data[10] ?>" readonly>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control" required>
                                                            
                                                            <?php if ($datapenarikan[6]=="P"){
                                                                $ket="Pending";
                                                            }elseif ($datapenarikan[6]=="Y") {
                                                                $ket="Diterima";
                                                            }elseif ($datapenarikan[6]=="N") {
                                                                $ket="Ditolak";
                                                            } ?>
                                                            <option value="<?php echo $datapenarikan[6]; ?>"><?php echo $ket; ?></option>
                                                            <option value="Y">Diterima</option>
                                                            <option value="P">Pending</option>
                                                            <option value="N">Ditolak</option>
                                                        </select>
                                                    </div>
                                                    
                                              
                                                    
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" name="statuspenarikan" class="btn btn-primary" value="Ubah Status Konfirmasi">
                                              </div>
                                              </form>
                                              
                                            </div>

                                          </div>
                                        </div>






                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          </div>
                                </div>
                              </div>
                              
                                


                          </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 clearfix top-off">
                        <div class="post-content" style="background-color: #f2f2f2;padding: 10px;margin-bottom: 20px;">
                        <?php 
                        if ($data[9]=="P"){ 
                          $ket="pending";
                        }elseif($data[9]=="Y"){
                          $ket="tayang";
                        }elseif ($data[9]=="N") {
                          $ket="tolak";
                        }
                        ?>
                          <div class="alert alert-info" role="alert">
                            Status campaign <b><?php echo $ket; ?></b>
                          </div>
                          <h3 class="text-info" style="margin-bottom: 20px;"><?php echo $data[2] ?></h3>
                          <div class="row">
                            <div class="col-md-2">
                              <img src="../../../images/icon/user.png" alt="" width="30">    
                            </div>
                            <div class="col-md-10" style="padding-left:0px;">
                              <span class="text-info"><h4 style="margin: 0px;"><?php echo $data[10] ?></h4></span>
                              <small><i>Akun Terverifikasi</i></small>
                              
                            </div>

                            <div class="col-md-12">
                              <p>
                                <?php  
                                date_default_timezone_set('Asia/Jakarta');
                                  $tgl1 = new DateTime(date('Y-m-d'));
                                  $tgl2 = new DateTime($data[8]);
                                  $selisih= $tgl2->diff($tgl1)->days + 1;

                                  if ($data[8]<date('Y-m-d')) {
                                    $selisih=0;
                                  }
                                ?>
                                <h4 style="margin-bottom: 0px;margin-top: 20px;"><b>Rp. <?php echo number_format($jumlahTerkumpul[0],2,',','.'); ?></b></h4>
                                <small>terkumpul dari target <b>Rp. <?php echo number_format($data[5],2,',','.'); ?></b></small>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: <?php echo $persentase."%"; ?>;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase; ?>%</div>
                                </div>
                                <small><i><?php echo $selisih ?> hari lagi</i></small>
                              </p> 
                              <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal<?php echo $data[0] ?>" data-backdrop="static" data-keyboard="false">Edit</a>
                              <a href="index.php?page=galangdana" class="btn btn-block btn-danger">Kembali</a> 
                            </div>



                             <!-- Modal -->
                            <div id="myModal<?php echo $data[0] ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Ubah Status</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form action="" method="post">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $data[0] ?>" readonly>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-control" required>
                                                
                                                <?php if ($data[9]=="P"){
                                                    $ket="Pending";
                                                }elseif ($data[9]=="Y") {
                                                    $ket="Diterima";
                                                }elseif ($data[9]=="N") {
                                                    $ket="Ditolak";
                                                } ?>
                                                <option value="<?php echo $data[9]; ?>"><?php echo $ket; ?></option>
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
                          </div>
                          
                       </div>
                   </div>
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