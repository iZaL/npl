@extends('admin.layouts.one_col')

@section('title')
    <h1>Educators</h1>
@endsection

@section('style')
    @parent
@endsection

@section('script')
    @parent
    <script>
        //Slide Info Function
        $(document).ready(function () {
            $(".select2").select2({tags: true});
        });
    </script>
@endsection

@section('middle')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Educators</b>
        </div>

        <!-- /.panel-heading -->
        @include('admin.modules.educator._list')
        <!-- /.panel-body -->

    </div>
    <!-- /.panel -->

@endsection