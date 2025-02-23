
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Project A</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="author" content="Amen Youssef" />
        <meta name="Version" content="v5.0.0" />
        <!-- favicon -->
        <!-- Bootstrap -->
        <link href="<?php echo $css ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- tobii css -->
        <link href="<?php echo $css ?>tobii.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?php echo $css ?>materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->               
        <link rel="stylesheet" href="<?php echo $css ?>tiny-slider.css"/> 
        <!-- Main Css -->
        <link href="style-rtl.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="<?php echo $css ?>colors/default.css" rel="stylesheet" id="color-opt">

    </head>

    <body>
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
<?php if(!isset($nomenu))  { ?>
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.php">
                    <img src="logo/sky+.png" class="img-fluid" class="logo-light-mode" alt="" style="width: 115px">                    
                </a>
                
                <!-- Logo End -->

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li class="active"><a href="index.php" class="sub-menu-item">الرئيسيه</a></li>
                        <li><a href="tatcher.php" class="sub-menu-item">المدرسين</a></li>
                        <li><a href="login.php" class="sub-menu-item">تسجيل الدخول</a></li>
                        <li><a href="singup.php" class="sub-menu-item" style="color: #3c4858 !important;">انشاء حساب</a></li>

                    </ul>
                </div>
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
      <?php }  ?>