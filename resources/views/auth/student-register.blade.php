@extends('layouts.one_col')

@section('middle')
    <div class="row">
        <div class="col-sm-12 text-center">

            <header>
                <h1> Sign up for Student Account</h1>
            </header>
            <div class="row inner-top-xs">

                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ action('Auth\AuthController@postStudentRegistration') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="control-label pull-left ">First Name</label>
                            {!! Form::text('firstname_en',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Last Name</label>
                            {!! Form::text('lastname_en',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Email</label>
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Password</label>
                            {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Confirm Password</label>
                            {!! Form::password('password_confirmation',null,['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Level</label>
                            {!! Form::select('levels[]', $levels , null , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Address</label>
                            {!! Form::textarea('address_en',null,['class'=>'form-control','placeholder'=>'Address']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">City Name</label>
                            {!! Form::text('city_en',null,['class'=>'form-control','placeholder'=>'City']) !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label pull-left ">Country</label>
                            {!! Form::text('country_en',null,['class'=>'form-control','placeholder'=>'Country']) !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-positive" value="Register"/>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
