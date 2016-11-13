<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
        {{--        <link rel="stylesheet" href="{{ elixir('css/all.css') }}">--}}
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

        // google analytics
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-87313372-1', 'auto');
        ga('send', 'pageview');

    </script>
@show
</body>
</html>