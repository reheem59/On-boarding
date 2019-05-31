@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">Asking a question?</h1>
        <p class="lead mt-4 text-info">We'll help you format your question so that other users will be able to find and understand your question easily.</p>
        <hr class="my-4">
        <form action="{{route('thread.store')}}" method="'post">
            {{csrf_field()}}
            <fieldset>
                <div class="form-group">
                    <label for="Title"><h4 class="mt-3">What is your question title?</h4></label>
                    <textarea class="form-control" id="Title" name="'title" aria-describedby="questionHelp" placeholder="Enter Title" rows="3"></textarea>
                    <p id="questionHelp" class="form-text text-muted mt-3">Use proper grammar and spelling so that other users can understand your question easily, and please keep it as short as possible.</p>
                </div>

                <div class="form-group">
                    <label for="selectDepartment"><h4 class="mt-3">Which department concerns your question?</h4></label>
                    <select class="custom-select" id="departmentSelect" aria-describedby="departmentHelp">
                        @foreach(\App\Department::get() as $department)
                        <option selected="{{$department->department_id}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                    <p id="departmentHelp" class="form-text text-muted mt-3">This helps us categorize your question by identifying which department can help you the most.</p>
                </div>
                <div class="form-group">
                    <label for="inputQuestionTitle"><h4 class="mt-3">Which keywords best describes your question?</h4></label>
                    <select class="tags-multiple w-100" required name="tagSelect" id="tagSelect" multiple="multiple">
                                <option disabled></option>
                                @foreach($tags as $tag)
                                <option>{{$tag->tag_name}}</option>
                                @endforeach
                    </select>
                    <div class="mt-4">
                        <p id="tagHelp" class="form-text text-muted">Not finding your keyword? You can define your own keywords here.<br />
                            Just separate them with a comma if you have multiple tags</p>
                        <input type="text" class="form-control" id="inputTag" aria-describedby="tagHelp" placeholder="e.g. Scholarship, Rules">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7 col-sm-7 col-md-9 col-lg-9"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success px-5 py-2 mt-4">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


@endsection

@section('Scripts')
    <!-- Multiselect -->
    <link href="/../css/select2.min.css" rel="stylesheet" />
    <script src="/../js/select2.min.js"></script>
    <!-- End of Multiselect -->

    <script>
        $(document).ready(function() {
            $('.tags-multiple').select2({
                //placeholder: "Select a tag"     // placing a placeholder removes the options apparently,
                // need to figure this out (remove comment to test it)
            });
        });
    </script>

    @endsection
