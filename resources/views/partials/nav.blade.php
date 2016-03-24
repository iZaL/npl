<header >
    <div class="navbar" style="background:url(/images/top-bg.jpg) left top repeat-x; padding-bottom: 20px; ">
        <div class="container">
            <a class="navbar-brand" href="{{ Auth::check() ? action('HomeController@home') : '#' }}"><img src="/images/logo.png" class="logo" alt=""></a>
            <span class="pull-right" style="padding-top: 90px;font-weight: 700;color: #032b62;font-size: 19.19px;">
                Do you have a Question? No problem
            </span>
        </div>
        <!-- /.container -->
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            @if($isEducator)
                                <li><a href="{{ action('EducatorController@getQuestions') }}">Home</a></li>
                            @elseif($isStudent)
                                <li><a href="{{ action('StudentController@getQuestions') }}">Home</a></li>
                            @elseif($user)
                                <li><a href="{{ route('home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('index') }}">Home</a></li>
                            @endif
                            <li><a href="{{ action('BlogController@index') }}">{{ trans('word.articles') }}</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle js-activated">Subjects</a>
                                <ul class="dropdown-menu">
                                    @foreach($subjects as $subject)
                                        <li>
                                            <a href="{{ action('SubjectController@show',$subject->id) }}">{{ ucfirst($subject->name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.dropdown-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle js-activated">Levels</a>

                                <ul class="dropdown-menu">
                                    @foreach($levels as $level)
                                        <li>
                                            <a href="{{ action('LevelController@show',$level->id) }}">{{ ucfirst($level->name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.dropdown-menu -->
                            </li>
                            @if(Auth::check())
                                <li><a href="{{ action('QuestionController@create') }}"> Ask Question </a></li>
                            @else
                                <li><a href="/auth/login">Login</a></li>
                                <li><a href="{{ action('Auth\AuthController@studentRegistration') }}">Register</a></li>
                            @endif
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" style=" margin-top: -30px;">
                            @include('partials.profile-dropdown')
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- /.container -->
        <!-- /.yamm -->
    </div>
    <!-- /.navbar -->
</header>
