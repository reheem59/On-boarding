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
                    <label for="Title"><h4 class="mt-3">Title</h4></label>
                    <textarea class="form-control" id="Title" name="'title" aria-describedby="questionHelp" placeholder="Enter Title" rows="3"></textarea>
                    <p id="questionHelp" class="form-text text-muted mt-3">Use proper grammar and spelling so that other users can understand your question easily, and please keep it as short as possible.</p>
                </div>
                <div class="form-group">
                    <label for="body"><h4 class="mt-3">Body</h4></label>
                    <textarea class="form-control" id="body" name="'body" aria-describedby="questionHelp" placeholder="Enter Question" rows="3"></textarea>
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
                    <div class="row">
                        <div class="col-6">
                            <select multiple="" class="form-control" name='tagSelect' id="tagSelect">
                                @foreach($tags as $tag)
                                <option>{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="'inputTag" id="inputTag" aria-describedby="tagHelp" placeholder="e.g. Scholarship, Rules">
                            <p id="tagHelp" class="form-text text-muted mt-3">Not finding your keyword? You can define your own keywords here.<br />
                                Just separate them with a comma if you have multiple tags</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary px-5 py-2 mt-2">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


@endsection