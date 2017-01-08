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
    <h1>My Articles</h1>
@endsection

@section('right')
@endsection

@section('left')
    <div class=" custyle">
        <h1><a href="{{ action('BlogController@create') }}" class="btn btn-primary btn-navy">Create Article</a></h1>
        <table class="table table-striped custab">
            <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Body</th>
                <th>Date Created</th>
                <th>Edit</th>
            </tr>
            </thead>
            @foreach($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->thumbnail)
                            <img src="/uploads/medium/{{ $blog->thumbnail->name }}" class="img img-responsive" style="width: 50px;height:50px"/>
                        @endif
                    </td>
                    <td><a href="{{ action('BlogController@show',$blog->id) }}">{{ $blog->title }}</a></td>
                    <td>{{ strip_tags(str_limit($blog->description,100)) }}</td>
                    <td>{{ $blog->created_at->format('d-m-Y, h:i a')  }}</td>
                    <td><a href="{{ action('BlogController@edit',$blog->id) }}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection