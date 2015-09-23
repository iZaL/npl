<header>
    <div class="navbar">
        <div class="navbar-header">
            <div class="container">

                <!-- ============================================================= LOGO MOBILE ============================================================= -->

                <a class="navbar-brand" href="#"><img src="assets/images/logo.png" class="logo" alt=""></a>

                <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i
                            class='icon-menu-1'></i></a>

            </div>
            <!-- /.container -->
        </div>
        <div class="yamm">
            <div class="navbar-collapse collapse">
                <div class="container">

                    <a class="navbar-brand scroll-to" href="#top"><img src="/images/logo.png" class="logo" alt=""></a>

                    <ul class="nav navbar-nav pull-right">

                        @if(Auth::check())
                            <li><a href="{{ route('home') }}">Home</a></li>
                        @else
                            <li><a href="{{ route('index') }}">Home</a></li>
                        @endif
                        <li><a href="{{ route('home') }}">About</a></li>
                        <li><a href="{{ route('home') }}">Subjects</a></li>
                        @if(Auth::check())
                            <li><a href="/auth/logout">Logout</a></li>
                        @else
                            <li><a href="{{ route('home') }}">Login</a></li>
                            <li><a href="{{ route('home') }}">Register</a></li>
                        @endif
                        <li><a href="{{ route('contact') }}">Contact</a></li>
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