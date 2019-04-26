@extends('layouts.app')

@section('content')
<h2 style="padding-left:10%;">List of post</h2>
<div class="container">

<table class="table table-bordered">
<thead>
<tr>
<th>
Title
</th>
<th>
User
</th>
<th>
Department
</th>
</thead>
</tr>
<tbody>

@foreach($threads as $thread)
<tr>
    <td>
    <a href="{{route('post',['post'=> $thread->thread_id])}}">{{$thread->title}}</a>
    </td>

    <td>
    {{$thread->user_name}}
    </td>

    <td>
    {{$thread->department_name}}
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>

@endsection