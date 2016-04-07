@extends('admin.layouts.one_col')

@section('title')
    <h1>{{ strip_tags($answer->question->body) }}</h1>
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ strip_tags($answer->question->body) }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item col-md-8 pull-left" style="margin-bottom: 10px;">
                    <i class="pull-left fa fa-user" style="color: grey;padding-top: 4px"></i> {{ $answer->user->np_code }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a')  }}</i></small>
                    <h3>{!! $answer->body !!}</h3>
                </li>
                @foreach($answer->childAnswers as $childAnswer)
                    <li class="list-group-item col-md-8 {{ $childAnswer->user->id == $answer->user->id ? 'pull-left' : 'pull-right text-rtl bg-gray'  }} " style="margin-bottom: 10px;">
                        <i class="fa fa-user" style="color: grey;padding-top: 4px"></i> {{ $childAnswer->user->np_code }}  <small class="gray"><i> on {{ $childAnswer->created_at->format('d-m-Y \a\t g:i:s a') }}</i></small>
                        <h3>{!! $childAnswer->body !!}</h3>
                    </li>
                @endforeach
            </ul>
            <div class="clear" style="clear:both;"></div>
        </div>
    </div>

@endsection