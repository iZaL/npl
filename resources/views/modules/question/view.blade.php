@extends('layouts.two_col')

@section('title')
    <h1>{!! $question->body !!}</h1>
@endsection

@section('right')
@endsection
@section('style')
    @parent
    <style>
        .subject-icon {
            font-size: 80px;
        }
        hr {
            margin: 20px 0;
        }
        .reply {
            color:#1ABB9C;
            font-size: 15px;
            text-decoration: underline;
        }
    </style>
@endsection
@section('left')
    <div class="row">
        <div class="col-md-3">
            <div class="text-overlay">
                <div class="info text-center">
                    <h4>{{ ucfirst($question->subject->name) }}</h4>
                </div>
            </div>
            <img src="/images/lang/{{strtolower($question->subject->name)}}.jpg" class="img img-responisve subject-icon text-center" style="width: 100%"/>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-9">
                    <h2>{!! ucfirst($question->body) !!}</h2>
                </div>
                <div class="col-md-3 ">
                    <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                </div>
            </div>

            <div class="col-md-12">

                <ul class="list-group">
                    @if(count($question->parentAnswers))
                        @foreach($question->parentAnswers as $answer)
                            <li class="list-group-item">
                                @if($answer->user_id == $user->id)
                                    <small class="navy">You answered</small>
                                @else
                                    <small class="navy">Answer from</small>
                                    <b>{{ $answer->user->np_code }}</b>
                                @endif
                                <small class="navy"> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</small>
                                <h3>
                                    <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                                       class="np_code">
                                        {!! str_limit($answer->body,100) !!} </a>
                                    <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                                       class="reply ">
                                        reply
                                    </a>
                                </h3>
                            </li>
                        @endforeach
                    @else
                        <h4 class="navy">No answers</h4>
                    @endif
                </ul>

            </div>
        </div>

    </div>

    <hr>

@endsection