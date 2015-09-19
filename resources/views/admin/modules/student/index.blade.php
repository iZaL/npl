@extends('admin.layouts.one_col')

@section('title')
    <h1>Students</h1>
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
            <b>Students</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper mTop10">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                    <tr>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="gradeU">
                            <td>
                                @if($student->profile)
                                    <a href="{{ action('Admin\StudentController@show',$student->id) }}">{{ ucfirst($student->profile->firstname) }}</a>
                                @else
                                    Unknown User
                                @endif
                                <small class="pull-right">
                                    {{ $student->questionsCount ? 'Total '. $student->questionsCount .' Questions. ': ' 0 Questions.' }}
                                </small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\StudentController@destroy',$student->id)}}">Remove as Student
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will only remove the User as Student and delete all his questions.
             You can delete the user from Students Page.','deleteText'=>'Remove as Student'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection