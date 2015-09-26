@extends('admin.layouts.one_col')

@section('middle')
    <pre> Admin Dashboard </pre>

    @include('admin.modules.educator._list')

@endsection

@section('script')
    @parent
    <script>
        //Slide Info Function
        $(document).ready(function () {
            $(".select2").select2();
        });
    </script>
@endsection
