<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="Dr Wejdan">
    <meta name="author" content="Dr Wejdan">
    <meta name="viewport" content="width=device-width">
    @section('style')
        @include('partials.style')
    @show
</head>
<body id="top">

@include('partials.header')
@include('admin.partials.delete-modal',['info' => 'Are you sure ?'])

<div class="container-fluid">
    @section('content')

    @show
</div>

@include('partials.footer')
@section('script')
    {{--<script src="{{ elixir('js/app.js') }}"></script>--}}
    @include('partials.script')
    <script>
        $(document).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            if ( $( "#deleteModal" ).length ) {
                var link = button.data('link') // Extract info from data-* attributes
                $("#deleteModal").attr("action", link);
            }
        });


    </script>
@show
</body>
</html>