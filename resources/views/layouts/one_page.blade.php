<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
        <link href="/css/flaticon/flaticon.css" rel="stylesheet">
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/bower_components/fontawesome/css/font-awesome.min.css">

        <!-- Customizable CSS -->
        <link href="/css/main.css" rel="stylesheet" data-skrollr-stylesheet>
        <link href="/css/green.css" rel="stylesheet" title="Color">
        <link href="/css/owl.carousel.css" rel="stylesheet">
        <link href="/css/owl.transitions.css" rel="stylesheet">
        <link href="/css/animate.min.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <!-- Fonts -->
        {{--<link href="http://fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">--}}
        {{--<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">--}}

        <!-- Icons/Glyphs -->
        <link href="/fonts/fontello.css" rel="stylesheet">

        <style>
            [class^="flaticon-"]:before, [class*=" flaticon-"]:before, [class^="flaticon-"]:after, [class*=" flaticon-"]:after {
                font-family: Flaticon;
                font-size: 250px;
                line-height: 270px;
                font-style: normal;
            }
            [class^="flaticon-"]:hover {
                color:#009926;
            }
        </style>
    @show
</head>
<body id="top">

<header>
    <div class="navbar">

        <div class="navbar-header">
            <div class="container">

                <ul class="info pull-left">
                    <li><a href="#"><i class="icon-mail-1 contact"></i> info@reen.com</a></li>
                    <li><i class="icon-mobile contact"></i> +00 (123) 456 78 90</li>
                </ul>

                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                    <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-s-behance"></i></a></li>
                    <li><a href="#"><i class="icon-s-dribbble"></i></a></li>
                </ul>
                <!-- /.social -->

                <!-- ============================================================= LOGO MOBILE ============================================================= -->

                <a class="navbar-brand" href="#"><img src="/images/logo.png" class="logo" alt=""></a>

                <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i
                            class='icon-menu-1'></i></a>

            </div>
            <!-- /.container -->
        </div>
        <!-- /.navbar-header -->

        <div class="yamm">
            <div class="navbar-collapse collapse">
                <div class="container">


                    <a class="navbar-brand scroll-to" href="#top"><img src="/images/logo.png" class="logo" alt=""></a>

                    <ul class="nav navbar-nav pull-right">

                        <li><a href="#product" class="scroll-to" data-anchor-offset="0">Product</a></li>
                        <li><a href="#visit-our-store" class="scroll-to" data-anchor-offset="0">Store</a></li>
                        <li><a href="#reasons" class="scroll-to" data-anchor-offset="0">Benefits</a></li>
                        <li><a href="#get-in-touch" class="scroll-to" data-anchor-offset="0">Contact</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle js-activated" style="padding-right: 15px;">Features <i
                                        class="icon-down-open"></i></a>

                            <ul class="dropdown-menu" style="right: auto;">

                                <li><a href="slider-carousel.html">Slider/Carousel</a></li>
                                <li><a href="modal.html">Modal</a></li>
                                <li><a href="tab.html">Tab</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="isotope.html">Isotope</a></li>
                                <li><a href="styles.html">Styles</a></li>
                                <li><a href="font-icons.html">Font Icons</a></li>
                                <li><a href="backgrounds.html">Backgrounds</a></li>

                                <li class="dropdown-submenu">
                                    <a href="#">Colors</a>

                                    <ul class="dropdown-menu">
                                        <li><a class="changecolor green" title="Green color">Green</a></li>
                                        <li><a class="changecolor blue" title="Blue color">Blue</a></li>
                                        <li><a class="changecolor red" title="Red color">Red</a></li>
                                        <li><a class="changecolor pink" title="Pink color">Pink</a></li>
                                        <li><a class="changecolor purple" title="Purple color">Purple</a></li>
                                        <li><a class="changecolor orange" title="Orange color">Orange</a></li>
                                        <li><a class="changecolor navy" title="Navy color">Navy</a></li>
                                        <li><a class="changecolor gray" title="Gray color">Gray</a></li>
                                    </ul>
                                    <!-- /.dropdown-menu -->
                                </li>
                                <!-- /.dropdown-submenu -->

                                <li class="dropdown-submenu">
                                    <a href="#">Submenu Levels</a>

                                    <ul class="dropdown-menu">
                                        <li><a href="#">Second Level</a></li>
                                        <li><a href="#">Second Level</a></li>

                                        <li class="dropdown-submenu">
                                            <a href="#">More</a>

                                            <ul class="dropdown-menu">
                                                <li><a href="#">Third Level</a></li>
                                                <li><a href="#">Third Level</a></li>
                                            </ul>
                                            <!-- /.dropdown-menu -->
                                        </li>
                                        <!-- /.dropdown-submenu -->
                                    </ul>
                                    <!-- /.dropdown-menu -->
                                </li>
                                <!-- /.dropdown-submenu -->

                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>
                        <!-- /.dropdown -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle js-activated" style="padding-right: 15px;">One Page <i
                                        class="icon-down-open"></i></a>

                            <ul class="dropdown-menu">
                                <li><a href="one-page1.html">Product Style</a></li>
                                <li><a href="one-page2.html">Service Style</a></li>
                                <li><a href="one-page3.html">Agency Style</a></li>
                                <li><a href="one-page4.html">Portfolio Style</a></li>
                                <li><a href="one-page5.html">Showcase Style</a></li>
                                <li><a href="index-2.html">Multi Page</a></li>
                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>
                        <!-- /.dropdown -->

                    </ul>
                    <!-- /.nav -->

                </div>
                <!-- /.container -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.yamm -->
    </div>
    <!-- /.navbar -->
</header>

<main>

    <section id="hero">
        <div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg" style="opacity:0.7;">

            <div class="item" style="background-image: url(/images/slider/slider17.png);">
                <div class="container">
                    <div class="caption vertical-top text-right">
                        <h1 class="fadeInRight-1 dark-bg light-color"><span>Get help <br>with your studies</span></h1>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.item -->

            <div class="item" style="background-image: url(/images/slider/slider02.png);">
                <div class="container">
                    <div class="caption vertical-top text-left">
                        <h1 class="fadeInLeft-1 dark-bg light-color"><span>Be Innovative</span></h1>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.item -->

            <div class="item" style="background-image: url(/images/slider/slider12.png);">
                <div class="container">
                    <div class="caption vertical-top  text-center">

                        <h1 class="fadeInRight-1 dark-bg light-color"><span> Get help from <br>Skilled Teachers</span>
                        </h1>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.item -->

            <div class="item" style="background-image: url(/images/slider/slider04.png);">
                <div class="container">
                    <div class="caption vertical-top text-center">
                        <h1 class="fadeIn-1 dark-bg light-color"><span>Instant Coversations</span></h1>

                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.item -->

            <div class="item" style="background-image: url(/images/slider/slider18.png);">
                <div class="container">
                    <div class="caption vertical-top text-right">

                        <h1 class="fadeInDown-1  dark-bg light-color"><span>Made with love you <br>For You</span></h1>

                        <p class="fadeInDown-2 medium-color"></p>

                        <div class="fadeInDown-3 ">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                        <!-- /.fadeIn -->

                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.item -->

        </div>
        <!-- /.owl-carousel -->
    </section>

    <section id="product">
        <div class="container inner">

            <div class="row">

                <div class="col-sm-6 inner-right-xs text-right">
                    <figure><img src="/images/slider/slider12.png" alt=""></figure>
                </div>
                <!-- /.col -->

                <div class="col-sm-6 inner-top-xs inner-left-xs">
                    <h1 style="margin-top:-20px;">Do You Have a Question?</h1>

                    <h2>Dont Worry ! <br>Our Qualified Teachers are here to Help You !!</h2>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

            <div class="row inner-top-md ">

                <div class="col-sm-6 col-sm-push-6 inner-left-xs">
                    <figure><img src="/images/slider/science02.png" alt=""></figure>
                </div>
                <!-- /.col -->

                <div class="col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                    <h1 style="margin-top:-20px;">Our main objective is to </h1>

                    <h2><br>
                        <ul>
                            <li>
                                <i class="icon-heart"></i> Help Students to understand their courses.
                            </li>
                            <li>
                                <i class="icon-heart"></i> Prepare Students for their exams.
                            </li>
                            <li>
                                <i class="icon-heart"></i> Assist Students in their homeworks etc.
                            </li>
                        </ul>
                        <br>
                        We do this by establishing direct conversation between Students and highly Qualified Trainers.
                    </h2>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->


            <div class="row inner-top-md">

                <div class="col-sm-6">
                    <div class="flaticon-abecedary1 subject-icon"></div>
                </div>
                <!-- /.col -->

                <div class="col-sm-6 inner-top-xs inner-left-xs">
                    <h2>Social media made even easier</h2>

                    <p>Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni aut labor. Laceaque
                        quiae sitiorem rest non restibusaes es tumquam core posae volor remped modis volor. Doloreiur
                        qui commolu ptatemp dolupta oreprerum tibusam emnis et consent accullignis.</p>
                    <a href="#modal-product01" class="txt-btn" data-toggle="modal">Learn more about it</a>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>

    <section id="visit-our-store" class="img-bg img-bg-soft tint-bg"
             style="background-image: url(/images/art/image-background04.jpg);">
        <div class="container inner">

            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <header>
                        <h1>Customize your own model</h1>

                        <p>Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae
                            sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
                    </header>
                    <a href="#" class="btn btn-large">Visit our store</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>

    <section id="latest-works" class="light-bg">
        <div class="container inner">

            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>Check out our latest works</h1>
                    </header>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row inner-top-sm">
                <div id="owl-latest-works" class="owl-carousel owl-item-gap">

                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>Science</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-abecedary1 subject-icon"></div>
                            </figure>
                        </a>
                    </div><!-- /.item -->

                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>Mathematics</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-calculating12 subject-icon"></div>
                            </figure>
                        </a>
                    </div><!-- /.item -->
                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>Chemistry</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-science62 subject-icon"></div>
                            </figure>
                        </a>
                    </div><!-- /.item -->
                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>Physics</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-science65 subject-icon"></div>
                            </figure>
                        </a>
                    </div><!-- /.item -->
                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>Arabic</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-abecedary1 subject-icon"></div>
                            </figure>
                        </a>
                    </div>
                    <div class="item">
                        <a href="portfolio-post.html">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>French</h4>
                                    </div><!-- /.info -->
                                </figcaption>
                                <div class="flaticon-abecedary1 subject-icon"></div>
                            </figure>
                        </a>
                    </div>
                </div><!-- /.owl-carousel -->
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
    
    <section id="reasons">
        <div class="container inner">

            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>5 Reasons <br>why you should use our product</h1>

                        <p>Doloreiur quia commolu dolupta oreprerum tibusam.</p>
                    </header>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row inner-top-sm">
                <div class="col-xs-12">
                    <div class="tabs tabs-reasons tabs-circle-top tab-container">

                        <ul class="etabs text-center">
                            <li class="tab"><a href="#tab-1">
                                    <div>1</div>
                                    Function</a></li>
                            <li class="tab"><a href="#tab-2">
                                    <div>2</div>
                                    Simplicity</a></li>
                            <li class="tab"><a href="#tab-3">
                                    <div>3</div>
                                    Design</a></li>
                            <li class="tab"><a href="#tab-4">
                                    <div>4</div>
                                    Social</a></li>
                            <li class="tab"><a href="#tab-5">
                                    <div>5</div>
                                    Community</a></li>
                        </ul>
                        <!-- /.etabs -->

                        <div class="panel-container">

                            <div class="tab-content" id="tab-1">
                                <div class="row">

                                    <div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
                                        <figure><img src="/images/art/product04.jpg" alt=""></figure>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                                        <h3>Function</h3>

                                        <p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut
                                            labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor
                                            remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam
                                            emnis et consent accullignis lomnus.</p>
                                    </div>
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-content -->

                            <div class="tab-content" id="tab-2">
                                <div class="row">

                                    <div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
                                        <figure><img src="/images/art/product05.jpg" alt=""></figure>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
                                        <h3>Simplicity</h3>

                                        <p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut
                                            labor. Laceaque quiae sitiorem ut restibusaes es tumquam core posae volor
                                            remped modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam
                                            emnis et consent accullignis lomnus.</p>
                                    </div>
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-content -->

                            <div class="tab-content" id="tab-3">
                                <div class="row">

                                    <div class="col-md-4 col-md-push-3 col-md-offset-1 col-sm-6 inner-left-xs inner-right-xs">
                                        <figure><img src="/images/art/product06.jpg" alt=""></figure>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3 col-md-pull-4 col-sm-6 inner-top-xs">
                                        <h3>Design</h3>

                                        <p>Magnis modipsae lib voloratati andigen daepedor quiate aut labor. Laceaque
                                            quiae sitiorem resti est lore tumquam core posae volor uso remped modis
                                            volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent
                                            it accullignis orum lomnus.</p>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-3 col-sm-6 inner-top-xs">
                                        <h3>User interface</h3>

                                        <p>Magnis modipsae lib voloratati andigen daepedor quiate aut labor. Laceaque
                                            quiae sitiorem resti est lore tumquam core posae volor uso remped modis
                                            volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et consent
                                            it accullignis orum lomnus.</p>
                                    </div>
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-content -->

                            <div class="tab-content" id="tab-4">

                                <div class="row">
                                    <div class="col-md-5 col-sm-6 col-xs-8 center-block text-center">
                                        <figure><img src="/images/art/product03.jpg" alt=""></figure>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-8 center-block text-center inner-top-xs">
                                        <h3>Social</h3>

                                        <p>Magnis modipsae que lib voloratati andigen daepedor quiate ut reporemni aut
                                            labor. Laceaque sitiorem ut restibusaes es tumquam core posae volor remped
                                            modis volor. Doloreiur qui commolu ptatemp dolupta orem retibusam emnis et
                                            consent accullignis lomnus.</p>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.tab-content -->

                            <div class="tab-content" id="tab-5">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 center-block text-center">
                                        <h3>Community</h3>

                                        <p>Magnis modipsae que lib voloratati andigen daepeditem quiate ut reporemni aut
                                            labor. Laceaque quiae sitiorem rest non restibusaes es tumquam core posae
                                            volor remped modis volor. Doloreiur qui commolu ptatemp dolupta oreprerum
                                            tibusam emnis et consent accullignis.</p>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-content -->

                        </div>
                        <!-- /.panel-container -->

                    </div>
                    <!-- /.tabs -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>

    <section id="get-in-touch" class="inner-bottom">
        <div class="container inner light-bg">
            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>Want to work with us?</h1>

                        <p>Magnis modipsae que voloratati andigen daepeditem quiate re porem aut labor. Laceaque quiae
                            sitiorem rest non restibusaes maio es dem tumquam.</p>
                    </header>
                    <a href="#modal-contact01" class="btn btn-large" data-toggle="modal">Get in touch</a>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <div class="modal fade" id="modal-product01" tabindex="-1" role="dialog" aria-labelledby="modal-product01"
         aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
                    <h4 class="modal-title" id="modal-product01">Product information</h4>
                </div>
                <!-- /.modal-header -->


                <div class="modal-body">

                    <section id="portfolio-post">
                        <div class="container inner-top-xs inner-bottom">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="video-container">
                                        <iframe src="http://player.vimeo.com/video/44920080?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"
                                                width="1170" height="658" frameborder="0" webkitallowfullscreen
                                                mozallowfullscreen allowfullscreen></iframe>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row inner-top-xs reset-xs">

                                <div class="col-sm-7 inner-top-xs inner-right-xs">
                                    <header>
                                        <h2>Unleash your fingers</h2>

                                        <p class="text-normal">Magnis modipsae que lib voloratati andigen daepeditem
                                            quiate ut reporemni labor. Laceaque quiae sitiorem rest non restibusaes es
                                            tumquam core posae volor remped modis volor. Doloreiur qui commolu ptatemp
                                            dolupta oreprerum tibusam. Eumenis etus consent accullignis dentibea autem
                                            inisita posae volor conecus resto explabo.</p>

                                        <p class="text-normal">Soloreiur qui commolu ptatemp dolupta oreprerum tibusam
                                            emnis et consent accullignis. Laceaque quiae sitiorem rest non restibusaes
                                            es tumquam core posae voloris remped modis doloreiur qui commolu dolupta
                                            oreprerum et consent.</p>
                                    </header>
                                </div>
                                <!-- /.col -->

                                <div class="col-sm-4 col-sm-offset-1 outer-top-xs inner-left-xs border-left">
                                    <ul class="item-details">
                                        <li class="date">June 12, 2015</li>
                                        <li class="categories">Motion graphics</li>
                                        <li class="client">Mobile company</li>
                                        <li class="url"><a href="http://demo.fuviz.com/reen">demo.fuviz.com/reen</a>
                                        </li>
                                    </ul>
                                    <!-- /.item-details -->
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container -->

                    </section>


                    <section id="share" class="light-bg">
                        <div class="container">

                            <div class="col-sm-4 reset-padding">
                                <a href="#" class="btn-share-md">
                                    <p class="name">Facebook</p>
                                    <i class="icon-s-facebook"></i>

                                    <p class="counter">1080</p>
                                </a>
                            </div>
                            <!-- /.col -->

                            <div class="col-sm-4 reset-padding">
                                <a href="#" class="btn-share-md">
                                    <p class="name">Twitter</p>
                                    <i class="icon-s-twitter"></i>

                                    <p class="counter">1263</p>
                                </a>
                            </div>
                            <!-- /.col -->

                            <div class="col-sm-4 reset-padding">
                                <a href="#" class="btn-share-md">
                                    <p class="name">Google +</p>
                                    <i class="icon-s-gplus"></i>

                                    <p class="counter">963</p>
                                </a>
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.container -->
                    </section>


                </div>
                <!-- /.modal-body -->


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <!-- /.modal-footer -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-contact01" tabindex="-1" role="dialog" aria-labelledby="modal-contact01"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i class="icon-cancel-1"></i></span></button>
                    <h4 class="modal-title" id="modal-contact01">Get in touch</h4>
                </div>
                <!-- /.modal-header -->

                <div class="modal-body">

                    <section id="contact-form">
                        <div class="container inner-top-xs inner-bottom">

                            <div class="row">
                                <div class="col-md-8 col-sm-9 center-block text-center">
                                    <header>
                                        <h1>Get in touch</h1>

                                        <p>Do you want to know more? We’d love to hear from you!</p>
                                    </header>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">

                                        <div class="col-sm-6 outer-top-md inner-right-sm">

                                            <h2>Leave a Message</h2>

                                            <form id="contactform" class="forms"
                                                  action="http://demo.fuviz.com/reen/v1-3/contact.php" method="post">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" class="form-control"
                                                               placeholder="Name (Required)">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="email" name="email" class="form-control"
                                                               placeholder="Email (Required)">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="subject" class="form-control"
                                                               placeholder="Subject">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <textarea name="message" class="form-control"
                                                                  placeholder="Enter your message ..."></textarea>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <button type="submit" class="btn btn-default btn-submit">Submit
                                                    message
                                                </button>

                                            </form>

                                            <div id="response"></div>

                                        </div>
                                        <!-- ./col -->

                                        <div class="col-sm-6 outer-top-md inner-left-sm border-left">

                                            <h2>Contacts</h2>

                                            <p>Magnis modipsae voloratati andigen daepeditem quiate re aut labor.
                                                Laceaque eictemperum quiae sitiorem rest non restibusaes.</p>

                                            <h3>REEN</h3>
                                            <ul class="contacts">
                                                <li><i class="icon-location contact"></i> 84 Street, City, State 24813
                                                </li>
                                                <li><i class="icon-mobile contact"></i> +00 (123) 456 78 90</li>
                                                <li><a href="mailto:info@reen.com"><i class="icon-mail-1 contact"></i>
                                                        info@reen.com</a></li>
                                            </ul>
                                            <!-- /.contacts -->

                                            <div class="social-network">
                                                <h3>Social</h3>
                                                <ul class="social">
                                                    <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                                    <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                                    <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                                    <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="icon-s-behance"></i></a></li>
                                                    <li><a href="#"><i class="icon-s-dribbble"></i></a></li>
                                                </ul>
                                                <!-- /.social -->
                                            </div>
                                            <!-- /.social-network -->

                                        </div>
                                        <!-- /.col -->

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container -->
                    </section>


                </div>
                <!-- /.modal-body -->


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <!-- /.modal-footer -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</main>


<!-- ============================================================= FOOTER ============================================================= -->

<footer class="dark-bg">
    <div class="container inner">
        <div class="row">

            <div class="col-md-3 col-sm-6 inner">
                <h4>Who we are</h4>
                <a href="#top" class="scroll-to"><img class="logo img-intext" src="/images/logo-white.svg" alt=""></a>

                <p>Magnis modipsae voloratati andigen daepeditem quiate re porem que aut labor. Laceaque eictemperum
                    quiae sitiorem rest non restibusaes maio es dem tumquam.</p>
                <a href="#" class="txt-btn">More about us</a>
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 inner">
                <h4>Product Videos</h4>

                <div class="row thumbs gap-xs">

                    <div class="col-xs-6 thumb">
                        <figure class="icon-overlay icn-link">
                            <a href="#modal-product01" data-toggle="modal"><img src="/images/art/work02.jpg" alt=""></a>
                        </figure>
                    </div>
                    <!-- /.thumb -->

                    <div class="col-xs-6 thumb">
                        <figure class="icon-overlay icn-link">
                            <a href="#modal-product01" data-toggle="modal"><img src="/images/art/work03.jpg" alt=""></a>
                        </figure>
                    </div>
                    <!-- /.thumb -->

                    <div class="col-xs-6 thumb">
                        <figure class="icon-overlay icn-link">
                            <a href="#modal-product01" data-toggle="modal"><img src="/images/art/work07.jpg" alt=""></a>
                        </figure>
                    </div>
                    <!-- /.thumb -->

                    <div class="col-xs-6 thumb">
                        <figure class="icon-overlay icn-link">
                            <a href="#modal-product01" data-toggle="modal"><img src="/images/art/work01.jpg" alt=""></a>
                        </figure>
                    </div>
                    <!-- /.thumb -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->


            <div class="col-md-3 col-sm-6 inner">
                <h4>Get In Touch</h4>

                <p>Doloreiur quia commolu ptatemp dolupta oreprerum tibusam eumenis et consent accullignis dentibea
                    autem inisita.</p>
                <ul class="contacts">
                    <li><i class="icon-location contact"></i> 84 Street, City, State 24813</li>
                    <li><i class="icon-mobile contact"></i> +00 (123) 456 78 90</li>
                    <li><a href="#"><i class="icon-mail-1 contact"></i> info@reen.com</a></li>
                </ul>
                <!-- /.contacts -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 inner">
                <h4>Free updates</h4>

                <p>Conecus iure posae volor remped modis aut lor volor accabora incim resto explabo.</p>

                <form id="newsletter" class="form-inline newsletter" role="form">
                    <label class="sr-only" for="exampleInputEmail">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail"
                           placeholder="Enter your email address">
                    <button type="submit" class="btn btn-default btn-submit">Subscribe</button>
                </form>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div>
    <!-- .container -->

    <div class="footer-bottom">
        <div class="container inner">
            <p class="pull-left">© 2015 REEN. All rights reserved.</p>
            <ul class="footer-menu pull-right">
                <li><a href="#product" class="scroll-to">Product</a></li>
                <li><a href="#visit-our-store" class="scroll-to">Store</a></li>
                <li><a href="#reasons" class="scroll-to">Benefits</a></li>
                <li><a href="#get-in-touch" class="scroll-to">Contact</a></li>
            </ul>
            <!-- .footer-menu -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bottom -->
</footer>

<!-- ============================================================= FOOTER : END ============================================================= -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="/js/jquery.easing.1.3.min.js"></script>
<script src="/js/jquery.form.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/js/skrollr.min.js"></script>
<script src="/js/skrollr.stylesheets.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/waypoints-sticky.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/jquery.easytabs.min.js"></script>
<script src="/js/google.maps.api.v3.js"></script>
<script src="/js/viewport-units-buggyfill.js"></script>
<script src="/js/scripts.js"></script>

</body>
</html>
