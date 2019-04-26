<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'On-Boarding') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                
                    <a href="{{ url('/home') }}" class="navbar-brand"><div style="color:#00ffff;display:inline;">On</div>-Board</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <ul class="navbar-nav mr-1" style="margin-top:1rem">
            <form class="form-inline my-1 ml-lg-5" action="">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" style="width:67rem">
              <button class="btn btn-link my-2 my-sm-0" type="submit" style="margin-left:-5.5rem">
                <i class="fa fa-search" style="color:#00ffff"></i>
              </button>
            </form>
          </ul>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Departments <span class="caret"></span>
                 </a>
                 <ul class="dropdown-menu">
                 @foreach(\App\Department::get() as $department)
                    <li><a href="">{{ $department->department_name }}</a></li>
                @endforeach
                 </ul>
                 </li>
                        <li>
                <a href="#" class="dropdown-toggle"  role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Q&A </span>
                 </a>
                 </li>

                            <!-- <li><a href="{{ route('login') }}" >Login</a></li> -->
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                        <ul class="navbar-nav mr-1" style="margin-top:1rem">
            <form class="form-inline my-1 ml-lg-5" action="">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" style="width:67rem">
              <button class="btn btn-link my-2 my-sm-0" type="submit" style="margin-left:-5.5rem">
                <i class="fa fa-search" style="color:#00ffff"></i>
              </button>
            </form>
          </ul>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Departments <span class="caret"></span>
                 </a>
                 <ul class="dropdown-menu">
                 @foreach(\App\Department::get() as $department)
                    <li><a href="">{{ $department->department_name }}</a></li>
                @endforeach
                 </ul>
                 
                 </li>
                        <li>
                <a href="#"  role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                Q&A 
                 </a>
                 </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>
                               
                                <ul class="dropdown-menu">

                                <li>
                                        <a href="{{ route('profile',['user_id' =>Auth::user()->user_id]) }}">
                                            Profile
                                        </a>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
               
                                </ul>
                              
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('Scripts')
</body>
</html>
