@extends('layouts.two_col')

@section('breadcrumb')
    <h1> Questions For {{ ucfirst($subject->name) }}</h1>
@endsection

@section('right')
    <h1>AD</h1>
@endsection

@section('left')
    @foreach($levels as $level)
        <ul class="list-group">
            <li class="list-group-item">
                <h4>{{ ucfirst($level->name) }}</h4>
                <ul>
                    @if(count($level->latestQuestions))
                        @foreach($level->latestQuestions as $question)
                            <li>{{$question->body}}</li>
                        @endforeach
                    @else
                        <p>No Questions Posted</p>
                    @endif
                </ul>
            </li>
        </ul>

    @endforeach
@endsection