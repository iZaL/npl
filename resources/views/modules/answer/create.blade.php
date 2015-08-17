@extends('layouts.one_col')

@section('content')

    {!! Form::open(['action' => 'QuestionController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}
    <div class="form-group">
        {!! Form::label('subject', 'Select a subject', ['class' => 'control-label']) !!} <span class="red">*</span>
        {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control','placeholder'=>'Subject']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
        {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',  ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    </div>
    {!! Form::close() !!}
@endsection