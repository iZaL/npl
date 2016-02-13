@if(Auth::check())
    <div class="btn-group pull-right profile-nav">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            Welcome, {{Auth::user()->firstname_en}} ({{Auth::user()->np_code}}) <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            @if(Auth::user()->isAdmin())
            <li><a href="{{action('Admin\HomeController@index')}}">Admin Panel</a></li>
            @endif
            <li><a href="{{action('ProfileController@show',Auth::user()->id)}}">Profile</a></li>
            <li><a href="/auth/logout">Logout</a></li>
        </ul>
    </div>
@endif