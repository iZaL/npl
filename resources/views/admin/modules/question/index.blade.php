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
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                    <tr>
                        <th>Questions</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr class="gradeU">
                            <td>
                                <a href="{{ action('Admin\QuestionController@show',$question->id) }}">{!!  $question->body  !!}</a>
                                <small class="pull-right">
                                    by
                                    @if($question->user)
                                        <a href="{{ action('Admin\UserController@show',$question->user->id)}}">{{ $question->user->firstname }} </a>
                                    @else
                                        Unkown User
                                    @endif
                                    on <i>{{ $question->created_at->format('d-m-y') }}</i>
                                </small>
                                <br>
                                <small class="pull-right">
                                    @if($question->answersCount)
                                        view all <a href="#">{{ $question->answersCount }}</a> answers
                                    @else
                                        no answers yet
                                    @endif
                                </small>
                            </td>

                            <td>
                                <a href="{{ action('Admin\QuestionController@edit',$question->id)  }}"
                                   class="btn btn-sm btn-primary" role="button">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\QuestionController@destroy',$question->id)}}">Delete
                                </button>
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