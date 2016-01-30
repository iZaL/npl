@extends('admin.layouts.one_col')

@section('title')
    <h1>Questions</h1>
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
            <b>Questions</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="searchPanel row pbottom10">
                {!! Form::open(['action'=>'Admin\QuestionController@index', 'method'=>'get', 'class'=>'form-vertical']) !!}
                <div class="col-md-5">
                    <div class="col-md-3" >
                        <span class="vcenter">Subject:</span>
                    </div>
                    <div class="col-md-9 ">
                        {!! Form::select('subject',$subjects,$selectedSubject,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-3" >
                        <span class="vcenter">Level:</span>
                    </div>
                    <div class="col-md-9">
                        {!! Form::select('level',$levels,$selectedLevel,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Search',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" >
                    <thead class="bg-blue">
                    <tr>
                        <th>SINO</th>
                        <th>NP Code</th>
                        <th>Question</th>
                        <th>Subject</th>
                        <th>Level</th>
                        <th>No. of educators responded</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr class="gradeU">
                            <td>
                                {{ $question->id }}
                            </td>
                            <td>
                                @if($question->user)
                                    <a href="{{ action('Admin\UserController@show',$question->user->id)}}">{{ $question->user->np_code }} </a>
                                @else
                                    Unkown User
                                @endif
                            </td>
                            <td>
                                <a href="{{ action('Admin\QuestionController@show',$question->id) }}">{!!  strip_tags($question->body)  !!}</a>
                            </td>
                            <td>{{ $question->subject ?  $question->subject->name : '' }}</td>
                            <td>{{ $question->level ? $question->level->name  : ''}}</td>
                            <td>{{ $question->answeredEducatorsCount }}</td>
                            <td class="f18">
                                <a href="{{ action('Admin\QuestionController@show',$question->id)  }}"
                                   role="button" >
                                    <i class="fa fa-list-alt"></i>
                                </a>
                            </td>
                            <td class="f18">
                                <a href="{{ action('Admin\QuestionController@edit',$question->id)  }}"
                                   role="button">
                                    <i class="fa fa-pencil-square-o "></i>
                                </a>
                            </td>
                            <td class="f18">
                                <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                                   data-link="{{action('Admin\QuestionController@destroy',$question->id)}}">
                                    <i class="fa fa-close "></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the whole conversation for this Question.'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection