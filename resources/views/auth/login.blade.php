@extends('layouts.one_col')

@section('title')
    <h1 class="text-center"> Login to your Account</h1>
@endsection

@section('left')
    <div class="panel" id="midCol">
        <div class="panel-body">
            <iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/gsF9lv2SCqU" frameborder="0">
            </iframe>
        </div>
    </div>
@endsection
@section('middle')

    <div class="row">
        <div class="col-sm-12 text-center">

            <div class="row inner-top-xs">


                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs">
                    <form role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="control-label pull-left ">Email</label>
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label pull-left ">Password</label>
                            {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-green" value="Login"/>
                        </div>

                    </form>
                </div><!-- /.col -->

                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs">

                    Don't have an account ?  <br>
                    <a href="{{ action('Auth\AuthController@studentRegistration') }}">
                        <div class="btn btn-danger">
                            Student Registration
                        </div>
                    </a>

                    <a href="{{ action('Auth\AuthController@educatorRegistration') }}">
                        <div class="btn btn-danger">
                            Educator Registration
                        </div>
                    </a>

                    <div class="" style="padding-top:20px">
                        <a href="{{ action('Auth\PasswordController@getEmail') }}">Forgot Password</a>
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs" style="margin-top: 50px">
                    <iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/yWvNwvUsKQU" frameborder="0"></iframe>
                </div>


                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs" style="margin-top: 50px">
                    <iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/xhE-iTl6dAE" frameborder="0"></iframe>
                </div>


            </div><!-- /.row -->

        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

