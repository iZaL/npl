<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home" target="_blank">
            <img src="/images/logo.png" height="60">
        </a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ action('Admin\BlogController@index') }}"><i class="fa fa-pencil"></i> List Blog Posts</a>
                </li>
                <li>
                    <a href="{{ action('Admin\StudentController@index') }}"><i class="fa fa-graduation-cap"></i> List Students</a>
                </li>
                <li>
                    <a href="{{ action('Admin\EducatorController@index') }}"><i class="fa fa-users"></i> List Educators</a>
                </li>
                <li>
                    <a href="{{ action('Admin\QuestionController@index') }}"><i class="fa fa-question"></i> List Questions</a>
                </li>
                <li>
                    <a href="{{ action('Admin\QuestionController@getArchived') }}"><i class="fa fa-question"></i> Archived Questions</a>
                </li>
                <li>
                    <a href="{{ action('Admin\AnswerController@index') }}"><i class="fa fa-check"></i> List Answers</a>
                </li>

                <li>
                    <a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> List Users</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cubes"></i> Subject<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ action('Admin\SubjectController@index') }}"><i class="fa fa-list"></i> List</a>
                            <a href="{{ action('Admin\SubjectController@create') }}"><i class="fa fa-plus"></i> Add</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bolt"></i> Level<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ action('Admin\LevelController@index') }}"><i class="fa fa-list"></i> List</a>
                            <a href="{{ action('Admin\LevelController@create') }}"><i class="fa fa-plus"></i> Add</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
