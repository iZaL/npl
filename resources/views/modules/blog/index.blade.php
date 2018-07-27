@extends('layouts.two_col')

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('left')
    <div class="panel" id="midCol">
        <div class="panel-body">

            @foreach($blogs as $post)
                <h2><a href="{{ action('BlogController@show',$post->id) }}">{{ $post->title }}</a></h2>

                <div class="row">
                    @if($post->thumbnail)
                        <div class="col-md-3">
                            <a href="{{ action('BlogController@show',$post->id) }}">
                                @if($post->thumbnail)
                                    <img src="/uploads/thumbnail/{{ $post->thumbnail->name}}"
                                         class="img-responsive img-thumbnail">
                                @else
                                    <img src="http://placehold.it/150x100/EEEEEE" class="img-responsive img-thumbnail">
                                @endif
                            </a>
                        </div>
                        <div class="col-md-9 blog-post">
                            @else
                                <div class="col-md-12 blog-post">
                                    @endif
                                    {!! str_limit($post->description,300) !!}
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <button class="btn btn-default mTop10"><a
                                            href="{{ action('BlogController@show',$post->id) }}">More</a></button>
                            </div>
                        </div>

                        <hr>
                        @endforeach

                </div>
        </div>
@endsection
