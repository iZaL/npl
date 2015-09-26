@extends('layouts.two_col')

@section('title')
    <h1>My Questions</h1>
@endsection
@section('left')

    <h1>AD</h1>

@endsection


@section('right')

    <div class="blockpara">

        @foreach($questions as $question)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                        <font color="#f96464">
                            {{ $question->subject->name }}
                        </font>
                    </strong>
                </div>
                <div style="float:right;"><i><font color="#f96464">{{ $question->created_at->format('d-m-Y')  }}</font></i></div>
                <br/>

                <p align="justify"><b><a href="{{ action('AnswerController@createAnswer',$question->id) }}">{{ $question->body }}</a></b></p>

            </div>
        @endforeach
    </div>
@endsection