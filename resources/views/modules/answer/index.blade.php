@extends('layouts.two_col')
@section('title')
    <h1>My Questions</h1>
@endsection
@section('left')

@endsection

@section('right')

    <h2 class="blockhead"></h2>
    <div class="blockpara">

        @foreach($questions as $question)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                            {{ $question->subject->name }}
                        </font>
                    </strong>
                </div>
                <div style="float:right;"><i><span style="color:#f96464">{{ $question->created_at->format('d-m-Y')  }}</span></i></div>
                <br/>

                <p align="justify"><b>{!! $question->body  !!} </b></p>

            </div>
        @endforeach
    </div>
@endsection