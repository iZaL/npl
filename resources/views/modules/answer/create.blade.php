@extends('layouts.two_col')
@section('breadcrumb')
    <h1 class="text-center"> Ask a Question </h1>
@endsection
@section('left')

    <h1>{{ $question->body }}</h1>

    {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    {!! Form::hidden('question_id',$question->id) !!}

    <div class="form-group">
        {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
        {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',  ['class' => 'form-control btn btn-positive']) !!}
    </div>
    {!! Form::close() !!}
@endsection