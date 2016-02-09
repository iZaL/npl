@extends('layouts.two_col')


@section('style')
    @parent
    <style>
        .user-pic {
            font-size: 60px;
        }
        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }
        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
    </style>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            if ( $( "#deleteModal" ).length ) {
                var link = button.data('link') // Extract info from data-* attributes
                $("#deleteModal").attr("action", link);
            }
        });
    </script>
@endsection

@section('title')
    <h1>Profile</h1>
@endsection

@section('right')
    <h1>AD</h1>
@endsection

@section('left')
    @include('admin.partials.delete-modal',['info' => 'Are you sure ?'])
    @include('partials.modal',['info' => 'Are you sure ?'])

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $user->firstname . $user->lastname }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="mTop10">
                    {!! Form::model($user,['action' => ['ProfileController@update',$user->id], 'files'=>true, 'method' => 'patch'], ['class'=>'form-horizontal']) !!}

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

                    @if($isEducator)
                        <div class="form-group">
                            <label class="control-label pull-left ">Experience</label>
                            {!! Form::textarea('experience',$profile->experience,['class'=>'form-control editor','placeholder'=>'Experience']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label pull-left ">Qualification</label>
                            {!! Form::textarea('qualification',$profile->qualification,['class'=>'form-control editor','placeholder'=>'Qualification']) !!}
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::submit('Save Draft', ['class' => 'btn btn-primary btn-green form-control']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection