@extends('layouts.master')

@section('content')

    <section id="page-breadcrumb">
        <div class="vertical-center sun ">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" >
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
