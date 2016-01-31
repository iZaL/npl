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
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr>
                            <th>SI No</th>
                            <th>NP Code</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Admin</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="gradeU">
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ action('Admin\UserController@show',$user->id) }}">{{ $user->np_code }}</a></td>
                                <td>{{ (new \ReflectionClass($user->getType()))->getShortName() }}</td>
                                <td>{{ $user->firstname . ' '.$user->lastname }} </td>
                                <td>{{ $user->email }} </td>
                                <td> {{ $user->active ? 'active' : 'not active' }}</td>
                                <td> {{ $user->admin ? 'true' : 'false' }}</td>
                                <td class="f18">
                                    <a href="{{ action('Admin\UserController@show',$user->id)  }}"
                                       role="button" >
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\UserController@edit',$user->id)  }}"
                                       role="button">
                                        <i class="fa fa-pencil-square-o "></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                                       data-link="{{action('Admin\UserController@destroy',$user->id)}}">
                                        <i class="fa fa-close "></i>
                                    </a>
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