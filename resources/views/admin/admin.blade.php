@extends('layouts.app')

@section('content')
   <div>
       <div>
           </h6>
           <a href="{{route('departments.index')}}">View Departments</a>
<br>
           <a href="{{route('departments.create')}}">Create Department</a>
       </div>

       <div>
           <a href="{{route('content.list')}}">View Discussion</a>
<br>
           <a href="{{route('content.create')}}">Create Discussion</a>

       </div>

   </div>


@endsection
