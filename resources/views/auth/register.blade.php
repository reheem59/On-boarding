@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <legend><h3 class="card-header">Create Your Account</h3></legend>
            <div class="card-body">
                <p class="card-text">

                <div class="form-group row{{ $errors->has('user_name') ? ' has-error' : '' }}">
                    <div class="col-1"></div>
                    <label for="user_name" class="col-3 col-form-label pl-5 pr-auto font-weight-bold">Username</label>
                    <div class="col-7">
                        <input type="text" class="form-control" id="user_name" placeholder="Enter Username" name="user_name" value="{{ old('user_name') }}" required autofocus>
                        @if ($errors->has('user_name'))
                            <span class="help-block">
                        <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-1"></div>
                    <label for="password" class="col-3 col-form-label pl-5 pr-auto font-weight-bold">Password</label>
                    <div class="col-7">
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-1"></div>
                    <label for="password-confirm" class="col-3 col-form-label pl-5 pr-auto font-weight-bold">Confirm Password</label>
                    <div class="col-7">
                        <input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required>

                    </div>
                </div>
                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-1"></div>
                    <label for="email" class="col-3 col-form-label pl-5 pr-auto font-weight-bold">Email</label>
                    <div class="col-7">
                        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                </p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-1 mr-sm-3"><a href="/home" class="card-link"><button type="button" class="btn btn-danger">Cancel</button></a></div>
                    <div class="col-1"><a href="#" class="card-link"><button type="submit" class="btn btn-success">Submit</button></a></div>
                    <div class="col-1"></div>
                </div>
            </div>
        </form>
    </div>
@endsection
