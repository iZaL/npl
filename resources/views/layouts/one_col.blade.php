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
    <section class=" main">
        <div class="container inner-top-md">
            @include('partials.notifications')

            @yield('middle')
        </div>
        <!-- /.container -->
    </section>
@endsection