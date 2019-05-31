@extends('layouts.app')

@section('content')


    <div class="jumbotron">
        <div class="panel-heading"><h1>Department Posts {{$department->department_name}}</h1></div>

        <a class="btn btn-info" href="{{route('content.create')}}"><h4>Create a Post</h4></a>
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

            @if(!$contents->isEmpty())
            @foreach($contents as $content)
                <tr>
                    <td>
                        {{$content->title}}
                    </td>

                    <td>
                        <a href="{{ route('content.show',['id' => $content->content_id])}}" class="btn btn-info">Edit</a>
                    </td>

                    <td>

                        <form action="{{route('content.destroy',['id' => $content->content_id])}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button class="btn btn-danger" type="submit">Delete</button>

                        </form>
                    </td>

                </tr>

            @endforeach
                @else
            <tr>

                <td colspan="3" align="center">
                    No Records
                </td>
            </tr>
            @endif
            </tbody>
        </table>

    </div>
    </div>

@endsection