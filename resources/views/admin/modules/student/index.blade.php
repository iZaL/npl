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
            <div class="searchPanel row pbottom10">
                {!! Form::open(['action'=>'Admin\StudentController@index', 'method'=>'get', 'class'=>'form-vertical']) !!}
                <div class="col-md-5">
                    <div class="col-md-3" >
                        <span class="vcenter">Level:</span>
                    </div>
                    <div class="col-md-9">
                        {!! Form::select('level',$levels,$selectedLevel,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Search',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            <div class="dataTable_wrapper mTop10">
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>SINo</th>
                        <th>NP CODE</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered on</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="gradeU">
                            @if($student->profile)
                                <td> <a href="{{ action('Admin\UserController@show',$student->profile->id) }}" >{{ $student->profile->id }}</a></td>
                                <td> <a href="{{ action('Admin\UserController@show',$student->profile->id) }}" >{{ $student->profile->np_code }}</a> </td>
                                <td>{{ $student->profile->firstname . $student->profile->lastname }} </td>
                                <td>{{ $student->profile->email }} </td>
                                <td>{{ $student->profile->created_at->format('d-m-Y') }} </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\UserController@show',$student->profile->id)  }}"
                                       role="button" >
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\UserController@edit',$student->profile->id)  }}"
                                       role="button">
                                        <i class="fa fa-pencil-square-o "></i>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModalBox"
                                            data-link="{{action('Admin\StudentController@destroy',$student->id)}}">
                                        Remove as
                                        Student
                                    </button>
                                </td>
                            @else
                                Unknown User
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteModalBox"
                                        data-link="{{action('Admin\StudentController@destroy',$student->id)}}">
                                    Remove as
                                    Student
                                </button>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will only remove the User as Student and delete all Questions and Conversations Related to the User.
             You can delete the User in Users Page.','deleteText'=>'Remove as Student'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection