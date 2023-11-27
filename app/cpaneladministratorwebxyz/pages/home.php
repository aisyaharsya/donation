    <div class="row">
        <?php 
        $query=mysqli_query($con,"select * from tbadmin where namaPengguna='".$_SESSION['username']."'");
        while($data=mysqli_fetch_row($query))
        {
            ?>

            <div class='alert alert-info' style="margin-top: 15px;">
                Selamat Datang Admin <b><?php echo $data[1]; ?></b> 
            </div>
            <?php
        }
        ?>
        <div class="col-lg-12">
            <h3 class="page-header">Donasi</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <?php  
                            $query=mysqli_query($con,"select * from tbanggota");
                            $jumlah=mysqli_num_rows($query);
                        ?>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 20px;"><?php echo $jumlah; ?></div>
                            <div>Anggota</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=dataanggota">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
       <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-gift fa-3x"></i>
                        </div>
                        <?php  
                            $jumlahdonatur=mysqli_num_rows(mysqli_query($con,"select idBerdonasiGalangDana from tbberdonasigalangdana where status='Y'"));
                            include"../../application/formatnumbertok.php";
                            $angkaribu=new angkaribu();
                            //while ($data=mysqli_fetch_array($query)) { ?>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 20px;"><?php echo $angkaribu->angkaformat($jumlahdonatur); ?></div>
                            <div>Total Donasi</div> 
                        </div>
                        <?php
                            //}
                        ?>
                    </div>
                </div>
                <a href="index.php?page=datadonasi">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div> 


<?php  
$jumlahdonatur=mysqli_num_rows(mysqli_query($con,"select idAnggota from tbberdonasigalangdana where status='Y' group by idAnggota"));
$jumlahdonasi=mysqli_fetch_array(mysqli_query($con,"select if(sum(jumlah) is null,0,sum(jumlah)) as jumlah from tbberdonasigalangdana where status='Y'"));
$jumlahcampaign=mysqli_num_rows(mysqli_query($con,"select idGalangDana from tbgalangdana where status='Y'"));
?>

<div class="col-lg-12">
            <h4 class="page-header">Galang Dana</h4>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 20px;">
                                 <?php 
                                      echo number_format($jumlahdonatur,0,',','.');

                                ?>
                            </div>
                            <div>Jumlah Donatur</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=konfirmasigalangdana">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
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
                                      echo number_format($jumlahdonasi[0],0,',','.');

                                ?>
                            </div>
                            <div>Jumlah Donasi</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=konfirmasigalangdana">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

          <div class="col-lg-4 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bank fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" style="font-size: 20px;">
                                 <?php 
                                      echo number_format($jumlahcampaign,0,',','.');

                                ?>
                            </div>
                            <div>Jumlah Campaigns</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=galangdana">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
            <!-- /.row -->