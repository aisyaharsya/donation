<?php include"header.php";
$dataakun=mysqli_fetch_row(mysqli_query($con,"select * from tbanggota where alamatEmail='".$_SESSION['username']."' or nope='".$_SESSION['username']."'"));
if ($dataakun[8]=="N") {
    header("Location: galangdana");
    exit(); 
}
 $data=mysqli_fetch_row(mysqli_query($con,"select gd.*,a.nama from tbgalangdana as gd inner join tbanggota as a on(a.idAnggota=gd.idAnggota) where gd.slug='".$_GET['href']."'"));


 $jumlahuangterkumpul=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahterkumpul from tbberdonasigalangdana where idGalangDana=".$data[0]." and status='Y'"));

 $jumlahuangditarik=mysqli_fetch_row(mysqli_query($con,"select sum(jumlah) as jumlahtarik from tbpenarikangalangdana where idGalangDana=".$data[0]." and status='Y' or status='P'"));
?>
<section class="event_details_area pt-2 pb-5">
  <div class="container">
    <div class="event_d_inner">

      <div class="row event_text_inner">

        <div class="col-md-12 text-center">

            <div class="col-lg-8 text-left" style="display: inline-block;">
                <h4>Tarik Dana Galang Dana</h4><hr>
                <?php  
                   if(isset($_POST['simpan']))
                     {

                        if ($rekening=="") {
                            echo "<div class='alert alert-danger'>
                            <button class='close' data-dismiss='alert'>
                            <i class='ace-icon fa fa-times'></i>
                            </button>
                            <b>Gagal </b> Pilih rekening. 
                            </div>";
                        }else{
                            date_default_timezone_set('Asia/Jakarta');
                            
                            
                            $mail->IsSMTP();
                            $mail->SMTPSecure = 'ssl'; 
                            $mail->Host = "mail.aguspramono.com"; //host masing2 provider email
                            $mail->SMTPDebug = 2;
                            $mail->Port = 465;
                            $mail->SMTPAuth = true;
                            $mail->Username = "support@aguspramono.com"; //user email
                            $mail->Password = "AgusPramono3545"; //password email 
                            $mail->SetFrom("support@aguspramono.com","Sedekah"); //set email pengirim
                            $mail->Subject = "Penarikan Dana"; //subyek email
                            $mail->AddAddress($dataakun[5],$dataakun[2]);  //tujuan email


                            // Mengatur format email ke HTML
                            $mail->MsgHTML("<div class='col-lg-12 text-center' style='text-align: center;font-family: calibri;'>
                                    <div class='col-md-8' style='display: inline-block;'>
                                      <div class='right_text text-center'>

                                        <div class='row text-center mb-5' style='border: 1px solid gray;'>
                                          <div class='col-md-12 mt-2' style='padding: 10px;'>
                                            <b>Anda akan menarik dana untuk campaign</b><hr>
                                            <h4 style='margin: 0px;'>".$data[2]."</h4>
                                            <small style='color: #cecece;'><i class='fa fa-calendar'></i> ".date('d M Y',strtotime($data[7]))."</i> | <b>".$data[10]." <i class='fa fa-check-circle-o text-success'></i></b></small>

                                          </div>
                                        </div>

                                        <div style='margin-top: 8px;'>
                                          <span>Pada tanggal</span>
                                          <h3 style='margin: 0px;'>".date('d M Y h:i:s')."</h3>
                                        </div>

                                        <div style='margin-top: 20px;'>
                                          <span>Dana yang ditarik sebesar</span>
                                          <h2 style='margin: 0px;'>Rp. ".number_format($jumlahdanaambil,0,',','.')."</h2>
                                        </div>
                                        
                                         <div style='margin-top: 5px;'>
                                          <h3 style='margin: 0px;'>Anda akan menerima email tentang status penarikan dana anda.</h3>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>");


                            // Kirim email
                            $mail->Send();






                            $query=mysqli_query($con,"INSERT INTO tbpenarikangalangdana VALUES(NULL,".$id.",".$dataakun[0].",".$rekening.",".$jumlahdanaambil.",'".date('Y-m-d h:i:s')."','P','".$keterangan."')");
                            if($query){
                                echo "<div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>
                                <i class='ace-icon fa fa-times'></i>
                                </button>
                                <b>Sukses </b> Permintaan pengambilan dana berhasil dikirim dan akan kami konfirmasi 
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
                        
                    }

                ?>
                
                <div class='alert alert-info'>
                    <b>Info </b> jika jumlah dana terkumpul adalah <b>0</b>, cek pada data penarikan dana. 
                </div>
                                
              <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" size="40" class="form-control" value="<?php echo $data[0] ?>">
                <div class="form-group">
                    <label>Judul Campaign</label>
                    <input type="text" name="judul" size="40" class="form-control" value="<?php echo $data[2] ?>"  placeholder="Judul*" readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah Dana Terkumpul</label>
                    <input type="text" name="jumlah" size="40" class="form-control" id="jumlahsekarang" value="<?php echo $jumlahuangterkumpul[0]-$jumlahuangditarik[0] ?>"  placeholder="Jumlah*" readonly>
                </div>

                 <div class="form-group">
                    <label>Dana yang akan diambil</label>
                    <input type="text" name="jumlahdanaambil" size="40" class="form-control" id="tempJumlah" value="<?php echo $jumlahuangterkumpul[0]-$jumlahuangditarik[0] ?>" onkeypress="return hanyaAngka(event)"  placeholder="Jumlah*">
                    <small>Dana yang akan ditarik minimal 10.000, jika kurang dari 10.000 maka dana tidak dapat ditarik</small>
                </div>
                
                <div class="form-group">
                    <label>Digunakan untuk</label>
                    <textarea name="keterangan" class="form-control" required></textarea>
                </div>


               <script>
                function hanyaAngka(evt) {
                  var charCode = (evt.which) ? evt.which : event.keyCode
                  if (charCode > 31 && (charCode < 48 || charCode > 57))

                    return false;
                  return true;
                }
              </script>


              <script type="text/javascript">
                window.onload = function () {
                  document.getElementById("tempJumlah").onchange = validatePassword;
                  document.getElementById("jumlahsekarang").onchange = jumlahsekarang;
                }
                function validatePassword(){
                  var pass1=document.getElementById("tempJumlah").value;
                  var pass2=document.getElementById("jumlahsekarang").value;
                  if(pass1<10000)
                    document.getElementById("tempJumlah").setCustomValidity("Jumlah kurang dari 10000");
                  else if(pass1>pass2)
                  	document.getElementById("tempJumlah").setCustomValidity("Jumlah dana melebihi dari dana terkumpul");
                  else
                    document.getElementById("tempJumlah").setCustomValidity('');
                }
              </script>

                 <div class="form-group">
                    <label>Pilih Rekening</label>
                    <select name="rekening" class="form-control">
                        <option value="">Pilih Rekening</option>
                    	<?php 
				          $eksekusi=mysqli_query($con,"select * from tbrekeningmember where idAnggota=".$dataakun[0]." order by idRekeningMember desc");
				          $no=1;
				          while ($datarekening=mysqli_fetch_array($eksekusi)) {
				            ?>
				            <option value="<?php echo $datarekening[0]; ?>"><?php echo $datarekening[2]." (".$datarekening[4].") "; ?></option>

				            <?php  
				          }
				          ?>
                    </select>
                </div>
                <small>Belum ada rekening terdaftar? <a href="tambahrekeningmember?link=<?php echo $_GET['href']; ?>">daftarkan rekening</a></small>
            <div class="form-group submit-button">
                <input type="submit" name="simpan" value="Ajukan Pengambilan Dana" class="btn btn-primary" id="sub" style="border:none; margin: 20px 0 0 0">
                <a href="detailgalangdana?href=<?php echo $_GET['href']; ?>" class="btn btn-danger" style="border:none; margin: 20px 0 0 0">Kembali</a>
            </div>
    </form>
        </div>
        </div>



</div>


</div>
</div>
</section>

<?php include"footer.php"; ?>

