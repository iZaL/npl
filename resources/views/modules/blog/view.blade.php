@extends('layouts.two_col')

@section('title')
    <h1>{{ str_limit($post->title,25) }} ...</h1>
@endsection

@section('left')

    <div class="panel">
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    {!! $post->description !!}
                </div>
            </div>
        </div>

    </div>
    <div class="clear:both"></div>

@endsection
