<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
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
        <link href="/css/flaticon/flaticon.css" rel="stylesheet">
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
                color: #009926;
            }
        </style>
    @show
</head>
<body id="top">

<header>
    <div class="navbar">
        <div class="navbar-header">
            <div class="container">

                <!-- ============================================================= LOGO MOBILE ============================================================= -->

                <a class="navbar-brand" href="#"><img src="assets/images/logo.png" class="logo" alt=""></a>

                <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>

            </div><!-- /.container -->
        </div>
        <div class="yamm">
            <div class="navbar-collapse collapse">
                <div class="container">

                    <a class="navbar-brand scroll-to" href="#top"><img src="/images/logo.png" class="logo" alt=""></a>

                    <ul class="nav navbar-nav pull-right">

                        <li><a href="#home" class="scroll-to" data-anchor-offset="0">Home</a></li>
                        <li><a href="#about" class="scroll-to" data-anchor-offset="0">About</a></li>
                        <li><a href="#subjects" class="scroll-to" data-anchor-offset="0">Subjects</a></li>
                        <li><a href="#signup" class="scroll-to" data-anchor-offset="0">Register</a></li>
                        <li><a href="#contact" class="scroll-to" data-anchor-offset="0">Contact</a></li>
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

    <section id="home">
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
                            <a href="#about"  class="scroll-to btn btn-large" data-anchor-offset="0">Get started now</a>
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

    <section id="about">
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

        </div>
        <!-- /.container -->
    </section>


    <section id="subjects" class="light-bg">
        <div class="container inner">

            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>Browse Subjects</h1>
                    </header>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row inner-top-sm">
                <div id="owl-latest-works" class="owl-carousel owl-item-gap">

                    @foreach($subjects as $subject)
                    <div class="item">
                        <a href="#">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>{{ ucfirst($subject->name) }}</h4>
                                    </div>
                                    <!-- /.info -->
                                </figcaption>
                                <div class="{{ strtolower($subject->icon) }} subject-icon"></div>
                            </figure>
                        </a>
                    </div>
                    <!-- /.item -->
                    @endforeach
                </div>
                <!-- /.owl-carousel -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>

    <section id="signup">
        <div class="container inner">

            <div class="row">
                <div class="col-md-8 col-sm-9 center-block text-center">
                    <header>
                        <h1>Sign up Now !!</h1>
                    </header>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row inner-top-sm">
                <div class="col-xs-12">
                    <div class="tabs tabs-reasons tabs-circle-top tab-container">

                        <ul class="etabs text-center">
                            <li class="tab">
                                <a href="#tab-1">
                                    As a Student
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#tab-2">
                                    As an Educator
                                </a>
                            </li>
                        </ul>
                        <!-- /.etabs -->

                        <div class="panel-container">

                            <div class="tab-content" id="tab-1">
                                <div class="row">

                                    <div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
                                        <figure><img src="/images/slider/student1.png" alt=""></figure>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                                        <h3>Signup Process</h3>

                                        <li>Go to Registration Page</li>
                                        <li>Fill the Requested Details</li>
                                        <li>The website will provide you with an ID number and Password. <br>
                                            Your personal information will not be visible to others.<br>
                                            When you ask a Question, Educator(s) will see the question and your ID
                                            number. <br>
                                            This way they enter in contact with you to define a way of collabration
                                            either by
                                            hourly fees or other ways.<br>
                                            Your question will appear(advertised) for
                                            one week. However, if you get an answer earlier, you can delete the
                                            question.
                                        </li>
                                        <li> Subscription is FREE for one month. After that a fee of $5/semester (6
                                            months) is requested.
                                        </li>
                                    </div>
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.tab-content -->

                            <div class="tab-content" id="tab-2">
                                <div class="row">

                                    <div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
                                        <figure><img src="/images/slider/educator1.png" alt=""></figure>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
                                        <h3>Signup Process</h3>
                                        <li>Go to Registration Page</li>
                                        <li>Fill the Requested Details</li>
                                        <li>
                                            1. Help students in understanding their subject, answering urgent questions,
                                            solving problems, exam preparation etc...<br>

                                            2. Educators will check the (asked) questions which apear in the appropriate
                                            level of the subject<br>

                                            3. If the Educator is interested in answering the question he/she click the
                                            student NP Code(unique code for the student). This enables the educator to
                                            initiate a contact between with the student.<br>

                                            4. Both parties (Educator/Student) can establish the collaboration method,
                                            either by hourly or whole semester fee.<br>

                                            5. It is hoped that fees will be very reasonable.<br>

                                            6. Educators establish the way of recieving the fee by Paypal, Safepay or
                                            whatever means.<br>

                                            7. No home or private lessons are permitted.<br>

                                            8. Registration on the No Problem website is FREE for one month. After that
                                            a fee of $10/year is requested.<br>
                                        </li>
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

    <!-- /.modal -->

</main>

<footer class="dark-bg">
    <div class="container inner">
        <div class="row">

            <div class="col-md-4 col-sm-6 inner">
                <h4>No Problem Learning</h4>
            </div>

            <div class="col-md-4 col-sm-6 inner">
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

            <div class="col-md-4 col-sm-6 inner">
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
            <p class="pull-left">© 2015 <a href="http://no-problem-learning.com">No Problem Learning</a>. All rights
                reserved.</p>
            <ul class="footer-menu pull-right">
                <li>Site Developed By <a href="http://www.ideasowners.net" class="scroll-to">Ideasowners</a></li>
            </ul>
            <!-- .footer-menu -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bottom -->
</footer>

@section('script')
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.easing.1.3.min.js"></script>
    <script src="/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="/js/skrollr.min.js"></script>
    <script src="/js/skrollr.stylesheets.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/waypoints-sticky.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.isotope.min.js"></script>
    <script src="/js/jquery.easytabs.min.js"></script>
    <script src="/js/viewport-units-buggyfill.js"></script>
    <script src="/js/scripts.js"></script>
@show
</body>
</html>
