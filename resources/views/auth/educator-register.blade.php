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
            <h2>عملية تسجيل الإستاذ</h2>
            <li>Fill out the Requested Details
            <br>
                إملئ البيانات المطلوبة بما فيها من المؤهلات الجامعية  qualifications  والخبرة التدريسية  experience

            </li>
            <li>Select one subject of your competence such as mathematics, physics.,,,,
                <br>
                إختر تخصصا واحدا فقط وفق مؤهلاتك الجامعية:   mathematics, physics, chemistry, English, French, Arabic
            </li><br>
            <li>Select one or several levels such as: first year university, high school, medium or elementary
            <br>
                إختر مستوى أو عدة مستويات  دراسية ترغب في مساعدة طلبتها:  first year university, high school, medium
            </li>
            <h2>The Educator can help students in two ways:</h2>
            <h2>من الممكن ان يساعد الإستاذ الطلبة كما يلي:</h2>
            <li>by answering questions raised by students for <b>FREE</b>

            <br>
                الإجابة على أسئلة الطلبة مجانا
            </li>
            <li>by establishing direct contact with the student for further assistance in terms of private, preferably on line paid assistance. The student NP code will appear next to the raised question.
            <br>
                عبر دروس خصوصية بإسعار معقولة. يتم ذلك من خلال الإجابة على أسئلة الطلبة
            </li>
            <br>
            <span class="pTop10">
                The objective is to help students understand their subject, answering urgent questions, solving problems, exam preparation etc... Both parties (Educator/Student) can establish the collaboration method, either by hourly or whole semester fee. It is hoped that fees will be very reasonable. Educators fee could be arranged by visa,K-net, Paypal, Safepay or whatever means. The web site management could help in this matter Registration on the No Problem website is FREE.
            </span>
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
                    {!! Form::select('levels[]', $levels , null , ['class' => 'form-control select2 multiselect multiselect-inverse', 'multiple'=>'multiple']) !!}
                    <small class="pull-left">Choose levels you want to teach.</small>
                </div>

                <div class="form-group">
                    <label class="control-label pull-left ">Subjects </label>
                    <span class="pull-left">(required)</span>
                    {!! Form::select('subjects[]', $subjects , null , ['class' => 'form-control']) !!}
                    <small class="pull-left">Choose a subject you want to teach. You can start answering the questions related to your subject once admin approves</small>
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

        <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs" style="margin-top: 50px">
            <iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/j_INOE94gAQ" frameborder="0"></iframe>
        </div>
    </div>
@endsection
