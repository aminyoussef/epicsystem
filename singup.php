


<?php
ob_start();
session_start([
'cookie_lifetime' => 86400
]);
$nomenu = '';
include 'system/init.php';

?>

<!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="index.php" class="btn btn-icon btn-primary"><i data-feather="home" class="icons"></i></a>
        </div>

                <!-- Hero Start -->
        <section class="bg-home bg-circle-gradiant d-flex align-items-center">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8"> 
                        <div class="card login-page bg-white shadow rounded border-0">
                            <div class="card-body">
                                <?php if(isset($_SESSION['formErrors'])) { ?>
                                    <p style="color: red;text-align: center;font-size: 19px;font-weight: bold;"><?php echo $_SESSION['formErrors'][0]; ?> </p>
                                <?php } ?>
                                
                                <h4 class="card-title text-center">انشاء حساب </h4>  
                                <form class="login-form mt-4" action="controll/con-singup.php" method="post">
                                    <div class="row">
                                    <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label"> الاسم <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="test" class="form-control ps-5" value="<?php if(isset($_SESSION['data'])){echo $_SESSION['data'][0]; } ?>" name='name' placeholder="الاسم" name="name" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label"> اسم المستخدم <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">   
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input  type="test" class="form-control ps-5" style="<?php if(isset($_SESSION['formErrors'])) {echo 'border: 1px solid #c60000 !important'; } ?>" name='username' value="<?php if(isset($_SESSION['data'])){echo $_SESSION['data'][1]; } ?>" placeholder="اسم المستخدم" name="email" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">كلمه المرور <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" name='password' placeholder="كلمه المرور" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->


                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">تسجيل الدخول</button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">هل انت  تملك حساب؟</small> <a href="index.php" class="text-dark fw-bold">تسجيل دخول </a></p>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div><!---->
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->


        <?php
$nofooter = '';
if(isset($_SESSION['data']) OR $_SESSION['formErrors']){
    session_destroy();
}

include 'page/footer.php'; 
ob_end_flush();
?>