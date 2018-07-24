<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/">目標一覧</a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())

                        <li><a href='{{route('microposts.intro')}}'><i class="far fa-question-circle"></i> How to Use</a></li>
                        
                        <li><a href='{{route('microposts.point')}}'><i class="far fa-question-circle"></i> What's POINT</a></li>
                          
                        <li><a href='{{route('users.index')}}'><i class="fas fa-user-friends"></i> Users</a></li>
                        
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                 
                                 <li>{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
                                 
                                 <li role="separator" class="divider"></li>
                                 
                                 <li><a href='{{route('logout.get')}}'><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                             </ul>
                             
                        </li>
                        
                        
                        

                    @else
                        <li>{!! link_to_route('signup.get', 'Signup') !!}</li>
                        <li>{!! link_to_route('login', 'Login') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>