@extends('admin.layouts.one_col')

@section('title')
    <h1>Questions</h1>
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
            Questions
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables">
                    <thead>
                    <tr>
                        <th>Body</th>
                        <th>Asked on</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr class="gradeU">
                            <td> {{ $question->body }}</td>
                            <td> {{ $question->created_at->format('m-d-Y') }}</td>
                            <td>
                                @include('admin.partials.edit-delete-buttons',['id'=>$question->id,'link'=>action('Admin\QuestionController@edit',$question->id)])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->

            @include('admin.partials.delete-modal',['link'=> action('Admin\QuestionController@destroy',$question->id) ])
        </div>
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection