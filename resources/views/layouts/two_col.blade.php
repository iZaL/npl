@extends('layouts.master')

@section('content')

    <section id="blog" class="light-bg">
        <div class="container inner-top-sm inner-bottom">

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    @yield('left')
                </div><!-- /.col -->
                <div class="col-sm-12 col-md-6">
                    @yield('right')
                </div>
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
@endsection
