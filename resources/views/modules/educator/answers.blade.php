@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection


@section('right')

    <h2 class="blockhead">My Questions</h2>
    <div class="blockpara">

        @foreach($answers as $answer)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                        <font color="#f96464">
                            {{ $answer->question->subject->name }}
                        </font>
                    </strong>
                </div>
                <div style="float:right;"><i><font color="#f96464">{{ $answer->question->created_at->format('d-m-Y')  }}</font></i></div>
                <br/>

                <p align="justify"><b>{{ $answer->question->body }}</b></p>

                <p><a href="{{ action('AnswerController@createAnswer',$answer->question->id) }}">{{ $answer->body }}</a></p>

            </div>
        @endforeach
    </div>
@endsection