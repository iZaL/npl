<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
        @include('partials.style')
    @show
</head>
<body id="top" >

<div id="wrap">

    <div class="navbar navbar-fixed-top">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Title</a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form pull-left" action="">
                    <input type="text" class="col col-lg-8" placeholder="Search">
                </form>
                <ul class="nav navbar-nav pull-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </div><!-- /.navbar -->

    <!-- CONTENT
   =================================-->


    <div class="jumbotron text-center">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12 col-sm-12">
                    <h1>Hello, world! I'm Bootstrap 3</h1>
                    <p>I'm mobile first! This is div class="jumbotron"</p>
                    <div class="row">
                        <div class="col col-lg-6 col-sm-6"><p><a class="btn  btn-primary btn-block btn-large" href="http://community.bootstraptor.com/categories/10088/bootstrap-3-version">Get more Bootstrap 3 examples</a></p></div>
                        <div class="col col-lg-6 col-sm-6"><p><a class="btn btn-danger btn-block btn-large" href="http://bootply.com/64786"> Get this code</a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /header container-->

    <!-- CONTENT
    =================================-->
    <div class="container">

        <div class="row">
            <div class="col col-lg-12"><div class="well"><p>1</p></div></div>
        </div>
        <div class="row">
            <div class="col col-lg-4"><div class="well"><p>4</p></div></div>
            <div class="col col-lg-4"><div class="well"><p>4</p></div></div>
            <div class="col col-lg-4"><div class="well"><p>4</p></div></div>
        </div>
        <div class="row">
            <div class="col col-lg-6"><div class="well"><p>6</p></div></div>
            <div class="col col-lg-6"><div class="well"><p>6</p></div></div>
        </div>



        <div class="row">
            <div class="col col-lg-4 col-sm-6"><div class="well">4 cols, 6 small cols</div></div>
            <div class="col col-lg-4 col-sm-6"><div class="well">4 cols, 6 small cols</div></div>
            <div class="col col-lg-4 col-sm-12"><div class="well">4 cols, 12 small cols</div></div>
        </div>
        <hr>
        <!-- MARKETING LINE-->
        <div class="row">
            <div class="well">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="lead ">

                            Bootstrap 3 Upgrader: Get your HTML from 2.3 to 3.0! Free Bootstrap 2 =&gt; 3 migration service now alive!
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <a class="btn btn-large btn-danger btn-block" href="http://bootstrap3.kissr.com/" target="_blank"> Start upgrade ?</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- /MARKETING LINE-->
    </div>
    <!-- /CONTENT
    =================================-->
</div><!-- end: Wrap all page content here -->

<!-- Footer
=================================-->
<div id="footer">
    <div class="container">
        <div class="row">
            <p class="text-muted">Footer Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
        </div>

    </div>
</div>
<!-- /Footer
=================================-->
@section('script')
    @include('partials.script')
@show
</body>
</html>
