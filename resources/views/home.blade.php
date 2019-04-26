@extends('layouts.app')

@section('content')
<div class="container">
            <div class="col-md-4">
            <a href="{{route('discussion.create')}}" class="form-control btn btn-primary">
            Create a discussion
            </a>
            <br/>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Departments
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($departments as $department)
                            <li class="list-group-itemn">
                            <a href="">{{$department->department_name }}</a>
                            </li>
                            
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            
            </div>
        </div>
       
   
@endsection
