@extends('layouts.two_col')

@section('title')
    <h1> Questions For Subject  {{ ucfirst($subject->name) }}</h1>
@endsection

@section('right')
    <h1>AD</h1>
@endsection

@section('left')
    @foreach($levels as $level)
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>{{ ucfirst($level->name) }}</h3>
                    <ul>
                        @if(count($level->latestQuestions))
                            @foreach($level->latestQuestions as $question)
                                <li class="list-group-item row">
                                    <div class="col-md-8">
                                        {{--@if($question->canAnswer)--}}
                                            {{--<h3>Q:--}}
                                                {{--<a href="{{ action('AnswerController@createAnswer',$question->id) }}">{{ ucfirst($question->body) }}</a>--}}
                                            {{--</h3>--}}

                                        {{--@else--}}
                                            <h3>Q:
                                                {{ ucfirst($question->body) }}
                                            </h3>
                                        {{--@endif--}}
                                    </div>
                                    <div class="col-md-4">
                                        <small class="pull-right navy"><b>{{$question->user->np_code }}</b><span class=" gray"> on {{ $question->created_at->format('d-m-Y \a\t g:i:s a')  }}</span></small>
                                    </div>

                                </li>

                            @endforeach
                        @else
                            <h3 class="navy">No Questions Posted</h3>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>

    @endforeach
@endsection