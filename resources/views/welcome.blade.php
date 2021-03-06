<!DOCTYPE html>
<head>
    <title>On-Board</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>{{ config('app.name', 'On-Boarding') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'On-Boarding') }}</title>
</head>
<body style="max-width:100%;overflow-x:hidden;margin-top:7em">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="navbar" style="transition:top 0.3s;top:-5rem;z-index:4">
    <div class="container">
        <a class="navbar-brand" href="/"><div style="color:#18bc9c; display:inline;">On</div>-Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            Menu&nbsp;<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">

            <!-- Search Bar -->
            <form class="form-inline my-2 my-lg-0" action="{{route('departments.search')}} " method="get">
                <div class="input-group mr-auto">

                    <input class="form-control" name="search" type="text" placeholder="Search" style="width:30em">
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
                        @foreach(\App\Department::where('is_deleted','0')->get() as $department)
                            <a class="dropdown-item" href="../content/{{$department->department_id}}/post">{{ $department->department_name }}</a>

                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ asset('pdf/iAcademy Student Handbook.pdf') }}">Student Handbook</a>
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

<div style="min-height:100%">
    <!-- Your Code -->

    <!-- Welcome Jumbotron -->
    <div class="jumbotron" style="background-color:#2C3E50;border-radius:0;margin-top:-7em">
        <div class="row" style="margin-top:-3em">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            @guest
            <div class="col"><button type="button" class="btn btn-link" style="color:white;" data-toggle="modal" data-target="#myModal">
                    Sign up/Login</button></div>

        @endguest
        @auth
            <div  class="col"><a class=" btn btn-success" href="{{route('profile',['user_id' => Auth::user()->user_id])}}"  style="color:white;" >
                    {{ Auth::user()->user_name }}</a></div>

    @endauth
        </div>
        <div class="container">
            <h1 class="display-3 ml-4 mt-4" style="color:white">Welcome to <div class="" style="color:#18bc9c;display:inline;">On</div>-Board</h1>
            <p class="lead ml-4 mt-5" style="color:white;font-size:1.5em">
                Facts and FAQs about the different Departments in iACADEMY
            </p>

            <form class="form-group ml-2 mt-4 row" action="{{route('departments.search')}} " method="get">
                <div class="col-9">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" id="inputDefault">
                        <div class="input-group-append">
                <span class="input-group-text" id=""><button class="btn btn-default" type="submit" style="margin:-1em">
                  <i class="fa fa-search" style="color:#18bc9c;"></i>
                </button></span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <a href="{{route('thread.index')}}" class="btn btn-info ml-lg-5 mr-lg-0 py-3" style="margin-top:-0.5em">Visit our Q&A</a>
                </div>
            </form>
        </div>
    </div> <!-- End of Jumbo Welcome -->

    <div class="container">
        @foreach($departments as $department)
        <div class="jumbotron">
            <div class="row">
                <!-- Image Icon-->
                <div class="col-lg-4">
                    <img class="mx-auto" style="display:block;height:17em;width:17em" src="{{$department->image}}" alt="OSAS icon" style="width:100%;height:auto">
                </div>
                <!-- Content -->
                <div class="col-lg-8">
                    <h1 class="display-3">{{$department->department_name}}</h1>
                    <hr class="my-4">
                    <!--
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    -->
                    <p class="lead">{{$department->description}} </p>
                    <p class="lead text-right">
                        <a class="btn btn-primary btn-lg mr-5 mt-3" href="{{route('content.index',['id' =>$department->department_id ])}}" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>


    <!-- End of Your Code -->
</div>

<!-- Footer (fixed height) -->
<div id="footer" class="mt-lg-5" style="background-color:#2C3E50;clear:both;position: bottom relative;height:10em;font-color:white;">
    <h6 align="center" style='color:white'> © On-Boarding 2019</h6>
</div>

<script>
    // When the user scrolls down 20px from the top of the document, slide down the navbar
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 315 || document.documentElement.scrollTop > 315) {
            document.getElementById("navbar").style.top = "0  ";
        } else {
            document.getElementById("navbar").style.top = "-5em";
        }
    }

    $(document).ready(function() {

        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight)
            $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
    });
</script>

</body>
</html>
