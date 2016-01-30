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
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Answers</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>Answers</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($answers as $answer)
                        <tr class="gradeU">
                            <td>
                                <a href="{{ action('Admin\AnswerController@show',$answer->id) }}">{!! $answer->body  !!}</a>
                                <small class="pull-right">
                                    @if($answer->question)
                                        for question
                                        <a href="{{ action('QuestionController@show',$answer->question->id) }}">{!! $answer->question->body !!}</a>
                                    @else
                                        Unknown Question
                                    @endif
                                    <br>

                                    @if($answer->user)
                                        by
                                        <a href="{{ action('Admin\UserController@show',$answer->user->id)}}">{{ $answer->user->firstname }} </a>
                                    @else
                                        by Unkown User
                                    @endif

                                    on <i>{{ $answer->created_at->format('d-m-y') }}</i>

                                    <br>
                                    View all <a href="#">{{ $answer->childAnswersCount }}</a> Conversations
                                </small>
                            </td>
                            <td>
                                <a href="{{ action('Admin\AnswerController@edit',$answer->id)  }}"
                                   class="btn btn-sm btn-primary" role="button">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\AnswerController@destroy',$answer->id)}}">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the whole conversation.'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection