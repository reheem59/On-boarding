@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Edit Department: {{$departments->department_name}}</div>

                <form action="{{route('departments.update',['department' => $departments->department_id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}


                <div class="form-group">

                    <input type="text" name="department" value="{{$departments->department_name}}" class="form-control">

                    <input type="file" name="image" value="{{$departments->image}}" class="form-control">

                    <input type="text" name="description" value="{{$departments->description}}" class="form-control">

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
