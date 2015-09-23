@extends('admin.layouts.one_col')

@section('title')
    <h1>Edit Subject {{ $subject->name }}</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Edit Subject {{ $subject->name }}</b>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
                {!! Form::model($subject,['action' => ['Admin\SubjectController@update',$subject->id], 'method' => 'patch', 'files'=> true, 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'New Name', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::text('name_en', null, ['class' => 'form-control','placeholder'=>'Subject Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Subject Description']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('icon', 'Icon', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::text('icon', null, ['class' => 'form-control','placeholder'=>'Icon Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>
    <!-- /.panel -->
@endsection
