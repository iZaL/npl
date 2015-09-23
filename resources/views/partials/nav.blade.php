<div id="navigation" class="yamm">
    <div class="navbar-collapse collapse">
        <div class="container">

            <a class="navbar-brand scroll-to" href="#top"><img src="/images/logo.png" class="logo" alt=""></a>

            <ul class="nav navbar-nav">

                @if($isEducator)
                    <li><a href="{{ action('EducatorController@getQuestions') }}">Home</a></li>
                @elseif($isStudent)
                    <li><a href="{{ action('StudentController@getQuestions',$user->id) }}">Home</a></li>
                @else
                    <li><a href="{{ route('index') }}">Home</a></li>
                @endif
                <li><a href="{{ route('home') }}">About</a></li>
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
                    <li><a href="{{ action('QuestionController@create') }}"> Ask </a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @else
                    <li><a href="/auth/login">Login</a></li>
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

