
<?php
	ob_start();
	session_start([
    'cookie_lifetime' => 86400
    ]);
    $nomenu = '';
	include 'system/init.php';


    if(!isset($_SESSION['LoginToken'])) {
        header('Location: index.php'); // Redirect To Dashboard Page
        exit();
    }

?>

        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="page-home.php" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>

        <!-- Hero Start -->
        <section class="bg-home bg-circle-gradiant d-flex align-items-center">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8"> 
                        <div class="card login-page bg-white shadow rounded border-0">
                            <div class="card-body">
                            <?php if(isset($_SESSION['formErrors'])) { 
                                foreach($_SESSION['formErrors'] as $error) { ?>
                                <p style="color: red;text-align: center;font-size: 19px;font-weight: bold;"><?php $error; ?> </p>
                            <?php } } ?>
                                <h4 class="card-title text-center">إضافة مهمه</h4>  
                                <form class="login-form mt-4" action="controll/task-add.php" enctype="multipart/form-data" method="post" >
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">الاسم <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="text" class="form-control ps-5" name='name' placeholder="الاسم " name="name" required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">تفصيل <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <textarea type="text" class="form-control ps-5" name='des' placeholder="التفصيل" required=""></textarea>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">يبدأ في <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="datetime-local" class="form-control ps-5" name='startTime'  required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">ينتهي في <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="datetime-local" class="form-control ps-5" name='endTime'  required="">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">الاهمية <span class="text-danger">*</span></label>
                                                <select class="form-select" multiple aria-label="multiple select example" name="priority" required=''>
                                                    <option value="1">Low</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">High</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">رفع ملف <span class="text-danger">*</span></label>
                                                <input type="file" name="file"
                                                  accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                />
                                            </div>
                                        </div><!--end col-->
                               
                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">إضافة</button>
                                            </div>
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

include 'page/footer.php'; 
ob_end_flush();
?>