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
                <div class="question-info-wrapper">
                    <div class="row info-row">
                        <div class="col-md-3">NP Code</div>
                        <div class="col-md-9">: {!!  $user->np_code !!}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">First Name</div>
                        <div class="col-md-9">: {{ $user->firstname }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Last Name</div>
                        <div class="col-md-9">: {{ $user->lastname }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Address</div>
                        <div class="col-md-9">: {{ $user->address }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">City</div>
                        <div class="col-md-9">: {{ $user->city }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Country</div>
                        <div class="col-md-9">: {{ $user->country }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Level</div>
                        <div class="col-md-9">: {{ $levels }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Subject</div>
                        <div class="col-md-9">: {{ $subjects}}</div>
                    </div>
                    @if($isEducator)

                        <div class="row info-row">
                            <div class="col-md-3">Qualification</div>
                            <div class="col-md-9">: {{ $user->educator->qualification }}</div>
                        </div>
                        <div class="row info-row">
                            <div class="col-md-3">Experience</div>
                            <div class="col-md-9">: {{ $user->educator->experience }}</div>
                        </div>
                        {{--<div class="row info-row">--}}
                        {{--<div class="col-md-3">Email</div>--}}
                        {{--<div class="col-md-9">: {{ $question->created_at->format('d-m-Y h:ia') }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="row info-row">--}}
                        {{--<div class="col-md-3">Qualification</div>--}}
                        {{--<div class="col-md-9">: {{ $question->created_at->format('d-m-Y h:ia') }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="row info-row">--}}
                        {{--<div class="col-md-3">Experience</div>--}}
                        {{--<div class="col-md-9">: {{ $question->created_at->format('d-m-Y h:ia') }}</div>--}}
                        {{--</div>--}}
                    @endif
                    <div class="row info-row">
                        <div class="col-md-3">Email</div>
                        <div class="col-md-9">: {{ $user->email }}</div>
                    </div>
                    <div class="row info-row">
                        <div class="col-md-3">Status</div>
                        <div class="col-md-9">: {{ $user->active ? 'active' : 'not active' }}</div>
                    </div>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
            @include('admin.partials.delete-modal',['info' => 'This will also delete the User\'s Questions and Related Answers.'])
        </div>
        <!-- /.panel -->
    </div>

@endsection