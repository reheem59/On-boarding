@extends('layouts.app')

@section('content')


    <!-- Your Code -->
    <h4 class="ml-4 mt-4 mb-4">Results </h4>
    <div class="card border-light">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Department Name</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Content</th>

            </tr>
            </thead>
            <tbody>
            @if(!$post->isEmpty())
            @foreach($post as $p)
            <tr class="table-default clickable-row" data-href="Thread.html">
                <th scope="row" ><a href="{{route('content.index',["id" => $p->department_id])}}">{{$p->department_name}}</a></th>
                <td class="text-center">{{$p->description}}</td>
                <td class="text-center">{{$p->title}}</td>

            </tr>
           @endforeach
                @else
            <tr>
                <td colspan="3" align="center">
                    No Record
                </td>
            </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- End of Your Code -->

@endsection