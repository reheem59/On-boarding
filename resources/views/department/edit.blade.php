@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Edit Department: {{$departments->department_name}}</div>

                <form action="{{route('departments.update',['department' => $departments->department_id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}


                <div class="form-group">
                    <div class="form-group">
                    <input class="form-control" aria-describedby="questionHelp" type="text" name="department" value="{{$departments->department_name}}" class="form-control">
                    </div>

                    <div class="form-group">
                    <input class="form-control" aria-describedby="questionHelp" type="file" name="image" value="{{$departments->image}}" class="form-control" id="profile-img">
                    <img src="{{$departments->image}}" id="profile-img-tag" width="200px" />
                    </div>

                    <div class="form-group">
                    <input class="form-control" aria-describedby="questionHelp" type="text" name="description" value="{{$departments->description}}" class="form-control">
                    </div>

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

@section('Scripts')

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function(){
            readURL(this);
        });
    </script>
    @endsection
