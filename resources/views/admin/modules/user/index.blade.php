@extends('admin.layouts.one_col')

@section('title')
    <h1>Users</h1>
@endsection

@section('content')
    <div class="col-lg-12 mTop10">
        <div class="panel panel-default">
            <div class="panel-heading">
                Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>Basic Info</th>
                            <th>Email</th>
                            <th>Active</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="gradeU">
                                <td>
                                    <i class="fa fa-user"></i> &nbsp; {{ $user->firstname . ' '.$user->lastname }} <br>
                                    <i class="fa fa-envelope"></i> &nbsp; {{ $user->email }}
                                </td>
                                <td> {{ $user->email  }}</td>
                                <td> {{ $user->admin ? 'true' : 'false' }}</td>
                                <td> {{ $user->active ? 'true' : 'false' }}</td>
                                <td>
                                    <a href="{{ action('Admin\UserController@edit',$user->id)  }}"
                                       class="btn btn-sm btn-primary" role="button">Edit</a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModalBox"
                                            data-link="{{action('Admin\UserController@destroy',$user->id)}}">Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the User\'s Questions and Related Answers.'])
        </div>
        <!-- /.panel -->
    </div>

@endsection