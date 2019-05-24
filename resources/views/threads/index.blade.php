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

                        @include('threads.tableajax')

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
                            @include('threads.tableajax')
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
                        @include('threads.tableajax')
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
    <script>
        $(document).ready(function() {

            function clear_icon() {
                $('#id_icon').html('');
                $('#post_title_icon').html('');
            }

            function fetch_data(page, sort_type, sort_by, query, list_by) {
                $.ajax({
                    url: "/thread/fetch_data?page=" + page + "&sortby=" + sort_by + "&sorttype=" + sort_type + "&query=" + query + "&list_by=" + list_by,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }

            $(document).on('change', '#tagSelected', function() {
                var query = $('#departmentSelected').val();

                var list_by = $('#tagSelected').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                console.log('clicked')
                fetch_data(page, sort_type, column_name, query, list_by);

            });



            $(document).on('keyup', '#departmentSelected', function() {
                var query = $('#departmentSelected').val();

                var list_by = $('#tagSelected').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query, list_by);
            });

            $(document).on('click', '.sorting', function() {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
                }
                if (order_type == 'desc') {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#' + column_name + '_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#departmentSelected').val();

                var list_by = $('#tagSelected').val();
                fetch_data(page, reverse_order, column_name, query, list_by);
            });


            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#departmentSelected').val();

                var list_by = $('#tagSelected').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query,list_by);
            });

        });
    </script>
    @endsection