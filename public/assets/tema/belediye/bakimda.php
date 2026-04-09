<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>
        <?php echo $title;?>
    </title>
    <meta name="description" content="<?php echo $description;?>" />
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="<?php echo $description;?>" />
    <meta property="og:image" content="<?php echo $uri;?><?php echo $paylasim;?>" />
    <meta name="author" content="<?php echo FIRMAADI;?>" />
    <meta name="Abstract" content="<?php echo FIRMAADI;?>" />
    <meta name="Copyright" content="<?php echo COPYRIGHT;?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo TEMA;?>/uploads/favicon/<?php echo FAV;?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/plugins/bootstrap.min.css">

    <!-- Font Icons -->
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/icons/font-awesome.css">
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/icons/linea.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/plugins/loaders.min.css">
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/plugins/photoswipe.css">
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/icons/photoswipe/icons.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo TEMA;?>/bakimda/css/style.css">

    <!-- Responsive CSS -->
    <link href="<?php echo TEMA;?>/bakimda/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body data-spy="scroll" data-target=".scrollspy" class="bg-dark">

    <!-- Preloader  -->
    <div class="loader bg-dark">
        <div class="loader-inner ball-scale-ripple-multiple ball-scale-ripple-multiple-color">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- /End Preloader  -->


    <div id="page">

        <!-- ============================
       BG & Overlays
  ================================= -->

        <!-- Particle Waves BG -->
        <div id="particle-waves" class="section-overlay" data-bg-color="#1f64c5" data-wave-color="#28bbff"></div>
        <!-- /End Particle Waves BG -->

        <!-- Overlay BG -->
        <div class="section-overlay bg-black overlay-opacity"></div>
        <!-- /End Overlay BG -->

        <!-- ============================
       Header Navigation
  ================================= -->

        <header>
            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-white col-transform">
                            <div class="navbar-wrapper">

                                <!-- Navbar Button -->
                                <button class="navbar-button show-info" data-href="#content">
									<span></span>
									<span></span>
									<span></span>
								  </button>
                                <!-- /End Navbar Button -->

                                <!-- Navbar Links -->
                                <div class="navbar-links scrollspy">
                                    <ul class="nav">
                                        <li><a class="smooth-scroll link-white" href="#contact">İletişim</a></li>
                                    </ul>
                                </div>
                                <!-- /End Navbar Links -->

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container-fluid">
            <div class="row">


                <!-- ============================
           Info
      ================================= -->

                <div id="info" class="col-md-12 text-white text-center page-info col-transform">
                    <div class="vert-middle">
                        <div class="reveal scale-out">

                            <!-- Logo -->
                            <div class="p-t-b-15">
                                <img src="<?php echo TEMA;?>/uploads/logo/<?php echo LOGO;?>" alt="<?php echo FIRMAADI;?>">
                            </div>
                            <!-- /End Logo -->

                            <div class="p-t-b-15">
                                <!-- Headline & Description -->
                                <h2>SİTEMİZ BAKIMDADIR</h2>

                                <p>Şu anda bakımdayız.Kısa süre sonra geri döneceğiz.Daha sonra yeniden deneyiniz.<br>
                                </p>
                                <!-- /End Headline & Description -->
                            </div>
                            <!-- Arrow -->
                            <div class="p-t-b-20">
                                <i class="icon icon-sm icon-arrows-slim-down-dashed"></i>
                            </div>
                            <!-- /End Arrow -->

                            <!-- Buttons -->
                            <div class="p-t-b-15 btn-row">
                                <a class="btn btn-border-white show-info" role="button" data-href="#content">
									İLETİŞİM
								</a>
                            </div>
                            <!-- /End Buttons -->

                            <!-- Social Media Links -->
                            <div class="p-t-b-30">
                                <p>
									<a class="link-white" target="_blank" href="<?php echo FACEBOOK;?>"><i class="fa fa-facebook"></i></a>
									<a class="link-white" target="_blank" href="<?php echo TWITTER;?>"><i class="fa fa-twitter"></i></a>
									<a class="link-white" target="_blank" href="<?php echo INSTAGRAM;?>"><i class="fa fa-instagram"></i></a>
									<a class="link-white" target="_blank" href="<?php echo GPLUS;?>"><i class="fa fa-google-plus"></i></a>
                                </p>
                            </div>
                            <!-- Social Media Links -->

                        </div>
                    </div>
                </div>


                <!-- ============================
           Content
      ================================= -->

                <div id="content" class="page-content col-md-6 text-center bg-white-09">


                    <!-- ----------------------------
             Contact Section
        --------------------------------- -->

                    <section id="contact" class="p-t-b-30">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">

                                <!-- Headline -->
                                <div class="wrap-line border-dark">
                                    <h3>İLETİŞİM BİLGİLERİMİZ</h3>
                                </div>
                                <!-- /End Headline -->

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-6 p-t-b-5">

                                        <!-- Icon -->
                                        <div class="p-t-b-15">
                                            <i class="icon icon-lg icon-basic-geolocalize-01"></i>
                                        </div>
                                        <!-- /End Icon -->

                                        <!-- Address -->
                                        <div class="p-t-b-15">
                                            <h4>ADRES</h4>
                                            <p><?php echo ADRES;?></p>
                                        </div>
                                        <!-- /End Address -->

                                    </div>

                                    <div class="col-sm-12 col-xs-6 p-t-b-5">

                                        <!-- Icon -->
                                        <div class="p-t-b-15">
                                            <i class="icon icon-lg icon-basic-smartphone"></i>
                                        </div>
                                        <!-- /End Icon -->

                                        <!-- Address -->
                                        <div class="p-t-b-15">
                                            <h4>TELEFON</h4>
                                            <p>T. <a href="tel:<?php echo TELEFON;?>"> <?php echo TELEFON;?></a></p>
                                            <p>F. <a href="tel:<?php echo FAX;?>"> <?php echo FAX;?></a></p>
                                        </div>
                                        <!-- /End Address -->

                                    </div>

                                    <div class="col-sm-12  col-sm-offset-0 col-xs-6 col-xs-offset-3 p-t-b-5">

                                        <!-- Icon -->
                                        <div class="p-t-b-15">
                                            <i class="icon icon-lg icon-basic-globe"></i>
                                        </div>
                                        <!-- /End Icon -->

                                        <!-- Address -->
                                        <div class="p-t-b-15">
                                            <h4>E-MAİL</h4>
                                            <p><a href="mailto:<?php echo EMAIL;?>"><?php echo EMAIL;?></a><br>
                                        </div>
                                        <!-- /End Address -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Alert -->
                        <div id="message-contact" class="message-wrapper text-white message">
                            <i class="icon icon-sm icon-arrows-slim-right-dashed"></i>
                            <span class="message-text"></span>
                        </div>
                        <!-- /End Contact Alert -->

                    </section>

                </div>
            </div>
        </div>

    </div>
    <!-- /#page -->
    <div id="photoswipe"></div>

    <!-- Scripts -->
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/jquery1.11.2.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/scrollreveal.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/contact-form.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/newsletter-form.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/photoswipe/photoswipe.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/jquery.countdown.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/three.min.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/Projector.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/CanvasRenderer.js"></script>
    <script src="<?php echo TEMA;?>/bakimda/js/plugins/prefixfree.min.js"></script>

    <!-- Custom Script -->
    <script src="<?php echo TEMA;?>/bakimda/js/custom.js"></script>

</body>

</html>