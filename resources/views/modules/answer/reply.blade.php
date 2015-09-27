@extends('layouts.one_col')
@section('title')
    <h1>{{ $question->body }}</h1>
@endsection
@section('middle')

    {!! Form::open(['action' => 'AnswerController@storeReply', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
    <input type="hidden" name="answer_id" id="question_id" value="{{ $answer->id }}">

    <ul class="list-group">
        <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right text-rtl' }}" style="margin-bottom: 10px;">
            {{ $answer->user_id == Auth::user()->id ? 'Me | ' : $answer->user->np_code .' | ' }} {{ $answer->body }} <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y') }}</i></small>
        </li>
        @foreach($childAnswers as $answer)
            <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right text-rtl' }}" style="margin-bottom: 10px;">
                {{ $answer->user_id == Auth::user()->id ? 'Me | ' : $answer->user->np_code .' | ' }} {{ $answer->body }} <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y') }}</i></small>
            </li>
        @endforeach
    </ul>

    <div class="clear" style="clear:both;"></div>
    {!! Form::label('body', 'body', ['class' => 'control-label']) !!} <span class="red">*</span>
    {!! Form::textarea('body_en', null, ['class' => 'form-control','placeholder'=>'Your Question']) !!}
    {!! Form::submit('Reply',  ['class' => 'form-control btn btn-positive','placeholder'=>'Your Question']) !!}
    {!! Form::close() !!}
@endsection