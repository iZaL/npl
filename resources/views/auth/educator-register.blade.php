@extends('layouts.one_col')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                <h2 class="blockhead">Student Registeration</h2>

                <div class="blockpara">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('Auth\AuthController@postEducatorRegistration') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::text('firstname_en',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                        {!! Form::text('lastname_en',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                        {!! Form::textarea('address_en',null,['class'=>'form-control','placeholder'=>'Address']) !!}
                        {!! Form::text('city_en',null,['class'=>'form-control','placeholder'=>'City']) !!}
                        {!! Form::text('country_en',null,['class'=>'form-control','placeholder'=>'Country']) !!}
                        {!! Form::select('levels[]', $levels , null , ['class' => 'form-control']) !!}
                        {!! Form::select('subjects[]', $subjects , null , ['class' => 'form-control']) !!}
                        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                        {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
                        {!! Form::password('password_confirmation',null,['class'=>'form-control','placeholder'=>'Confirm Password']) !!}

                        <input type= "submit" class="blueButton" value="Register"
                               style="margin:12px 0 0 237px !important;"/>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
