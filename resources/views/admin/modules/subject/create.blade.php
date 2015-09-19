@extends('admin.layouts.one_col')

@section('title')
    <h1>Add a Subject</h1>
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
            <b>Add a Subject</b>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">
                {!! Form::open(['action' => 'Admin\SubjectController@store', 'method' => 'post', 'files'=> true, 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::text('name_en', null, ['class' => 'form-control','placeholder'=>'Subject Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Subject Description']) !!}
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
