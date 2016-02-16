@if(Auth::check())
    <div class="btn-group pull-right profile-nav">
        @if(isset($unreadNotificationsCount) && ($unreadNotificationsCount > 0))
            <span class="badge notification-count" >
                <a href="{{ action('NotificationController@index') }}">
                    <span class="count">{{ $unreadNotificationsCount }}</span>
                </a>
            </span>
            <span class="badge notification-icon">
                <a href="{{ action('NotificationController@index') }}">
                    Notification <i class="fa fa-bell" style="font-size: 16px"></i>
                </a>
            </span>
        @endif
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