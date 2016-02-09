@extends('layouts.two_col')

@section('style')
    @parent
    <style>
        .custab{
            border: 1px solid #ccc;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }
    </style>
@endsection

@section('title')
    <h1>My Answers</h1>
@endsection

@section('right')
    <h1>AD</h1>
@endsection

@section('left')

    <div class=" custyle">
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Question</th>
                <th>Date</th>
            </tr>
            </thead>
            @foreach($questions as $question)
                <tr>
                    <td>{{ ucfirst($question->subject->name) }}</td>
                    <td><a href="{{ action('AnswerController@createAnswer',$question->id) }}">{{ $question->body }}</a></td>
                    <td>{{ $question->created_at->format('d-m-Y, h:i a')  }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection