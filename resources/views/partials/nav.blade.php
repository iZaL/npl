<div id="navigation" class="yamm">
    <div class="navbar-collapse collapse">
        <div class="container">
            <a class="navbar-brand" href="{{ Auth::check() ? action('HomeController@home') : '#' }}"><img src="/images/logo.png" class="logo" alt=""></a>
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
            <!-- /.nav -->
           @include('partials.profile-dropdown')
        </div>
        <!-- /.container -->
    </div>
    <!-- /.navbar-collapse -->
</div>

