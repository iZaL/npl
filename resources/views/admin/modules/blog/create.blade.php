@extends('admin.layouts.one_col')

@section('title')
    <h1>Write Editorial Post</h1>
@stop

@section('style')
    @parent
@stop

@section('script')
    @parent
@stop

@section('content')

    <div class="mTop10">
        {!! Form::open(['action' => 'Admin\BlogController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
        !!}

        <div class="form-group">
            {!! Form::label('title', 'Editorial Title', ['class' => 'control-label']) !!} <span class="red">*</span>
            {!! Form::text('title_en', null, ['class' => 'form-control','placeholder'=>'Editorial Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Editorial
            Description']) !!}
        </div>

        <div class="form-group">
            <span class="btn btn-default fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Select Thumbnail Image...</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="cover" type="file" name="cover" class="cover form-control">
            </span>
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop