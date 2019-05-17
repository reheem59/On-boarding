@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Department: {{$threads->title}}</div>

        <form action="{{route('thread.update',['id' => $threads->thread_id])}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="form-group">

                <input type="text" name="title" value="{{$threads->title}}" class="form-control">

                <input type="text" name="body" value="{{$threads->body}}" class="form-control">

                <input type="text" name="department" value="{{$threads->department}}" class="form-control">

            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class=" btn btn-success" type="submit">
                        Update Changes
                    </button>
                </div>
            </div>
        </form>


    </div>
    </div>

@endsection
