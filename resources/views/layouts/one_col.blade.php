@extends('layouts.master')

@section('content')
    <section id="page-title">
        <div class="vertical-center sun ">
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
    <section class="main">
        <div class="container inner">
            @include('partials.notifications')

            @yield('middle')
        </div>
        <!-- /.container -->
    </section>
@endsection