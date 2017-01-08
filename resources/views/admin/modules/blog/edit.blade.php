@extends('admin.layouts.one_col')

@section('title')
    <h1>Edit Editorial Post {{ $blog->title }}</h1>
@stop

@section('style')
    @parent
@stop

@section('script')
    @parent

@stop

@section('content')

    <div class="mTop10">
        {!! Form::model($blog,['action' => ['Admin\BlogController@update',$blog->id], 'method' => 'patch','files'=>true], ['class'=>'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('category', 'Select a category', ['class' => 'control-label']) !!} <span class="red">*</span>
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Category']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('title', 'Editorial Title', ['class' => 'control-label']) !!} <span class="red">*</span>
            {!! Form::text('title_en', null, ['class' => 'form-control','placeholder'=>'Editorial title']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Editorial Description']) !!}
        </div>

        <div class="form-group">
            <span class="btn btn-default fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Select Cover Image...</span>
                <!-- The file input field used as target for the file upload widget -->
                <input id="cover" type="file" name="cover" class="cover form-control">
            </span>
        </div>

        <div class="form-group">
            <label class="control-label pull-left" for="confirm">Article Published ?</label>
            <select name ="active" class="form-control">
                <option value="1" {{ ($blog->active ? ' selected="selected"' : '') }}>yes</option>
                <option value="0" {{ ( ! $blog->active ? ' selected="selected"' : '') }}>no</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::submit('Save Draft', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

{{--        @include('admin.modules.photo._delete',['record' => $blog])--}}

    </div>

@stop