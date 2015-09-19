@extends('admin.layouts.one_col')

@section('title')
    <h1>Subject</h1>
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
            <b>Subject</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                    <tr>
                        <th>Subjects</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr class="gradeU">
                            <td>
                                <a href="{{ action('Admin\SubjectController@show',$subject->id) }}">{{ ucfirst($subject->name) }}</a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\SubjectController@edit',$subject->id)  }}"
                                   class="btn btn-sm btn-primary" role="button">Edit</a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\SubjectController@destroy',$subject->id)}}">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the Questions and Answers related to the subject .'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection