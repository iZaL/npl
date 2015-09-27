@extends('layouts.two_col')

@section('title')
    <h1>My Questions</h1>
@endsection

@section('right')
    <h1>AD</h1>
@endsection

@section('left')
    <div class="blockpara">

        @foreach($questions as $question)
            <div class="questionBorder inner-bottom-md">
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

                <div align="justify" class=""><b>{{ ucfirst($question->body) }}</b></div>

                @foreach($question->parentAnswers as $answer)
                    <div class="" align="justify">
                        <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                           class="np_code">
                            <i>Answer from  {{ $answer->user->np_code }} </i> | {{ $answer->body }}
                        </a>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
@endsection