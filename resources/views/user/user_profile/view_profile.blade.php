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
                <div class="card">
                
                <h2>Profile </h2>
                
                <label for="username">User Name:</label> <br>
                <input type="text"  name ='username' value= "{{$user->user_name}}"placeholder="{$user->user_name}}" disabled> <br>
                <label for="email">Email:</label> <br>
                <input type="text"  name ='email' value= "{{$user->email}}"placeholder="{$user->email}}" disabled> <br>
                <label for="password">Password:</label> <br>
                <input type="password"  name ='password' value= "{{$user->password}}"placeholder="{$user->password}}" disabled> <br>
                
                


                
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
