@extends('layouts.app')

@section('content')

            <div class="panel panel-default">  
                <div class="panel-heading">Departments</div>

                
<table class="table table-hover">

    <thead>
        <th>
            Name
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>

    <tbody>

        @foreach($departments as $department)
            <tr>
                <td>
                {{$department->department_name}}
                </td>

                <td>
                <a href="{{ route('departments.edit',['department' => $department->department_id])}}" class="btn btn-xs btn-primary">Edit</a>
                </td>
            
                <td>
    
                <form action="{{route('departments.destroy',['department' => $department->department_id])}}" method="POST">
                
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <button class="btn btn-xs btn-primary" type="submit">Delete</button>
                
                </form>
                </td>

            </tr>

        @endforeach
    </tbody>
</table>
                   
                </div>
            </div>
      
@endsection
