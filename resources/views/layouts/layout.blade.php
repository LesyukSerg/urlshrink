<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" media="screen" />--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css"/>
</head>
    <body>
        <div class="container">
            <div class="common_wrap">
                @include('header')
                @yield("content")
    {{--            @include('footer')--}}
            </div>
        </div>

{{--        <script src="/js/jquery.min.js"></script>--}}
{{--        <script src="/js/jquery-ui.min.js"></script>--}}
{{--        <script src="/js/jquery.cookie.min.js"></script>--}}
{{--        <script src="/js/jquery.form.min.js"></script>--}}
{{--        <script src="/js/functions.min.js"></script>--}}

{{--        <script src="/bootstrap/js/bootstrap.js"></script>--}}

        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="/js/events.js"></script>
    </body>
</html>