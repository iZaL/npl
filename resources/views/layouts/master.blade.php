<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>@yield(e('title'),'No Problem Learning')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    @section('style')
        @include('partials.one_page.style')
    @show
</head>
<body id="top">

@include('partials.header')

<main>
    @section('content')

    @show
</main>

@include('partials.one_page.footer')
@section('script')
    @include('partials.one_page.script')
@show
</body>
</html>