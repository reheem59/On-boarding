@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="/">Home</a>
                    @else
                    
                    <li style="margin-left:80%;margin-top:-2%;"><a  data-toggle="modal" data-target="#myModal" >Login</a></li>
                    
                              <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog" >
                                <div class="modal-dialog"style="padding-left: 50%;padding-top: 3% ">
                                 <!-- Modal content-->
                                    <div class="modal-content  modal-sm   ">
                                        <div class="modal-header ">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Login</h4>
                                        </div>
                                        <div class="modal-body " >
                                        <div class="input-group">

                                         
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link col-md-9" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <hr>
                                            
                        <p>New User?</p>
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Sign up</a>
                    </form>
                                </div>
                                </div>
                                
                        
                    @endauth
                </div>
            @endif

            
        </div>
        </div>
        </div>
       
        </div>
@endsection

