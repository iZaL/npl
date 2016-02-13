@extends('layouts.master')

@section('content')

    <section id="page-title">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            @yield('title')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog">
        <div class="container inner-top-sm inner-bottom">
            @include('partials.notifications')

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    @yield('left')
                </div>
                <!-- /.col -->
                <div class="col-sm-12 col-md-4">
                    @yield('right')
                    <div>
                        <a href="http://ideasowners.net" target="_blank">
                            <img src="{{ asset('/images/io.png') }}" class="img-responsive img-thumbnail" style="width:100%; height:auto;display: block;visibility: visible">
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
@endsection
