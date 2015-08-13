<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
    @show
</head>
<body>
<div class="container">

    @include('partials.header')
    @include('partials.nav')

    @yield('banner')

    @include('partials.notifications')
</div>
<div class="contentWrap2">
    <div class="container">
        @section('content')
        @show
    </div>
</div>

@section('testimonials')
@show

@include('partials.footer')

@section('script')
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/js/slides.min.jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#slider').slides({
                preload: true,
                preloadImage: 'images/loading.gif',
                play: 2000,
                pause: 2500,
                hoverPause: true
            });
        });
    </script>
@show

</body>
</html>
