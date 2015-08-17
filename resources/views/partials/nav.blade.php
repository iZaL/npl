<div class="navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse" id="menu">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Students Page</a></li>
            <li><a href="#">Educators Page</a></li>
            <li class="submenu"><a href="#">Subjects</a>
                <ul>
                    @foreach($subjects as $subject)
                        <li><a href="{{ action('SubjectController@show',$subject->id) }}">{{ ucfirst($subject->name) }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="submenu"><a href="#">Level</a>
                <ul>
                    @foreach($levels as $level)
                        <li><a href="{{ action('LevelController@show',$level->id) }}">{{ ucfirst($level->name) }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                @if(Auth::check())
                    <a href="{{ action('QuestionController@create') }}"> Ask </a>
                @else
                    <a href="/auth/login">Login/Register</a>
                @endif
            </li>
            <li style="padding-right:0px;"><a href="#">Contact Us</a></li>
        </ul>
    </div>
</div>