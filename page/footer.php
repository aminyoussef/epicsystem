        
        <?php if(!isset($nofooter)) { ?>
            <!-- Footer Start -->
            <footer class="footer" style="background-image: url('images/svg-map.svg'); background-repeat: no-repeat; background-position: center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 py-lg-5">
                            <div class="footer-py-60 text-center">
                                <a href="/" class="logo-footer" style="
                                color: #fff;
                                font-size: 40px;
                            ">
                    <img src="logo/sky+.png" class="img-fluid" class="logo-light-mode" alt="" style="width: 115px">                    
                                </a>
                                <p class="mt-4 para-desc mx-auto">اكبر منصة تعليمية للمرحلة الثانوية بغرب الأسكندرية ستجد في سكاي اونلاين نخبة من اكبر المدرسين في الأسكندرية للمرحلة الثانوية و محتوى تعليمي مدروس و مرتب بعناية لضمان تيسير التعليم عن بعد</p>
                                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                </ul><!--end icon-->
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->

                <div class="footer-py-30 footer-bar bg-footer">
                    <div class="container text-center">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Sky Online Plus. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://www.facebook.com/amenYoussefAbdrazeq/" target="_blank" class="text-reset">Amen Youssef</a>.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div>
            </footer><!--end footer-->
            <!-- Footer End -->
        <?php } ?>
        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="<?php echo $js ?>bootstrap.bundle.min.js"></script>
        <!-- shuffle js -->
        <script src="<?php echo $js ?>shuffle.min.js"></script>
        <!-- Icons -->
        <script src="<?php echo $js ?>feather.min.js"></script>
        <!-- Switcher -->
        <script src="<?php echo $js ?>switcher.js"></script>
        <!-- Main Js -->
        <script src="<?php echo $js ?>plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="<?php echo $js ?>app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>

</html>