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

@include('partials.one_page.header')

<main>
    @include('partials.notifications')
    @include('partials.one_page.banner')
    @include('partials.one_page.about')
    @include('partials.one_page.subject',['subjects'=>$subjects])
    @include('partials.one_page.login')
    @include('partials.one_page.register')
    @include('partials.one_page.contact')
</main>

    @include('partials.one_page.footer')
@section('script')
    @include('partials.one_page.script')
@show
</body>
</html>
