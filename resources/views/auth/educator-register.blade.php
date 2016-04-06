@extends('layouts.one_col')

@section('style')
    @parent
    <link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
@endsection

@section('script')
    @parent
    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".select2").select2();
        });
    </script>

@endsection

@section('title')
    <h1 class="text-center"> Sign up as Educator  </h1>

        <a href="{{ action('Auth\AuthController@studentRegistration') }}" >
            <h2 class="text-center">OR</h2>
            <div class="btn btn-danger col-md-8 col-md-offset-2" >
                <h2 style="color:white">Sign up as a Student</h2>
            </div>
        </a>

@endsection
@section('middle')
    <div class="row">
        <div class="col-md-4 col-sm-12 signup-info" >
            <h2>Educator Signup Process</h2>
            <li>Fill out the Requested Details</li>
            <li>Select one level such as : first year University, high school, medium or elementary school</li>
            <li>Select one or two subjects of your competence</li><br>
            <h2>The Educator can help students in two ways:</h2>
            <li>by answering questions raised by students for FREE</li>
            <li>by establishing direct contact with the student for further assistance in terms of private, preferably on line paid assistance. The student NP code will appear next to the raised question.</li>
            <br>
            <span class="pTop10">The objective is to help Students understand their subject by answering urgent questions, by explaining them how to solve problems, by guiding them in exam preparations, etc... Both parties (Educator/Student) can establish the collaboration method which suits them best, either by hourly or by whole semester payments. It is hoped that fees will be very reasonable. Educators fees could be arranged by Visa, Paypal, Safepay or whatever means. The website management could help in this matter. Registration on the No Problem website is FREE for one month. After that a fee of 10 dollars by semester for each subject is requested.</span>
        </div>
        <div class="col-md-7 col-sm-12  text-center pull-right">
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ action('Auth\AuthController@postEducatorRegistration') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="control-label pull-left ">First Name</label>
                    <span class="pull-left">(required)</span>
                    {!! Form::text('firstname_en',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Last Name </label>
                    <span class="pull-left">(required)</span>

                    {!! Form::text('lastname_en',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Email </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Password </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Confirm Password </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::password('password_confirmation',null,['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Level </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::select('levels[]', $levels , null , ['class' => 'form-control']) !!}
                    <small class="pull-left">Choose level you want to teach</small>
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Subjects </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::select('subjects[]', $subjects , null , ['class' => 'form-control select2 multiselect multiselect-inverse', 'multiple'=>'multiple']) !!}
                    <small class="pull-left">Choose subjects you want to teach. Subject will be added to your profile after admin approval.</small>
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Qualification</label>
                    {!! Form::textarea('qualification',null,['class'=>'form-control','placeholder'=>'Address']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Experience</label>
                    {!! Form::textarea('experience',null,['class'=>'form-control','placeholder'=>'Address']) !!}
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
                    @include('partials._country-dropdown')
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-green" value="Register"/>
                </div>
            </form>

        </div>
    </div>
@endsection
