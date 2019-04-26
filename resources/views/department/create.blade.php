@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Create a new Department</div>

                <form action="{{route('departments.store')}} " method="POST" >
                {{csrf_field()}}

                <div class="for-group">
                
                    <input type="text" name="department" class="form-control">

                </div>
                <div class="form-group">
                <div class="text-center">
                    <button class=" btn btn-success" type="submit"> 
                    Save Changes
                    </button>
                    </div>
                </div>
                </form>

                   
                </div>
            </div>
      
@endsection
