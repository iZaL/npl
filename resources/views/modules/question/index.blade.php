@extends('layouts.two_col')

@section('title')
    <h1>My Questions</h1>
@endsection
@section('left')

@endsection

@section('right')

    <div class="blockpara">
        @foreach($questions as $question)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                        <div style="color:#f96464">
                            {{ $question->subject->name }}
                        </div>
                    </strong>
                </div>
                <div style="float:right;"><i><span style="color:#f96464">{{ $question->created_at->format('d-m-Y')  }}</span></i></div>
                <br/>
                <p align="justify"><b><a href="{{ action('AnswerController@createAnswer',$question->id) }}">{{ $question->body }}</a></b></p>

            </div>
        @endforeach
    </div>
@endsection