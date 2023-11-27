<?php
    include"session.php";
    extract($_POST);
    include"../application/koneksi.php";
    // include "../../vendors/classes/class.phpmailer.php";
    // $mail = new PHPMailer; 

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/master-sedenasto.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Editor -->
    <link rel="stylesheet" href="../editor/tinymce.min.js">
    <script>tinymce.init({ selector:'textarea' });</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include"navbar.php"; ?>

        <div id="page-wrapper">
             <?php 
                if(isset($_GET['page']))
                    {
                      switch($_GET['page'])
                        {
                            case 'home': include'home.php'; break;
                            case 'artikel': include'artikel.php'; break;
                            case 'slide': include'slide.php'; break;
                            case 'about': include'about.php'; break;
                            case 'artikeldata': include'dataartikel.php'; break;
                            case 'slidedata': include'dataslide.php'; break;
                            case 'rekening': include'rekening.php'; break;
                            case 'admin': include'admin.php'; break;
                            case 'dataanggota': include'dataanggota.php'; break;
                            case 'uang': include'uang.php'; break;
                            case 'statusuang': include'statusuang.php'; break;
                            case 'riwayatdonasi': include'riwayatdonasi.php'; break;
                            case 'detailuang': include'detailuang.php'; break;
							case 'detailanggota': include'detailanggota.php'; break;
                            case 'pengeluaranuang': include'pengeluaranuang.php'; break;
                            case 'inputpengeluaranuang': include'inputpengeluaranuang.php'; break;
                            case 'ubahpassword': include'ubahpassword.php'; break;
                            case 'galangdana': include'galangdana.php'; break;
                            case 'verifikasiakun': include'verifikasiakun.php'; break;
                            case 'detailgalangdana': include'detailgalangdana.php'; break;
                            case 'tambahrekening': include'tambahrekening.php'; break;
                            case 'datadonasi': include'datadonasi.php'; break;
                            case 'konfirmasigalangdana': include'konfirmasigalangdana.php'; break;
                            case 'link': include'link.php'; break;
                            case 'menudonasi': include'menudonasi.php'; break;
                            case 'pelaporan': include'pelaporangalangdana.php'; break;
                            case 'pelaporancampaign': include'pelaporancampaign.php'; break;
                            case 'detaillaporan': include'detaillaporan.php'; break;
                            case 'sampuldepan': include'sampuldepan.php'; break;
							case 'tambahsampul': include'tambahsampul.php'; break;
                            case 'sponsor': include'sponsor.php'; break;
							case 'penarikandanacampaign': include'penarikandanacampaign.php'; break;
                        }   
                     }
             ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <script src="../dist/ckeditor/ckeditor.js"></script>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/master-sedenasto.js"></script>
    
    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
