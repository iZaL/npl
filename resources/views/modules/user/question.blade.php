@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection

@section('right')

    <h2 class="blockhead">My Questions</h2>
    <div class="blockpara">

        @foreach($questions as $question)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                        <font color="#f96464">
                            {{ ucfirst($question->subject->name) }}
                        </font>
                    </strong>
                </div>
                <div style="float:right;"><i><font color="#f96464">{{ $question->created_at->format('d-m-Y')  }}</font></i>
                </div>
                <br/>

                <p align="justify"><b>{{ ucfirst($question->body) }}</b></p>

                @foreach($question->parentAnswers as $answer)
                    <p align="justify">
                        <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                           class="np_code">
                            <i>Answer from {{ $answer->body }} | {{ $answer->user->np_code }}</i>
                        </a>
                    </p>
                @endforeach

            </div>
        @endforeach
    </div>
@endsection