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
                    <li><a href="#">Sub menu 1</a></li>
                    <li><a href="#">Sub menu 2</a></li>
                    <li><a href="#">Sub menu 3</a></li>
                    <li><a href="#">Sub menu 4</a></li>
                </ul>
            </li>
            <li class="submenu"><a href="#">Level</a>
                <ul>
                    <li><a href="#">Sub menu 1</a></li>
                    <li><a href="#">Sub menu 2</a></li>
                    <li><a href="#">Sub menu 3</a></li>
                    <li><a href="#">Sub menu 4</a></li>
                </ul>
            </li>
            <li>
                @if(Auth::check())
                    <a href="/ask"> Ask </a>
                @else
                    <a href="/auth/login">Login/Register</a>
                @endif
            </li>
            <li style="padding-right:0px;"><a href="#">Contact Us</a></li>
        </ul>
    </div>
</div>