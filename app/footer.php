

                <!--================ start footer Area  =================-->    
                <footer class="footer-area section_gap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6  col-md-6 col-sm-6">
                                <div class="single-footer-widget">
                                    <h6 class="footer_title">Tentang Kami</h6>
                                    <p style="color: #999DA0;"><?php echo substr(strip_tags($tentangwebkami[1]),0,150)  ?> <br>
                                        <a href="about">Selengkapnya</a></p>
                                    </div>
                                </div>                          
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-footer-widget instafeed">
                                        <h6 class="footer_title">Kontak Kami</h6>
                                        <div class="row" style="color: #999DA0;">
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

                            <!-- <div class="border_line"></div> -->

                            
                    </div>
                </footer>
                        <!--================ End footer Area  =================-->


                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="js/jquery-3.2.1.min.js"></script>
                        <script src="js/popper.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/stellar.js"></script>
                        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
                        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
                        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
                        <script src="vendors/isotope/isotope-min.js"></script>
                        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
                        <script src="js/jquery.ajaxchimp.min.js"></script>
                        <script src="js/mail-script.js"></script>
                        <script src="js/theme.js"></script>
                        <script src="vendors/ckeditor/ckeditor.js"></script>
                        <script>
                            $(function () {
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('editor1');

                                CKEDITOR.on( 'required', function( evt ) {
                                    alert( 'Isi masih kosong.' );
                                    evt.cancel();
                                }  );
                            

                            })
                        </script>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
                        <script>
                            var splide = new Splide('.splide', {
                                type: 'loop',
                                perPage: 3,
                                rewind: true,
                                breakpoints: {
                                    640: {
                                        perPage: 2,
                                        gap: '.7rem',
                                        height: '12rem',
                                    },
                                    480: {
                                        perPage: 1,
                                        gap: '.7rem',
                                        height: '12rem',
                                    },
                                },
                            });
                            splide.mount();
                        </script>
    </body>
    </html>