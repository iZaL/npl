@extends('admin.layouts.one_col')

@section('title')
    <h1>Educators</h1>
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
            <b>Educators</b>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper mTop10">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                    <tr>
                        <th>Educators</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($educators as $educator)
                        <tr class="gradeU">
                            <td>
                                @if($educator->profile)
                                    <a href="{{ action('Admin\EducatorController@show',$educator->id) }}">{{ ucfirst($educator->profile->firstname) }}</a>
                                @else
                                    Unknown User
                                @endif
                                <small class="pull-right">
                                    {{ $educator->answersCount ? 'Total '. $educator->answersCount .' Answers. ': ' 0 Answers.' }}
                                </small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalBox"
                                        data-link="{{action('Admin\EducatorController@destroy',$educator->id)}}">Remove as Educator
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            @include('admin.partials.delete-modal',['info' => 'This will only remove the User as Educator and delete all his answers.
             You can delete the user from Educators Page.','deleteText'=>'Remove as Educator'])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection