
<?php
	ob_start();
	session_start([
    'cookie_lifetime' => 86400
    ]);
    $nomenu = '';
	include 'system/init.php';


    if(isset($_SESSION['LoginToken'])) {
        header('Location: page-home.php'); // Redirect To Dashboard Page
        exit();
    }
    

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
            <a href="index.php" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
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
                                <p style="color: red;text-align: center;font-size: 19px;font-weight: bold;"><?php echo $_SESSION['formErrors']; ?> </p>
                            <?php } ?>
                            <?php if(isset($_SESSION['done'])) { ?>
                                <p style="color: green;text-align: center;font-size: 19px;font-weight: bold;"><?php echo 'تم انشاء الحساب برجاء تسجيل الدخول'; ?> </p>
                            <?php } ?>
                                <h4 class="card-title text-center">تسجيل الدخول</h4>  
                                <form class="login-form mt-4" action="controll/con-login.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">البريد الالكتروني <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="test" class="form-control ps-5" name='username' placeholder="البريد الالكتروني" name="email" required="">
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

                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="mb-3">
                                                <p class="forgot-pass mb-0"><a href="auth-re-password.php" class="text-dark fw-bold">هل نسيت كلمه المرور؟</a></p>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">تسجيل الدخول</button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">هل انت لا تملك حساب؟</small> <a href="singup.php" class="text-dark fw-bold">انشاء الحساب</a></p>
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

    if(isset($_SESSION['done'])){
        session_destroy();
    }
include 'page/footer.php'; 
ob_end_flush();
?>