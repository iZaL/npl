@extends('layouts.one_col')
@section('title')
    <h1 class="text-center"> Sign up as Student  </h1>

@endsection
@section('middle')
    <div class="row">
        <div class="col-md-4 col-sm-12" style="color:gray">
            <h2>Student Signup Process</h2>
            <li>Fill out the Requested Details</li>
            <li>Select one level: First year University, high school, medium or elementary school</li>
            <li>You can get assistance in different subjects. You have to specify the subject when you file a question</li>
            <li>Once you have filled out the requested details, press Register. You will receive a message on your Email. Activate the registration. The website will provide you with an ID number</li>
            <li>Your personal information will not be visible to others. When you ask a question, Educators will only see the question and your ID number. Educators will enter in contact with you to define a way of collaboration that suits you, either by hourly fees or by other ways</li>
            <li>Your question will appear for a week. However, if you get an answer earlier, you can delete your question</li>
            <li>Once you have finished, log out</li>
            <li>The subscription is FREE for one month. After that a fee of 5 dollars per semester will be requested for each subject</li>
        </div>
        <div class="col-md-7 col-sm-12  text-center pull-right">
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ action('Auth\AuthController@postStudentRegistration') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="control-label pull-left ">First Name </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::text('firstname_en',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Last Name</label>
                    <span class="pull-left">(required)</span>
                    {!! Form::text('lastname_en',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Email</label>
                    <span class="pull-left">(required)</span>
                    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Password</label>
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
                    <small class="hint pull-left">Choose your academic level</small>
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
            <a href="{{ action('Auth\AuthController@educatorRegistration') }}" >
                <div class="btn btn-danger " style="margin-bottom: 20px">
                    Educator Registration
                </div>
            </a>
        </div>

    </div>
@endsection
