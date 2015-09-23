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
                        <div class="form-group">
                            <label class="control-label pull-left ">Email</label>
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label pull-left ">Password</label>
                            {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-positive" value="Login"/>
                        </div>

                    </form>
                </div><!-- /.col -->

                <div class="col-sm-6 inner-left-xs inner-bottom-xs">
                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

