@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="panel-heading tex-center">

            <h1> Create a new Content </h1>
        </div>

        <div class="panel-body">
            <form action="{{route('content.store')}}" method="POST">
                {{csrf_field()}}

                <div class="">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" name=title class="form-control">
                    <br/>
                    <label for="department"><h4>Pick a Department</h4></label>
                    <br>

                    <select name="department_id" id="department_id" class="form-control">
                        @foreach($departments as $department)

                            <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                        @endforeach

                    </select>

                </div>
                <br>

                <div class="form-group">
                    <label for="content"><h4>Create a new post</h4></label>
                    <textarea name="content" id="content" cols="30" rows="10" ></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-success pull-right">Create a discussion</button>
                </div>

            </form>
        </div>
    </div>


@endsection
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

