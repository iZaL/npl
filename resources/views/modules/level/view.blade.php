@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection


@section('right')

    @foreach($subjects as $subject)
        <ul class="list-group">
            <li class="list-group-item">
                <h4>{{ ucfirst($subject->name) }}</h4>
                <ul>
                    @if(count($subject->latestQuestions))
                        @foreach($subject->latestQuestions as $question)
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