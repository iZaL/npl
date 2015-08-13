@extends('layouts.one_col')

@section('banner')
    @include('partials.banner')
@endsection

@section('content')

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

                                <div class="title1"><a href="{{ action('SubjectController@show',$subject->id) }}">{{ strtoupper($subject->name) }}</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

