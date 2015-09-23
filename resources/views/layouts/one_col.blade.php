@extends('layouts.master')

@section('content')
    <main>
        <section class="light-bg main">
            <div class="container inner-top-md">
                @include('partials.notifications')

                @yield('middle')
            </div>
            <!-- /.container -->
        </section>
    </main>
@endsection