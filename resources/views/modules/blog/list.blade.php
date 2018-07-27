@extends('layouts.two_col')

@section('title')
@endsection

@section('left')

    <h2 style="margin-top:20px;text-align: center"><a href="{{ route('blog.index') }}">List of Blog Posts</a></h2>
    <h2 style="text-align: center"><a href="{{route('blog.index')}}"> قائمة بأسماء بعض المواضيع المنشورة  </a></h2>

@endsection
