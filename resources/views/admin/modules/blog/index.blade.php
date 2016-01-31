@extends('admin.layouts.one_col')

@section('title')
    <h1>Editorial Posts</h1>
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
                Editorial Posts
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a class="btn btn-primary btn-md" role="button" href="{{ action('Admin\BlogController@create') }}"> Create new Editorial </a>
                <div class="dataTable_wrapper mTop10">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Added Date</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr class="gradeU">
                                <td> {!! str_limit(strip_tags($blog->title),100) !!} </td>
                                <td> {{ $blog->created_at->format('d-m-Y') }} </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\BlogController@show',$blog->id)  }}"
                                       role="button" >
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\BlogController@edit',$blog->id)  }}"
                                       role="button">
                                        <i class="fa fa-pencil-square-o "></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                                       data-link="{{action('Admin\BlogController@destroy',$blog->id)}}">
                                        <i class="fa fa-close "></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            @include('admin.partials.delete-modal',['info' => 'Are you sure ?'])

        </div>
    </div>

@endsection