@extends('admin.layouts.one_col')

@section('title')
    <h1>Educators</h1>
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
            <b>Educators</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="searchPanel row pbottom10">
                {!! Form::open(['action'=>'Admin\EducatorController@index', 'method'=>'get', 'class'=>'form-vertical']) !!}
                <div class="col-md-5">
                    <div class="col-md-3" >
                        <span class="vcenter">Subject:</span>
                    </div>
                    <div class="col-md-9 ">
                        {!! Form::select('subject',$subjects,$selectedSubject,['class'=>'form-control']) !!}
                    </div>
                </div>
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
                        <th></th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($educators as $educator)
                        <tr class="gradeU">
                            @if($educator->profile)
                                <td> <a href="{{ action('Admin\UserController@show',$educator->profile->id) }}" >{{ $educator->profile->id }}</a></td>
                                <td> <a href="{{ action('Admin\UserController@show',$educator->profile->id) }}" >{{ $educator->profile->np_code }}</a> </td>
                                <td>{{ $educator->profile->firstname . $educator->profile->lastname }} </td>
                                <td>{{ $educator->profile->email }} </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\EducatorController@show',$educator->id)  }}"
                                       role="button" >
                                        <i class="fa fa-list-alt"></i>
                                    </a>
                                </td>
                                <td class="f18">
                                    <a href="{{ action('Admin\UserController@edit',$educator->profile->id)  }}"
                                       role="button">
                                        <i class="fa fa-pencil-square-o "></i>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModalBox"
                                            data-link="{{action('Admin\EducatorController@destroy',$educator->id)}}">
                                        Remove as
                                        educator
                                    </button>
                                </td>
                            @else
                                Unknown User
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteModalBox"
                                        data-link="{{action('Admin\EducatorController@destroy',$educator->id)}}">
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
            @include('admin.partials.delete-modal',['info' => 'Remove the User as an Educator and all the conversations ?.
             You can delete the user in Users Page.','deleteText'=>'Remove as Student'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection

@section('script')
    @parent

@endsection