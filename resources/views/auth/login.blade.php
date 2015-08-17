@extends('layouts.one_col')

@section('style')
    @parent
@stop

@section('content')

        <div class="col-md-8">
            <h2 class="blockhead">Login</h2>

            <div class="blockpara">
                <form role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input name="email" id="email" type="text" class="form-control" placeholder="&nbsp;Email"
                           style="padding:0 0 0 0 !important;"/>
                    <input name="password" id="password" type="password" class="form-control"
                           placeholder="&nbsp;Password" style="padding:0 0 0 0 !important;"/>
                    <input name="login" id="login" type="submit" class="blueButton" value="Login"
                           style="margin:12px 0 0 237px !important;"/>

                </form>
            </div>
            <a href="{{ action('Auth\AuthController@studentRegistration') }}" class="buttonRegistration">STUDENT REGISTRATION</a>
            <span style="float:right"><a href="{{ action('Auth\AuthController@educatorRegistration') }}" class="buttonRegistration">EDUCATOR
                    REGISTRATION</a></span>
        </div>
        <div class="col-md-4">
            <a href="#" class="button6">ASK FOR FREE</a>

            <div class="ads">Advertising</div>
        </div>
        <div class="clear"></div>
@stop

