
        <section class="clients_logo_area" style="background-color: #eff6ff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="callout-actions">
                            <a href="konfirmasigalangdana" class="btn btn-primary">Konfirmasi Pembayaran Galang Dana</a>
                        </div><!-- /.callout-actions -->
                    </div><!-- /.columns large-6 -->
                </div><!-- /.row -->
            </div>
        </section>

        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6  col-md-6 col-sm-6">
        				<div class="single-footer-widget">
        					<h6 class="footer_title">Tentang Kami</h6>
        					<p><?php echo substr(strip_tags($tentangwebkami[1]),0,150)  ?> <br>
        						<a href="about">Selengkapnya</a></p>
        					</div>
        				</div>							
        				<div class="col-lg-6 col-md-6 col-sm-6">
        					<div class="single-footer-widget instafeed">
        						<h6 class="footer_title">Kontak Kami</h6>
        						<div class="row">
        							<div class="col-md-3">
        								Alamat <span class="float-right">:</span>
        							</div>
        							<div class="col-md-9">
        								<?php echo $tentangwebkami[3] ?>
        							</div>

        							<div class="col-md-3">
        								Telepon<span class="float-right">:</span>
        							</div>
        							<div class="col-md-9">
        								<?php echo $tentangwebkami[2] ?>
        							</div>

        							<div class="col-md-3">
        								E-Mail<span class="float-right">:</span>
        							</div>
        							<div class="col-md-9">
        								<?php echo $tentangwebkami[4] ?>
        							</div>
        						</div>
        					</div>
        				</div>						
        			</div>
        			<div class="border_line"></div>
        			<div class="row footer-bottom d-flex justify-content-between align-items-center">
        				<p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        					<div class="col-lg-4 col-md-4 footer-social">
        						<a href="#"><i class="fa fa-facebook"></i></a>
        						<a href="#"><i class="fa fa-twitter"></i></a>
        						<a href="#"><i class="fa fa-dribbble"></i></a>
        						<a href="#"><i class="fa fa-behance"></i></a>
        					</div>
        				</div>
        			</div>
        		</footer>
        		<!--================ End footer Area  =================-->


        		<!-- Optional JavaScript -->
        		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
        		<script src="../js/jquery-3.2.1.min.js"></script>
        		<script src="../js/popper.js"></script>
        		<script src="../js/bootstrap.min.js"></script>
        		<script src="../js/stellar.js"></script>
        		<script src="../vendors/lightbox/simpleLightbox.min.js"></script>
        		<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
        		<script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
        		<script src="../vendors/isotope/isotope-min.js"></script>
        		<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
        		<script src="../js/jquery.ajaxchimp.min.js"></script>
        		<script src="../js/mail-script.js"></script>
        		<script src="../js/theme.js"></script>
        		<script src="../vendors/ckeditor/ckeditor.js"></script>
        		<!-- DataTables JavaScript -->
        		
        		<script type="text/javascript" src="../vendors/datatables/datatables.min.js"></script>
        		
        		<script>
        			$(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');

                CKEDITOR.on( 'required', function( evt ) {
                	alert( 'Isi masih kosong.' );
                	evt.cancel();
                } );
                

            })
        </script>
        <script>
        	$(document).ready( function () {
             $('#myTable').DataTable();
             $('#myTable1').DataTable();
             $('#myTable2').DataTable();
             $('#myTable3').DataTable();
             $('#myTable4').DataTable();
         } );
     </script>
 </body>
 </html>