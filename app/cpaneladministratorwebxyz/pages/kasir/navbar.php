<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">KASIR</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


                <?php  
                //    $jumlahdonasibahan=mysqli_num_rows(mysqli_query($con,"select * from tbdonasibahan where status=''"));

                    // $jumlahdonasinasi=mysqli_num_rows(mysqli_query($con,"select * from tbdonasinasi where status=''"));

                    $jumlahdonasiuang=mysqli_num_rows(mysqli_query($con,"select * from tbuang where status=''"));                   
					
					$jumlahbuktitransfer=mysqli_num_rows(mysqli_query($con,"select * from tbuang where gambar<>'' and status='Belum Upload Bukti Transfer'"));

                    // $jumlahnomorresi=mysqli_num_rows(mysqli_query($con,"select * from tbdonasibahan where noresi<>'' and status='Nomor Resi Belum Dikirim'"));

                    $jumlahcampaign=mysqli_num_rows(mysqli_query($con,"select * from tbgalangdana where status='P'"));

                    $pembayarangalangdana=mysqli_num_rows(mysqli_query($con,"select * from tbberdonasigalangdana where status='P' or status='K'"));
                    $laporangalangdana=mysqli_num_rows(mysqli_query($con,"select * from tblaporangalangdana where status='P' order by   idLaporanGalangDana desc"));
                    $penarikandana=mysqli_num_rows(mysqli_query($con,"select * from tbpenarikangalangdana where status='P'"));


                    $jumlahsemuadonasi=$jumlahdonasiuang  + $jumlahbuktitransfer + $jumlahcampaign + $pembayarangalangdana + $laporangalangdana+$penarikandana;
                ?>
                <!-- /.dropdown -->
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <span style="color:red;"><?php echo $jumlahsemuadonasi; ?></span> (Pemberitahuan) <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php 
                            $eksekusi=mysqli_query($con,"select * from tbgalangdana where status='P' order by idGalangDana desc");
                            $no=1;
                            while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                            <li>
                                <a href="index.php?page=detailgalangdana&href=<?php echo $data[3]; ?>">
                                    <div>
                                        <span style="color: blue;">Galang Dana</span> 
                                        <span class="pull-right text-muted small text-danger">New</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>

                        <?php } ?>

                        <?php 
                            $eksekusi=mysqli_query($con,"select * from tbpenarikangalangdana where status='P' order by idpenarikangalangdana desc");
                            $no=1;
                            while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                            <li>
                                <a href="index.php?page=penarikandanacampaign">
                                    <div>
                                        <span style="color: blue;">Penarikan Dana Campaign</span> 
                                        <span class="pull-right text-muted small text-danger">New</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>

                        <?php } ?>



                        <?php 
                           $eksekusi =mysqli_query($con,"select bgd.*,gd.*,a.*,r.*,gd.jumlah as jumlahGoal,a.nama as namaAnggota,bgd.jumlah as jumlahtf,bgd.tanggalBerakhir as tanggalAkhirTransfer, bgd.status as statusbayar from tbberdonasigalangdana as bgd inner join tbgalangdana as gd on(gd.idGalangDana=bgd.idGalangDana) inner join tbanggota as a on(a.idAnggota=gd.idAnggota) inner join tbrekening as r on(r.idRekening=bgd.idRekening) where bgd.status='P' or bgd.status='K' order by bgd.idBerdonasiGalangDana desc");
                            $no=1;
                            while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                            <li>
                                <a href="index.php?page=konfirmasigalangdana">
                                    <div>
                                        <span style="color: blue;">Donasi Galang Dana</span> 
                                        <span class="pull-right text-muted small text-danger">New</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>

                        <?php } ?>



                        <?php 
                            $eksekusi=mysqli_query($con,"select * from tblaporangalangdana where status='P' order by idLaporanGalangDana desc");
                            $no=1;
                            while ($data=mysqli_fetch_array($eksekusi)) {
                        ?>
                            <li>
                                <a href="index.php?page=pelaporan&href=<?php echo $data[0]; ?>">
                                    <div>
                                        <span style="color: blue;">Pelaporan Galang Dana</span> 
                                        <span class="pull-right text-muted small text-danger">New</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>

                        <?php } ?>







                        <?php  
                        // $query1=mysqli_query($con,"select tbdonasibahan.idBahanMakanan,tbanggota.nama,tbdonasibahan.tanggal,tbdonasibahan.status from tbdonasibahan inner join tbanggota on tbdonasibahan.idAnggota=tbanggota.idAnggota where tbdonasibahan.status='' order by tbdonasibahan.idBahanMakanan desc");
                        // $jumlahdonasibahan=mysqli_num_rows($query1);
                        // if($jumlahdonasibahan>0)
                        // {
                        //     while ($data=mysqli_fetch_array($query1)) { ?>
                                <!-- <li>
                                    <a href="index.php?page=detailbahan&bahanmakanan=<?php echo $data['idBahanMakanan'] ?>">
                                        <div>
                                            <span style="color: blue;"><?php echo $data['nama']; ?></span> 
                                            <span class="pull-right text-muted small">Bahan Makanan</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li> -->
                        <?php 
                        // }
                        // } else
                        // {

                        // }
                        ?>

                        <?php  
                        $query2=mysqli_query($con,"select tbuang.idUang,tbanggota.nama from tbuang inner join tbanggota on tbuang.idAnggota=tbanggota.idAnggota where tbuang.status='' order by tbuang.idUang desc");
                        $jumlahdonasiuang=mysqli_num_rows($query2);
                        if($jumlahdonasiuang>0)
                        {
                            while ($data=mysqli_fetch_array($query2)) { ?>
                                <li>
                                    <a href="index.php?page=detailuang&uang=<?php echo $data['idUang'] ?>">
                                        <div>
                                            <span style="color: blue;"><?php echo $data['nama']; ?></span> 
                                            <span class="pull-right text-muted small">Uang</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                        <?php }
                        } else
                        {

                        }
                        ?>

                        <?php  
                        // $query3=mysqli_query($con,"select tbdonasinasi.idNasi,tbanggota.nama from tbdonasinasi inner join tbanggota on tbdonasinasi.idAnggota=tbanggota.idAnggota where tbdonasinasi.status='' order by tbdonasinasi.idNasi desc");
                        // $jumlahdonasinasi=mysqli_num_rows($query3);
                        // if($jumlahdonasinasi>0)
                        // {
                        //     while ($data=mysqli_fetch_array($query3)) { ?>
                                <!-- <li>
                                    <a href="index.php?page=detailnasi&nasibungkus=<?php echo $data['idNasi'] ?>">
                                        <div>
                                            <span style="color: blue;"><?php echo $data['nama']; ?></span> 
                                            <span class="pull-right text-muted small">Nasi Bungkus</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li> -->
                        <?php 
                        // }
                        // } else
                        // {

                        // }
                        ?>

						
						<?php  
                        $query6=mysqli_query($con,"select * from tbuang where gambar<>'' and status='Belum Upload Bukti Transfer' order by idUang desc");
                        $jumlahbuktitransfer=mysqli_num_rows($query6);
                        if($jumlahbuktitransfer>0)
                        {
                            while ($data=mysqli_fetch_array($query6)) { ?>
                                <li>
                                    <a href="index.php?page=detailuang&uang=<?php echo $data['idUang'] ?>">
                                        <div>
                                            <span style="color: blue;"><?php echo $data[3]; ?></span> 
                                            <span class="pull-right text-muted small">Bukti Transfer</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                        <?php }
                        } else
                        {

                        }
                        ?>

                        <?php  
                        // $query7=mysqli_query($con,"select tbdonasibahan.idBahanMakanan,tbanggota.nama,tbdonasibahan.tanggal,tbdonasibahan.status from tbdonasibahan inner join tbanggota on tbdonasibahan.idAnggota=tbanggota.idAnggota where tbdonasibahan.noresi<>'' and tbdonasibahan.status='Nomor Resi Belum Dikirim' order by tbdonasibahan.idBahanMakanan desc");
                        // $jumlahnomorresi1=mysqli_num_rows($query7);
                        // if($jumlahnomorresi1>0)
                        // {
                        //     while ($data=mysqli_fetch_array($query7)) { ?>
                                <!-- <li>
                                    <a href="index.php?page=detailbahan&bahanmakanan=<?php echo $data['idBahanMakanan'] ?>">
                                        <div>
                                            <span style="color: blue;"><?php echo $data['nama']; ?></span> 
                                            <span class="pull-right text-muted small">Nomor Resi</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li> -->
                        <?php 
                        // }
                        // } else
                        // {

                        // }
                        ?>
                                              
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <?php 
                        $query=mysqli_query($con,"select * from tbadmin where namaPengguna='".$_SESSION['username']."'");
                        while($data=mysqli_fetch_row($query))
                        {
                            ?>
                        <li><a href="index.php?page=ubahpassword&saya=<?php echo $data[2] ?>"><i class="fa fa-gear fa-fw"></i> Ubah Profil</a>
                        </li>
                    <?php } ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php?page=home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                         <li>
                            <a href="index.php?page=galangdana"><i class="fa fa-briefcase fa-fw"></i> Galang Dana</a>
                        </li>

                         <li>
                            <a href="index.php?page=konfirmasigalangdana"><i class="fa fa-dollar fa-fw"></i> Konfirmasi Donasi Campaign</a>
                        </li>

                         <li>
                            <a href="index.php?page=penarikandanacampaign"><i class="fa fa-dollar fa-fw"></i> Penarikan Dana Campaign</a>
                        </li>

                        <li>
                            <a href="index.php?page=pelaporancampaign"><i class="fa fa-info fa-fw"></i>Pelaporan Galang Dana</a>
                        </li>

                        <li>
                            <!-- <a href="#"><i class="fa fa-heart fa-fw"></i> Sedekah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=nasibungkus">Sedekah Nasi Bungkus</a>
                                </li>
                                <li>
                                    <a href="index.php?page=bahanmakanan">Sedekah Bahan Makanan</a>
                                </li>
                            </ul> -->
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>