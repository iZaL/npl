@extends('layouts.two_col')
@section('title')
    <h1 class="text-center">{{ $question->body }}</h1>
@endsection
@section('left')
    {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    {!! Form::hidden('question_id',$question->id) !!}



    {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
    {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    {!! Form::submit('Submit',  ['class' => 'form-control btn btn-positive']) !!}
    {!! Form::close() !!}
@endsection