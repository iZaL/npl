@extends('admin.layouts.one_col')

@section('title')
    <h1>Levels</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Levels</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <a class="btn btn-primary btn-md" role="button" href="{{ action('Admin\LevelController@create') }}"> Add Level </a>
            <hr>
            <div class="dataTable_wrapper mTop10">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>Levels</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($levels as $level)
                        <tr class="gradeU">
                            <td>
                                <a href="{{ action('Admin\LevelController@show',$level->id) }}">{{ ucfirst($level->name) }}</a>
                                <small class="pull-right">
                                    {{ $level->usersCount ? 'Total '. $level->usersCount .' Educators. ': ' 0 Educators.' }}
                                    <br>
                                    {{ $level->questionsCount ? 'Total '. $level->questionsCount .' Questions. ': ' 0 Questions.' }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ action('Admin\LevelController@edit',$level->id)  }}"
                                   class="btn btn-sm btn-primary" role="button">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\LevelController@destroy',$level->id)}}">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the Questions and Answers related to the Level .'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection