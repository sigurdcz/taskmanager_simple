@extends('frontend.layouts.default')
@section('content')

    <div class="panel panel-default widget">
        <div class="panel-heading">

            <h3 class="panel-title">
                Task Comments</h3>

        </div>
        <div class="panel-body">

            @foreach($item->comments as $task)
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">

                        <div class="col-xs-10 col-md-11">
                            <div>

                                <div class="mic-info">
                                    {{$task->DateCreated}}
                                </div>
                            </div>
                            <div class="comment-text">
                                     {{$task->content}}
                            </div>

                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
