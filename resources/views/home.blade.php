@extends('layouts.one_col')

@section('banner')
    @include('partials.banner')
@endsection

@section('testimonials')
    <div class="contentWrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Do You Have a Question</h1>

                    <h2>Qualified Educators will Answer and Help You</h2>
                </div>
            </div>

            <div class="row pBottom10">
                <div class="col-md-12">
                    @foreach($subjects as $subject)

                        <div class="col-md-4">
                            <div class="box">
                                <img src="/images/{{ $subject->name }}.jpg" alt=""/>

                                <div class="title1"><a
                                            href="{{ action('SubjectController@show',$subject->id) }}">{{ strtoupper($subject->name) }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Homework and Correction of Essays</h3>

            <div class="col-md-4"><a href="#" class="button1">HOW IT WORKS</a></div>
            <div class="col-md-4"><a href="#" class="button2">LAST QUESTION</a></div>
            <div class="col-md-4"><a href="#" class="button3">NEWSLETTER</a></div>
        </div>

    </div>

@endsection

