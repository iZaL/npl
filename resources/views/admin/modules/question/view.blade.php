@extends('admin.layouts.one_col')

@section('title')
    <h1>Question {{ $question->body }}</h1>
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
            Question</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">

            <div class="question-info-wrapper">
                <div class="row info-row">
                    <div class="col-md-3">Question</div>
                    <div class="col-md-9">: {!!  $question->body !!}</div>
                </div>
                <div class="row info-row">
                    <div class="col-md-3">NP Code</div>
                    <div class="col-md-9">: {{ $question->user->np_code }}</div>
                </div>
                <div class="row info-row">
                    <div class="col-md-3">Subject</div>
                    <div class="col-md-9">: {{ $question->subject->name }}</div>
                </div>
                <div class="row info-row">
                    <div class="col-md-3">Level</div>
                    <div class="col-md-9">: {{ $question->level->name }}</div>
                </div>
                <div class="row info-row">
                    <div class="col-md-3">Posted Date</div>
                    <div class="col-md-9">: {{ $question->created_at->format('d-m-Y h:ia') }}</div>
                </div>
            </div>

            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>SI No</th>
                        <th>NP Code</th>
                        <th>Answer</th>
                        <th>Added on</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($question->parentAnswers as $answer)
                        <tr class="gradeU">
                            <td>{{ $answer->id }}</td>
                            <td>{{ $answer->user->np_code }}</td>
                            <td>
                                <a href="{{ action('Admin\AnswerController@show',$answer->id) }}">{!! str_limit($answer->body,100)  !!}</a>
                            </td>
                            <td> {{ $answer->created_at->format('d-m-Y h:ia') }}</td>
                            <td class="f18">
                                <a href="{{ action('Admin\AnswerController@show',$answer->id)  }}"
                                   role="button" >
                                    <i class="fa fa-list-alt"></i>
                                </a>
                            </td>
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
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the whole conversation.'])
        </div>


    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection