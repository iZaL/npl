@extends('layouts.one_col')

@section('middle')

    <div class="row">
        <div class="col-sm-12 text-center">

            <header>
                <h1> Login to your Account</h1>
            </header>
            <div class="row inner-top-xs">

                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs">
                    <form role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input name="email" id="email" type="text" class="form-control" placeholder="&nbsp;Email"
                               style="padding:0 0 0 0 !important;"/>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="&nbsp;Password" style="padding:0 0 0 0 !important;"/>
                        <input name="login" id="login" type="submit" class="" value="Login" />

                    </form>
                </div><!-- /.col -->

                <div class="col-sm-6 inner-left-xs inner-bottom-xs">
                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

