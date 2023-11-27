<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Konfirmasi Galang Dana</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sahabat Dermawan Yang Telah Berdonasi
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if(isset($_POST['simpan']))
                            {

                                $datadonasi=mysqli_fetch_array(mysqli_query($con,"select bgd.*,gd.*,gd.jumlah as jumlahGoal,bgd.jumlah as jumlahtf,bgd.tanggalBerakhir as tanggalAkhirTransfer, bgd.status as statusbayar from tbberdonasigalangdana as bgd inner join tbgalangdana as gd on(gd.idGalangDana=bgd.idGalangDana) where bgd.idBerdonasiGalangDana=".$id.""));

                                if ($status=="Y") {
                                    $ket="Diterima";
                                }elseif($status=="N"){
                                    $ket="Tidak Diterima";
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
                                $mail->Subject = "Status Pembayaran"; //subyek email
                                $mail->AddAddress($datadonasi[8],$datadonasi[5]);  //tujuan email

                                 $mail->MsgHTML("<div class='col-lg-12 text-center' style='text-align: center;font-family: calibri;'>
                                          <div class='col-md-8' style='display: inline-block;'>
                                            <div class='right_text text-center'>

                                              <div class='row text-center mb-5' style='border: 1px solid gray;'>
                                                <div class='col-md-12 mt-2' style='padding: 10px;'>
                                                  <b>Status Pembayaran Donasi Anda Untuk Campaign</b><hr>
                                                  <h4 style='margin: 0px;'>".$datadonasi[19]."</h4>
                                                  <small style='color: #cecece;'><i class='fa fa-calendar'></i> ".date('d M Y',strtotime($datadonasi[24]))."</i></small>
                                                  <div style='text-align:center;margin-top:10px;'><h1>".$ket."</h1></div>
                                                </div>
                                              </div>
                                        </div>
                                      </div>
                                    </div>");
                                    
                                    // Kirim email
							       $mail->Send();






                                $query=mysqli_query($con,"UPDATE tbberdonasigalangdana SET status='".$status."' where idBerdonasiGalangDana=".$id."");

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
                        ?>
                        <!--Proses-->
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama Donatur</th>
                                        <th>Judul Campaign</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php
                                    $eksekusi =mysqli_query($con,"select bgd.*,gd.*,a.*,r.*,gd.jumlah as jumlahGoal,a.nama as namaAnggota,bgd.jumlah as jumlahtf,bgd.tanggalBerakhir as tanggalAkhirTransfer, bgd.status as statusbayar from tbberdonasigalangdana as bgd inner join tbgalangdana as gd on(gd.idGalangDana=bgd.idGalangDana) inner join tbanggota as a on(a.idAnggota=gd.idAnggota) inner join tbrekening as r on(r.idRekening=bgd.idRekening) order by bgd.idBerdonasiGalangDana desc");
                                        $no=1;
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr><td><?php echo $no++;?></td>
                                    <td><?php echo date('d F Y', strtotime($data[13]));?></td>
                                    <td><?php echo $data[5]; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo number_format($data['jumlahtf'],2,',','.'); ?></td>
                                    <?php if ($data['statusbayar']=="P"){ ?>
                                      <td><span class="label label-info">Pending</span></td>
                                    <?php }elseif ($data['statusbayar']=="N") { ?>
                                      <td><span class="label label-danger">Tolak</span></td>
                                    <?php }elseif ($data['statusbayar']=="Y") { ?>
                                      <td><span class="label label-success">Sukses</span></td>
                                    <?php }else{ ?>
                                      <td><span class="label label-primary">Konfirmasi</span></td>
                                    <?php } ?>
                                    <td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal<?php echo $data['idBerdonasiGalangDana'] ?>" data-backdrop="static" data-keyboard="false">Edit</a></td>
                                    </tr>

                                        <!-- Modal -->
                                    <div id="myModal<?php echo $data['idBerdonasiGalangDana'] ?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ubah Status</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form action="" method="post">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $data['idBerdonasiGalangDana'] ?>" readonly>
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" id="" class="form-control" required>
                                                        
                                                        <?php if ($data['statusbayar']=="P"){
                                                            $ket="Pending";
                                                        }elseif ($data['statusbayar']=="Y") {
                                                            $ket="Diterima";
                                                        }elseif ($data['statusbayar']=="N") {
                                                            $ket="Ditolak";
                                                        }elseif ($data['statusbayar']=="K") {
                                                            $ket="Konfirmasi";
                                                        } ?>

                                                        <option value="<?php echo $data['statusbayar']; ?>"><?php echo $ket; ?></option>
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




                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
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