@extends('admin.layouts.one_col')

@section('title')
    <h1>Edit Question</h1>
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Edit Question </b>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
                {!! Form::model($question,['action' => ['Admin\QuestionController@update',$question->id], 'method' => 'patch', 'files'=> true, 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('subject', 'Select a subject', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control','placeholder'=>'Subject']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Question']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit',  ['class' => 'form-control btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.panel -->

@endsection