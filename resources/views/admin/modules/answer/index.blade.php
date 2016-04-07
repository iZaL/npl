@extends('admin.layouts.one_col')

@section('title')
    <h1>Answers</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('middle')

        <!-- /.panel-heading -->
        <div class="panel-default panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>Answers</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($answers as $answer)
                        <tr class="gradeU">
                            <td>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ action('Admin\QuestionController@show',$answer->question->id) }}">{{ strip_tags($answer->question->body) }}</a>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <ul class="list-group">
                                            <li class="list-group-item col-md-12 pull-left" style="margin-bottom: 10px;">
                                                <i class="pull-left fa fa-user" style="color: grey;padding-top: 4px"></i> {{ $answer->user->np_code }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a')  }}</i></small>
                                                <h3><a href="{{ action('Admin\AnswerController@show',$answer->id) }}">{!! $answer->body !!}</a></h3>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                {{--<small class="pull-right">--}}
                                    {{--@if($answer->question)--}}
                                        {{--for question--}}
                                        {{--<a href="{{ action('QuestionController@show',$answer->question->id) }}">{!! $answer->question->body !!}</a>--}}
                                    {{--@else--}}
                                        {{--Unknown Question--}}
                                    {{--@endif--}}
                                    {{--<br>--}}

                                    {{--@if($answer->user)--}}
                                        {{--by--}}
                                        {{--<a href="{{ action('Admin\UserController@show',$answer->user->id)}}">{{ $answer->user->firstname }} </a>--}}
                                    {{--@else--}}
                                        {{--by Unkown User--}}
                                    {{--@endif--}}

                                    {{--on <i>{{ $answer->created_at->format('d-m-y') }}</i>--}}

                                    {{--<br>--}}
                                    {{--View all <a href="#">{{ $answer->childAnswersCount }}</a> Conversations--}}
                                {{--</small>--}}
                            </td>
                            <td>{{ $answer->created_at->format('d-m-Y')  }}</td>

                            <td class="f18">
                                <a href="{{ action('Admin\AnswerController@edit',$answer->id)  }}"
                                   role="button">
                                    <i class="fa fa-pencil-square-o "></i>
                                </a>
                            </td>
                            <td class="f18">
                                <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                                   data-link="{{action('Admin\AnswerController@destroy',$answer->id)}}">
                                    <i class="fa fa-close "></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('admin.partials.delete-modal',['info' => 'This will also delete the whole conversation.'])

            </div>
            <!-- /.table-responsive -->
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection