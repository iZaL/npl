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
            margin: 10px 0 10px 0;
        }
    </style>
@endsection

@section('title')
    <h1> Questions For Level {{ ucfirst($level->name) }}</h1>
@endsection

@section('right')

@endsection

@section('left')
    @foreach($subjects as $subject)

        <div class="row">
            <div class="col-md-2">
                <div class="info text-center">
                    <h4>{{ ucfirst($subject->name) }}</h4>
                </div>
                <!-- /.info -->
                {{--<div class="{{ strtolower($subject->icon) }} subject-icon text-center"></div>--}}
                <img src="/images/lang/{{strtolower($subject->name)}}.jpg" class="img img-responisve subject-icon text-center" style="width: 100%"/>
            </div>
            <div class="col-md-10">
                <ul class="list-group">
                    <li class="list-group-item">
                        @if(count($subject->latestQuestions))
                            @foreach($subject->latestQuestions as $question)
                                <div class="row">
                                    <div class="col-md-12">
                                        @if(in_array($question->subject_id,$userSubjects) && in_array($question->level_id,$userLevels))
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h2>
                                                        <a href="{{ action('AnswerController@createAnswer',$question->id) }}">{!! ucfirst($question->body) !!}</a>
                                                    </h2>
                                                </div>
                                                <div class="col-md-5 ">
                                                    <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <ul class="list-group">
                                                    @foreach($question->parentAnswers as $answer)
                                                        @if($user->id == $answer->user_id)
                                                            <li class="list-group-item">
                                                                <small class="navy">You answered
                                                                    on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</small>
                                                                <h3>
                                                                    <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                                                                       class="np_code">
                                                                        {!!  $answer->body !!}  </a>
                                                                </h3>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <hr>

                                        @else
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h3>Q:
                                                        {{ ucfirst(strip_tags($question->body)) }}
                                                    </h3>
                                                </div>
                                                <div class="col-md-5 ">
                                                    <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                            @endforeach
                        @else
                            <h4>No Questions Posted</h4>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <hr>

    @endforeach
@endsection