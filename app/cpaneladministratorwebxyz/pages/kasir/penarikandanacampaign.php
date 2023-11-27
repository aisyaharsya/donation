<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Penarikan Dana Campaign</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Campaign Yang Telah Dibuat.
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 

                        if (isset($_POST['statuspenarikan'])) {
                            date_default_timezone_set('Asia/Jakarta');
                            $datapenarikan1=mysqli_fetch_array(mysqli_query($con,"select pgd.*,rm.*,a.*,gd.* from tbpenarikangalangdana as pgd inner join tbrekeningmember as rm on(rm.idRekeningMember=pgd.idRekeningMember) inner join tbanggota as a on(a.idAnggota=pgd.idAnggota) inner join tbgalangdana as gd on(gd.idGalangDana=pgd.idGalangDana) where pgd.idpenarikangalangdana=".$id.""));

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
                                            <h4 style='margin: 0px;'>".$datapenarikan1[26]."</h4>
                                            <small style='color: #cecece;'><i class='fa fa-calendar'></i> ".date('d M Y',strtotime($datapenarikan1[31]))."</i> | <b>".$datapenarikan1[15]." <i class='fa fa-check-circle-o text-success'></i></b></small>

                                          </div>
                                        </div>

                                        <div style='margin-top: 8px;'>
                                          <span>Pada tanggal</span>
                                          <h3 style='margin: 0px;'>".date('d M Y h:i:s',strtotime($datapenarikan1[5]))."</h3>
                                        </div>

                                        <div style='margin-top: 20px;'>
                                          <span>Dana yang ditarik sebesar</span>
                                          <h2 style='margin: 0px;'>Rp. ".number_format($datapenarikan1[4],0,',','.')."</h2>
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
							
							
							if ($status=="Y") {
                                $query=mysqli_query($con,"INSERT INTO tbberitagalangdana VALUES(NULL,".$datapenarikan1[1].",'".date('Y-m-d')."','Penarikan Dana','Jumlah Dana <b>".number_format($datapenarikan1[4],0,',','.')."</b> , Akan digunakan untuk ".$datapenarikan1[7]."')");
                            }

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

                        <?php  
                        $jumlahdanakeluar=mysqli_fetch_array(mysqli_query($con,"select if(sum(jumlah) is null,0,sum(jumlah)) as jumlah from tbpenarikangalangdana where status='Y'"));
                        $jumlahdonasi=mysqli_fetch_array(mysqli_query($con,"select if(sum(jumlah) is null,0,sum(jumlah)) as jumlah from tbberdonasigalangdana where status='Y'"));
                        ?>
                        <!--Proses-->
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" style="font-size: 20px;">
                                                 <?php 
                                                      echo number_format($jumlahdonasi[0],0,',','.');

                                                ?>
                                            </div>
                                            <div>Jumlah Donasi Terkumpul</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" style="font-size: 20px;">
                                                 <?php 
                                                      echo number_format($jumlahdanakeluar[0],0,',','.');

                                                ?>
                                            </div>
                                            <div>Jumlah Dana (konfirmasi)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-dollar fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge" style="font-size: 20px;">
                                                 <?php 
                                                      echo number_format($jumlahdonasi[0]-$jumlahdanakeluar[0],0,',','.');

                                                ?>
                                            </div>
                                            <div>Sisa Dana</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Judul Campaign</th>
                                        <th>User</th>
                                        <th>Bank</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Proses-->
                                    <?php 
                                        $eksekusi=mysqli_query($con,"select pgd.*,rm.*,a.*,gd.* from tbpenarikangalangdana as pgd inner join tbrekeningmember as rm on(rm.idRekeningMember=pgd.idRekeningMember) inner join tbanggota as a on(a.idAnggota=pgd.idAnggota) inner join tbgalangdana as gd on(gd.idGalangDana=pgd.idGalangDana) order by pgd.idpenarikangalangdana desc");
                                        $no=1;
                                        while ($data=mysqli_fetch_array($eksekusi)) {
                                    ?>
                                    <tr><td><?php echo $no++;?></td>
                                    <td><?php echo date('d F Y h:i:s', strtotime($data[5]));?></td>
                                    <td><?php echo $data[26]; ?></td>
                                    <td><?php echo $data[15]; ?></td>
                                    <td><?php echo $data[12]." / ".$data[10]." (".$data[11].")"; ?></td>
                                    <td><?php echo number_format($data[4],2,',','.'); ?></td>
                                    <td><?php echo $data[7]; ?></td>

                                    <?php if ($data[6]=="P"){ ?>
                                      <td><span class="label label-info">Pending</span></td>
                                    <?php }elseif ($data[6]=="N") { ?>
                                      <td><span class="label label-danger">Tolak</span></td>
                                    <?php }elseif ($data[6]=="Y") { ?>
                                      <td><span class="label label-success">Selesai</span></td>
                                    <?php }else{ ?>
                                      <td><span class="label label-primary">Selesai</span></td>
                                    <?php } ?>
                                    <td><a href="#" data-toggle="modal" data-target="#myModal<?php echo $data[0] ?>" data-backdrop="static" data-keyboard="false" class="btn btn-info">Edit</a></td>
                                    </tr>



                                         <div id="myModal<?php echo $data[0] ?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">konfirmasi Penarikan Dana</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $data[0] ?>" readonly>
                                                    <input type="hidden" class="form-control" name="email" value="<?php echo $data[18] ?>" readonly>
                                                    <input type="hidden" class="form-control" name="nama" value="<?php echo $data[15] ?>" readonly>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control" required>
                                                            
                                                            <?php if ($data[6]=="P"){
                                                                $ket="Pending";
                                                            }elseif ($data[6]=="Y") {
                                                                $ket="Diterima";
                                                            }elseif ($data[6]=="N") {
                                                                $ket="Ditolak";
                                                            } ?>
                                                            <option value="<?php echo $data[6]; ?>"><?php echo $ket; ?></option>
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