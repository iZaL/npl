@extends('layouts.two_col')

@section('title')
    <h1> Questions For Subject {{ ucfirst($subject->name) }}</h1>
@endsection

@section('right')

@endsection

@section('left')
    @foreach($levels as $level)

        <div class="row">
            <div class="col-md-12">
                <h2>{{ ucfirst($level->name) }}</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        @if(count($level->latestQuestions))
                            @foreach($level->latestQuestions as $question)
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