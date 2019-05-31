@extends('layouts.app')

@section('content')
<div class="row mb-5">
    <div class="col-9">
        <h1 class="mb-4">Question and Answer</h1>
        <p class="lead">This part of the website is for the community to discuss and read
            about iACADEMY.</p>
    </div>
    <div class="col-3">
        <a href="{{route('thread.create')}}" class="btn btn-info mx-auto py-3 mt-5 px-5">Ask a Question</a>
    </div>
</div>
<div class="row">
    <!-- Threads Table -->
    <div class="col-xs-10 col-lg-8">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#discussed">Most Discussed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#recent">Recent Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#unanswered">Least Answered</a>
            </li>
        </ul>
        <!-- Thread List-->
        <div id="myTabContent" class="tab-content">
            <!-- Most Discussed -->
            <div class="tab-pane fade active show" id="discussed">
                <div class="card border-light mb-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Answers</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date Added</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($threads as $thread)
                            <tr class="table-light clickable-row" data-href="Thread.html">
                                <th scope="row" href="Thread.html">{{$thread->title}}</th>
                                <td>{{$thread->rate}}</td>
                                <td>8</td>
                                <td>{{$thread->user_name}}</td>
                                <td>{{$thread->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="mx-auto">
                        {{$threads->links()}}
                    </div>
                </div>
            </div> <!-- End of Most Discussed -->
            <!-- Most Recent -->
            <div class="tab-pane fade" id="recent">
                <div class="tab-pane fade active show" id="recent">
                    <div class="card border-light mb-3">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Answers</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date Added</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($threads2 as $thread)
                                <tr class="table-light clickable-row" data-href="Thread.html">
                                    <th scope="row" href="Thread.html">{{$thread->title}}</th>
                                    <td>{{$thread->rate}}</td>
                                    <td>8</td>
                                    <td>{{$thread->user_name}}</td>
                                    <td>{{$thread->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mx-auto">
                            {{$threads->links()}}
                        </div>
                    </div>
                </div>
            </div> <!-- End of Most Recent -->
            <!-- Unnswered Questions-->
            <div class="tab-pane fade" id="unanswered">
                <div class="card border-light mb-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Answers</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date Added</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($threads3 as $thread)
                            <tr class="table-light clickable-row" data-href="Thread.html">
                                <th scope="row" href="Thread.html">{{$thread->title}}</th>
                                <td>{{$thread->rate}}</td>
                                <td>8</td>
                                <td>{{$thread->user_name}}</td>
                                <td>{{$thread->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="reservation_id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

                    <div class="mx-auto">
                       {{$threads->links()}}
                    </div>
                </div>
            </div> <!-- End of Answered Questions -->
        </div> <!-- End of Thread List -->
    </div> <!-- End of Threads Table -->
    <!-- Custom Search -->
    <div class="col-lg-4 text-center">
        <div class="card mb-3 mt-5 text-left">
            <h4 class="card-header">Custom Search</h4>
            <div class="card-body">
                <form>
                    <!-- Departments -->
                    <div class="row mb-3">
                        <select class="custom-select" id="departmentSelect">
                            @foreach($departments as $department)
                            <option value="">{{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
{{--<!-- Tags -->--}}
                    <div class="row mb-3">
                        <select class="tags-multiple w-100" required name="tagSelect" id="tagSelect" multiple="multiple">
                            <option disabled></option>
                            @foreach($tags as $tag)
                            <option>{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success mx-auto px-5">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- End of Custom Search -->

</div>
<!-- End of Your Code -->

@endsection


@section('Scripts')
    <!-- Multiselect -->
    <link href="/../css/select2.min.css" rel="stylesheet" />
    <script src="/../js/select2.min.js"></script>
    <!-- End of Multiselect -->
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });

        $(document).ready(function() {
            $('.tags-multiple').select2({
                // placeholder: "Select a tag"     // placing a placeholder removes the options apparently,
                // need to figure this out (remove comment to test it)
            });
        });
    </script>

    @endsection