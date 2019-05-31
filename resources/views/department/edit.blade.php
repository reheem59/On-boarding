@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h1 class="display-5">Editting " {{$departments->department_name}}"</h1>
        <hr class="my-4">


                <form action="{{route('departments.update',['department' => $departments->department_id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}


                <div class="form-group">
                    <div class="form-group">
                        <label for="inputDepartment"><h4>Department Name</h4></label>

                    <input class="form-control" id="inputDepartment" aria-describedby="questionHelp" type="text" name="department" value="{{$departments->department_name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="profile-img-tag"><h4>Image</h4></label>
                    <input class="form-control"  id="profile-img-tag" aria-describedby="questionHelp" type="file" name="image" value="{{$departments->image}}" class="form-control" id="profile-img">
                    <img src="{{$departments->image}}" id="profile-img-tag" width="200px" />
                    </div>

                    <div class="form-group">
                        <label for="inputDescription"><h4 class="mt-3">Department Description</h4></label>
                    <input class="form-control" id="inputDescription" aria-describedby="questionHelp" type="text" name="description" value="{{$departments->description}}" class="form-control">
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
