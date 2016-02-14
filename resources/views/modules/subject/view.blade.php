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

                                        <!-- If Educator, and the If educator can answer the question, show the question as hyperlink -->
                                        @if($isEducator)
                                            @if(in_array($question->subject_id,$userSubjects) && in_array($question->level_id,$userLevels))
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <h3>Q:
                                                            <a href="{{ action('AnswerController@createAnswer',$question->id) }}">{!! ucfirst($question->body) !!}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="col-md-5 ">
                                                        <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">

                                                    <ul class="list-group">
                                                        @if(count($question->parentAnswers))
                                                            @foreach($question->parentAnswers as $answer)
                                                                <li class="list-group-item">
                                                                    <small class="navy">You answered
                                                                        on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</small>
                                                                    <h3>
                                                                        <a href="{{ action('AnswerController@createReply',['question_id'=>$question->id,'answer_id'=>$answer->id]) }}"
                                                                           class="np_code">
                                                                            {{ str_limit(strip_tags($answer->body,100)) }} </a>
                                                                    </h3>

                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <h3 class="navy">You haven't answered yet !
                                                                <a href="{{ action('AnswerController@createAnswer',['question_id'=>$question->id]) }}"
                                                                   class="np_code">Write an answer</a>
                                                            </h3>
                                                        @endif
                                                    </ul>

                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <h3>Q:  {{ ucfirst($question->body) }}  </h3>
                                                    </div>
                                                    <div class="col-md-5 ">
                                                        <small class="pull-right gray">{{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</small>
                                                    </div>
                                                </div>

                                            @endif

                                        @else
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h3>Q: {{ ucfirst($question->body) }} </h3>
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