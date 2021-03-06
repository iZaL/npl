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
@endsection

@section('left')
    <div class=" custyle">
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th>Subject</th>
                <th>Answer</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($answers as $answer)
                @if($answer->question)
                    @if($answer->question->subject)
                        <tr>
                            <td>{{ ucfirst($answer->question->subject->name) }}</td>
                            <td><a href="{{ action('AnswerController@createAnswer',$answer->question->id) }}">{{ strip_tags(str_limit($answer->body,100)) }}</a></td>
                            <td>{{ $answer->question->created_at->format('d-m-Y, h:i a')  }}</td>
                            <td>
                                <a href="#" data-link="{{ action('AnswerController@destroy',$answer->id) }}" data-target="#deleteModalBox" data-original-title="Delete Answer" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </table>
    </div>
@endsection