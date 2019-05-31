@extends('layouts.app')

@section('content')
    <div class="jumbotron">

      <div class="panel-heading"><h1>Edit Content: {!! $content->title !!}</h1></div>

    <form action="{{route('content.update',['id' => $content->content_id])}}" method="POST" >
        {{csrf_field()}}


        <div class="form-group">
            <label for="title"><h4>Title</h4></label>
            <input type="text" id="title" name="title" value="{!! $content->title !!}" class="form-control">
            <label for="body"><h4>Body</h4></label>

            <textarea  name="body"  id="body" cols="30" rows="10" >{!! $content->body !!}</textarea>


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
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>