<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=0.5">

    <title>{{ config('app.name', 'On-Boarding') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'On-Boarding') }}</title>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @yield('styles')
</head>
<body style="max-width:100%;overflow-x:hidden;margin-top:7em">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" style="z-index:2">
    <div class="container">
        <a class="navbar-brand" href="/"><div style="color:#18bc9c; display:inline;">On</div>-Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            Menu&nbsp;<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">


            <!-- Search Bar -->
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group mr-auto">
                    <input class="form-control" type="text" placeholder="Search" style="width:30em">
                    <div class="input-group-append">
              <span class="input-group-text" id="">
                <button class="btn btn-default" type="submit" style="margin:-1em">
                  <i class="fa fa-search" style="color:#18bc9c;"></i>
                </button>
              </span>
                    </div>
                </div>
            </form> <!-- End of Search Bar -->

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Departments</a>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                        @foreach(\App\Department::get() as $department)
                            <a class="dropdown-item" href="{{route('content.index',['id' =>$department->department_id ])}}">{{ $department->department_name }}</a>

                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Content.html">Student Handbook</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('thread.index')}}">Q&A</a>
                </li>
                @guest
                <li class="nav-item active">
                    <a class="nav-link" data-toggle="modal" data-target="#myModal">
                        Sign up/Login
                    </a>
                </li>
                    @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                       {{ Auth::user()->user_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class='dropdown-item' href="{{ route('profile',['user_id' =>Auth::user()->user_id]) }}">
                                    Profile
                                </a>
                            <li>
                                <a class='dropdown-item' href="{{ route('logout') }}"
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

                @endauth
            </ul>
        </div>
    </div>
</nav> <!-- End of Navbar -->

@include('flash-message')
<!-- Login Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog mt-lg-5 mr-lg-2" role="document">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="usernameHelp" placeholder="Enter Email" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" placeholder="Enter Password" style="height:3rem">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-3">Login</button>
                        <a class="btn btn-link col-md-9" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <h5 class="modal-title ml-0 mr-auto">New User?</h5>
                    </div>
                    <div class="row mt-2">
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End of Login Modal -->



<div class="container" style="min-height:45em;">
    <!-- Your Code -->
@yield('content')
<!-- End of Your Code -->
</div>

<!-- Footer (fixed height) -->
<div id="footer" class="mt-lg-5" style="background-color:#2C3E50;clear:both;position: bottom relative;height:10em;font-color:white;">

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {

        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight)
            $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    });
</script>

@yield('Scripts')
</body>
</html>