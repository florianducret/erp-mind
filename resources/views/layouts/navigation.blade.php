    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                     <img src="http://img15.hostingpics.net/thumbs/mini_571818LogoMiNDvectoris.png" alt="Heberger image" height="25"/>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
               @if(Auth::user())
                <div class="navbar-left">
                    <a href="#" class="btn btn-info navbar-btn" id="menu-toggle"><i class="glyphicon glyphicon-menu-hamburger"></i> Menu</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ url('/entreprises') }}">Entreprises</a></li>
                    <li><a href="{{ url('/tresorerie/dashboard') }}">Trésorerie</a></li>
                  <li><a href="{{ url('/administration/dashboard') }}">Administration</a></li>
                </ul>
               @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <!-- Authentication Links -->
                    @if (Auth::user())
                        @if(Auth::user()->getNotificationsNotRead()->count() != 0)
                            <li>
                                <button type="button" class="btn btn-danger navbar-btn"><i class="fa fa-bell"></i>
                                   Notifications <span class="badge">{{ Auth::user()->getNotificationsNotRead()->count() }} </span>
                                </button>
                            </li>
                        @else
                            <li><button type="button" class="btn btn-default navbar-btn"><i class="fa fa-bell-o"></i> Notifs</button></li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Se déconnecter</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Se connecter</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> Créer un compte</a></li>   
                    @endif
                </ul>
            </div>
        </div>
    </nav>