@extends('layouts.two_col')
@section('style')
    @parent
    <style>
        [class^="flaticon-"]:before, [class*=" flaticon-"]:before, [class^="flaticon-"]:after, [class*=" flaticon-"]:after {
            font-family: Flaticon;
            font-size: 80px;
            line-height: 140px;
            font-style: normal;
        }

        [class^="flaticon-"]:hover {
            color: #009926;
        }

        .subject-icon {
            font-size: 80px;
        }
        hr {
            margin:10px 0 10px 0;
        }
    </style>
@endsection
@section('title')
    <h1>My Questions</h1>
@endsection

@section('right')

@endsection

@section('left')
    @foreach($questions as $question)
        <div class="row">

            <div class="col-md-2">
                <figure>
                    <figcaption class="text-overlay">
                        <div class="info text-center">
                            <h4>{{ ucfirst($question->subject->name) }}</h4>
                        </div>
                        <!-- /.info -->
                    </figcaption>
                    <div class="{{ strtolower($question->subject->icon) }} subject-icon text-center"></div>
                </figure>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-7">
                        <h2>Q:
                            <a href="{{ action('AnswerController@createAnswer',$question->id) }}">{!! ucfirst($question->body) !!}</a>
                        </h2>
                    </div>
                    <div class="col-md-5 ">
                        <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                    </div>
                </div>

                <div class="col-md-12">

                    <ul class="list-group">
                        @if(count($question->parentAnswers))

                            @foreach($question->parentAnswers as $answer)

                                @if($answer->recentReply())
                                    <li class="list-group-item">
                                        <small class="navy">You answered on {{ $answer->recentReply()->created_at->format('d-m-Y \a\t g:i:s a') }}</small>
                                        <h3>
                                            <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->recentReply()->id]) }}"
                                               class="np_code">
                                                {!!  str_limit($answer->recentReply()->body,100) !!} </a>
                                        </h3>
                                    </li>
                                @else
                                    <li class="list-group-item">
                                        <small class="navy">You answered on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</small>
                                        <h3>
                                            <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                                               class="np_code">
                                                {!!  str_limit($answer->body,100) !!} </a>
                                        </h3>
                                    </li>
                                @endif

                            @endforeach
                        @else
                            <h4 class="navy">You haven't answered yet !
                                <a href="{{ action('AnswerController@createAnswer',['question_id'=>$question->id]) }}"
                                   class="np_code">Write an answer</a>
                            </h4>
                        @endif
                    </ul>

                </div>
            </div>

        </div>

        <hr>

    @endforeach
@endsection