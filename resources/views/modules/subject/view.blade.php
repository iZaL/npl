@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection


@section('right')

    @foreach($levels as $level)
        <ul class="list-group">
            <li class="list-group-item">
                <h4>{{ ucfirst($level->name) }}</h4>
            </li>
        </ul>

    @endforeach
@endsection