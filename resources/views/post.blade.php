@extends('layouts.app')

@section('content')

<div class="container">
<h2 style="padding-left:10%;">Title: {{$threads->title}}</h2>
{!! $threads->body !!}

<h4>Author: {{$threads->user_name}}</h4>


</div>

@endsection