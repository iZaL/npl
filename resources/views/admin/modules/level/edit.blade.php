@extends('admin.layouts.one_col')

@section('title')
    <h1>Edit Level {{ $level->name }}</h1>
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Edit Level {{ $level->name }}</b>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
                {!! Form::model($level,['action' => ['Admin\LevelController@update',$level->id], 'method' => 'patch', 'files'=> true, 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'New Name', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::text('name_en', null, ['class' => 'form-control','placeholder'=>'Level Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Level Description']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <!-- /.panel -->
@endsection
