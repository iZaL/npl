@extends('layouts.one_col')
@section('title')
    <h1 class="text-center"> Sign up as Student  </h1>
    <a href="{{ action('Auth\AuthController@educatorRegistration') }}" >
        <div class="btn btn-danger col-md-8 col-md-offset-2" >
            <h2 style="color:white">Sign up as an Educator</h2>
        </div>
    </a>
@endsection

@section('style')
    @parent
    <link href="/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
@endsection

@section('script')
    @parent
    <script src="/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".select2").select2();
      });
    </script>

@endsection
@section('middle')
    <div class="row">
        <div class="col-md-4 col-sm-12 signup-info" >
            <h2>Student Signup Process</h2>
            <li>Fill out the Requested Details</li>
            <li>Select one level: First year University, high school, medium or elementary school</li>
            <li>You can get assistance in different subjects. Select the subject(s) of which you need assistance: Chemistry, Physics, Mathematics, languages. You have to specify the subject(s) when you file a question</li>
            <li>Once you have filled out the requested details, press Register. You will receive a message on your Email. Activate the registration. The website will provide you with an ID number</li>
            <li>Your personal information will not be visible to others. When you ask a question, Educators will only see the question and your ID number. Educators will enter in contact with you to define a way of collaboration that suits you, either by hourly fees or by other ways</li>
            <li>Your question will appear for a week. However, if you get an answer earlier, you can delete your question</li>
            <li>Once you have finished, log out</li>
            <li>Subscription is FREE for one month. After that a fee of $10/semester for each subject</li>
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
                    <label class="control-label pull-left ">Subjects </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::select('subjects[]', $subjects , null , ['class' => 'form-control select2 multiselect multiselect-inverse', 'multiple'=>'multiple']) !!}
                    <small class="pull-left">Choose subjects you want to learn</small>
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

        <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs" style="margin-top: 50px">
            <iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/gsF9lv2SCqU" frameborder="0"></iframe>
        </div>

    </div>
@endsection
