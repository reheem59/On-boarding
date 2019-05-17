@extends('layouts.app')

@section('content')
   <div>
       <div>
           </h6>
           <a href="{{route('departments.index')}}">View Departments</a>

           <a href="{{route('departments.create')}}">Create Department</a>
       </div>

       <div>
           <a href="{{route('content.index')}}">View Discussion</a>

           <a href="{{route('content.create')}}">Create Department</a>

       </div>

   </div>


@endsection
