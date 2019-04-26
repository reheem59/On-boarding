@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Edit Department: {{$departments->department_name}}</div>

                <form action="{{route('departments.update',['department' => $departments->department_id])}} " method="POST" >
                {{csrf_field()}}
                {{method_field('PUT')}}

                <div class="for-group">
                <form action="{{route('departments.destroy',['department' => $departments->department_id])}}"></form>
                    <input type="text" name="department" value="{{$departments->department_name}}" class="form-control">

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
