@extends('layouts.app')

@section('content')

<!-- boostrap -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<!--  -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="card" style="padding: 35px;">
                
                <h2>Account Settings </h2>
                <hr/>
                <form action="{{route('profile_update',['$id' => Auth::user()->user_id])}}" method="POST">
                {{ csrf_field() }}
                <label for="username">User Name:</label> <a class='button1' href="#">change</a><br>
                <input type="text" class="disabled1" name ='username' value= "{{$user->user_name}}"placeholder="username" disabled> <br>
                @if ($errors->has('username'))
                    <div class="error">{{ $errors->first('username') }}</div>
                @endif
                <label for="email">Email:</label><a class='button2' href="#">change</a> <br>
                <input type="text" class="disabled2" name ='email' value= "{{$user->email}}" placeholder="email" disabled> <br>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
                <label for="password">Password:</label><a class='button3'  href="#">change</a> <br>
                <input type="password" class="disabled3" name ='password' value= "{{$user->password}}" placeholder="password" disabled> <br>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
                <br/>
                <button type='submit'>Save Changes</button>
                
                </form>

                
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){




$(document).ready(function(){
    $('.button1').on('click', function() {
    
        $('.disabled1').removeAttr("disabled");
})

$('.button2').on('click', function() {
    
    $('.disabled2').removeAttr("disabled");
})

$('.button3').on('click', function() {
    
    $('.disabled3').removeAttr("disabled");
})
});
});
</script>

