@extends('layouts.app')

@section('content')
  <div class="panel panel-default">

    <div class="panel-heading">Edit Content: {!! $content->title !!}</div>

    <form action="{{route('content.update',['id' => $content->content_id])}}" method="POST" >
        {{csrf_field()}}


        <div class="form-group">

            <input type="text" name="title" value="{!! $content->title !!}" class="form-control">

            <input type="text" name="body" value="{!! $content->body !!}" class="form-control">



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