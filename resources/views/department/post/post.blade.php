@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-1"></div>
        <div class="col-6" style="margin-left:-1em">
            <div class="row">
                <h1 style="color:#2C3E50">{{$department->department_name}}</h1>
            </div>
            &nbsp;
            <div class="row">
                <h3 class="text-default" style="text-align:justify">
                    {{$department->description}}
                </h3>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-3 ml-1 mr-5">
            <img style="display:block;height:17em;width:17em" src="images/iconacademics.png" alt="OSAS icon" style="width:100%;height:auto">
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row mt-5">
        <!-- Accordion -->
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <!-- Topic -->
                @foreach($contents as $content)
                <div class="card">
                    <div class="card-header" id="heading{{$content->content_id}}" data-toggle="collapse" data-target="#collapse{{$content->content_id}}" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mt-1 text-primary">
                            <div class="row">
                                <div class="col-10">
                                    {{$content->title}}
                                </div>
                                <div class="col-1 ml-auto">
                                    <i class="fa fa-sort-desc"></i>
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div id="collapse{{$content->content_id}}" class="collapse" aria-labelledby="heading{{$content->content_id}}" data-parent="#accordionExample">
                        <div class="card-body">
                           {!! $content->body  !!}
                        </div>
                    </div>
                </div> <!-- End of Topic -->
                @endforeach
                <div style="padding-left:"> {!! $contents->links() !!}</div>

            </div> <!-- End of Accordion -->
        </div>
    </div>
@endsection
