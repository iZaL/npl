@extends('layouts.one_col')

@section('content')


    <h1>{{ $question->body }}</h1>

    <ul class="list-group">
        @foreach($answers as $answer)
            <li class="list-group-item">
                <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}">{{ $answer->body }} | {{ $answer->user->np_code }}</a>
            </li>
        @endforeach
    </ul>

    {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    {!! Form::hidden('question_id',$question->id) !!}

    <div class="form-group">
        {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
        {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit',  ['class' => 'form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection