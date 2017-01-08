@extends('admin.layouts.one_col')

@section('title')
    <h1>Blog Posts</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('content')
    <div class="col-lg-12 mTop10">
        <div class="panel panel-default">
            <div class="panel-heading">
                Blog Post
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="question-info-wrapper">
                    <div class="row info-row">
                        <div class="col-md-3">Title</div>
                        <div class="col-md-9">: {!!  $blog->title !!}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Created Date</div>
                        <div class="col-md-9">: {{ $blog->created_at->format('d-m-Y') }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Body</div>
                        <div class="col-md-9">: {{ $blog->description }}</div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection