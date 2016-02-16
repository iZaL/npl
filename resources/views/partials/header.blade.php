<header>
    <div class="navbar">
        <div class="navbar-header">
            <div class="container">
                <a class="navbar-brand" href="{{ Auth::check() ? action('HomeController@home') : '#' }}"><img src="/images/logo.png" class="logo" alt=""></a>
                <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i
                            class='fa fa-bars'></i></a>

            </div>
            <!-- /.container -->
        </div>
        @include('partials.nav')
                <!-- /.yamm -->
    </div>
    <!-- /.navbar -->
</header>