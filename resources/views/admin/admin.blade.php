@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-departments-tab" data-toggle="pill" href="#v-pills-departments" role="tab" aria-controls="v-pills-departments" aria-selected="true">Departments</a>
                <a class="nav-link" id="v-pills-questions-tab" data-toggle="pill" href="#v-pills-questions" role="tab" aria-controls="v-pills-questions" aria-selected="false">Questions</a>
                <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</a>
            </div>
        </div>

        <!-- Admin Views -->
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Departments View -->
                <div class="tab-pane fade show active" id="v-pills-departments" role="tabpanel" aria-labelledby="v-pills-departments-tab">
                    <div class="card border-light mb-3">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Department</th>
                                <th scope="col" class="text-center">Posts</th>
                                <th scope="col">

                                    <div class="text-center">
                                        <button type="button" class="btn btn-info ml-2" data-toggle="modal" data-target="#createDepartment">
                                            Create Department
                                        </button>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                            <tr class="table-light clickable-row"  >
                                <th scope="row"><a href="{{route('content.list')}}">{{$department->department_name}}</a></th>
                                <td class="text-center">5</td>

                                <td class="text-center">

                                    <a class="btn btn-info"  href="{{ route('departments.edit',['department' => $department->department_id])}}" >Edit</a>


                                        <button  class="btn btn-danger ml-2 deleteRecord" data-id="{{ $department->department_id }}" >Delete</button>


                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Questions View -->
                <div class="tab-pane fade" id="v-pills-questions" role="tabpanel" aria-labelledby="v-pills-questions-tab">
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#searchQuestion">Search Question</a>
                        </li>
                    </ul>
                    <!-- Questions List-->
                    <div id="myTabContent" class="tab-content">
                        <!-- Most Discussed -->
                        <div class="tab-pane fade active show" id="discussed">
                            <div class="card border-light mb-3">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col" class="text-center">Rating</th>
                                        <th scope="col" class="text-center">Answers</th>
                                        <th scope="col">Author</th>
                                        <th scope="col" class="text-center">Date Added</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="mx-auto">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">&laquo;</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">&raquo;</a>
                                        </li>
                                    </ul>
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
                                            <th scope="col" class="text-center">Rating</th>
                                            <th scope="col" class="text-center">Answers</th>
                                            <th scope="col">Author</th>
                                            <th scope="col" class="text-center">Date Added</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-light clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-default clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-light clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-default clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-light clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-default clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-light clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-default clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-light clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        <tr class="table-default clickable-row" data-href="Thread.html">
                                            <th scope="row" href="Thread.html">Question Example?</th>
                                            <td class="text-center">20</td>
                                            <td class="text-center">12</td>
                                            <td>Ernest Fernandez</td>
                                            <td class="text-center">04/17/2019</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="mx-auto">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#">&laquo;</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
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
                                        <th scope="col" class="text-center">Rating</th>
                                        <th scope="col" class="text-center">Answers</th>
                                        <th scope="col">Author</th>
                                        <th scope="col" class="text-center">Date Added</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    <tr class="table-default clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="mx-auto">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">&laquo;</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">&raquo;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End of Answered Questions -->
                        <!-- Search Questions -->
                        <div class="tab-pane fade" id="searchQuestion">
                            <!-- Search Bar -->
                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group ml-4 mt-4">
                                    <input class="form-control" type="text" placeholder="Search" style="width:30em">
                                    <div class="input-group-append">
                      <span class="input-group-text" id="">
                        <button class="btn btn-default" type="submit" style="margin:-1em">
                          <i class="fa fa-search" style="color:#18bc9c;"></i>
                        </button>
                      </span>
                                    </div>
                                </div>
                            </form> <!-- End of Search Bar -->
                            <h4 class="ml-4 mt-4 mb-4">Results for <p class="d-inline text-success">"Question Example?"</p></h4>
                            <div class="card border-light">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col" class="text-center">Rating</th>
                                        <th scope="col" class="text-center">Answers</th>
                                        <th scope="col">Author</th>
                                        <th scope="col" class="text-center">Date Added</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light clickable-row" data-href="Thread.html">
                                        <th scope="row" href="Thread.html">Question Example?</th>
                                        <td class="text-center">20</td>
                                        <td class="text-center">12</td>
                                        <td>Ernest Fernandez</td>
                                        <td class="text-center">04/17/2019</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- End of Search Questions -->
                    </div> <!-- End of Thread List -->
                </div>
                <!-- Users View -->
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#searchUser">Search User</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <!-- Users -->
                        <div class="tab-pane fade active show" id="users">
                            <div class="card border-light mb-3">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr class="table-light clickable-row" data-href="#">
                                        <th scope="row" href="Thread.html">Earnest</th>
                                        <td>ernestgilfernandez@gmail.com</td>
                                        <td class="text-center"><button type="button" class="btn btn-info">Edit</button> <button type="button" class="btn btn-danger ml-2">Delete</button></td>
                                    </tr>
                                   @endforeach
                                    </tbody>
                                </table>
                                <div class="mx-auto">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">&laquo;</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">&raquo;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End of Most Discussed -->
                        <div class="tab-pane fade active show" id="searchUser">
                            <!-- Search Bar -->
                            <form class="form-inline my-2 my-lg-0">
                                <div class="input-group ml-4 mt-4">
                                    <input class="form-control" type="text" placeholder="Search" style="width:30em">
                                    <div class="input-group-append">
                      <span class="input-group-text" id="">
                        <button class="btn btn-default" type="submit" style="margin:-1em">
                          <i class="fa fa-search" style="color:#18bc9c;"></i>
                        </button>
                      </span>
                                    </div>
                                </div>
                            </form> <!-- End of Search Bar -->
                            <h4 class="ml-4 mt-4 mb-4">Results for <p class="d-inline text-success">"Earnest"</p></h4>
                            <div class="card border-light">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-light clickable-row" data-href="#">
                                        <th scope="row" href="Thread.html">Earnest</th>
                                        <td>ernestgilfernandez@gmail.com</td>
                                        <td class="text-center"><button type="button" class="btn btn-info">Edit</button> <button type="button" class="btn btn-danger ml-2">Delete</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End of Admin Views -->
    </div>


    <!-- End of Your Code -->

@endsection

@section('Scripts')
{{--    <script>--}}
{{--        jQuery(document).ready(function($) {--}}
{{--            $(".clickable-row").click(function() {--}}
{{--                window.location = $(this).data("href");--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script>

        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: "departments/delete/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (){
                        console.log("it Works");
                    }
                });
            location.reload();

        });
    </script>

<!-- Department Modal -->
<div class="modal fade" id="createDepartment">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <form>
                    <div class="modal-body">
                        <form action="{{route('departments.store')}} " method="POST" enctype="multipart/form-data" >
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputDepartment"><h5>Department Name</h4></label>
                            <input type="text" name="department" class="form-control" id="inputDepartment" aria-describedby="tagHelp" placeholder="Enter Department">
                        </div>
                        <div class="form-group">
                            <label for="inputImage"><h5>Department Name</h4></label>
                            <input type="file" name="image" class="form-control" id="inputImage" aria-describedby="tagHelp" >
                        </div>
                        <div class="form-group">
                            <label for="inputDescription"><h5 class="mt-3">Department Description</h4></label>
                            <textarea class="form-control" name="description" id="inputDescription" aria-describedby="questionHelp" placeholder="Enter Description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </fieldset>
            </form>
        </div>
    </div>
</div> <!-- End of Department Modal -->
    @endsection
