@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-8">
            @yield('right')
        </div>

        <div class="col-md-4">
            @yield('left')
        </div>

    </div>
@endsection
