@extends('layouts.two_col')
@section('breadcrumb')
    <h1>{{ $question->body }}</h1>
@endsection
@section('left')

    {!! Form::open(['action' => 'AnswerController@storeReply', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
    <input type="hidden" name="answer_id" id="question_id" value="{{ $answer->id }}">

    <ul class="list-group">
        <li class="list-group-item">
            {{ $answer->body }} |  {{ $answer->user->np_code }}
        </li>
        @foreach($childAnswers as $answer)
            <li class="list-group-item">
                {{ $answer->body }} | {{ $answer->user->np_code }}
            </li>
        @endforeach
    </ul>

    <div class="form-group">
        {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
        {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',  ['class' => 'form-control btn btn-positive','placeholder'=>'Your Question']) !!}
    </div>
    {!! Form::close() !!}
@endsection