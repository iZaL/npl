@extends('admin.layouts.one_col')

@section('title')
    <h1>Edit User {{ $user->name }}</h1>
@stop

@section('style')
    @parent
@stop

@section('script')
    @parent

@stop

@section('content')

    <div class="mTop10">
        {!! Form::model($user,['action' => ['Admin\UserController@update',$user->id], 'files'=>true, 'method' => 'patch'], ['class'=>'form-horizontal']) !!}

        <div class="form-group">
            <label class="control-label pull-left ">First Name </label>
            <span class="pull-left">(required)</span>
            {!! Form::text('firstname_en',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
        </div>

        <div class="form-group">
            <label class="control-label pull-left ">Last Name</label>
            <span class="pull-left">(required)</span>
            {!! Form::text('lastname_en',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
        </div>

        <div class="form-group">
            <label class="control-label pull-left ">Address</label>
            {!! Form::textarea('address_en',null,['class'=>'form-control','placeholder'=>'Address']) !!}
        </div>

        <div class="form-group">
            <label class="control-label pull-left ">City Name</label>
            {!! Form::text('city_en',null,['class'=>'form-control','placeholder'=>'City']) !!}
        </div>

        <div class="form-group">
            <label class="control-label pull-left ">Country</label>
            @include('partials._country-dropdown', ['userCountry'=>$user->country])
        </div>

        <div class="form-group">
            <label class="control-label pull-left ">Admin</label>
            {!! Form::hidden('admin',0) !!}
            {!! Form::checkbox('admin', 1, null, ['class' => 'form-control','placeholder'=>'Name']) !!}
        </div>

        <div class="form-group">
            <label class="control-label pull-left" for="confirm">Activate User?</label>

            <select class="form-control"
                    {{ ($user->id === Auth::user()->id ? ' disabled="disabled"' : '') }} name="active"
                    id="active">
                <option value="1"{{ ($user->active ? ' selected="selected"' : '') }}>yes</option>
                <option value="0"{{ ( ! $user->active ? ' selected="selected"' : '') }}>no</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::submit('Save Draft', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop